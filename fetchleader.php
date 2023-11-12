<?php
date_default_timezone_set('Asia/Dhaka');
$cur = date('Y-m-d H:i:s');
$dt = date('Y-m-d');
include('inc.php');
$id = $_POST['id'];

$sl = 1;
$sql0r = "SELECT email, min(duration) as ddd FROM leaderboard WHERE gameid = '$id' AND accept = 1 group by email ORDER BY duration ASC;";
$result0rx = $conn->query($sql0r);
if ($result0rx->num_rows > 0) {
    while ($row0r = $result0rx->fetch_assoc()) {
        $email = $row0r["email"];
        $duration = $row0r["ddd"];

        echo $email . ' -- ' . $duration . '---------' . $sl . '<br>';
        $sl++;
    }
}