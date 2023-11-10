<?php
date_default_timezone_set('Asia/Dhaka');
$cur = date('Y-m-d H:i:s');
$dt = date('Y-m-d');
include('inc.php');
$id = $_POST['id'];
$dur = $_POST['dur'];
$que = $_POST['que'];
$ans = $_POST['ans'];
$corr = $_POST['corr'];
$wro = $_POST['wrong'];
$done = $_POST['gamedone'];

$sql0r = "SELECT count(*) as koy FROM leaderboard where gameid='$id' and email = '$usr' ";
$result0r = $conn->query($sql0r);
if ($result0r->num_rows > 0) {
    while ($row0r = $result0r->fetch_assoc()) {
        $rev = $row0r["koy"];
    }
} 

$sql0r = "SELECT * FROM leaderboard where gameid='$id' and email = '$usr' and perc=100 order by duration asc limit 1";
$result0r = $conn->query($sql0r);
if ($result0r->num_rows > 0) {
    while ($row0r = $result0r->fetch_assoc()) {
        $best = $row0r["duration"];
    }
} else {
    $best = 0;
}

$sql0r = "SELECT * FROM leaderboard where gameid='$id' and perc=100 order by duration asc limit 1";
$result0r = $conn->query($sql0r);
if ($result0r->num_rows > 0) {
    while ($row0r = $result0r->fetch_assoc()) {
        $champ = $row0r["duration"];
    }
} else {
    $champ = 0;
}

$sql0r = "SELECT count(*) as cnt FROM leaderboard where gameid='$id' and duration <= '$dur' and perc = 100";
$result0r = $conn->query($sql0r);
if ($result0r->num_rows > 0) {
    while ($row0r = $result0r->fetch_assoc()) {
        $rank = $row0r["cnt"] + 1;
    }
} else {
    $rank = 0;
}

?>


<?php
// game done 1 = complete; 2 = repeal; 3 = timeup; 

$perc = ceil($corr * 100 / $que);
if ($perc == 100) {
    $accept = 1;
    $rank = $rank * 1;
} else {
    $accept = 0;
    $rank = NULL;
}
if($perc == 100 && $best > $dur){
    $best = $dur;
}
$perpoint = 10;
$pts = $corr * $perpoint;

$query333 = "INSERT INTO leaderboard (id, gameid, email, date, datetime, duration, totalques, answer, correct, wrong, rank, perc, points, revision, accept, done) 
            VALUES (NULL, '$id', '$usr', '$dt', '$cur', '$dur', '$que', '$ans', '$corr', '$wro', '$rank', '$perc', '$pts', '$rev', '$accept', '$done' )";
$conn->query($query333);
?>

<div id="best2">
    <?php echo $best; ?>
</div>
<div id="champ2">
    <?php echo $champ; ?>
</div>
<div id="rank2">
    <?php echo $rank; ?>
</div>