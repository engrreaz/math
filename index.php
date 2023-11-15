<?php
include 'inc.php';
?>

<body>
    <div class="containerx" style="width:100%;">

        <div class="card text-center" style="background:var(--dark);  padding:50px 0 10px 0; border-radius:0;">

            <table width="100%" style="color:white;">
                <tr>
                    <td style="text-align:center;">
                        <img src="<?php echo $pth; ?>" class="pic" /><br>
                        <div class="b">
                            <?php echo $fullname; ?>
                        </div>
                        <div class="c">
                            <?php echo $userlevel; ?>
                        </div>
                        <div class="d">
                            <?php echo $userid; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                    <div style="padding:0 25%;">
                        <div id="poo">
                            <?php echo $totalpoints; ?>
                        </div>
                        <div id="" style="height: 2px; background : white;  width:100%;">
                            <div style="width:90%; background: teal;"></div>
                        </div>
                        <div>Level 17</div>
                    </div>
                        
                    </td>
                </tr>

            </table>

        </div>


        <a href="module.php?email=engrreaz@gmail.com" class="btn">Puzzle</a>
        <a href="achievement.php" class="btn">achievement</a>


    </div>

    <style>

    </style>

    <div id="frontpanel" style="text-align:center; padding: 10px 15px;">
        <table style=" width:100%; ">
            <tr>
                <td class="wd"><span class="pap" onclick="act0"><i class="bi bi-patch-question-fill"></i></span></td>
                <td class="wd" style="font-size:36px;"><span class="pap" onclick="act1"><i
                            class="bi bi-node-plus-fill"></i></span></td>
                <td class="wd"><span class="pap" onclick="act2"><i class="bi bi-bell-fill"></i></span></td>
                <td class="wd"><span class="pap" onclick="act3"><i class="bi bi-check2-circle"></i></span></td>
                <td class="wdl" style="font-size:28px;"><span class="pap" onclick="act4"><i
                            class="bi bi-chat-square-text-fill"></i></span></td>
            </tr>
            <tr>
                <td class="lbls">
                    <?php echo ''; ?>
                </td>
                <td class="lbls">
                    <?php echo ''; ?>
                </td>
                <td class="lbls">
                    <?php echo ''; ?>
                </td>
                <td class="lbls">
                    <?php echo ''; ?>
                    <div style="width:70%; border:0;   background:var(--light); margin:auto;">
                        <div style="width:37%; height:2px; background:var(--light);">&nbsp;</div>
                    </div>
                </td>
                <td class="lbls">
                    <?php echo ''; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="clearfix"></div>


    <div class="containerx" style="width:100%;">
        <?php
        include 'index_content.php';
        ?>

    </div>





    <script>
        function go(id) {
            alert(id);
            window.location.href = "friend.php?id=" + id;
        }
    </script>

    <script>
        $(document).ready(function () {
            setInterval(oneSecondFunction, 1000);

        });

        function oneSecondFunction() {
            var x = document.getElementById("kk").innerHTML;
            x = parseInt(x) - 1;
            var txt = '';
            var d, h, m, s;
            if (x > 3600 * 24) {
                d = Math.floor(x / (3600 * 24));
                s = x - (d * 3600 * 24);
                h = Math.floor(s / 3600);
                s = s - h * 3600;
                m = Math.floor(s / 60);
                s = s - m * 60;

                txt = txt + d + " Days " + h + " Hours " + m + " Min " + s + " Sec.";
            } else if (x > 3600) {
                h = Math.floor(x / 3600);
                s = x - h * 3600;
                m = Math.floor(s / 60);
                s = s - m * 60;
                txt = txt + h + " Hours " + m + " Min " + s + " Sec.";

            } else if (x > 60) {
                m = Math.floor(x / 60);
                s = x - m * 60;
                txt = txt + m + " Min " + s + " Sec.";
            } else {
                txt = txt + s + " Sec.";
            }


            document.getElementById("kk").innerHTML = x;
            document.getElementById("jj").innerHTML = txt;
        }
    </script>



    <script>
        function chng() {
            var scc = document.getElementById("scc").value;

            var infor = "scc=" + scc + "&email=<?php echo $usr; ?>";
            $("#scc").html("");

            $.ajax({
                type: "POST",
                url: "chngeiin.php",
                data: infor,
                cache: false,
                beforeSend: function () {
                    $('#scc').html('<span class="">Changing...</span>');
                },
                success: function (html) {
                    $("#scc").html(html);
                    window.location.href = 'index.php';
                }
            });
        }
    </script>