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
        ?>
        <!-- Box Icon -->
        <div class="box" style="display: flex; width:100%;" onclick="opent('<?php echo $module; ?>');">
        <div class="box-icon"><span style="font-size:20px;"><?php echo $sl;?></span></div>
            <div class="box-text">
                <div class="box-title">
                    <?php echo $email; ?>
                </div>
                <div class="box-titlebn">
                    <?php echo $duration; ?>
                </div>
                <div class="box-titlebn">
                    <?php echo 'Total <b>1422</b> tests taken'; ?>
                </div>
            </div>
            <div class="box-prog-right">
                <?php $perc = 76; ?>
                <div class="pie animate no-round " style="margin:auto, 0; --p:<?php echo $perc; ?>;--c:var(--dark);--b:3px;">
                    <?php echo $perc; ?>%
                </div>
            </div>
        </div>
        <?php
        $sl++;
    }
}