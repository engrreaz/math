<?php
include 'inc.php';





?>
<style>
    .box-icon {
        margin-right: 20px;
    }

    .box-icon-icon {
        height: 48px;
        width: 48;
        border-radius: 50%;
        margin-top: 4px;
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
            <div class="top-text">Achievements</div>

            <?php
            $sql0 = "SELECT * FROM achievements order by category, id";
            $result0t = $conn->query($sql0);
            if ($result0t->num_rows > 0) {
                while ($row0 = $result0t->fetch_assoc()) {
                    $id = $row0["id"];
                    $cat = $row0["category"];
                    $title = $row0["title"];
                    $descrip = $row0["descrip"];
                    $target = $row0["target"];
                    $points = $row0["points"];
                    $users = $row0["users"];

                    $pth = "achievement/" . $cat . ".png";
                    if (!file_exists($pth)) {
                        $pth = "achievement/nono.jpg";
                    } else {
                        $pth = "achievement/" . $cat . ".png?v=" . $imgver;
                    }


                    $sql0 = "SELECT count(*) as ccc FROM leaderboard where achievetext = '$title' and email='$usr'";
                    $result0ts = $conn->query($sql0);
                    if ($result0ts->num_rows > 0) {
                        while ($row0 = $result0ts->fetch_assoc()) {
                            $mycomp = $row0["ccc"];
                            $perc = $mycomp * 100 / $target;
                            if($perc == 100){
                                $fil = 0; $bgc = 'light';
                            } else {
                                $fil = 100; $bgc = 'lighter';
                            }
                        }
                    }
                    ?>
                    <!-- Box Icon -->
                    <div class="box" style="display: flex; width:100%; border:1px solid var(--light); background:var(--<?php echo $bgc;?>);"
                        onclick="opentx('<?php echo $module; ?>');">
                        <div class="box-icon"><img src="<?php echo $pth; ?>" class="box-icon-icon"
                                style="filter: grayscale(<?php echo $fil;?>%);" /></div>
                        <div class="box-text">
                            <div class="box-title">
                                <?php echo $title; ?>
                            </div>
                            <div class="box-titlebn">
                                <?php echo $descrip; ?>
                            </div>
                            <div class="box-titlebn">
                                <?php echo 'Total <b>' . $users . '</b> user(s) achieve this badge'; ?>
                            </div>
                        </div>
                        <div class="box-prog-right">
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