<?php
if ($usr == '' || $userlevel == 'Guest') {

}
?>

<style>
    <blade media|%20print> {
        .noprint {
            display: none !important;
        }
    }
</style>

<div class="noprint"
    style="position:fixed; bottom:0; width:100%; background:var(--dark); height:50px; padding-top:10px; z-index:999;">
    <table width="100%">
        <tr>
            <td style="width:8%"></td>
            <td style=""><a style="color:white;" href="index.php"><i class="material-icons">home</i></a></td>
            <td style=""><a style="color:white;" href="classsection.php"><i class="material-icons">person</i></a></td>
            <td style=""><a style="color:white;" href="tools.php"><i class="material-icons">spa</i></a></td>
            <td style=""><a style="color:white;" href="globalsetting.php"><i class="material-icons">build</i></a></td>
            <td style="width:8%"></td>
        </tr>
    </table>
</div>






<div class="noprint" onclick="document.location.reload();"
    style="width:25px; height:25px; float:right; right:15px; top:13px; position:fixed; z-index:999; border-radius:50%; background:white;">
    <i class="material-icons ico">cached</i>
</div>









</body>

</html>