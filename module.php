<?php
include 'inc.php';





?>
<style>
    .box-icon {
        margin-right: 20px;
    }

    .box-icon-icon {
        height: 36px;
        width: 36px;
        border-radius: 50%;
        margin-top: 10px;
    }

    .box-prog-right {
        float: right;
    }

    .box-text {
        /* flex-shrink: 0; */
        flex-grow: 1;
    }
</style>

<body style="background: var(--lighter); width:100%; max-width:100%; overflow:auto;">
    <div class="containerx" style="width: 100%">
        <div style="text-align: center; margin-top: 25px">
            <div class="top-icon"><i class="bi bi-calendar3-fill"></i></div>
            <div class="top-text">Modules</div>

            <?php
            $sql0 = "SELECT * FROM modules order by id";
            $result0t = $conn->query($sql0);
            if ($result0t->num_rows > 0) {
                while ($row0 = $result0t->fetch_assoc()) {
                    $module = $row0["modulename"];
                    $stage = $row0["stagecount"];
                    $test = $row0["testcount"];
                    $user = $row0["participantcount"];

                    $pth = "icons/" .  $module . ".png";
                    if (!file_exists($pth)) {
                        $pth = "icons/nono.jpg";
                    } else {
                        $pth = "icons/" .  $module . ".png?v=" . $imgver;
                    }


                    $sql0 = "SELECT count(DISTINCT gameid) as ccc FROM leaderboard where module = '$module' and email='$usr' and done=1";
                    $result0ts = $conn->query($sql0);
                    if ($result0ts->num_rows > 0) {
                        while ($row0 = $result0ts->fetch_assoc()) {
                            $mycomp = $row0["ccc"];
                        }
                    }
                    ?>
                    <!-- Box Icon -->
                    <div class="box" style="display: flex; width:100%; border:1px solid var(--light);"
                        onclick="opent('<?php echo $module; ?>');">
                        <div class="box-icon"><img src="<?php echo $pth; ?>" class="box-icon-icon" /></div>
                        <div class="box-text">
                            <div class="box-title">
                                <?php echo $module; ?>
                            </div>
                            <div class="box-titlebn">
                                <?php echo 'You have played <b>' . $mycomp . '</b> Levels out of ' . $stage; ?>
                            </div>
                            <div class="box-titlebn">
                                <?php echo 'Total <b>' . $test . '</b> test(s) already taken by <b>' . $user . '</b> user(s)'; ?>
                            </div>
                        </div>
                        <div class="box-prog-right">
                            <?php if ($stage > 0) {
                                $perc = $mycomp * 100 / $stage;
                            } else {
                                $perc = 0;
                            } ?>
                            <div class="pie animate no-round "
                                style="margin:auto, 0; --p:<?php echo $perc; ?>;--c:var(--dark);--b:3px;">
                                <?php echo $perc; ?>%
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>



        </div>
    </div>




    <script>
        function opent(data) {
            var lnk = "levelpage.php?module=" + data;
            window.location.href = lnk;
        }
    </script>