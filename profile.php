<?php
	// Start Session
	if (!isset($_SESSION)) { 	
		session_start();
	}

	// Include database connection info
	require_once('lib/config_local.php');

	// Get id for profile from URL
	$id = $_GET['id'];

	// Connect to db and get user information
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die ("Failed to connect to server " . mysqli_error());

	$infoqry = "SELECT * FROM members WHERE id=" . $id;
	$infoobj = mysqli_query($link, $infoqry);
	$info = mysqli_fetch_assoc($infoobj);
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Local Stylesheets -->
	<link rel="stylesheet" href="css/base.css">	
	<link rel="stylesheet" href="css/2048theme.css">
	
	<!-- 3rd Party Stylesheets + Icon Font -->
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<!-- 3rd Party JS libraries -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.js"></script>
	
	<!-- Local JS -->
	<script src="scripts/menus.js"></script>
	
	<!-- Adjust screen nicely for mobile--> 
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	
	<title>SwipeAway - Profile</title>
</head>
<body>
	<div id="topBar">
	<a href="index.php" id="icon" rel="external"><i class="material-icons">arrow_back</i></a>
	</div>
	
	<h1 class="title"><?php echo $info['username']; ?></h1>
	
	<h2 class="title">User Scores - Endless Mode</h2>
	<div id="levels">
        <table class="table">
            <?php
            	//Get users scores
            	$scoreqry = "SELECT * FROM scores WHERE id=".$id." ORDER BY score DESC";
            	$scoreobj = mysqli_query($link, $scoreqry);

            	if (mysqli_num_rows($scoreobj) == 0) {
            		echo "This user has no scores for endless mode.";
            	} else {
            		echo '<tr><td id="tableheader">Rank</td><td id="tableheader">Score</td></tr>';

            		// Print out all scores
            		$i = 1;
            		while ($score = mysqli_fetch_assoc($scoreobj)) {
            			echo '<tr><td>'. $i++ .'</td><td>'. $score['score'] .'</td></tr>';
            		}
            	}
            ?>
        </table>
    </div>

    <h2 class="title">Achievements</h2>
    <div id="achs">
    	<table class="table" id="achs">
    		<tr><td id="tableheader">Status</td><td id="tableheader">Achievement</td><td id="tableheader">Description</td></tr>
    		<?php
    			require_once('lib/achievements.php');
    			$i = 1;
    			foreach ($achs as $title => $desc) {
    				// Generate achievement db column name
    				$achId = 'ach' . str_pad($i++, 3, '0', STR_PAD_LEFT);
    				
    				echo '<tr><td>';
    				// If achievement is locked (0) display lock, if unlocked (1) display trophy.
    				if ($info[$achId] == 1) {
    					echo '<img src="images/trophy.png">';
    				} else {
    					echo '<img src="images/lock.png">';
    				}
    				// Display achievement name and description
    				echo '</td><td>'. $title .'</td><td>'. $desc .'</td></tr>';

    			}
    		?>
    	</table>
    </div>	

</body>
</html>