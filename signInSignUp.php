<?php
include 'db_connect.php';
include 'function_login.php';
?>
<!DOCTYPE html>
<html>
    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="Index.php" class="brand-logo">SmartProject</a>
      <ul class="right hide-on-med-and-down">
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
<div class="container">
    <form action="#"  method="post">
    <div class="row">
        <div class="col m6">
            <h2 class="center-align">Inloggen</h2>
            <div class="row">
                <div class="row">
                        <div class="input-field col s12">
                            <div class="row"></div>
                        </div>
                    </div>
                <form action="#"  method="post" class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="userID" type="text" name="userID" class="validate" placeholder="studentnummer">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" name="password" class="validate" placeholder="Wachtwoord">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <p class="right-align">
                                <button class="btn btn-large waves-effect waves-light" type="button" name="action">Inloggen</button>
                                <input type="submit" name="submit" value="submit"><br>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col m6">
            <h2 class="center-align">Maak een account aan</h2>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="signUpUserID" type="email" class="validate" placeholder="Studentnummer">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="signUpEmail" type="email" class="validate" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="signUpPass" type="password" class="validate" placeholder="Wachtwoord">
                        </div>
                    </div>
                   
                   
                    <div class="row">
                        <div class="col m12">
                            <p class="right-align">
                                <button class="btn btn-large waves-effect waves-light" type="submit" name="submit">Aanmelden</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
</div>
   <footer class="page-footer orange">
    <div class="container"> 
    <?php
    
    if (isset($_POST["submit"])) {
    $userID = $_POST["userID"];
    $password = $_POST["password"];

    $test = Inlog($userID, $password);
    foreach ($test as $value) {
        echo $value. "<br>";
    }
}
    
    ?>
    </div>
    <div class="footer-copyright">
    </div>
  </footer>     
    </body>
</html>