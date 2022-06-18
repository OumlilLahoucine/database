<!DOCTYPE html>
<html lang="en">
<head>
    <title>Database : Data - <?php $res = explode("_", $_GET["table"]); echo $res[1];?></title>
    <?php
        include "../main/header.php";
        include "../connexion/connexion.php";
        
        global $connect;

        $db = $res[0];
        $table_name = $res[1];

        mysqli_select_db($connect, $db);
                
    ?>
    <!-- Start Table Managment -->
    
    <div class="column mt-5 mb-5">
        <div class="container p-3 bg-green-color rounded">
            <form action="refresh_table.php" method="post">
                <table class="w-100">
                    <?php
                        if($result = mysqli_query($connect, "SHOW COLUMNS from ".$table_name)){
                            echo "<tr>";
                            while($row = mysqli_fetch_row($result)){
                                echo "<th>".$row[0]."</th>";
                            }
                            echo "<th class='text-center'><a href='insert.php?table=".$_GET["table"]."' class='text-decoration-none text-black'><i class='fa-solid fa-circle-plus'></i> Insert</a></th>";
                            echo "</tr>";
                        }
                        if($result2 = mysqli_query($connect, "select * from ".$table_name)){
                            $i = 0;
                            while($row2 = mysqli_fetch_row($result2)){
                                echo "<tr class='bg-section-color'>";
                                foreach($row2 as $champ)
                                    echo "<td style='border-color: #ccc'>".$champ."</td>";
                                echo "<td style='border-color: #ccc' class='text-center' width='100px'>
                                            <div class='row'>
                                                <div class='col-6'><a href='edit.php?table=".$_GET["table"]."&index=$i' class='text-decoration-none text-black'><i class='fa-solid fa-pen'></i></a></div>
                                                <div class='col-6'><a href='delete.php?table=".$_GET["table"]."&index=$i' class='text-decoration-none text-black'><i class='fa-solid fa-trash'></i></a></div>
                                            </div>
                                        </td>";
                                echo "</tr>";
                                $i++;
                            }
                        }
                    ?>
                </table>
            </form>
        </div>
    </div>
    <br>
    <!-- End Table Managment -->
    <?php
        include "../main/footer.php";

        
        
    ?>
    