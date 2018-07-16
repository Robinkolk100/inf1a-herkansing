<?php 
session_start();
if ($_SESSION["login"] !== 1) {
  header('Location:signInSignUp.php');
}


include 'db_connect.php';
include 'function_login.php';
include 'function_account.php';
include 'function_document.php';
include 'function_addProject.php';
include 'function_addProjectMember.php';
include 'function_addProjectDocument.php';
include 'function_warningProjectMember.php';
//include 'function_getProjects.php';
include 'function_getProjectMembers.php';
include 'function_getUsers.php';
include 'function_getProjectsYearOne.php';
include 'function_getProjectsYearTwo.php';
include 'function_getProjectsYearTree.php';
include 'function_getProjectsYearFour.php';
include 'function_getProjectDocuments.php';
include 'function_getDocuments.php';
include 'function_getAdvice.php';
//print_r($_SESSION)
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SmartProjects</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/hideshow.js"></script>

</head>
<body class="loaded">
    <header id="header" class="page-topbar">
    
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="home.php" class="brand-logo">SmartProjects</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="function_logout.php">Uitloggen</a></li>
      </ul>
    </div>
  </nav>
        </header>
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
    <aside id="left-sidebar-nav">
          <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">        
                <li class="bold active">
                  <a class="collapsible-header waves-effect waves-cyan active">
                    <i class="material-icons">dashboard</i>
                    <span class="nav-text">Jaar 1 </span> 
                  </a>
                  <div class="collapsible-body" style="display: block;">
                    <ul>
