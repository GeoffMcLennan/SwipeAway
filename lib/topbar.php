<?php
	
	if (isset($_SESSION['SESS_MEMBER_ID']) && isset($_SESSION['SESS_USERNAME'])) {

		echo '<div id="topBar">
			<a href="settings.php" class="icon" id="settingsIcon" rel="external"><i class="material-icons">settings</i></a>
			<a href=# id="soundIcon" class="icon" rel="external"><i class="material-icons">volume_up</i></a>
			<a href="lib/logout.php" class="account" rel="external">Log out</a>
			<a href="profile.php" class="account" id="signup" rel="external">Welcome ' . $_SESSION["SESS_USERNAME"] . '</a>
		</div>';

	} else {

		echo '<div id="topBar">
			<a href="settings.php" class="icon" id="settingsIcon" rel="external"><i class="material-icons">settings</i></a>
			<a href=# id="soundIcon" class="icon" rel="external"><i class="material-icons">volume_up</i></a>
			<a href="login.php" class="account" rel="external">Login</a>
			<a href="signup.php" class="account" id="signup" rel="external">Sign Up</a>
		</div>';

	}

?>