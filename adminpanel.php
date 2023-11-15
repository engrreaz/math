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
            <div class="top-text">Admin Panel</div>

            
                    <!-- Box Icon -->
                    <div>
                        <div class="box" style="display: flex; width:100%;" onclick="opent('<?php echo $module; ?>');">
                            <div class="box-icon"><img src="icons/<?php echo $module; ?>.png" class="box-icon-icon" /></div>
                            
                         
                        </div>
                    </div>
                    <div id="upload-icon">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                        <select id="module" name="module">
                        <?php
            $sql0 = "SELECT * FROM test group by module order by id";
            $result0t = $conn->query($sql0);
            if ($result0t->num_rows > 0) {
                while ($row0 = $result0t->fetch_assoc()) {
                    $title = $row0["title"];
                    $descrip = $row0["descrip"];
                    $module = $row0["module"];
?>
<option value="<?php echo $title; ?>"><?php echo $title; ?></option>
<?php
                }}
                    ?>
                                </select>


                            Select image to upload:
                            <input type="text" name="dept" id="text" value="Module Icon"/>
                            <input type="file" name="fileToUpload" id="fileToUpload"/>
                            <input type="submit" value="Upload Image" name="submit"/>
                        </form>
                    </div>




            <!-- Box Icon -->
            <div class="box" style="display: block; width:100%;">
                <div class="box-text">
                    <div class="box-title">
                        Module Management
                    </div>
                </div>
                <div id="moduleentry" style="display:block;">
                    <input class="form-control" id="moduletitle" type="text" placeholder="Enter a module name" />
                    <br>
                    <button class="btn btn-primary" onclick="newmodule();">Add Module</button>
                    <div id="savemodule"></div>
                </div>
            </div>















        </div>
    </div>




    <script>
        function newmodule() {
            let text = document.getElementById("moduletitle").value;
            var infor = "frm=module&text=" + text;;
            $("#savemodule").html("");

            $.ajax({
                type: "POST",
                url: "adminsave.php",
                data: infor,
                cache: false,
                beforeSend: function () {
                    $('#savemodule').html('<span style="font-size:16px;" class=""><i class="bi bi-display-fill"></i>');
                },
                success: function (html) {
                    $("#savemodule").html(html);
                    document.getElementById("moduletitle").value = '';
                }
            });
        }
    </script>