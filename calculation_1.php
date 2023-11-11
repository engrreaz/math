<?php
include 'inc.php';
$id = $_GET['id'];
$sql0 = "SELECT * FROM test where id = '$id' ";
$result0t = $conn->query($sql0);
if ($result0t->num_rows > 0) {
    while ($row0 = $result0t->fetch_assoc()) {
        $title = $row0["title"];
        $descrip = $row0["descrip"];
        $module = $row0["module"];
        $level = $row0["level"];

        $operator = $row0["operator"];
        ; // 1 = addition, 2 = subtraction, 3 = multiplication, 4 = division
        $negative = $row0["negative"];
        ; // this function is not used yet.
        $valuestart = $row0["startvalue"];
        ;
        $valueend = $row0["endvalue"];
        ;
        $maxfirst = $row0["maxfirst"];
        ; // 0 = first value is max or min, 1 = first val is max;

        $numcnt = $row0["numcount"];
        ; // how much number will be opperand.
        $disp = $row0["display"];
        ; // display number at a time or countinue ; 1 = at a time, 0 = continue series
        $quecnt = $row0["questions"];
        ; // total question/quiz in a text
        $dur = $row0["duration"];
        ; // max duration to submit an answer
    }
}


///////////////////////////////////////

?>


<style>
    .box {
        padding: 10px 25px;
        box-sizing: border-box;
        display: flex;
        border: 1px solid var(--darker);
        border-width: 1px 0;
    }

    .box-icon {
        font-size: 25px;
        display: inline;
        width: 30px;
        padding-top: 3px;
        margin-right: 5px;
    }

    .box-text {
        display: flex;
        flex-direction: column;
        flex: auto;
    }

    .box-title {
        font-size: 16px;
        font-weight: 600;
        margin: 0;
    }

    .box-titlebn {
        font-size: 18px;
        font-weight: 500;
        font-family: sutonnyOMJ;
        margin: 0;
    }

    .box-subtitle {
        font-size: 11px;
        font-weight: 400;
        font-style: italic;
        margin: 0;
    }

    .box-prog {
        height: 50px;
        width: 50px;
    }

    .top-text-descrip {
        font-size: 11px;
        display: block;
        margin: 0;
        color: gray;
        text-transform: none;
        font-style: italic;
        letter-spacing: normal;
        font-weight: 400;
    }

    .opening-block {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: calc(100vh-53px);
        justify-content: center;
        align-items: center;
    }
</style>

