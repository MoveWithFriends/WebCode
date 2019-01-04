<?php
require_once('load.php');

// Handle logins
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_status = $login->verify_login($_POST);
}

// Verify session
if ( $login->verify_session() ) {
    $user = $login->user;
    
    include( 'contactpaginaMWF2.php' );
} else {
    include( 'contactpaginaMWF.php' );
}