<?php 
session_start();
include 'db_connect.php';
include 'function_login.php';
include 'function_account.php';
include 'function_addProject.php';
include 'function_addProjectMember.php';
//include 'function_getProjects.php';
include 'function_getProjectMembers.php';
include 'function_getUsers.php';
include 'function_getProjectsYearOne.php';
include 'function_getProjectsYearTwo.php';
include 'function_getProjectsYearTree.php';
include 'function_getProjectsYearFour.php';
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
    <div class="nav-wrapper container"><a id="logo-container" href="home.php" class="brand-logo">SmartProject</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="Index.php">Uitloggen</a></li>
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
if(!empty($projects)){
foreach ($projects as $project) {
                            ?><li><a href="home.php?project=<?php echo $project["projectID"]; ?>"><?php echo "INF".$project['projectYear']. "".$project['projectGroup']." ".$project['projectPeriode'] ." " . $project['projectName'].""?></a></li><?php
                    }
                  } else{
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
if(!empty($projects)){
foreach ($projects as $project) {
                            ?><li><a href="home.php?project=<?php echo $project["projectID"]; ?>"><?php echo "INF".$project['projectYear']. "".$project['projectGroup']." ".$project['projectPeriode'] ." " . $project['projectName'].""?></a></li><?php
                          }
                        }
                      else{
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
if(!empty($projects)){
foreach ($projects as $project) {
                            ?><li><a href="home.php?project=<?php echo $project["projectID"]; ?>"><?php echo "INF".$project['projectYear']. "".$project['projectGroup']." ".$project['projectPeriode'] ." " . $project['projectName'].""?></a></li><?php
                          }
                        }
                      else{
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
if(!empty($projects)){
foreach ($projects as $project) {
                            ?><li><a href="home.php?project=<?php echo $project["projectID"]; ?>"><?php echo "INF".$project['projectYear']. "".$project['projectGroup']." ".$project['projectPeriode'] ." " . $project['projectName'].""?></a></li><?php
                          }
                        }
                      else{
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
        if(isset($_GET['project'])){
          echo"laat project gegevens zien";
?>  
        <div class="container">
            <!--card stats start-->
            <div id="card-stats">
              <div class="row">
                <div class="col s12 m6 l3">
                  <div class="card">
                    <div class="card-content cyan white-text">
                      <p class="card-stats-title">
                        <i class="material-icons">person_outline</i> New Clients</p>
                      <h4 class="card-stats-number">566</h4>
                      <p class="card-stats-compare">
                        <i class="material-icons">keyboard_arrow_up</i> 15%
                        <span class="cyan text text-lighten-5">from yesterday</span>
                      </p>
                    </div>
                    <div class="card-action cyan darken-1">
                      <div id="clients-bar" class="center-align"><canvas style="display: inline-block; width: 227px; height: 25px; vertical-align: top;" width="227" height="25"></canvas></div>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6 l3">
                  <div class="card">
                    <div class="card-content red accent-2 white-text">
                      <p class="card-stats-title">
                        <i class="material-icons">attach_money</i>Total Sales</p>
                      <h4 class="card-stats-number">$8990.63</h4>
                      <p class="card-stats-compare">
                        <i class="material-icons">keyboard_arrow_up</i> 70%
                        <span class="red-text text-lighten-5">last month</span>
                      </p>
                    </div>
                    <div class="card-action red darken-1">
                      <div id="sales-compositebar" class="center-align"><canvas style="display: inline-block; width: 227px; height: 25px; vertical-align: top;" width="227" height="25"></canvas></div>
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
                    <li class="collection-item avatar">
                      <i class="material-icons cyan circle">account_circle</i>
                      <h6 class="collection-header m-0">Project leden</h6>
                      <p>alle project leden met waarschuwingen</p>
                    </li>
                    <?php 
$allProjectMembers = getProjectMembers($_GET['project']);
foreach ($allProjectMembers as $Members) {

echo '<li class="collection-item">';
echo '<div class="row">';
echo '<div class="col s6">';
echo '<p class="collections-title">Naam: '.$Members["userName"];'</p>';
echo '</div>';
echo '<div class="col s6">';
echo '<p class="collections-title">waarschuwingen : '.$Members["WarningCount"];'</p>';
echo '</div>';
echo '</div>';
echo '</li>';
}?>
                    



                  </ul>
                </div>
                <div class="col s12 m12 l6">
                  <ul id="issues-collection" class="collection z-depth-1">
                    <li class="collection-item avatar">
                      <i class="material-icons red accent-2 circle">bug_report</i>
                      <h6 class="collection-header m-0">Issues</h6>
                      <p>Assigned to you</p>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s7">
                          <p class="collections-title">
                            <strong>#102</strong> Home Page</p>
                          <p class="collections-content">Web Project</p>
                        </div>
                        <div class="col s2">
                          <span class="task-cat deep-orange accent-2">P1</span>
                        </div>
                        <div class="col s3">
                          <div class="progress">
                            <div class="determinate" style="width: 70%"></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s7">
                          <p class="collections-title">
                            <strong>#108</strong> API Fix</p>
                          <p class="collections-content">API Project </p>
                        </div>
                        <div class="col s2">
                          <span class="task-cat cyan">P2</span>
                        </div>
                        <div class="col s3">
                          <div class="progress">
                            <div class="determinate" style="width: 40%"></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s7">
                          <p class="collections-title">
                            <strong>#205</strong> Profile page css</p>
                          <p class="collections-content">New Project </p>
                        </div>
                        <div class="col s2">
                          <span class="task-cat red accent-2">P3</span>
                        </div>
                        <div class="col s3">
                          <div class="progress">
                            <div class="determinate" style="width: 95%"></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s7">
                          <p class="collections-title">
                            <strong>#188</strong> SAP Changes</p>
                          <p class="collections-content">SAP Project</p>
                        </div>
                        <div class="col s2">
                          <span class="task-cat teal accent-4">P1</span>
                        </div>
                        <div class="col s3">
                          <div class="progress">
                            <div class="determinate" style="width: 10%"></div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!--work collections end-->
            <?php  } else {
                  echo"geen project geselect";
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


                <?php 
                $User =getUsers($_SESSION['userID']);

                while($row = mysqli_fetch_assoc($User)) {
                  $userEmail = $row['userEmail'];
                  $userName = $row['userName'];

                  }
               
                ?> 
                <div class="col s12 m4 l4">
                  <div id="profile-card" class="card">
                  <p>User gegevens</p>
                    <!--<div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="../../images/gallary/3.png" alt="user bg">
                    </div>-->
                    <div class="card-content">
                     <!-- <img src="../../images/avatar/avatar-7.png" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
                      <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                        <i class="material-icons">edit</i>
                      </a>-->
                      <span class="card-title activator grey-text text-darken-4"><?php echo $userName ?></span>
                      <!--<p>
                        <i class="material-icons">perm_identity</i> Project Manager</p>
                      <p>
                        <i class="material-icons">perm_phone_msg</i> +1 (612) 222 8989</p>
                      <p>-->
                        <i class="material-icons">email</i> <?php echo $userEmail  ?></p>
                    </div>
                    <!--
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Roger Waters
                        <i class="material-icons right">close</i>
                      </span>
                      <p>Here is some more information about this card.</p>
                      <p>
                        <i class="material-icons">perm_identity</i> Project Manager</p>
                      <p>
                        <i class="material-icons">perm_phone_msg</i> +1 (612) 222 8989</p>
                      <p>
                        <i class="material-icons">email</i> yourmail@domain.com</p>
                      <p>
                        <i class="material-icons">cake</i> 18th June 1990
                      </p>
                      <p>
                      </p>
                      <p>
                        <i class="material-icons">airplanemode_active</i> BAR - AUS
                      </p>
                      <p>
                      </p>
                    </div>-->
                  </div>
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
    
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
      
    </div>
  </body>
</html>

