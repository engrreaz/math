<?php
session_start();
date_default_timezone_set('Asia/Dhaka');
$browser = $_SERVER['HTTP_USER_AGENT'];
$curpage = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
// if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
// $url = "https://";   
// else  
// $url = "http://";     
// $url.= $_SERVER['HTTP_HOST'];     
// $url.= $_SERVER['REQUEST_URI'];    

// echo $browser;
$imgver = '1';

if ($browser != '') {
    // redirect to error page.
}

if (isset($_GET["email"])) {
    $usr = $_GET["email"];
    $_SESSION["user"] = $usr;
    setcookie("user", $usr, time() + (3600 * 24 * 365));
    //echo 'Cookie SET / ' . $_COOKIE["user"];;
}

if (isset($_GET["token"])) {
    $token = $_GET["token"];
}
if (isset($_GET["photo"])) {
    $pth = $_GET["photo"];
}

$usr = $_SESSION["user"];
// if session expire

if ($usr == '') {
    if (!isset($_COOKIE["user"])) {
        // redirect to logoin
    } else {
        $usr = $_COOKIE["user"];
        $_SESSION["user"] = $usr;
        setcookie("user", $usr, time() + (3600 * 24 * 365));
    }
}
//---------------------------------------------------------------------------------
$userlevel = 'Visitor';
$pxx = '';

include 'db.php';

//*****************************************************************
$sy = date('Y');
$td = date('Y-m-d');
$cur = date('Y-m-d H:i:s');
//********************************************************************

$sql0 = "SELECT * FROM users where email='$usr' LIMIT 1";
//echo $sql0;
$result0 = $conn->query($sql0);
if ($result0->num_rows > 0) {
    while ($row0 = $result0->fetch_assoc()) {
        $token = $row0["token"];
        $sccode = $row0["sccode"];
        $fullname = $row0["profilename"];
        $usrmobile = $row0["mobile"];
        $userlevel = $row0["userlevel"];
        $userid = $row0["userid"];
        $pth = $row0["photourl"];
        $points = $row0["points"];
        $otp = $row0["otp"];
        $otptime = $row0["otptime"];
    }
} else {
    $query33p = "insert into usersapp (sccode, email, token, firstlogin, lastlogin, photourl) values ('0', '$usr', '$token', '$cur', '$cur', '$pth' )";
    //echo $query33p;
    $conn->query($query33p);
    $sccode = 0;
    $userlevel = 'Visitor';

    $query33pd = "insert into leaderboard (id, module, email, date, datetime, points, achievement, achievementid, achievepoint, achievetext, achieveicon ) 
                values (NULL, 'Registration', '$usr', '$td', '$cur', '$0', '1' ,'1', '500', 'Registration', '')";
    $conn->query($query33pd);

    $query33pf = "UPDATE achievements set users = users + 1 where id = 1;";
    $conn->query($query33pf);
}



if (isset($_GET['fn'])) {
    if (strlen($fullname) < 1) {
        $gp = $_GET['fn'];
        $query33px = "update users set profilename='$gp' where  email='$usr' LIMIT 1";
        $conn->query($query33px);
        $fullname = $gp;
    }
}

if ($userlevel == 'Super Administrator' || $userlevel == 'Moderator') {
    $reallevel = $userlevel;
    $userlevel = 'Administrator';
} else {
    $reallevel = $userlevel;
}


$l = strlen($pth);
if ($l < 5) {
    $pth = "https://eimbox.com/images/no-image.png?v=cx";
}

//$query33pd ="insert into userlog (id, date, day, sccode, descrip, category, work, class ) values (NULL, '$tar' , '$bar', 0, NULL, NULL, 1, 1)";
//echo $query33p;
//   $conn->query($query33pd) ;


$sql0r = "SELECT sum(points) as ptt FROM leaderboard where email='$usr'";
$result0rx = $conn->query($sql0r);
if ($result0rx->num_rows > 0) {
    while ($row0r = $result0rx->fetch_assoc()) {
        $totalpoints = $row0r["ptt"];
    }
} 



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
    #mbox {
        background: red;
        position: absolute;
        top: 25%;
        right: 0px;
        bottom: 25%;
        left: 0px;
        z-index: 1000;
    }
</style>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css?v=a6">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


</head>


    <header>
        <!-- place navbar here -->
    </header>





















    <div id="mbox2"></div>





    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <script>
        $(document).ready(function () {
            if (document.readyState === 'ready' || document.readyState === 'complete') {

            }

        });

        window.onload(function () {

            document.getElementById("mbox").style.display = 'none';

        });
    </script>






    <?php

    include 'footer.php';

    ?>