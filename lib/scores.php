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
$sql = "SELECT username, score FROM scores
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
        echo "<tr><td>" . ($i) . "</td>" . "<td>" . $userScore["username"] . "</td>" . "<td>" . $userScore["score"] . "</td></tr>";
}

$sql2 = "SELECT INSERT INTO scores (username, score)
VALUES ('dan', 8000)";

if ($conn->query($sql2) === TRUE) {
    echo "New record created";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$sql3 = "UPDATE scores SET score=10000 WHERE username='pmo'";

if ($conn->query($sql3) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>