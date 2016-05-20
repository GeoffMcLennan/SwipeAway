<?php
if (!isset($_SESSION)){
	session_start();
}

require_once("config_local.php");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sessUser = $_SESSION["SESS_USERNAME"];
$sessId = $_SESSION["SESS_MEMBER_ID"];

// Select id and score from scores tables in descending order.
$sql = "SELECT * FROM members ORDER BY highscore DESC";
$result = mysqli_query($conn, $sql);

// Table header.
echo '<tr><td id="tableheader">Rank</td><td id="tableheader">Username</td><td id="tableheader">Score</td></tr>';

// Incremental rank.
$i = 0;
// Prints the rank, id, and the score.
while ($score = mysqli_fetch_assoc($result)) {
    $i++;
    if ($i <= 5) {
    	echo "<tr><td>" . $i . "</td>" . "<td>" . $score['username'] . "</td>" . "<td>" . $score['highscore'] . "</td></tr>";
    } else {
    	if ($sessUser == $score['username']) {
    		echo "<tr id='userScore'><td>" . $index . "</td>" . "<td>" . $sessUser . "</td>" . "<td>" . $score . "</td></tr>"; 
    	}
    }

}

$conn->close();
?>