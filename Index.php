
<?php 
require_once('function_login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SmartProjects</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="Index.php" class="brand-logo">SmartProject</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="signInSignUp.php">Inloggen</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">SmartProjects</h1>
      <div class="row center">
        <h5 class="header col s12 light">Maakt een einde aan slechtlopende projecten</h5>
      </div>
      <div class="row center">
        <a href="signInSignUp.php" id="signInButton" class="btn-large waves-effect waves-light orange">Maak een account</a>
      </div>
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Geeft het project een boost</h5>

            <p class="light">Projecten die niet goed lopen of op te leveren bestanden die niet goed zijn of te laat zijn ingeleverd zijn vanaf nu verleden tijd met SmartProjects, waar je in een oog opslag de belangrijkste zaken van het project ziet.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Gericht op het projectgroep</h5>

            <p class="light">Na het selecteren van de juiste projectgroep kan het samenwerken beginnen en kun je zien welke to-do's er zijn en wie daar mee bezig is. Ook kun je zien welke onderdelen al klaar zijn.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Makkelijk te gebruiken</h5>

            <p class="light">Na het maken van een account selecteer je de desbetreffende projectgroep en vervolgens zie je in een opslag de to-do lijst, deadlines en tips om valkuilen te voorkomen.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We zijn INF1A, oftewel projectgroep Informatica jaar 1 periode 4, van NHL Stenden Hogeschool Emmen en hebben deze website gemaakt voor project Innovate.</p>


        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
    
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
