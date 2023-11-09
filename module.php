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
            $sql0 = "SELECT * FROM test group by module order by id";
            $result0t = $conn->query($sql0);
            if ($result0t->num_rows > 0) {
                while ($row0 = $result0t->fetch_assoc()) {
                    $title = $row0["title"];
                    $descrip = $row0["descrip"];
                    $module = $row0["module"];
                    ?>
                    <!-- Box Icon -->
                    <div class="box" style="display: flex; width:100%;" onclick="opent('<?php echo $module; ?>');">
                        <div class="box-icon"><img src="icons/<?php echo $module; ?>.png" class="box-icon-icon" /></div>
                        <div class="box-text">
                            <div class="box-title">
                                <?php echo $title; ?>
                            </div>
                            <div class="box-titlebn">
                                <?php echo '10 Levels'; ?>
                            </div>
                            <div class="box-titlebn">
                                <?php echo 'Total <b>1422</b> tests taken'; ?>
                            </div>
                        </div>
                        <div class="box-prog-right">
                            <?php $perc = 76; ?>
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