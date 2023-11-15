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
$modd = $_POST['module'];

$sql0r = "SELECT count(*) as koy FROM leaderboard where gameid='$id' and email = '$usr' and done = 1";
$result0rx = $conn->query($sql0r);
if ($result0rx->num_rows > 0) {
    while ($row0r = $result0rx->fetch_assoc()) {
        $rev = $row0r["koy"];
    }
}

$sql0r = "SELECT count(*) as koy FROM leaderboard where gameid='$id' and email = '$usr' and perc = 100";
$result0ry = $conn->query($sql0r);
if ($result0ry->num_rows > 0) {
    while ($row0r = $result0ry->fetch_assoc()) {
        $rev100 = $row0r["koy"];
    }
}

$sql0r = "SELECT * FROM leaderboard where gameid='$id' and email = '$usr' and perc=100 order by duration asc limit 1";
$result0rb = $conn->query($sql0r);
if ($result0rb->num_rows > 0) {
    while ($row0r = $result0rb->fetch_assoc()) {
        $best = $row0r["duration"];
    }
} else {
    $best = 0;
}

$sql0r = "SELECT * FROM leaderboard where gameid='$id' and perc=100 order by duration asc limit 1";
$result0rc = $conn->query($sql0r);
if ($result0rc->num_rows > 0) {
    while ($row0r = $result0rc->fetch_assoc()) {
        $champ = $row0r["duration"];
    }
} else {
    $champ = 0;
}

$sql0r = "SELECT count(*) as cnt FROM leaderboard where gameid='$id' and duration <= '$dur' and perc = 100";
$result0rr = $conn->query($sql0r);
if ($result0rr->num_rows > 0) {
    while ($row0r = $result0rr->fetch_assoc()) {
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
if ($perc == 100 && $best > $dur) {
    $best = $dur;
}

if ($done == 1) {
    $rev = $rev + 1;
    if ($rev >= 20) {
        $perpoint = 1;
    } else if ($rev >= 16) {
        $perpoint = 2;
    } else if ($rev >= 11) {
        $perpoint = 4;
    } else if ($rev >= 6) {
        $perpoint = 5;
    } else if ($rev >= 2) {
        $perpoint = 8;
    } else {
        $perpoint = 10;
    }

} else {
    $perpoint = 0;
}
$pts = $corr * $perpoint;


if ($perc == 100) {
    $rev100 = $rev100 + 1;
    if ($rev100 >= 20) {
        $point = 25;
    } else if ($rev100 >= 16) {
        $point = 50;
    } else if ($rev100 >= 11) {
        $point = 100;
    } else if ($rev100 >= 6) {
        $point = 200;
    } else if ($rev100 >= 2) {
        $point = 300;
    } else {
        $point = 500;
    }

    // $query3334 = "INSERT INTO leaderboard (id, gameid, email, date, datetime, duration, totalques, answer, correct, wrong, ranks, perc, points, revision, accept, done, rev100) 
    // VALUES (NULL, '$id', '$usr', '$dt', '$cur', '$dur', '$que', '$ans', '$corr', '$wro', '$rank', '$perc', '$point', '$rev', '$accept', '$done' , '$rev100' )";
    // $conn->query($query3334);

    $ach = 1;
    $achpoint = $point;
    $achtext = 'Rev # ' . $rev100;
    $achicon = '<i class="bi bi-fan"></i>';
} else {
    $ach = 0;
    $achpoint = 0;
    $achtext = '';
    $achicon = '';
    $rev100 = 0;
}


$query333 = "INSERT INTO leaderboard (id, gameid, module, email, date, datetime, duration, totalques, answer, correct, wrong, ranks, perc, points, revision, accept, done, rev100, achievement, achievepoint, achievetext, achieveicon ) 
            VALUES (NULL, '$id', '$modd', '$usr', '$dt', '$cur', '$dur', '$que', '$ans', '$corr', '$wro', '$rank', '$perc', '$pts', '$rev', '$accept', '$done' , '$rev100', '$ach', '$achpoint', '$achtext', '$achicon')";
$conn->query($query333);
// echo $query333;

if ($rev == 1) {
    $query334 = "UPDATE modules set testcount = testcount + 1 , usercount = usercount + 1 where modulename = '$modd'";
    $conn->query($query334);
    $query335 = "UPDATE test set testcount = testcount + 1, participantcount = participantcount + 1 where module = '$modd' and id='$id'";
    $conn->query($query335);
} else {
    $query334 = "UPDATE modules set testcount = testcount + 1 where modulename = '$modd'";
    $conn->query($query334);
    $query335 = "UPDATE test set testcount = testcount + 1 where module = '$modd' and id='$id'";
    $conn->query($query335);
}


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