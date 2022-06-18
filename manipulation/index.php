<!DOCTYPE html>
<html lang="en">
<head>
    <title>Database : Data Manipulation</title>
    <?php
        include "../main/header.php";
        include "../connexion/connexion.php";
        
        global $connect;
                
    ?>
    <!-- Start Table Managment -->
    
    <div class="table mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3">
                    <form action="data.php" method="get">
                        <label for="select_database" class="text-black mb-3">Select Table : </label>
                        <select name="table" id="select_table" class="outline-none py-1 rounded w-100">
                            <?php
                                $result = mysqli_query($connect, "SHOW DATABASES");
                                while($row = mysqli_fetch_array($result)){
                                $db = $row['Database'];
                                if($db != "information_schema" && $db != "performance_schema" && $db != "mysql" && $db != "phpmyadmin") 
                                echo "<optgroup label='".$db."'>";
                                
                                mysqli_select_db($connect, $db);
                                if($result = mysqli_query($connect, "show tables")){
                                    while($row = mysqli_fetch_row($result)){
                                        echo "<option value='".$db."_".$row[0]."'>".$row[0]."</option>";
                                    }
                                }  
                                echo "</optgroup>";
                                }
                            ?>
                        </select>
                        <input type="submit" value="Show Data" name="refresh" class="btn main-btn rounded text-uppercase mt-3 mb-5 w-100">  
                    </form>
                </div>
                <div class="col-6 col-md-8 col-lg-9 row d-flex justify-content-center">
                    <div class="mb-3 col-12 col-md-6 col-lg-4">
                        <button id="btn_create_table" class="btn_create_table bg-dark-color border-0 w-100 d-flex justify-content-center text-green-color h-5 p-4 rounded-top">create</button>
                        <div id="create_table" class="create_table bg-dark-color pt-5 pb-4 px-3 rounded-bottom">
                            <form action="table_column.php" method="post">
                                <input type="hidden" name="database" value="<?=$data?>">
                                <label for="create_table_name" class="text-white-50 mb-2">Enter the table name : </label>
                                <input type="text" class="outline-none rounded border-0 w-100 h-5 px-2 mt-1" name="create_table_name" id="create_table_name">
                                <label for="create_table_size" class="text-white-50 mt-4 mb-2">Enter the number of column : </label>
                                <input type="number" min="1" class="outline-none rounded border-0 w-100 h-5 px-2 mt-1" name="create_table_size" id="create_table_size">
                                <input type="submit" value="create" name="submit_create_table" class="btn main-btn rounded text-uppercase mt-3 w-100">
                            </form>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg-4">
                        <button id="btn_update_table" class="btn_update_table bg-dark-color border-0 w-100 d-flex justify-content-center text-green-color h-5 p-4 rounded-top">Update</button>
                        <div id="update_table" class="update_table bg-dark-color pt-5 pb-4 px-3 rounded-bottom">
                            <form action="" method="post">
                                <label for="select_table_update" class="text-white-50 mb-3">Select table : </label>
                                <input list="update_tables" name="table_update" id="select_table_update" class="outline-none py-1 rounded">
                                <datalist id="update_tables">
                                    <?php
                                        if(count($list)){
                                            foreach($list as $item){
                                                echo "<option value='".$item."'>";
                                            }
                                        }
                                    ?>
                                </datalist>
                                <input type="submit" value="Update" name="submit_update_table" class="btn main-btn rounded text-uppercase mt-3 w-100">
                            </form>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg-4">
                        <button id="btn_delete_table" class="btn_delete_table bg-dark-color border-0 w-100 d-flex justify-content-center text-green-color h-5 p-4 rounded-top">Delete</button>
                        <div id="delete_table" class="delete_table bg-dark-color pt-5 pb-4 px-3 rounded-bottom">
                            <form action="refresh_table.php" method="post">
                                <input type="hidden" name="database" value="<?=$data?>">
                                <label for="select_table_delete" class="text-white-50 mb-3">Select table : </label>
                                <input list="delete_tables" name="table_delete" id="select_table_delete" class="outline-none py-1 rounded">
                                <datalist id="delete_tables">
                                    <?php
                                        if(count($list)){
                                            foreach($list as $item){
                                                echo "<option value='".$item."'>";
                                            }
                                        }
                                    ?>
                                </datalist>
                                <input type="submit" value="Delete" name="submit_delete_table" class="btn main-btn rounded text-uppercase mt-3 w-100">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                </div>
        </div>
    </div>
    <!-- End Table Managment -->
    <?php
        include "../main/footer.php"
    ?>
    <script>
        document.getElementById("btn_create_table").onmouseover = function(){
            document.getElementById("create_table").style.transform = "rotateX(0deg)";
        }
        document.getElementById("btn_create_table").onmouseout = function(){
            document.getElementById("create_table").style.transform = "rotateX(90deg)";
        }
        document.getElementById("create_table").onmouseover = function(){
            document.getElementById("create_table").style.transform = "rotateX(0deg)";
        }
        document.getElementById("create_table").onmouseout = function(){
            document.getElementById("create_table").style.transform = "rotateX(90deg)";
        }

        document.getElementById("btn_update_table").onmouseover = function(){
            document.getElementById("update_table").style.transform = "rotateX(0deg)";
        }
        document.getElementById("btn_update_table").onmouseout = function(){
            document.getElementById("update_table").style.transform = "rotateX(90deg)";
        }
        document.getElementById("update_table").onmouseover = function(){
            document.getElementById("update_table").style.transform = "rotateX(0deg)";
        }
        document.getElementById("update_table").onmouseout = function(){
            document.getElementById("update_table").style.transform = "rotateX(90deg)";
        }

        document.getElementById("btn_delete_table").onmouseover = function(){
            document.getElementById("delete_table").style.transform = "rotateX(0deg)";
        }
        document.getElementById("btn_delete_table").onmouseout = function(){
            document.getElementById("delete_table").style.transform = "rotateX(90deg)";
        }
        document.getElementById("delete_table").onmouseover = function(){
            document.getElementById("delete_table").style.transform = "rotateX(0deg)";
        }
        document.getElementById("delete_table").onmouseout = function(){
            document.getElementById("delete_table").style.transform = "rotateX(90deg)";
        }
    </script>