<?php 
$projects = getProjectsYearOne($_SESSION['userID']);
if (!empty($projects)) {
  foreach ($projects as $project) {
    ?><li><a href="home.php?project=<?php echo $project["projectID"]; ?>"><?php echo "INF" . $project['projectYear'] . "" . $project['projectGroup'] . " " . $project['projectPeriode'] . " " . $project['projectName'] . "" ?></a></li><?php

                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                      echo "geen project voor dit jaar";
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                    ?>
                    </ul>
                  </div>
                </li>
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                    <i class="material-icons">dvr</i>
                    <span class="nav-text">Jaar 2</span>
                  </a>
                  <div class="collapsible-body" style="display:block;">
                  <ul>
<?php 
$projects = getProjectsYearTwo($_SESSION['userID']);
if (!empty($projects)) {
  foreach ($projects as $project) {
    ?><li><a href="home.php?project=<?php echo $project["projectID"]; ?>"><?php echo "INF" . $project['projectYear'] . "" . $project['projectGroup'] . " " . $project['projectPeriode'] . " " . $project['projectName'] . "" ?></a></li><?php

                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                      echo "geen project voor dit jaar";
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                    ?>
                    </ul>
                  </div>
                </li>
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                    <i class="material-icons">web</i>
                    <span class="nav-text">Jaar 3</span>
                  </a>
                  <div class="collapsible-body"style="display:block;">
                  <ul>
<?php 
$projects = getProjectsYearTree($_SESSION['userID']);
if (!empty($projects)) {
  foreach ($projects as $project) {
    ?><li><a href="home.php?project=<?php echo $project["projectID"]; ?>"><?php echo "INF" . $project['projectYear'] . "" . $project['projectGroup'] . " " . $project['projectPeriode'] . " " . $project['projectName'] . "" ?></a></li><?php

                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                      echo "geen project voor dit jaar";
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                    ?>
                    </ul>
                  </div>
                </li>
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                    <i class="material-icons">web</i>
                    <span class="nav-text">Jaar 4</span>
                  </a>
                  <div class="collapsible-body"style="display:block;">
                  <ul>
<?php 
$projects = getProjectsYearFour($_SESSION['userID']);
if (!empty($projects)) {
  foreach ($projects as $project) {
    ?><li><a href="home.php?project=<?php echo $project["projectID"]; ?>"><?php echo "INF" . $project['projectYear'] . "" . $project['projectGroup'] . " " . $project['projectPeriode'] . " " . $project['projectName'] . "" ?></a></li><?php

                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                      echo "geen project voor dit jaar";
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                    ?>
                    </ul>
                  </div>
                </li>
              </ul>
              </li>
        </aside>
      
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!--START CONTENT-->     
        <?php 
        if (isset($_GET['project'])) {
          echo "laat project gegevens zien";
          $projectID = $_GET['project'];
          ?>  
        <div class="container">
            <!--card stats start-->
            <div id="card-stats">
              <div class="row">
                <div class="col s12 m6 l3">
                  <div class="card">
                    <div class="card-content cyan white-text">
                      <p class="card-stats-title center">
                        <i class="material-icons center">person_outline</i> Aantal project leden </p>
                        <?php
                        $query = "SELECT COUNT(`users`.`userID`) AS aantalUsers
                      FROM `userproject`
                      JOIN  `users` ON `userproject`.`userID` = `users`.`userID`
                      WHERE `projectID`= " . $_GET['project'] . " ";
                        $conn = dbConnect();
			  //  Voer de query uit en en sla op in recordset (@ betekent: onderdruk errormessages)
                        $result = @mysqli_query($conn, $query) or die(mysqli_error());
                        while ($row = mysqli_fetch_array($result)) {
                          echo "<h4 class='card-stats-number center'>" . $row['aantalUsers'] . "</h4>";
                        }
                        ?>  
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3">
                  <div class="card">
                    <div class="card-content red accent-2 white-text">
                      <p class="card-stats-title center">
                        <i class="material-icons center">attach_money</i>Totaal aantal waarschuwingen</p>
                        <?php
                        $query = "SELECT SUM(`userproject`.`WarningCount`)   AS WarningCount
                      FROM `userproject`
                      JOIN  `users` ON `userproject`.`userID` = `users`.`userID`
                      WHERE `projectID`= " . $_GET['project'] . " ";
                        $conn = dbConnect();
			  //  Voer de query uit en en sla op in recordset (@ betekent: onderdruk errormessages)
                        $result = @mysqli_query($conn, $query) or die(mysqli_error());
                        while ($row = mysqli_fetch_array($result)) {
                          echo "<h4 class='card-stats-number center'>" . $row['WarningCount'] . "</h4>";
                        }
                        ?>  
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3">
                  <div class="card">
                    <div class="card-content teal accent-4 white-text">
                      <p class="card-stats-title">
                        <i class="material-icons">trending_up</i> Today Profit</p>
                      <h4 class="card-stats-number">$806.52</h4>
                      <p class="card-stats-compare">
                        <i class="material-icons">keyboard_arrow_up</i> 80%
                        <span class="teal-text text-lighten-5">from yesterday</span>
                      </p>
                    </div>
                    <div class="card-action teal darken-1">
                      <div id="profit-tristate" class="center-align"><canvas style="display: inline-block; width: 227px; height: 25px; vertical-align: top;" width="227" height="25"></canvas></div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3">
                  <div class="card">
                    <div class="card-content deep-orange accent-2 white-text">
                      <p class="card-stats-title">
                        <i class="material-icons">content_copy</i> New Invoice</p>
                      <h4 class="card-stats-number">1806</h4>
                      <p class="card-stats-compare">
                        <i class="material-icons">keyboard_arrow_down</i> 3%
                        <span class="deep-orange-text text-lighten-5">from last month</span>
                      </p>
                    </div>
                    <div class="card-action  deep-orange darken-1">
                      <div id="invoice-line" class="center-align"><canvas style="display: inline-block; width: 264.767px; height: 25px; vertical-align: top;" width="264" height="25"></canvas></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--card stats end-->
            <!--work collections start-->
            <div id="work-collections">
              <div class="row">
                <div class="col s12 m12 l6">
                  <ul id="projects-collection" class="collection z-depth-1">
                    <li class="collection-item cyan avatar">
                      <i class="material-icons cyan circle">person_outline</i>
                      <h6 class="collection-header m-0">Project leden</h6>
                      <?php
                      $query = "SELECT * FROM `users`ORDER BY `users`.`UserID` ASC ";
                      $conn = dbConnect();
			  //  Voer de query uit en en sla op in recordset (@ betekent: onderdruk errormessages)
                      $result = @mysqli_query($conn, $query) or die(mysqli_error());


                      ?>

  <form action='#' name='input' method='POST'>
    <select name="addmember" style="display: block;">
    <?php 
    while ($row = mysqli_fetch_array($result)) {
      echo "<option value=" . $row['userID'] . ">" . $row['userEmail'] . "</option>";
    }
    echo "<input type='hidden' value=" . $projectID . " name='projectId' />";
    ?>        
    </select>
    <p>nieuw lid toevoegen <input type='submit' value='add lid'></p>
  </form>
<?php 
if (isset($_POST['addmember'])) {
  addProjectMember($_POST['addmember'], $_GET['project']);
} else {
}
?>
                    </li>
                    <?php 
                    $allProjectMembers = getProjectMembers($_GET['project']);
                    foreach ($allProjectMembers as $Members) {

                      echo '<li class="collection-item">';
                      echo '<div class="row">';
                      echo '<div class="col s5">';
                      echo '<p class="collections-title">Naam: ' . $Members["userName"] . '</p>';
                      echo '</div>';
                      echo '<div class="col s4">';
                      echo '<p class="collections-title">waarschuwingen : ' . $Members["WarningCount"] . '</p>';
                      echo '</div>';
                      echo '<div class="col s3">';
                      echo "<form action=\"#\" method=\"post\">";
                      echo "<input type=\"hidden\" name=\"ID\" value='" . $Members["userID"] . "'>";
                      echo "<input type=\"submit\" class=\"waves-effect waves-light red btn\" name=\"AddWarning\" value=\"Add\">";
                      echo "</form>";
                      echo '</div>';
                      echo '</div>';
                      echo '</li>';
                    }

                    if (isset($_POST['AddWarning'])) {
                      warningProjectMember($_POST['ID'], $_GET['project']);
                    }
                    ?>

                  </ul>
                </div>
                

                <div class="col s12 m12 l6">
                  <ul id="issues-collection " class="collection z-depth-1">
                    <li class="collection-item red accent-2 avatar">
                      <i class="material-icons red accent-2 circle">library_books</i>
                      <h6 class="collection-header m-0">documents</h6>
                      <?php
                      $query = "SELECT * FROM `documents`ORDER BY `documents`.`documentID` ASC ";
                      $conn = dbConnect();
        //  Voer de query uit en en sla op in recordset (@ betekent: onderdruk errormessages)
                      $result = @mysqli_query($conn, $query) or die(mysqli_error());


                      ?>

  <form action='#' name='input' method='POST'>
    <select name="addDocument" style="display: block;">
    <?php 
    while ($row = mysqli_fetch_array($result)) {
      echo "<option value=" . $row['documentID'] . ">" . $row['documentName'] . "</option>";
    }
    ?>        
    </select>
    <input type="date" name="Deadline">
    <p> <input type='submit' name="addProjDoc" value='toevoegen'></p>
  </form>
                    </li>

                    <?php
                    if (isset($_POST['addProjDoc'])) {
                      echo $_POST['addDocument'];
                      addProjectDocument($projectID, $_POST['addDocument'], $_POST['Deadline']);
                    }

                    $documenten = getProjectDocuments($projectID);
                    if ($documenten != null) {
                      foreach ($documenten as $document) {
                        ?>
                    <li class="collection-item">
                      <div class="row">
                          <p class="collections-title">
                            <form action='#' name='input' method='POST'>
                              <div class="col s5">
                              <div class="col s12">
                              <input type="hidden" name="ID" value=<?php echo $document['documentID'] ?>>
                              <strong><?php echo $document['documentName']; ?></strong>
                                </div>
                              <a class="waves-effect waves-light btn modal-trigger" href="#modal<?php echo $document['documentID']; ?>">Info</a>
                            </div>
                        <div class="col s4">
                          <strong>Deadline: </strong>
                          <input type="date" name="Deadline" value=<?php echo $document['documentDeadline']; ?>>
                        </div>
                        <div class="col s3">
                          <input type="submit" class="waves-effect waves-light red btn" value="Aanpassen">
                          <input type="submit" class="waves-effect waves-light red btn" value="Inleveren ">
                        </div>
                          </form>
                          <div id="modal<?php echo $document['documentID']; ?>" class="modal">
  <div class="modal-content">
  <?php 
  $Advices = getAdvice($document['documentID']);
  if ($Advices != null) {
    foreach ($Advices as $Advice) {


      ?>
    <h4><?php echo $Advice['adviceType']; ?></h4>
    <p><?php echo $Advice['adviceTekst']; ?></p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
  </div>
</div>
<?php 
};
} else {
  echo "geen advies gegeven";
}
?>
                      </div>
                    </li>
                    <?php 
                  }
                } else {
                  echo "geen documenten";
                } ?>
                  </ul>
                </div>
              </div>
            </div>
            <!--work collections end-->
            <?php 
          } else {
            echo "geen project geselect";
          }
          ?>
            <!--card widgets start-->
            <div id="card-widgets">
              <div class="row">
                <div class="col s12 m4 l4">
                  <ul id="task-card" class="collection with-header">
                    <li class="collection-header teal accent-4">
                      <h4 class="task-card-title">Nieuw Project</h4>
                    </li>
                    <form action="#" method="post">
                      <li style="touch-action: pan-y;">
                        <input type="text" name="projectGroup" placeholder="projectGroup">
                      </li>
                      <li style="touch-action: pan-y;">
                        <input type="text" name="projectPeriod" placeholder="projectPeriod">
                      </li>
                      <li style="touch-action: pan-y;">
                        <input type="text" name="projectYear" placeholder="projectYear">
                      </li>
                      <li style="touch-action: pan-y;">
                        <input type="text" name="projectName" placeholder="projectName">
                      </li>
                      <li style="touch-action: pan-y;">
                        <input class="waves-effect waves-light btn" type="submit" name="NewProject" value="Aanmaken" style="width: 100%;"><br>
                      </li>
                    </form>
                  </ul>
                </div>
                <?php 
                if (isset($_POST["NewProject"])) {
                  $projectGroup = $_POST["projectGroup"];
                  $projectPeriod = $_POST["projectPeriod"];
                  $projectYear = $_POST["projectYear"];
                  $projectName = $_POST["projectName"];

                  $test = addProject($projectGroup, $projectPeriod, $projectYear, $projectName);
                  foreach ($test as $value) {
                    echo "$value <br>";
                  }
                }
                ?>

                <div class="col s12 m4 l4">
                  <ul id="task-card" class="collection with-header">
                    <li class="collection-header red accent-2">
                      <h4 class="task-card-title">Nieuw Document</h4>
                    </li>
                    <form action="#" method="post">
                      <li style="touch-action: pan-y;">
                        <input type="text" name="documentName" placeholder="Document naam">
                      </li>
                      <li style="touch-action: pan-y;">
                        <input class="waves-effect waves-red red btn" type="submit" name="NewDocument" value="Aanmaken" style="width: 100%;"><br>
                      </li>
                    </form>
                  </ul>
                </div>
                <?php 
                if (isset($_POST["NewDocument"])) {
                  $documentName = $_POST["documentName"];

                  $test = newDocument($documentName);
                  if ($test == null) {
                    echo "Bestaat al";
                  }
                }
                ?>



                <?php 
                $User = getUsers($_SESSION['userID']);

                while ($row = mysqli_fetch_assoc($User)) {
                  $userEmail = $row['userEmail'];
                  $userName = $row['userName'];

                }

                ?> 

                <div class="col s12 m4 l4">
                  <ul id="projects-collection" class="collection z-depth-1">
                    <li class="collection-item cyan avatar">
                      <i class="material-icons cyan circle">person_outline</i>
                      <h6 class="collection-header m-0">Gebruiker</h6>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <p class="collections-title"> Naam: <?php echo $userName; ?></p>
                      </div>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <p class="collections-title"> Email: <?php echo $userEmail; ?></p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            
            <!--card widgets end-->
            <!-- //////////////////////////////////////////////////////////////////////////// -->
          <!--end container-->
        </section>
        </div>
       
        <!--END CONTENT-->
        
  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
         
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">

  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.modal').modal();
  });

    </script>

      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  <!-- < if(isset($_GET['logout'] )){
    Logout();
    header('Location: index.php');
    
    }else{}
    Print_r($_GET['logout']);
    ?> -->
    </div>
  </body>
</html>


