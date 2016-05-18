<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swipedb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select id and score from scores tables in descending order.
$sql = "SELECT id, score FROM scores
ORDER BY score DESC";

$result = mysqli_query($conn, $sql);
// Array for the scores.
$scoreArray = array();

// Table header.
echo '<tr><td id="tableheader">Rank</td><td id="tableheader">Username</td><td id="tableheader">Score</td></tr>';

// Add each row from the scores table into an array.
while ($row = mysqli_fetch_assoc($result)) {
    $scoreArray[] = $row;
}

// Incremental rank.
$i = 0;
// Prints the rank, id, and the score.
foreach ($scoreArray as $userScore) {
    $i++;
        echo "<tr><td>" . ($i) . "</td>" . "<td>" . $userScore["id"] . "</td>" . "<td>" . $userScore["score"] . "</td></tr>";
}
?>