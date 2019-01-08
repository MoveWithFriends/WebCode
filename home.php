<?php include('header.php'); ?>
<body>
  <div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <a href="index.php">
        <img class="img-responsive" src="images/logomwf.png" style=" position: absolute; z-index: 2;" alt="">
      </a>
      <p class="logofoot"> Move with Friends</p>
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
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Move with Friends
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#kopje1">Move With Friends? Wat is dat?</a>
              <a class="dropdown-item" href="#kopje2">Hoe werkt het? </a>
              <a class="dropdown-item" href="#kopje3">Is het voor mij?</a>
              <a class="dropdown-item" href="#kopje4">Is Move With Friends echt gratis? </a>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index3.php">Inschrijven<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contact.php">Contact<span class="sr-only">(current)</span></a>
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
              <img src="images/loginicon.png" title="LOGIN" onclick="document.getElementById('modal-wrapper').style.display='block'" style="margin-left: 15px;" width="25" height="25" alt=""> 
            </div>   
<!-- invliegend inlogscherm --> 

              <div id="modal-wrapper" class="modal">



                <form class="modal-content animate" action="document.getElementById('modal-wrapper').style.display='block'" method="post">
                      
                  <div class="imgcontainer">
                    <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
                    <img class="img-responsive3" src="images/logomwf.png" alt="Avatar" >
                    <h1 style="text-align:center">Login</h1>
                  </div>
        
                      <?php if ( isset( $login_status ) && false == $login_status ) : ?>
                      <div class="message error">
                          <p>Your username and password are incorrect. Try again.</p>
                      </div>
                      <?php endif; ?>

                    <div class="container" class="text-center lead">
                    <input type="text" class="text" name="username" placeholder="Enter username">
                    <input type="password" class="text" name="password" placeholder="Enter password">
                    <button type="submit" class="submit" value="Submit">Login</button>
                    <p><input type="checkbox" name="rememberme" value="1" style="float:left; margin-left:34px; margin-top:9px; margin-right:10px"> Remember Me</p>

                        <p><a href="lostpassword.php" style="float:left; margin-left:34px ">Reset Password</a><a href="registratie.php" style="float:right; margin-right:34px">Register here</a></p>
                        <p></p>
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
    <h1 class="text-center" style="z-index: 500;">Move With Friends? Wat is dat?</h1>
    <p class="text-center lead">Move With Friends is dé nieuwe dienst die helpt bij het zoeken naar de perfecte sport- of bewegingspartner! Zin om morgenavond lekker te bewegen, maar niemand die mee wil? Registreer je dan nu gratis op de website of via de app en je hebt morgen gegarandeerd iemand om mee te boksen, fietsen, fitnessen, hardlopen, tennissen, squashen, wandelen of zwemmen. Het vinden van de perfecte match om lekker mee te bewegen was nog nooit zo makkelijk! Dus kom van de bank, trek je sportschoenen uit de kast en Move With Friends!
    </p>
    <p id="kopje2"></p>
  </article>
  <!-- p = padding, mt = margin top, mb = margin bottom-->
  <article class="container opacity shadow p-3 mb-4 mt-4 col-xl-8 bg-light">
    <h1 class="text-center">Hoe werkt het?</h1>
    <!-- lead laat tekst eruit springen, opmaakclass vanuit Bootstrap-->
    <p class="text-center lead">
      Move with Friends werkt heel simpel. Meld jezelf aan en wij doen de rest. Bij het vinden van een sportpartner wordt rekening gehouden met: je geslacht, leeftijd, interesses, sportervaring en plaats. Op basis hiervan gaan wij op zoek naar de ideale beweeg- of sportpartner(s) voor jou. Ben je al aangemeld? Log dan gemakkelijk in op de website of via de app, geef een tijd aan wanneer je wil gaan en welke sport je wil gaan doen, kies je partner en Move With Friends! Test het zelf!
    </p>
    <p id="kopje3"></p>
  </article>
  <article class="container opacity shadow p-3 mb-4 mt-4 col-xl-8 bg-light">
    <h1 class="text-center">Is het iets voor mij?</h1>
    <p class="text-center lead">
      Gezond bewegen, de buitenlucht, sociale contacten, het is goed voor ons allemaal! Move With Friends is dus ook voor iedereen! Of je nu een ervaren sporter bent of iemand die nog nooit bij een sportschool is binnengestapt; aan de hand van jouw gegevens gaan wij op zoek naar iemand die perfect bij jou past. Of je nu met iemand wil zwemmen, fitnessen, of wandelen, het wordt allemaal geregeld door Move WIth Friends. Wij regelen je partner, zodat je snel aan de slag kan. Makkelijker kan haast niet! Dus waar wacht je nog op? Kom van de bank, trek je sportschoenen uit de kast en Move With Friends!
    </p>
    <p id="kopje4"></p>
  </article>
  <article class="container opacity shadow p-3 mb-4 mt-4 col-xl-8 bg-light">
    <h1 class="text-center">Is Move With Friends echt gratis?</h1>
    <p class="text-center lead">
      Jazeker! De diensten van Move With Friends zijn volledig gratis. Iedereen moet immers de mogelijkheid krijgen om samen met iemand te bewegen. Het is slechts onze taak om voor jou op zoek te gaan naar de ideale partner om dit mee te kunnen doen. Dus meld je gauw aan om morgen al samen met iemand kunnen te fietsen of te wandelen. Enkel voor de toegang voor verscheidene sportaccommodaties, zoals toegang tot een fitness- of zwemetablissement, en de huur van eventuele sportmaterialen, zoals bokshandschoenen of tennisrackets, kunnen kosten in rekening worden gebracht. Ben je al lid van een sportschool of zwembad waar je afspreekt met je nieuwe sportpartner, en heb je alle benodigde sportmaterialen zelf? Dan hoef je uiteraard niets te betalen! Geen excuses dus! Kom van de bank, trek je sportschoenen uit de kast en Move With Friends!
    </p>
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
