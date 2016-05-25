<html>
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Champselect: Mastery</title>
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/custom_styles.css">	
	<style>
		body {
			background-image: url('imgs/diana_leona_bg.png');
			background-position: center center;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
	</style>

</head>

<body>
	
	<!-- Error message -->
	<?php
		include 'functions/master_function.php';
		include 'functions/labels_function.php';
		include 'functions/team_mastery_function.php';
		include 'variables/champion_reference.php';
		include 'variables/ddragon_version_url.php';
		
		//if players are empty, return back error message with back button
		if (empty($match_players)) {
	?>
	
	<div class="container">
		
		<!-- Error logo and message -->
		<div id="logo" class="text-center top-pad">
			<img src="imgs/logo_no_letter.jpg">
		</div>
		<div class="col-md-8 col-xs-12 text-center center">
			<h4>The player you are looking for is not currently in a game</h4>
		</div>
		
		<!-- Back button -->
		<div class="text-center small-margin">
			<a href="mastery.html">
				<button id="error_back" type="button" class="btn btn-lg btn-default"> Back </button>
			</a>
		</div>
		
		<!-- Error footer -->
		<div class="footer-below col-lg-12 text-center">
        	<h5>Copyright &copy; Subprime Lender 2016 - Artwork by <a target="_blank" href="http://www.deviantart.com/art/Diana-Leona-Wallpaper-390878993"> Borghot </a></h5>
        </div>
	</div>

	<!-- Content if no error-->
	<?php
		} else {
			//split $match_players into first 5 top team and last 5 bottom team
			$match_teams = array_chunk($match_players, 5);
			//top team total mastery points
			$team_mastery_top = team_mastery($match_teams[0]);
			//bot team total mastery points
			$team_mastery_bot = team_mastery($match_teams[1]);
	?>	
	
	<!-- Heading logo and % bars -->
	<div id="heading-section" class="container bg-white" style="padding-top:2%; ">
		<div class="row">
			
			<!-- Blue %::top -->
			<div id="top-team-percent" class="responsive-heading col-md-2 col-xs-4 text-right">
				<div id="spacing-dummy" class="col-md-12 hidden-xs no-pad">
				</div>
				<?php
					echo "<h3>" . intval(($team_mastery_top / ($team_mastery_top + $team_mastery_bot)) * 100) . "%</h3>";
				?>
			</div>
			
			<!-- Blue bar::top -->
			<div id="team-bar" class="responsive-heading col-md-3 hidden-xs no-pad">
				<div id="spacing-dummy" class="col-md-12 hidden-xs no-pad">
				</div>
				<div id="team-bar-inner" class="col-md-12 hidden-xs no-pad">
					<div>
						<?php
							echo "<span class='bar-blue-left' style='width:" . (($team_mastery_top / ($team_mastery_top + $team_mastery_bot)) * 100 ). "%;'></span>";
						?>
					</div>
				</div>
			</div>
			
			<!-- Logo -->
			<div id="logo" class="col-md-2 col-xs-4 bracketed">
				<img class="img-responsive img-small center-block" src="imgs/logo_small.png">
			</div>
			
			<!-- Red bar::bot -->
			<div id="team-bar" class="responsive-heading col-md-3 hidden-xs no-pad">				
				<div id="spacing-dummy" class="col-md-12 hidden-xs no-pad">
				</div>
				<div id="team-bar-inner" class="col-md-12 hidden-xs no-pad">
					<div>
						<?php
							echo "<span class='bar-red-right' style='width:" . (($team_mastery_bot / ($team_mastery_top + $team_mastery_bot)) * 100) . "%;'></span>";
						?>
					</div>
				</div>
			</div>
			
			<!-- Red %::bot -->
			<div id="bottom-team-percent" class="responsive-heading col-md-2 col-xs-4 text-left">
				<div id="spacing-dummy" class="col-md-12 hidden-xs no-pad">
				</div>
				<?php
					echo "<h3>" . intval(($team_mastery_bot / ($team_mastery_top + $team_mastery_bot)) * 100) . "%</h3>";
				?>
			</div>
		</div>
	</div>
	
	<!-- Content -->
	<div class="container bg-white" style="padding-top:2%;">
		<div id="left-right-team" class="row">
			
			<!-- Left side::top -->
			<div id="top-team" class="container col-md-6 col-xs-12">
				<?php
					//returns team 1 as 5 champion portraits and their respective players
					foreach($match_teams[0] as $k) {
						$current_champ_id = $k["Champion"];
						$player_mastery_sum = array_sum($k["CMastery"]);
						
						//champ portrait
						echo "<div class='row'><div class='col-xs-6'><img class='center-block img-responsive' src='" . $ddragon . "/img/champion/" . $champion_reference[$current_champ_id] . ".png'></div>";
						//player name
						echo "<div class='col-xs-6 text-center'><div><b>" . $k['Name'] . "</b></div>";
						//player label
						echo label_compiler($k["CMastery"][$current_champ_id], $champion_reference[$current_champ_id], $player_mastery_sum, $team_mastery_top, $team_mastery_bot) . "</div></div>";	
						};
				?>
			</div>
			
			<!-- Right side::bot -->
			<div id="bottom-team" class="container col-md-6 col-xs-12">
				<?php
					//returns team 2 as 5 champion portraits and their respective players
					foreach($match_teams[1] as $k) {
						$current_champ_id = $k["Champion"];
						$player_mastery_sum = array_sum($k["CMastery"]);
						
						//player name
						echo "<div class='row'><div class='col-xs-6 name-container text-center'><div><b>" . $k['Name'] . "</b></div>";
						//player label
						echo label_compiler($k["CMastery"][$current_champ_id], $champion_reference[$current_champ_id], $player_mastery_sum, $team_mastery_bot, $team_mastery_top) . "</div>";	
						//champ portrait
						echo "<div class='col-xs-6'><img class='center-block img-responsive' src='" . $ddragon . "/img/champion/" . $champion_reference[$current_champ_id] . ".png'></div></div>";	
						};
				?>
			</div>
		</div>
		
		<!-- Footer -->
    	<div class="row">
            <div class="col-lg-12 text-center">
        	    <h5>Copyright &copy; Subprime Lender 2016 - Artwork by <a target="_blank" href="http://www.deviantart.com/art/Diana-Leona-Wallpaper-390878993"> Borghot </a></h5>
            </div>
        </div>
    </div>
    
    <?php 
		}; //ends else statement
	?>    
	
	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</body>
</html>