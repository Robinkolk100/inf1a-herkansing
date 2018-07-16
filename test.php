<?php 
session_start();
include 'db_connect.php';
include 'function_login.php';
include 'function_account.php';
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
                	<a href=<?php echo $_SERVER['PHP_SELF']."?&addProject=1"; ?>class="collapsible-header waves-effect waves-cyan active Show-Form">
              			<span class="nav-text">nieuw project </span>
              			<i id="showAddOne" class="material-icons">add_box</i>
              		</a>
              	</li>
              	<?php 
              		if(isset($_GET['addProject']) == 1)
              		{
              			echo "<form action=\"#\" method=\"post\">";
                        echo "<input type=\"text\" name=\"projectGroup\" placeholder=\"projectgroup\"><br>";
                        echo "<input type=\"text\" name=\"projectPeriod\" placeholder=\"projectperiod\"><br>";
                        echo "<input type=\"text\" name=\"projectYear\" placeholder=\"projectyear\"><br>";
                        echo "<input type=\"text\" name=\"projectName\" placeholder=\"projectname\"><br>";
                        echo "<input type=\"submit\" name=\"YearOne\" value=\"submit\"><br>";
                      	echo "</form>";
              		}

              	?>
              	
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
              </ul>
              </li>
        </aside>
      
    

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/hideshow.js"></script>
      
    </div>
  </body>
</html>