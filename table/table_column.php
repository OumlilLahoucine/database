<!DOCTYPE html>
<html lang="en">
<head>
    <title>Database : Table Column</title>
    <?php
        include "../main/header.php";
        include "../connexion/connexion.php";
        
        global $connect;

        $db = $_POST['database'];
        $table_name = $_POST['create_table_name'];
        $size = $_POST['create_table_size'];

        mysqli_select_db($connect, $db);
                
    ?>
    <!-- Start Table Managment -->
    
    <div class="column mt-5 mb-5">
        <div class="container p-3 bg-green-color rounded">
            <form action="refresh_table.php" method="post">
                <input type="hidden" name="db" value="<?=$db?>">
                <input type="hidden" name="table_name" value="<?=$table_name?>">
                <input type="hidden" name="size" value="<?=$size?>">
                <table class="w-100">
                    <legend>
                        <span class="text-black-50 text-uppercase">
                            Table Columns
                        </span></legend>
                        <tr class="pt-5">
                            <th>Name</th>
                            <th>Type</th>
                            <th>Primary</th>
                            <th>Unique</th>
                            <th>Not Null</th>
                            <th>Foreign Key</th>
                        </tr>
                <?php
                    for($i=0; $i<$size; $i++)
                    {
                        ?>
                        <tr>
                            <td><input type="text" name="nameColumn[]" class="rounded outline-none" required/></td>
                            <td>
                                <select name="typeColumn[]" required class="rounded outline-none">
                                    <option value="int">Integer</option>
                                    <option value="double">Double</option>
                                    <option value="varchar">Varchar</option>
                                    <option value="boolean">Boolean</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <input type="radio" value="<?=$i?>" name="primary">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" value="<?=$i?>" name="unique[]">
                            </td>
                            <td class="text-center">
                                <input type="checkbox" value="<?=$i?>" name="not_null[]">
                            </td>
                            <td>
                                <select name="foreign[]" class="rounded outline-none">
                                    <option value="">none</option>
                                    <?php
                                        $query = "SELECT TABLE_NAME, COLUMN_NAME 
                                                    FROM INFORMATION_SCHEMA.key_column_usage 
                                                    WHERE table_schema = '$db' 
                                                    AND CONSTRAINT_NAME = 'PRIMARY' ";
                                        if($result = mysqli_query($connect, $query)){
                                            while($row = mysqli_fetch_row($result)){
                                                echo "<option value='".$row[0]."(".$row[1].")'>".$row[0]."(".$row[1].")</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>       
                </table>
                <input type="submit" value="Create" name="submit_create_table" class="submit_td btn main-btn rounded text-uppercase mt-3 px-5">
            </form>
        </div>
    </div>
    <!-- End Table Managment -->
    <?php
        include "../main/footer.php";

        
        
    ?>
    