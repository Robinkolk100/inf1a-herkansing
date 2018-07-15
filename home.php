<?php 
session_start();
include 'db_connect.php';
include 'function_login.php';
include 'function_account.php';
include 'function_getProjects.php';
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
              <a  href = "test_addProject.php"  class="waves-effect waves-light btn">nieuw project</a>
                <li class="bold active">
                  <a class="collapsible-header waves-effect waves-cyan active">
                    <i class="material-icons">dashboard</i>
                    <span class="nav-text">Jaar 1</span>
                  </a>
                  <div class="collapsible-body" style="display: block;">
                    <ul>
<?php 
$projects = getProjects($_SESSION['userID']);
foreach ($projects as $project) {
                          if ($project['projectYear'] == 1) {
                            ?><li><a href="home.php?project=<?php echo $project["projectID"]; ?>"</a><?php
                            echo "INF";
                            echo $project['projectPeriode'];
                            echo $project['projectGroup'];
                            echo $project['projectYear'] . " ";
                            echo $project['projectName'];
                            echo"</li>";
                          }
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
$projects = getProjects($_SESSION['userID']);
foreach ($projects as $project) {
                          if ($project['projectYear'] == 2) {
                            ?><li><a href="home.php?project=<?php echo $project["projectID"]; ?>"</a><?php
                            echo "INF";
                            echo $project['projectPeriode'];
                            echo $project['projectGroup'];
                            echo $project['projectYear'] . " ";
                            echo $project['projectName'];
                            echo"</li>";
                          }
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
$projects = getProjects($_SESSION['userID']);
foreach ($projects as $project) {
                          if ($project['projectYear'] == 3) {
                            ?><li><a href="home.php?project=<?php echo $project["projectID"]; ?>"</a><?php
                            echo "INF";
                            echo $project['projectPeriode'];
                            echo $project['projectGroup'];
                            echo $project['projectYear'] . " ";
                            echo $project['projectName'];
                            echo"</li>";
                          }
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
                      <i class="material-icons cyan circle">card_travel</i>
                      <h6 class="collection-header m-0">Projects</h6>
                      <p>Your Favorites</p>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s6">
                          <p class="collections-title">Web App</p>
                          <p class="collections-content">AEC Company</p>
                        </div>
                        <div class="col s3">
                          <span class="task-cat cyan">Development</span>
                        </div>
                        <div class="col s3">
                          <div id="project-line-1"><canvas style="display: inline-block; width: 124.733px; height: 30px; vertical-align: top;" width="124" height="30"></canvas></div>
                        </div>
                      </div>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s6">
                          <p class="collections-title">Mobile App for Social</p>
                          <p class="collections-content">iSocial App</p>
                        </div>
                        <div class="col s3">
                          <span class="task-cat red accent-2">UI/UX</span>
                        </div>
                        <div class="col s3">
                          <div id="project-line-2"><canvas style="display: inline-block; width: 124.733px; height: 30px; vertical-align: top;" width="124" height="30"></canvas></div>
                        </div>
                      </div>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s6">
                          <p class="collections-title">Website</p>
                          <p class="collections-content">MediTab</p>
                        </div>
                        <div class="col s3">
                          <span class="task-cat teal accent-4">Marketing</span>
                        </div>
                        <div class="col s3">
                          <div id="project-line-3"><canvas style="display: inline-block; width: 124.733px; height: 30px; vertical-align: top;" width="124" height="30"></canvas></div>
                        </div>
                      </div>
                    </li>
                    <li class="collection-item">
                      <div class="row">
                        <div class="col s6">
                          <p class="collections-title">AdWord campaign</p>
                          <p class="collections-content">True Line</p>
                        </div>
                        <div class="col s3">
                          <span class="task-cat deep-orange accent-2">SEO</span>
                        </div>
                        <div class="col s3">
                          <div id="project-line-4"><canvas style="display: inline-block; width: 124.733px; height: 30px; vertical-align: top;" width="124" height="30"></canvas></div>
                        </div>
                      </div>
                    </li>
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
                      <h4 class="task-card-title">My Task</h4>
                      <p class="task-card-date">Sept 16, 2017</p>
                    </li>
                    <li class="collection-item dismissable" style="touch-action: pan-y;">
                      <input id="task1" type="checkbox">
                      <label for="task1" style="text-decoration: none;">Create Mobile App UI.
                        <a href="#" class="secondary-content">
                          <span class="ultra-small">Today</span>
                        </a>
                      </label>
                      <span class="task-cat cyan">Mobile App</span>
                    </li>
                    <li class="collection-item dismissable" style="touch-action: pan-y;">
                      <input id="task2" type="checkbox">
                      <label for="task2" style="text-decoration: none;">Check the new API standerds.
                        <a href="#" class="secondary-content">
                          <span class="ultra-small">Monday</span>
                        </a>
                      </label>
                      <span class="task-cat red accent-2">Web API</span>
                    </li>
                    <li class="collection-item dismissable" style="touch-action: pan-y;">
                      <input id="task3" checked="checked" type="checkbox">
                      <label for="task3" style="text-decoration: line-through;">Check the new Mockup of ABC.
                        <a href="#" class="secondary-content">
                          <span class="ultra-small">Wednesday</span>
                        </a>
                      </label>
                      <span class="task-cat teal accent-4">Mockup</span>
                    </li>
                    <li class="collection-item dismissable" style="touch-action: pan-y;">
                      <input id="task4" checked="checked" disabled="disabled" type="checkbox">
                      <label for="task4" style="text-decoration: line-through;">I did it !</label>
                      <span class="task-cat deep-orange accent-2">Mobile App</span>
                    </li>
                  </ul>
                </div>
                <?php 
                $conn = dbConnect();
                $result = $conn->query("SELECT * FROM `users` WHERE `users`.`userID` = '".$_SESSION['userID']."' ;");
        
                while($row = mysqli_fetch_assoc($result)) {
                  $userEmail = $row['userEmail'];
                  $userName = $row['userName'];

                  }
                        /* close connection */
                        $conn->close();                
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

