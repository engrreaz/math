<style>
    .nmbr {
        font-size: 30px;
        font-weight: bold;
    }

    .nmbr small {
        font-size: 14px;
        font-weight: 500;
    }
</style>


<?php if ($reallevel == 'Super Administrator') {

} ?>

<div class="card gg">
    <div class="card-body">
        <h5>Settings</h5>
        <small><span style="font-style:italic; ">To start mark entry/process result, please insert some settings like
                teachers info, class info, subject info, create students profile.<br>To do this, click the settings
                button below :</span></small>
        <button class="btn btn-success" style="margin-top:8px;" onclick="gorx();">Go To Settings</button>
        <button class="btn btn-dark" style="margin-top:8px;" onclick="sublist();">Subjects List</button>

    </div>
</div>





<div style="height:52px;"></div>


<script>
    function gor() {
        window.location.href = 'resultprocess.php';
    }

    function gorx() {
        window.location.href = 'settings.php';
    }

    function sublist() {
        window.location.href = 'tools_allsubjects.php';
    }

    function update() {
        window.location.href = 'whatsnew.php';
    }

    function token() {
        window.location.href = 'accountsecurity.php';
    }

    function goclsp() {
        window.location.href = 'finclssec.php';
    }

    function goclsa() {
        window.location.href = 'finacc.php';
    }

    function mypr() {
        window.location.href = 'mypr.php';
    }

    function goclss() {
        window.location.href = 'finstudents.php?cls=<?php echo $cteachercls; ?>&sec=<?php echo $cteachersec; ?>';
    }
</script>