<body style="background: var(--lighter); width:100%; max-width:100%; overflow:auto;">
    <div class="containerx" style="width: 100%;">
        <div id="opening-block" class="opening-block" style="text-align: center; margin: 5px 0; ">

            <div class="top-icon"><i class="bi bi-plus-circle-fill"></i></div>
            <div class="top-text">
                <?php echo $title; ?>
                <span class="top-text-descrip">
                    <?php echo $descrip; ?>
                </span>
                <span class="top-text-level">
                    <?php echo $level; ?>
                </span>
            </div>

            <style>
                .rules {
                    text-align: left;
                    font-size: 12px;
                }

                .ss {
                    text-align: center;
                    position: relative;
                }

                .ss-img {
                    width: 70%;
                    margin: 0 auto;
                    border: 1px solid gray;
                    border-radius: 4px;
                }

                .play {
                    position: absolute;
                    right: 20%;
                    top: 5%;
                    font-size: 30px;
                    color: white;
                }
            </style>
            <div class="rules">
                <ul>
                    <li>This test contain 5 calculations between 2 numbers.</li>
                    <li>Your task is adding them, those are between 0 and 10</li>
                    <li>30 Sec(s) will remaining to calculate every expression.</li>
                </ul>
                <div class="ss">
                    <div onclick="playyoutube();" class="btn-success play"><i class="bi bi-play-btn-fill"></i></div>
                    <img src="screenshot/<?php echo $module . '_' . $level; ?>.png" class="ss-img" />
                </div>
            </div>

            <div style="padding:25px 0 50px;">
                <button class="btn btn-success pp" onclick="testagain();"><i
                        class="bi bi-caret-right-fill"></i></button>
                <button class="btn btn-info pp" onclick="leaderboard();"><i class="bi bi-award"></i></button>
                <button class="btn btn-warning pp" onclick="history();"><i class="bi bi-smartwatch"></i></button>
                <button class="btn btn-danger pp" onclick="closet();"><i class="bi bi-x-circle"></i></button>
            </div>
        </div>


        <div id="main-block" style="text-align: center; margin: 25px 0; display:none;">
            <div class="top-icon"><i class="bi bi-plus-circle-fill"></i></div>
            <div class="top-text">
                <?php echo $title; ?>
                <span class="top-text-descrip">
                    <?php echo $descrip; ?>
                </span>
                <span class="top-text-level">
                    <?php echo $level; ?>
                </span>
            </div>




            <!-- Box Icon -->
            <div class="box" style="display: none;">
                <div class="box-icon"><i class="bi bi-app"></i></div>
                <div class="box-text">
                    <div class="box-title">
                        <?php echo 'Elementary Math'; ?>
                    </div>
                    <div class="box-titlebn">
                        <?php echo 'প্রাথমিক গণিত'; ?>
                    </div>
                    <div class="box-subtitle">Display nameddd</div>
                </div>
                <div class="box-prog">
                    <?php $perc = 76; ?>
                    <div class="pie animate no-round "
                        style="margin:auto, 0; --p:<?php echo $perc; ?>;--c:var(--dark);--b:3px;">
                        <?php echo $perc; ?>%
                    </div>
                </div>
            </div>

            <style>
                .ques-box {
                    display: flex;
                    text-align: center;
                    justify-content: center;
                    align-items: center;
                }

                .ques {
                    font-size: 24px;
                    color: var(--darker);
                    border: 0px solid var(--darker);
                    background: var(--lighter);
                    padding: 8px 15px;
                    font-weight: bold;
                }

                .oper {
                    font-size: 24px;
                    color: var(--darker);
                    border: 0x solid var(--darker);
                    background: var(--lighter);
                    padding: 8px 15px;
                    font-weight: bold;
                }

                .result {}

                .result-value {
                    font-size: 24px;
                    color: var(--darker);
                    border: 0px solid var(--darker);
                    background: var(--lighter);
                    padding: 8px 15px;
                    font-weight: bold;
                    text-align: center;

                }

                .result-value:focus {
                    border: 0px solid var(--darker);
                    outline: 0;
                }

                .dot-box {
                    display: flex;
                    text-align: center;
                    justify-content: center;
                    align-items: center;
                    margin: 15px auto;
                }

                .dot {
                    height: 10px;
                    width: 10px;
                    margin: 2px;
                    border-radius: 50%;
                    background: var(--light);
                }

                .ok {
                    background: var(--darker);
                }

                .no {
                    background: red;
                }

                .secs {
                    text-align: center;
                    font-size: 15px;
                    letter-spacing: 2px;
                    ;
                }
            </style>

            <div>

            </div>

            <div class="box-prog" id="noop" style="text-align:center; margin:0 auto;">
                <?php $perc = 76; ?>
                <div class="pie animate no-round "
                    style="margin:auto, 0; --p:<?php echo $perc; ?>;--c:var(--dark);--b:3px;">
                    <span id="secdur">
                        <?php echo $dur; ?>
                    </span>
                </div>
            </div>





            <div class="dot-box">
                <?php
                for ($x = 0; $x < $quecnt; $x++) {
                    echo '<div id="dot' . $x . '" class="dot"></div>';
                }
                ?>
            </div>


            <div style="display:none; text-align:center;">
                <div id="sec" style="display:block;">1</div>
                Time :<div id="secc" style="">0</div>
                Result : <div id="fol"></div>
                Digit : <div id="digit" style="">0</div>
            </div>


            <div class="ques-box">
                <div class="ques" id="val1">
                    <?php echo $val1; ?>
                </div>
                <div class="oper" id="oper">
                    <?php
                    if ($operator == 1) {
                        echo '+';
                    } else if ($operator == 2) {
                        echo '-';
                    } else if ($operator == 3) {
                        echo '*';
                    } else if ($operator == 4) {
                        echo '/';
                    } else if ($operator == 5) {
                        echo '%';
                    }
                    ?>
                </div>
                <div class="ques" id="val2">
                    <?php echo $val2; ?>
                </div>
            </div>
            <div class="result">
                <input type="number" id="res" class="result-value" onkeyup="submit();" autofocus />
            </div>

            <div style="padding:25px 0 50px;">
                <button class="btn btn-danger" onclick="repeal();">Repeal</button>
            </div>
        </div>
    </div>
    <div id="repo" style="display:none;">

    </div>

    <style>
        #layerblock {
            background: var(--lighter);
            text-align: center;
            width: 100%;
            height: 100vh;
            position: absolute;
            top: 0;
            left: 0;
            display: none;
            justify-content: center;
            align-items: center;
        }

        .inner-block {}

        td {
            font-size: 13px;
            border: 1px;
        }

        .rt {
            text-align: right;
            width: 47%;
        }

        .cln {
            padding: 0 5px;
            width: 5%;
        }

        .val {
            text-align: center;
        }

        #done-icon {
            font-size: 48px;
            color: var(--darker);
            margin: 0 0 10px 0;
        }

        #done-msg {
            font-size: 24px;
            font-weight: 600;
            color: var(--dark);
        }

        #gap,
        #gap2 {
            height: 30px;
        }
    </style>

    <div id="layerblock">
        <div class="inner-block">
            <div id="done-icon"></div>
            <div id="done-msg"></div>
            <div id="gap"></div>
            <div id="sp-msg"></div>
            <div id="gap2"></div>
            <div id="report">
                <div style="">



                    <style>
                        .gol {
                            height: 50px;
                            width: 50px;
                            border-radius: 50%;
                            
                            margin: 0 20px;
                            font-size: 20px;
                            text-align: center;
                            padding: 5px;
                            font-weight: bold;
                            color: var(--darker);
                            line-height: 24px;
                        }

                        .goo {
                            font-size: 10px;
                            display: block;
                            margin: 0;
                            padding: 0;
                            position: relative;
                            top: -10px;
                            font-weight: 400;

                        }

                        .q {
                            color: black;
                            border: 2px solid black;
                        }

                        .a {
                            color: purple;
                            border: 2px solid purple;
                        }

                        .r {
                            color: seagreen;
                            border: 2px solid seagreen;
                        }

                        .w {
                            color: red;
                            border: 2px solid red;
                        }

                        #board {
                            font-size: 10px;
                            color: var(--darker);
                        }

                        #board span {
                            font-size: 14px;
                            font-weight: 600;
                        }

                        #board .bi {
                            font-size: 30px;
                        }

                        .big {
                            font-size: 60px;
                        }

                        .pp {
                            padding: 10px;
                            font-size: 24px;
                            margin: 0 10px;
                        }

                        .smm {
                            font-size: 10px;
                            font-style: italic;
                        }
                    </style>

                    <div id="score" style="display:block; font-size:8px;">
                        <div id="best2"></div>
                        <div id="rank2"></div>
                        <div id="champ2"></div>
                    </div>



                    <div style="display:block;">
                        <table style="border:0px solid gray; ">
                            <tr>
                                <td colspan="3" class="val">
                                    <div id="seccx" style="font-size: 18px; color: var(--dark); font-weight: 700;">0
                                    </div>
                                    <small class="smm">Time Taken</small>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="height:15px;"></td>
                            </tr>
                            <tr>
                                <td colspan="3" id="board">
                                    <div style="display:flex; justify-content: space-evenly; align-items: center;">
                                        <div style="text-align:left;">
                                            <i class="bi bi-stopwatch"></i>
                                            <br><span id="best">00:00:17</span><br>Your Best
                                        </div>
                                        <div style="text-align:center;">
                                            <i class="bi bi-award " style=" font-size:60px;"></i><br>Rank
                                            <div id="rank"
                                                style="position:relative; text-align: center; top: -61px; font-size:15px;">
                                                738
                                            </div>
                                        </div>
                                        <div style="text-align:right;">
                                            <i class="bi bi-stopwatch-fill"></i>
                                            <br><span id="champ">00:00:17</span><br>Champion
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3">
                                    <div style="display:flex; justify-content:space-evenly; text-align:center;">
                                        <div class="gol q">
                                            <div id="ttt">
                                                <?php echo $quecnt; ?>
                                            </div><span class="goo">Ques</span>
                                        </div>
                                        <div class="gol a">
                                            <div id="count">0</div><span class="goo">Answer</span>
                                        </div>
                                        <div class="gol r">
                                            <div id="yyy">0</div><span class="goo">Right</span>
                                        </div>
                                        <div class="gol w">
                                            <div id="nnn">0</div><span class="goo">Wrong</span>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div style="padding:25px 0 50px;">
                <button class="btn btn-success pp" onclick="testagain();"><i
                        class="bi bi-caret-right-fill"></i></button>
                <button class="btn btn-info pp" onclick="leaderboard();"><i class="bi bi-award"></i></button>
                <button class="btn btn-warning pp" onclick="history();"><i class="bi bi-smartwatch"></i></button>
                <button class="btn btn-danger pp" onclick="closet();"><i class="bi bi-x-circle"></i></button>
            </div>

        </div>




    </div>




    <script>
        var myVar;
        var mydur;
        var gamedone = 0;


        function testagain() {
            document.getElementById("sec").innerHTML = 0;
            document.getElementById("secc").innerHTML = 0;
            document.getElementById("fol").innerHTML = '';
            document.getElementById("digit").innerHTML = 0;
            document.getElementById("count").innerHTML = 0;
            document.getElementById("yyy").innerHTML = 0;
            document.getElementById("nnn").innerHTML = 0;
            var j = <?php echo $quecnt; ?>;
            var i;
            for (i = 0; i < j; i++) {
                document.getElementById("dot" + i).style.backgroundColor = 'var(--light)';
            }
            document.getElementById("layerblock").style.display = 'none';
            var cnt = document.getElementById("count").innerHTML;
            if (cnt == '0') {
                addcalc();
            }
            var fff = document.getElementById("fol").innerHTML;
            if (fff != '') {
                myVar = setInterval(myTimer, 1000);
                mydur = setInterval(mydurTimer, 100);
            }
            document.getElementById("opening-block").style.display = 'none';
            document.getElementById("main-block").style.display = 'block';
        }
    </script>
    <script>
        function addcalc() {
            var min = <?php echo $valuestart; ?>;
            var max = <?php echo $valueend; ?> + 1;
            var val1 = Math.floor(Math.random() * (max - min)) + min;
            var val2 = Math.floor(Math.random() * (max - min)) + min;
            if (<?php echo $maxfirst; ?> == 1) {
                if (val1 > val2) {
                    document.getElementById("val1").innerHTML = val1;
                    document.getElementById("val2").innerHTML = val2;
                } else {
                    document.getElementById("val1").innerHTML = val2;
                    document.getElementById("val2").innerHTML = val1;
                }
            } else {
                document.getElementById("val1").innerHTML = val1;
                document.getElementById("val2").innerHTML = val2;
            }


            // var res = val1 + String.fromCharCode(43) + val2;
            var operator = <?php echo $operator; ?>;
            var res;
            if (operator == 1) {
                res = jog(val1, val2);
            } else if (operator == 2) {
                res = biyog(val1, val2);
            } else if (operator == 3) {
                res = gun(val1, val2);
            } else if (operator == 4) {
                res = vug(val1, val2);
            } else if (operator == 5) {
                res = obo(val1, val2);
            }

            document.getElementById("fol").innerHTML = res;
            var digit = res.toString().length;
            document.getElementById("digit").innerHTML = digit;
            document.getElementById("res").focus();
            document.getElementById("res").value = '';
            document.getElementById("res").disabled = false;
            redur();
        }
    </script>
    <script>
        function submit() {
            var digit = parseInt(document.getElementById("digit").innerHTML);
            var subres = document.getElementById("res").value;
            var chk = subres.toString().length;
            if (digit == chk) {
                var res = parseInt(document.getElementById("fol").innerHTML);
                var cntsl = parseInt(document.getElementById("count").innerHTML);
                if (res == subres) {
                    document.getElementById("dot" + cntsl).style.backgroundColor = 'darkcyan';
                    document.getElementById("yyy").innerHTML = parseInt(document.getElementById("yyy").innerHTML) + 1;
                } else {
                    document.getElementById("dot" + cntsl).style.backgroundColor = 'red';
                    document.getElementById("nnn").innerHTML = parseInt(document.getElementById("nnn").innerHTML) + 1;
                }
                cntsl++;
                document.getElementById("count").innerHTML = cntsl;
                if (cntsl < <?php echo $quecnt; ?>) {
                    addcalc();
                } else {
                    document.getElementById("done-icon").innerHTML = '<i class="bi bi-check2-circle"></i>';
                    document.getElementById("done-msg").innerHTML = "You're all done";
                    gamedone = 1;
                    done();
                }
            }
        }
    </script>
    <script>

        mydur = setInterval(mydurTimer, 100);
        function mydurTimer() {
            var dursec = parseFloat(document.getElementById("secdur").innerHTML) - 0.1;
            if (dursec < 0) {
                dursec = 0;
            }
            var realdur = parseInt(<?php echo $dur; ?>);
            var ppp = parseInt(100 * dursec / realdur);
            document.getElementById("noop").innerHTML = '<div class="pie no-round " ' +
                'style="margin:auto, 0; --p:' + ppp + ';--c:var(--dark);--b:3px;">' +
                '<span id="secdur">' + parseFloat(dursec).toFixed(1) + '</span></div>';
            if ((ppp <= 0 || dursec <= 0.0) && <?php echo $dur; ?> > 0) {
                document.getElementById("done-icon").innerHTML = '<i class="bi bi-stopwatch"></i>';
                document.getElementById("done-msg").innerHTML = "Oppps! Time up";
                gamedone = 3;
                done();
            }
            // document.getElementById("secdur").innerHTML = dursec - 1;
        }
    </script>
    <script>
        function redur() {
            document.getElementById("res").focus();
            document.getElementById("secdur").innerHTML = "<?php echo $dur . '.0'; ?>";
            setTimeout(function () { document.getElementById("res").focus(); }, 100);
        }
    </script>
    <script>

        myVar = setInterval(myTimer, 1000);
        function myTimer() {
            var secs = parseInt(document.getElementById("sec").innerHTML) * 1 + 1;
            document.getElementById("sec").innerHTML = secs;
            var h, m, s;
            h = Math.floor(secs / 3600);
            h = h.toString().padStart(2, '0');
            m = Math.floor((secs - h * 3600) / 60);
            m = m.toString().padStart(2, '0');
            s = secs % 60;
            s = s.toString().padStart(2, '0');

            document.getElementById("secc").innerHTML = h + ':' + m + ':' + s;
        }
    </script>
    <script>

        function repeal() {

            document.getElementById("done-icon").innerHTML = '<i style="color:red;" class="bi bi-x-circle-fill"></i>';
            document.getElementById("done-msg").innerHTML = "You've repeal this test.";
            gemedone = 2;

            done();
        }
    </script>
    <script>
        function done() {
            clearInterval(myVar);
            clearInterval(mydur);
            document.getElementById("secdur").innerHTML = "0.0";
            document.getElementById("res").value = '';
            document.getElementById("repo").innerHTML = document.getElementById("secc").innerHTML + document.getElementById("yyy").innerHTML + document.getElementById("nnn").innerHTML;
            document.getElementById("res").disabled = true;
            var z = document.getElementById("secc").innerHTML;
            document.getElementById("seccx").innerHTML = z;
            document.getElementById("layerblock").style.display = 'flex';

            // fetch record ....

            let id = <?php echo $id; ?>;
            var dur = parseInt(document.getElementById("sec").innerHTML);
            var ques = <?php echo $quecnt; ?>;
            var corr = parseInt(document.getElementById("yyy").innerHTML);
            var wrong = parseInt(document.getElementById("nnn").innerHTML);
            var ans = corr + wrong;;


            var infor = "id=" + id + "&dur=" + dur + "&que=" + ques + "&ans=" + ans + "&corr=" + corr + "&wrong=" + wrong + "&gamedone=" + gamedone;
            $("#score").html("");

            $.ajax({
                type: "POST",
                url: "fetchscore.php",
                data: infor,
                cache: false,
                beforeSend: function () {
                    $('#score').html('<span style="font-size:16px;" class=""><i class="bi bi-display-fill"></i>');
                },
                success: function (html) {
                    $("#score").html(html);
                    var best = parseInt(document.getElementById("best2").innerHTML);
                    var champ = parseInt(document.getElementById("champ2").innerHTML);
                    var rank = parseInt(document.getElementById("rank2").innerHTML);
                    document.getElementById("best").innerHTML = numtotime(best);
                    document.getElementById("champ").innerHTML = numtotime(champ);
                    if (isNaN(rank)) {
                        document.getElementById("rank").innerHTML = '-';
                    } else {
                        document.getElementById("rank").innerHTML = rank;
                    }
                    // $("#score").html("");
                }
            });
        }
    </script>
    <script>

        function leaderboard() {

        }

        function history() {

        }
    </script>
    <script>
        function closet() {
            document.getElementById("layerblock").style.display = 'none';
            document.getElementById("main-block").style.display = 'none';
            document.getElementById("opening-block").style.display = 'flex';
            clearInterval(myVar);
            clearInterval(mydur);
        }
    </script>
    <script>
        function jog(n1, n2) {
            return n1 + n2;
        }
        function biyog(n1, n2) {
            return n1 - n2;
        }
        function gun(n1, n2) {
            return n1 * n2;
        }
        function vug(n1, n2) {
            return n1 / n2;
        }
        function obo(n1, n2) {
            return n1 % n2;
        }


        // myVar = setInterval(myTimer, 1000);
        // mydur = setInterval(mydurTimer, 100);
        clearInterval(myVar);
        clearInterval(mydur);
        addcalc();
    </script>


    <script>
        function numtotime(dur) {
            if (dur > 0) {
                var h, m, s;
                h = 0; m = 0; s = 1;
                h = parseInt(dur / 3600);
                h = h.toString().padStart(2, '0');
                m = parseInt((dur - (h * 3600)) / 60);
                m = m.toString().padStart(2, '0');
                s = ((dur - (h * 3600)) % 60);
                s = s.toString().padStart(2, '0');
                return h + ':' + m + ':' + s;
            } else {
                var secc = document.getElementById("seccx").innerHTML;
                return secc;
            }
        }
    </script>