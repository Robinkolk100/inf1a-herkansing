<?php 
session_start();
if ($_SESSION["login"] !== 1) {
  header('Location:signInSignUp.php');
}
include 'db_connect.php';
include 'function_login.php';
include 'function_account.php';
include 'function_document.php';
include 'function_addAdvice.php';
include 'function_addProject.php';
include 'function_addProjectMember.php';
include 'function_addProjectDocument.php';
include 'function_warningProjectMember.php';
include 'function_uploadProjectDocument.php';
include 'function_updateDeadlineProjectDocument.php';
	//include 'function_getProjects.php';
include 'function_getProjectMembers.php';
include 'function_getUsers.php';
include 'function_getProjectsYearOne.php';
include 'function_getProjectsYearTwo.php';
include 'function_getProjectsYearTree.php';
include 'function_getProjectsYearFour.php';
include 'function_getProjectDocuments.php';
include 'function_getDocuments.php';
include 'function_getAdviceObligation.php';
include 'function_getAdvicePitfall.php';
include 'function_getAdviceTips.php';
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
				<div class="nav-wrapper container">
					<a id="logo-container" href="home.php" class="brand-logo">SmartProjects</a>
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
            ?>
									<li><a href="home.php?project=<?php echo $project["projectID"]; ?>"><?php echo "INF" . $project['projectYear'] . "" . $project['projectGroup'] . " " . $project['projectPeriode'] . " " . $project['projectName'] . "" ?></a></li>
									<?php

      }
    } else {
      echo "Nog geen projecten voor dit jaar";
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
            ?>
									<li><a href="home.php?project=<?php echo $project["projectID"]; ?>"><?php echo "INF" . $project['projectYear'] . "" . $project['projectGroup'] . " " . $project['projectPeriode'] . " " . $project['projectName'] . "" ?></a></li>
									<?php

      }
    } else {
      echo "Nog geen projecten voor dit jaar";
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
            ?>
									<li><a href="home.php?project=<?php echo $project["projectID"]; ?>"><?php echo "INF" . $project['projectYear'] . "" . $project['projectGroup'] . " " . $project['projectPeriode'] . " " . $project['projectName'] . "" ?></a></li>
									<?php

      }
    } else {
      echo "Nog geen projecten voor dit jaar";
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
            ?>
									<li><a href="home.php?project=<?php echo $project["projectID"]; ?>"><?php echo "INF" . $project['projectYear'] . "" . $project['projectGroup'] . " " . $project['projectPeriode'] . " " . $project['projectName'] . "" ?></a></li>
									<?php

      }
    } else {
      echo "Nog geen projecten voor dit jaar";
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
										 Aantal projectleden 
									</p>
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
										<i class="material-icons center"></i>Totaal aantal waarschuwingen
									</p>
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
									<p class="card-stats-title center">
										<i class="material-icons center"></i> Aantal documenten
									</p>
									<?php
        $query = "SELECT COUNT(`documents`.`documentID`)   AS aantaldoc
		FROM `projectdocuments` 
		JOIN `documents` ON `projectdocuments`.`documentID` = `documents`.`documentID` 
		WHERE `projectID` = " . $_GET['project'] . " ";

        $conn = dbConnect();
										//  Voer de query uit en en sla op in recordset (@ betekent: onderdruk errormessages)
        $result = @mysqli_query($conn, $query) or die(mysqli_error());
        while ($row = mysqli_fetch_array($result)) {
          echo "<h4 class='card-stats-number center'>" . $row['aantaldoc'] . "</h4>";
        }
        ?> 
								</div>
							</div>
						</div>
						<div class="col s12 m6 l3">
							<div class="card">
								<div class="card-content deep-orange accent-2 white-text">
									<p class="card-stats-title center">
										 Eerst volgende document
									</p>
									<?php 
									$dagvanvandaag = date("Y-m-d");
									$maareendag = 0;

									$query = "SELECT `documents`.`documentID`, `documentDeadline`, documents.documentName
									FROM `projectdocuments` 
									JOIN `documents` ON `projectdocuments`.`documentID` = `documents`.`documentID` 
									WHERE `projectID` = ". $_GET['project'] ."
									ORDER BY documentDeadline ASC; ";
							
									$conn = dbConnect();
									//  Voer de query uit en en sla op in recordset (@ betekent: onderdruk errormessages)
									$result = @mysqli_query($conn, $query) or die(mysqli_error());
									while ($row = mysqli_fetch_array($result)) {
										if($dagvanvandaag <= $row['documentDeadline'] ){
											if($maareendag == 0){
									  echo "<h4 class='card-stats-number center'>" . $row['documentDeadline'] . "</h4>";
									  echo "<p class='center'>" . $row['documentName'] . "  </p>";
									  $maareendag = 1;
											}
										}
									}
									
									?>
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
									<h6 class="collection-header m-0">Projectleden</h6>
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
										<p><input type='submit' class="waves-effect waves-light cyan darken-2 btn" value='lid toevoegen'></p>
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
          echo "<input type=\"submit\" class=\"waves-effect waves-light red btn\" name=\"AddWarning\" value=\"toevoegen\">";
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
									<h6 class="collection-header m-0">documenten</h6>
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
										<p> <input type='submit' name="addProjDoc" class="waves-effect waves-light red btn" value='toevoegen'></p>
									</form>
								</li>
								<?php
        if (isset($_POST['addProjDoc'])) {
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
												<input type="date" name="NewDeadline" value=<?php echo $document['documentDeadline']; ?>>
											</div>
											<div class="col s3">
												<input type="submit" name="Aanpassen" class="waves-effect waves-light red btn" value="Aanpassen">
												<?php
													if($document['documentUpload'] == NULL){
														echo "<input type=\"submit\" name=\"Inleveren\" class=\"waves-effect waves-light red btn\" value=\" Inleveren \">";
													} else {
														echo "<input type=\"submit\" class=\"waves-effect waves-light green btn\" value=\"Ingeleverd\">";
													}

												?>
											</div>
										<div id="modal<?php echo $document['documentID']; ?>" class="modal">
											<div class="modal-content">
												<div id="work-collections">
													<div class="col s12 m12 16">
														<ul id="projects-collection" class="collection z-depth-1">
															 <li class="collection-item cyan avatar">
                                     							 <h5 class="collection-header m-0">Verplichtingen</h5>
                                   							 </li>
                                   							 <li class="collection-item ">
															<?php 
            													$Obligations = getAdviceObligation($document['documentID']);
            													if ($Obligations != null) 
            													{
              														foreach ($Obligations as $Obligation) 
              														{
                											?>
															<li class="collection-item ">
																<p><?php echo $Obligation['adviceTekst']; ?></p>
          													</li>
															<?php 
          															}
          														} 
          														else
          														{
          															echo "Er zijn geen verplichtingen aangegeven.";
          														}

          													?>											
      													</ul>
          											</div>
          										</div>
          										<div id="work-collections">
													<div class="col s12 m12 16">
														<ul id="projects-collection" class="collection z-depth-1">
															 <li class="collection-item cyan avatar">
                                     							 <h5 class="collection-header m-0">Valkuilen</h5>
                                   							 </li>
                                   							 <li class="collection-item ">
																<?php 
            														$Pitfalls = getAdvicePitfall($document['documentID']);
            														if ($Pitfalls != null) {
              															foreach ($Pitfalls as $Pitfall) {
                												?>
																<li class="collection-item ">
																	<p><?php echo $Pitfall['adviceTekst']; ?></p>
	          													</li>
																<?php 
																		}
																	}
																	else
																	{
																		echo "Er zijn geen valkuilen aangegeven.";
																	}
																 ?>											
      													</ul>
          											</div>
          										</div>
          										<div id="work-collections">
													<div class="col s12 m12 16">
														<ul id="projects-collection" class="collection z-depth-1">
															 <li class="collection-item cyan avatar">
                                     							 <h5 class="collection-header m-0">Tips</h5>
                                   							 </li>
                                   							 <li class="collection-item ">
															<?php 
            													$Tips = getAdviceTips($document['documentID']);
            													if ($Tips != null) {
              														foreach ($Tips as $Tip) {
                											?>
															<li class="collection-item ">
																<p><?php echo $Tip['adviceTekst']; ?></p>
          													</li>
																<?php 
          															} 
          														}
          														else
          														{
																	echo "Er zijn nog geen tips gegeven.";
          														}
          														?>											
      													</ul>
          											</div>
          										</div>
											</div>
											<div class="modal-footer">
                                    				<li style="touch-action: pan-y;">
                                    					<strong>Advies Type</strong>
                                        				<select name="AdviceType" style="display: block;">
                                        					<option value="Verplichting">Verplichting</option>
                                        					<option value="Valkuil">Valkuil</option>
                                        					<option value="Tip">Tip</option>
                                        				</select>
                                        			</li>
                                        			<li style="touch-action: pan-y;">
                                    					<strong>Advies beschrijving</strong>
                                        				<textarea name="AdviceTekst" placeholder="Voor hier uw advies in." class="materialize-textarea" rows="4"></textarea>
                                    				</li>
                                    				<li style="touch-action: pan-y;">
                                        				<input class="waves-effect waves-red red btn" type="submit" name="addAdvice" value="Aanmaken" style="width: 100%;">
                                    				</li>
                                				</form>
                                				<a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                                            </div>
										</div>
									</div>
								</li>
								<?php 
      								}
   	 							} else {
      								echo "geen documenten";
    							} 
    							?>
							</ul>
						</div>
					</div>
				</div>
				<!--work collections end-->
				<?php
                                					if(isset($_POST['addAdvice']))
                                					{
                                						addAdvice($_POST['ID'], $_POST['AdviceType'], $_POST['AdviceTekst']);
                                					}
                                					if(isset($_POST['Aanpassen']))
                                					{
                                						updateProjectDocument($projectID, $_POST['ID'], $_POST['NewDeadline']);
                                					}
                                					if(isset($_POST['Inleveren']))
                                					{
                                						uploadProjectDocument($projectID, $_POST['ID']);
                                					}
                                				?>
				<?php 
 
  } else {
    echo "";
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
										<input type="text" name="projectGroup" placeholder="projectgroep(bijv. A)">
									</li>
									<li style="touch-action: pan-y;">
										<input type="text" name="projectPeriod" placeholder="projectperiode">
									</li>
									<li style="touch-action: pan-y;">
										<input type="text" name="projectYear" placeholder="projectjaar">
									</li>
									<li style="touch-action: pan-y;">
										<input type="text" name="projectName" placeholder="projectnaam">
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
										<input type="text" name="documentName" placeholder="Documentnaam">
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
			
		</div>
	</body>
</html>
