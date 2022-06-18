<!DOCTYPE html>
<html lang="en">
<head>
    <title>Database : Managment</title>
    <?php
        include "../main/header.php";
        include "../connexion/connexion.php";

        global $connect;

        
    ?>
    <!-- Start Database Managment -->
   
    <div class="database mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3">
                    <i class="fa-solid fa-database icon text-green-color"></i>
                    <span class="text-black-50 text-uppercase justify-content-center">
                        My Databases
                    </span>
                    <ul class="mt-3" style="max-height:446px; overflow:auto">
                        <?php
                            $result = mysqli_query($connect, "SHOW DATABASES");
                            while($row = mysqli_fetch_array($result)){
                            $db = $row['Database'];
                            if($db != "information_schema" && $db != "performance_schema" && $db != "mysql" && $db != "phpmyadmin") 
                            echo "<li>".$db."</li>";
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-6 col-md-8 col-lg-9 row d-flex justify-content-center">
                    <div class="mb-3 col-12 col-md-6 col-lg-5">
                        <button id="btn_create_database" class="btn_create_database bg-dark-color border-0 w-100 d-flex justify-content-center text-green-color h-5 p-4 rounded-top">create</button>
                        <form action="refresh_database.php" method="post">
                            <div id="create_database" class="create_database bg-dark-color pt-5 pb-4 px-3 rounded-bottom">
                                <label for="create_database_name" class="text-white-50 mb-3">Enter the database name : </label>
                                <input type="text" class="outline-none rounded border-0 w-100 h-5 px-2 mt-1" name="create_database_name" id="create_database_name">
                                <input type="submit" name="submit_create_database" value="create" class="btn main-btn rounded text-uppercase mt-3 w-100">
                            </div>
                        </form>
                        
                    </div>
                    <!-- <div class="mb-3 col-12 col-md-6 col-lg-4">
                        <button id="btn_update_database" class="btn_update_database bg-dark-color border-0 w-100 d-flex justify-content-center text-green-color h-5 p-4 rounded-top">Update</button>
                        <div id="update_database" class="update_database bg-dark-color pt-5 pb-4 px-3 rounded-bottom">
                            <form action="" method="post">
                                <label for="select_database_update" class="text-white-50 mb-3">Select database : </label>
                                <input list="update_databases" name="database" id="select_database_update" class="outline-none py-1 rounded">
                                <datalist id="update_databases">
                                    <?php
                                        // $result = mysqli_query($connect, "SHOW DATABASES");
                                        // while($row = mysqli_fetch_array($result)){
                                        // $db = $row['Database'];
                                        // if($db != "information_schema" && $db != "performance_schema" && $db != "mysql" && $db != "phpmyadmin") 
                                        // echo "<option value='".$db."'>";
                                        // }
                                    ?>
                                </datalist>
                                <label for="update_database_name" class="text-white-50 mt-4 mb-3">Enter the new name : </label>
                                <input type="text" class="outline-none rounded border-0 w-100 h-5 px-2" name="update_database_name" id="update_database_name">
                                <input name="submit_update_database" type="submit" value="Update" class="btn main-btn rounded text-uppercase mt-3 w-100">
                            </form>
                        </div>
                    </div> -->
                    <div class="mb-3 col-12 col-md-6 col-lg-5">
                        <button id="btn_delete_database" class="btn_delete_database bg-dark-color border-0 w-100 d-flex justify-content-center text-green-color h-5 p-4 rounded-top">Delete</button>
                        <div id="delete_database" class="delete_database bg-dark-color pt-5 pb-4 px-3 rounded-bottom">
                            <form action="refresh_database.php" method="post">
                                <label for="select_database_delete" class="text-white-50 mb-3">Select database : </label>
                                <input list="delete_databases" name="database" id="select_database_delete" class="outline-none rounded">
                                <datalist id="delete_databases">
                                    <?php
                                        $result = mysqli_query($connect, "SHOW DATABASES");
                                        while($row = mysqli_fetch_array($result)){
                                        $db = $row['Database'];
                                        if($db != "information_schema" && $db != "performance_schema" && $db != "mysql" && $db != "phpmyadmin") 
                                        echo "<option value='".$db."'>";
                                        }
                                    ?>
                                </datalist>
                                <input type="submit" value="Delete" name="submit_delete_database" class="btn main-btn rounded text-uppercase mt-3 w-100">
                            </form>
                            </div> 
                    </div>
                </div>
                <div class="clearfix"></div>
                </div>
        </div>
    </div>
    <!-- End Database Managment -->
    <?php
        include "../main/footer.php";

        
    ?>
    <script>
        document.getElementById("btn_create_database").onmouseover = function(){
            document.getElementById("create_database").style.transform = "rotateX(0deg)";
        }
        document.getElementById("btn_create_database").onmouseout = function(){
            document.getElementById("create_database").style.transform = "rotateX(90deg)";
        }
        document.getElementById("create_database").onmouseover = function(){
            document.getElementById("create_database").style.transform = "rotateX(0deg)";
        }
        document.getElementById("create_database").onmouseout = function(){
            document.getElementById("create_database").style.transform = "rotateX(90deg)";
        }

        // document.getElementById("btn_update_database").onmouseover = function(){
        //     document.getElementById("update_database").style.transform = "rotateX(0deg)";
        // }
        // document.getElementById("btn_update_database").onmouseout = function(){
        //     document.getElementById("update_database").style.transform = "rotateX(90deg)";
        // }
        // document.getElementById("update_database").onmouseover = function(){
        //     document.getElementById("update_database").style.transform = "rotateX(0deg)";
        // }
        // document.getElementById("update_database").onmouseout = function(){
        //     document.getElementById("update_database").style.transform = "rotateX(90deg)";
        // }

        document.getElementById("btn_delete_database").onmouseover = function(){
            document.getElementById("delete_database").style.transform = "rotateX(0deg)";
        }
        document.getElementById("btn_delete_database").onmouseout = function(){
            document.getElementById("delete_database").style.transform = "rotateX(90deg)";
        }
        document.getElementById("delete_database").onmouseover = function(){
            document.getElementById("delete_database").style.transform = "rotateX(0deg)";
        }
        document.getElementById("delete_database").onmouseout = function(){
            document.getElementById("delete_database").style.transform = "rotateX(90deg)";
        }
    </script>