<?php
class login {
    public $user;
    
    public function __construct() {
        global $db;

        session_start();
        
        $this->db = $db;
    }
    
    public function verify_session() {
        $hank = $_SESSION['UserName'];
        
        if ( empty( $hank ) && ! empty( $_COOKIE['rememberme'] ) ) {
            list($selector, $authenticator) = explode(':', $_COOKIE['rememberme']);
            
            $results = $this->db->get_results("SELECT * FROM auth_tokens WHERE selector = :selector", ['selector'=>$selector]);
            $auth_token = $results[0];
            
            if ( hash_equals( $auth_token->token, hash( 'sha256', base64_decode( $authenticator ) ) ) ) {
                $hank = $auth_token->username;
                $_SESSION['UserName'] = $hank;
            }
        }
        
        $user =  $this->user_exists( $hank );
        
        if ( false !== $user ) {
            $this->user = $user;
            
            return true;
        }
        
        return false;
    }
    
    public function verify_login($post) {
        if ( ! isset( $post['UserName'] ) || ! isset( $post['Password'] ) ) {
            return false;
        }
        
        // Check if user exists
        $user = $this->user_exists( $post['UserName'] );
        
        if ( false !== $user ) {
            if ( password_verify( $post['Password'], $user->Password ) ) {
                $_SESSION['UserName'] = $user->UserName;
                
                if ( $post['rememberme'] ) {
                    $this->rememberme($user);
                }

                return true;
            }
        }

        return false;
    }
    
    public function register($post) {
        // Required fields
        $required = array( 'FirstName', 'LastName', 'Email', 'UserName', 'Password', 'PhoneNumber', 'BirthDate','Gender','PreferredGender' );
        // $post['name'] = $post['firstname'] . " " . $post['lastname'];

        // $parts = explode(" ", $name);
        // // $post['lastname'] = array_pop($parts);
        // $post['preposition'] = implode(" ", $parts);

        foreach ( $required as $key ) {
            if ( empty( $post[$key] ) ) {
                return array('status'=>0,'message'=>sprintf('Please enter your %s', $key));
            }
        }

        // Check if  email and username already exist

        if ( false !== $this->user_exists( $post['UserName'] ) ) {
            return array('status'=>0,'message'=>'Gebruikersnaam bestaat al');
        }

        if ( false !== $this->email_exists( $post['Email'] ) ) {
            return array('status'=>0,'message'=>'Emailadres bestaat al');
        }

        // compare email and password      
            // $password = trim($_POST['password']);
            // $password2 = trim($_POST['password2']);
            // if($password1 != $password2){
            // echo "Wachtwoorden komen niet overeen";
            
        // if ( $email === $email2 ) {
        //     return array('status'=>0,'message'=>'Emailadressen komen niet overeen');
        // }
        //         if ( $post['password'] <> $post['password2'] ) {
        //     return array('status'=>0,'message'=>'Wachtwoorden komen niet overeen');
        // }
        
        // Create if doesn't exist

        $insert = $this->db->insert('Users', 
            array(
                'FirstName' => $post['FirstName'],
                'LastName'  => $post['LastName'],
                'UserName'  =>  $post['UserName'], 
                'Password'  =>  password_hash($post['Password'], PASSWORD_DEFAULT),
                'Email'     =>  $post['Email'],
                // 'name'      => $post['name'],
                'PhoneNumber' => $post['PhoneNumber'],
                'BirthDate' => $post['BirthDate'],
                'Gender' => $post['Gender'],
                'PreferredGender' => $post['PreferredGender'],
                // 'preposition' => $post['preposition'],
            )
        );
        
        if ( $insert == true ) {
            return array('status'=>1,'message'=>'Account succesvol aangemaakt');
        }
        
        return array('status'=>0,'message'=>'Onbekende fout.');
    }
    
