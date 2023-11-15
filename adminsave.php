<?php
date_default_timezone_set('Asia/Dhaka');
$cur = date('Y-m-d H:i:s');
$dt = date('Y-m-d');
include('inc.php');

$frm = $_POST['frm'];
if ($frm == 'module') {
    $mod = $_POST['text'];
    $query = "INSERT INTO modules (id, slno, modulename, createdate, createby ) 
            VALUES (NULL, NULL, '$mod', '$cur', '$usr')";
    $conn->query($query);
}