<?php include('header.php'); ?>
<body>
  <div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <a href="index.php">
        <img class="img-responsive" src="images/logomwf.png" style=" position: absolute; z-index: 2;" alt="">
      </a>
      <p class="logofoot"> <?php echo $user->name; ?></p><br>
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="images/wandelcarousel.png" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/crunchcarousel.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/squashcarousel.png" alt="Third slide">
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light backgroundnav sticky-top" id="kopje1">
    <div class="container col-xl-8">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link fred" rel="" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="Data_handling.php">Activiteiten en tijden opgeven<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contactpaginaMWF2.php">Contact<span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
          <li>
            <a class="navbar-brand" target="_blank" href="https://www.facebook.com/movewithfriends.breda.3">
              <img src="images/facebookicon.png" title="Volg ons op Facebook" style="margin-left: 15px;" width="25" height="25" alt="">
            </a>
            <a class="navbar-brand" target="_blank" href="https://twitter.com/movewithfriends?lang=en">
              <img src="images/twittericon.png" title="Volg ons op Twitter" style="margin-left: 15px;" width="25" height="25" alt="">
            </a>
            <a class="navbar-brand" target="_blank" href="https://www.instagram.com/movewithfriends/">
              <img src="images/instagramicon.png" title="Volg ons op Instagram" style="margin-left: 15px;" width="25" height="25" alt=""></a>
            <div class="navbar-brand">
              <p> <a href="logout.php"><img src="images/loginicon.png" title="Log OUT" style="margin-left: 15px;" width="25" height="25" alt=""> </div>    
              <!-- Invliegend inlogscherm -->    
              <div id="modal-wrapper" class="modal">
  
                <form class="modal-content animate" action="index.php" method="post">
                      
                  <div class="imgcontainer">
                    <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
                    <img src="images/logomwf.png" alt="Avatar" >
                    <h1 style="text-align:center">Login</h1>
                  </div>

                  <div class="container">
                      <?php if ( isset( $login_status ) && false == $login_status ) : ?>
                          <div class="message error">
                              <p>Your username and password are incorrect. Try again.</p>
                          </div>
                      <?php endif; ?>
                    <input type="text" placeholder="Enter Username" name="username">
                    <input type="password" placeholder="Enter Password" name="password">        
                    <button type="submit">Login</button>
                    <input type="checkbox" name="rememberme" style="margin:26px 30px;" value="1"> Remember me      
                    <a href="lostpassword.php" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
                    <p><a href="registratie.php">Register here</a></p>
                  </div>
                  
                </form>

                
  
</div>

<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<article class="container opacity shadow p-3 mb-4 mt-4 col-xl-8 bg-light">
    <div class="row">
      <div class="col-md-6 bg-light opacity">
        <h2>Contactgegevens:</h2>
        <ul class="homeicon">
          <li><strong>Move with Friends</strong>
            Hogeschoollaan 1
            4818CR, Breda
            Kantoor HD-206
          </li>
        </ul>
        <ul class="mailicon">
          <li>
            <a href="mailto:info@movewithfriends.nl"><strong>Stuur ons een e-mail</strong></a>
          </li>
        </ul>
        <ul class="phoneicon">
          <li>
            <a href="tel:+31658796542"><strong>06-58796542</strong></a>
          </li>
        </ul>
      </div>
      <div class="col-md-6 bg-light p-2 mb-1 mt-1 opacity">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2479.138521417129!2d4.795772315847406!3d51.58402457964798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6a1d826c8567d%3A0xdaa7f5a2dd8692b6!2sHogeschoollaan+1%2C+4818+CR+Breda!5e0!3m2!1snl!2snl!4v1539097353859" width="350" height="250" style="border:0"></iframe>
      </div>
    </div>
</article>
  
  <footer class="app-footer backgroundnav">
    <div class="px-3 py-1 d-none d-lg-block d-xl-block">
      <div class="row">
        <div class="col-lg-3 col-xl-2">
          <p><strong>Het Move with Friends team:</strong></p>
          <p class="nomargin">Hogeschoollaan 1, </p>
          <p class="nomargin">4818 CR Breda, </p>
          <p class="nomargin">Kantoor HD 206</p>
        </div>
        <div class="col-lg-1 col-xl-1.5">
          <img src="images/joosticon.png" alt="Joost" class="img-responsive2">
        </div>
        <div class="col-lg-1 col-xl-1">
          <p><strong>Joost Oomen</strong></p>
          <div class="d-none d-xl-block">
            <p>Activity director</p>
          </div>
        </div>
        <div class="col-lg-1 col-xl-1.5 img-responsive2">
          <img src="images/stijnicon.png" alt="Stijn" class="img-responsive2">
        </div>
        <div class="col-lg-1 col-xl-1">
          <p><strong>Stijn Pijman</strong></p>
          <div class="d-none d-xl-block">
            <p>App director</p>
          </div>
        </div>
        <div class="col-lg-1 col-xl-1.5 img-responsive2">
          <img src="images/nickicon.png" alt="Nick" class="img-responsive2">
        </div>
        <div class="col-lg-1 col-xl-1">
          <p><strong>Nick Sluiters</strong></p>
          <div class="d-none d-xl-block">
            <p >Webpage director</p>
          </div>
        </div>
        <div class="col-lg-1 col-xl-1.5 img-responsive2">
          <img src="images/jurgenicon.png" alt="Jurgen" class="img-responsive2">
        </div>
        <div class="col-lg-1 col-xl-1">
          <p><strong>Jurgen Paapen</strong></p>
          <div class="d-none d-xl-block">
            <p>Usability director</p>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<?php include('footer.php'); ?>
