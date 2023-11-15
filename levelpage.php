<?php
include 'inc.php';
$module = $_GET['module'];

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
            $sql0 = "SELECT * FROM test where module = '$module'  order by id";
            $result0t = $conn->query($sql0);
            if ($result0t->num_rows > 0) {
                while ($row0 = $result0t->fetch_assoc()) {
                    $id = $row0["id"];
                    $title = $row0["title"];
                    $descrip = $row0["descrip"];
                    $module = $row0["module"];
                    $level = $row0["level"];
                    $link = $row0["link"];
                    $test = $row0["testcount"];
                    $user = $row0["usercount"];


                    $sql0 = "SELECT count(*) as ccc FROM leaderboard where module = '$module' and email='$usr' and gameid='$id' and done=1";
                    $result0ts = $conn->query($sql0);
                    if ($result0ts->num_rows > 0) {
                        while ($row0 = $result0ts->fetch_assoc()) {
                            $mycomp = $row0["ccc"];
                        }
                    }
                    ?>
                    <!-- Box Icon -->
                    <div class="box" style="display: flex; width:100%;" onclick="opent('<?php echo $link; ?>', <?php echo $id;?>);">
                        <div class="box-icon"><img src="icons/<?php echo $module . '_' . $level; ?>.png"
                                class="box-icon-icon" /></div>
                        <div class="box-text">
                            <div class="box-title">
                                <?php echo $title; ?>
                            </div>
                            <div class="box-titlebn">
                                <?php echo $descrip; ?>
                            </div>
                            <div class="box-titlebn">
                                <?php echo 'You have played <b>' . $mycomp . ' </b>time(s).' ?>
                            </div>
                            <div class="box-titlebn">
                                <?php echo 'Total <b>' . $test . '</b> test(s) already taken by <b>' . $user . '</b> user(s)'; ?>
                            </div>
                        </div>
                        <div class="box-prog-right">
                            <?php $perc = rand(1, 100); ?>
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
        function opent(link, id) {
             var lnk = link + "?id=" + id;
            window.location.href = lnk;
        }
    </script>