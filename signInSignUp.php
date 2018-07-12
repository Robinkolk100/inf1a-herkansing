<?php
include 'db_connect.php';
include 'function_login.php';
include 'function_account.php';
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
                            <input id="userID" type="number" name="userID" class="validate" placeholder="Studentnummer">
                            
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
                                <input class="waves-effect waves-light btn" type="submit" name="submitinlog" value="Inloggen"><br>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <?php 
            if (isset($_POST["submitinlog"])) {
                $userID = $_POST["userID"];
                $password = $_POST["password"];

                $inlog = Inlog($userID, $password);
                foreach ($inlog as $value) {
                    echo $value . "<br>";
                }
            }
            ?>
        </div>
        <div class="col m6">
            <h2 class="center-align">Maak een account aan</h2>
            <div class="row">
                <form  action="#"  method="post" class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="signUpUserID" name="signUpUserID" type="number" class="validate" placeholder="Studentnummer">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="signUpEmail" name="signUpEmail" type="email" class="validate" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="signUpPass" name="signUpPass" type="password" class="validate" placeholder="Wachtwoord">
                        </div>
                    </div>
                   
                   
                    <div class="row">
                        <div class="col m12">
                            <p class="right-align">
                                <input class="waves-effect waves-light btn" type="submit" name="submitacc" value="Aanmelden"><br>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_POST["submitacc"])) {
                $signUpUserID = $_POST["signUpUserID"];
                $signUpEmail = $_POST["signUpEmail"];
                $signUpPass = $_POST["signUpPass"];

                $account = NewAccountUser($signUpUserID, $signUpEmail, $signUpPass);
                foreach ($account as $value) {
                    echo $value . "<br>";
                }
            }
            ?>
        </div>
    </div>
</form>
</div>
   <footer class="page-footer orange">
    <div class="container"> 
    </div>
    <div class="footer-copyright">
    </div>
  </footer>     
    </body>
</html>