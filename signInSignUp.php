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
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">SmartProject</a>
      <ul class="right hide-on-med-and-down">
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
<div class="container">
    <div class="row">
        <div class="col m6">
            <h2 class="center-align">Inloggen</h2>
            <div class="row">
                <div class="row">
                        <div class="input-field col s12">
                            <div class="row"></div>
                        </div>
                    </div>
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="signInStudentnumber" type="text" class="validate" placeholder="studentnummer">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="signInPass" type="password" class="validate" placeholder="Wachtwoord">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <p class="right-align">
                                <button class="btn btn-large waves-effect waves-light" type="button" name="action">Inloggen</button>
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
                                <button class="btn btn-large waves-effect waves-light" type="button" name="action">Aanmelden</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
   <footer class="page-footer orange">
    <div class="container"> 
    </div>
    <div class="footer-copyright">
    </div>
  </footer>     
    </body>
</html>