    public function lost_password($post) {
        // Verify email submitted
        if ( empty( $post['Email'] ) ) {
            return array('status'=>0,'message'=>'Please enter your email address');
        }
        
        // Verify email exists
        if ( ! $user = $this->user_exists( $post['Email'], 'Email' ) ) {
            return array('status'=>0,'message'=>'That email address does not exist in our records');
        }
        
        // Create tokens
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = sprintf('%sreset.php?%s', ABS_URL, http_build_query([
            'selector' => $selector,
            'validator' => bin2hex($token)
        ]));

        // Token expiration
        $expires = new DateTime('NOW');
        $expires->add(new DateInterval('PT01H')); // 1 hour
        
        // Delete any existing tokens for this user
        $this->db->delete('password_reset', 'Email', $user->email);
        
        // Insert reset token into database
        $insert = $this->db->insert('password_reset', 
            array(
                'Email'     =>  $user->email,
                'selector'  =>  $selector, 
                'token'     =>  hash('sha256', $token),
                'expires'   =>  $expires->format('U'),
            )
        );
        
        // Send the email
        if ( false !== $insert ) {
            // Recipient
            $to = $user->email;
            
            // Subject
            $subject = 'Your password reset link';
            
            // Message
            $message = '<p>We recieved a password reset request. The link to reset your password is below. ';
            $message .= 'If you did not make this request, you can ignore this email</p>';
            $message .= '<p>Here is your password reset link:</br>';
            $message .= sprintf('<a href="%s">%s</a></p>', $url, $url);
            $message .= '<p>Thanks!</p>';
            
            // Headers
            $headers = "From: " . ADMIN_NAME . " <" . ADMIN_EMAIL . ">\r\n";
            $headers .= "Reply-To: " . ADMIN_EMAIL . "\r\n";
            $headers .= "Content-type: text/html\r\n";
            
            // Send email
            $sent = mail($to, $subject, $message, $headers);
        }
        
        if ( false !== $sent ) {
            // If they're resetting their password, we're making sure they're logged out
            session_destroy();
            
            return array('status'=>1,'message'=>'Check your email for the password reset link');
        }
        
        return array('status'=>0,'message'=>'There was an error send your password reset link');
    }
    
    public function reset_password($post) {
        // Required fields
        $required = array( 'selector', 'validator', 'Password' );
        
        foreach ( $required as $key ) {
            if ( empty( $post[$key] ) ) {
                return array('status'=>0,'message'=>'There was an error processing your request. Error Code: 001');
            }
        }
        
        extract($post);
        
        // Get tokens
        $results = $this->db->get_results("SELECT * FROM password_reset WHERE selector = :selector AND expires >= :time", ['selector'=>$selector,'time'=>time()]);
        
        if ( empty( $results ) ) {
            return array('status'=>0,'message'=>'There was an error processing your request. Error Code: 002');
        }
        
        $auth_token = $results[0];
        $calc = hash('sha256', hex2bin($validator));
        
        // Validate tokens
        if ( hash_equals( $calc, $auth_token->token ) )  {
            $user = $this->user_exists($auth_token->email, 'Email');
            
            if ( false === $user ) {
                return array('status'=>0,'message'=>'There was an error processing your request. Error Code: 003');
            }
            
            // Update password
            $update = $this->db->update('Users', 
                array(
                    'Password'  =>  password_hash($password, PASSWORD_DEFAULT),
                ), $user->ID
            );
            
            // Delete any existing tokens for this user
            $this->db->delete('password_reset', 'Email', $user->email);
            
            if ( $update == true ) {
                // New password. New session.
                session_destroy();
            
                return array('status'=>1,'message'=>'Password updated successfully. <a href="index.php">Login here</a>');
            }
        }
        
        return array('status'=>0,'message'=>'There was an error processing your request. Error Code: 004');
    }
    
    private function rememberme($user) {
        $selector = base64_encode(random_bytes(9));
        $authenticator = random_bytes(33);
        
        // Set rememberme cookie
        setcookie(
            'rememberme', 
            $selector.':'.base64_encode($authenticator),
            time() + 864000,
            '/',
            '',
            true,
            true
        );
        
        // Clean up old tokens
        $this->db->delete('auth_tokens', 'UserName', $user->UserName);
        
        // Insert auth token into database
        $insert = $this->db->insert('auth_tokens', 
            array(
                'selector'  =>  $selector, 
                'token'     =>  hash('sha256', $authenticator),
                'UserName'  =>  $user->UserName,
                'expires'   =>  date('Y-m-d\TH:i:s', time() + 864000),
            )
        );
    }
    
    private function user_exists($where_value, $where_field = 'UserName') {
        $user = $this->db->get_results("
            SELECT * FROM Users 
            WHERE {$where_field} = :where_value", 
            ['where_value'=>$where_value]
        );
        
        if ( false !== $user ) {
            return $user[0];
        }
        
        return false;
    }

    private function email_exists($where_value, $where_field = 'Email') {
        $user = $this->db->get_results("
            SELECT * FROM Users 
            WHERE {$where_field} = :where_value", 
            ['where_value'=>$where_value]
        );
        
        if ( false !== $user ) {
            return $user[0];
        }
        
        return false;
    }
}

$login = new login;