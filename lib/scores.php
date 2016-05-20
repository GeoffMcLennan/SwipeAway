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
// **Temporary in-game score**
$score = 5000;

$query = "SELECT score FROM scores WHERE username='$sessUser'";
$result1 = mysqli_query($conn, $query);

// Add scores into an array.
if ($result1) {
    $array = mysqli_fetch_assoc($result1);
    $sessScore = $array["score"];
} 

// If there is no score, add a score. If a score exists, update new score.
if ($sessScore == null) {
    $sql1 = "INSERT INTO scores (username, score)
        VALUES ('$sessUser', $score)";
    /*if ($conn->query($sql1) === TRUE) {
        echo "New record created";
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }*/
} else if ($sessScore < $score) {
    $sql2 = "UPDATE scores SET score=$score WHERE username='$sessUser'";
    /*if ($conn->query($sql2) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }*/
}

// Select id and score from scores tables in descending order.
$sql3 = "SELECT score_id, username, score FROM scores
ORDER BY score DESC";

$result2 = mysqli_query($conn, $sql3);
// Array for the scores.
$scoreArray = array();

// Table header.
echo '<tr><td id="tableheader">Rank</td><td id="tableheader">Username</td><td id="tableheader">Score</td></tr>';

// Add each row from the scores table into an array.
while ($row = mysqli_fetch_assoc($result2)) {
    $scoreArray[] = $row;
}

$array = array();
$sql4 = "SELECT username FROM scores
ORDER BY score DESC";
$result3 = mysqli_query($conn, $sql4);
while ($idArray = mysqli_fetch_assoc($result3)) {
    $array[] = $idArray;
}

// Incremental rank.
$i = 0;
// Index of current user in the array.
$index = 0;
// Prints the rank, id, and the score.
foreach ($scoreArray as $userScore) {
    $i++;
    $index++;
    if ($i <= 5) {
        echo "<tr><td>" . $i . "</td>" . "<td>" . $userScore["username"] . "</td>" . "<td>" . $userScore["score"] . "</td></tr>";
    }
    if ($index > 5) {
        if ($sessUser == $userScore["username"]) {
        $userIndex = $index;
        echo "<tr id='userScore'><td>" . $index . "</td>" . "<td>" . $sessUser . "</td>" . "<td>" . $score . "</td></tr>";
        }
    }
}

$conn->close();
?>