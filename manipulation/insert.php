<!DOCTYPE html>
<html lang="en">
<head>
    <title>Database : Insert Data </title>
    <?php
        include "../main/header.php";
        include "../connexion/connexion.php";
        
        $res = explode("_", $_GET["table"]);
        global $connect;

        $db = $res[0];
        $table_name = $res[1];

        mysqli_select_db($connect, $db);
                
    ?>
    <!-- Start Table Managment -->
    
    <div class="column mt-5 mb-5">
        <div class="container p-3 bg-green-color rounded">
            <form action="refresh.php" method="post">
                <input type="hidden" name="db" value="<?=$db?>">
                <input type="hidden" name="table_name" value="<?=$table_name?>">
                <table class="w-100">
                    <tr>
                        <th class="border-0">Column</th>
                        <th class="border-0">Value</th>
                    </tr>
                    <?php
                        if($result = mysqli_query($connect, "SHOW COLUMNS from ".$table_name)){
                            $i = 0;
                            while($row = mysqli_fetch_row($result)){
                                echo "<tr>";
                                echo "<td class='border-0'>".$row[0]."</td>";
                                echo "<td class='border-0'><input type='text' name='".$row[$i]."' class='rounded outline-none'></td>";
                                echo "</tr>";
                                $i++;
                            }
                            
                        }
                       
                    ?>
                </table>
                
                <input type="submit" value="Insert" name="insert" class="submit_td btn main-btn rounded text-uppercase mt-3 px-5">
            </form>
        </div>
    </div>
    <br>
    <!-- End Table Managment -->
    <?php
        include "../main/footer.php";        
    ?>
    