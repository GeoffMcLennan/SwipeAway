<?php
	
	if (isset($_SESSION['SESS_MEMBER_ID']) && isset($_SESSION['SESS_USERNAME'])) {

		echo '<div id="topBar">
			<a name="link" href="info.html" class="icon" id="about" rel="external"><i class="material-icons">info_outline</i></a>
			<a href=# id="soundIcon" class="icon" rel="external"><i class="material-icons">volume_up</i></a>
			<a name="link" href="lib/logout.php" class="account" rel="external">Log out</a>
			<a name="link" href="profile.php?id='. $_SESSION["SESS_MEMBER_ID"] .'" class="account" id="signup" rel="external">Welcome ' . $_SESSION["SESS_USERNAME"] . '</a>
		</div>';

	} else {

		echo '<div id="topBar">
            <a name="link" href="info.html" class="icon" id="about" rel="external"><i class="material-icons">info_outline</i></a>
			<a href=# id="soundIcon" class="icon" rel="external"><i class="material-icons">volume_up</i></a>
			<a name="link" href="login.php" class="account" rel="external">Login</a>
			<a name="link" href="signup.php" class="account" id="signup" rel="external">Sign Up</a>
		</div>';

	}

?>