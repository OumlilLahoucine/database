<?php
        include "../connexion/connexion.php";

        global $connect;
        $db = $_POST["db"];
        $table_name = $_POST["table_name"];
        mysqli_select_db($connect, $db);

        if(isset($_POST['insert'])){
            if($result = mysqli_query($connect, "SHOW COLUMNS from ".$table_name)){
                $nbr = mysqli_num_rows($result);
                $i = 0;
                $j = 0;
                $query = "insert into ".$table_name." values (";
                while($row = mysqli_fetch_row($result)){
                    
                    if($j<$nbr-1)
                        $query .= "'".$_POST[$row[$i]]."', ";
                    else
                        $query .= "'".$_POST[$row[$i]]."'";
                    $j++;
                    $i++;
                }
            }
            $query .= ")";

            if($result2 = mysqli_query($connect, $query)){
                header("Refresh:0; url=data.php?table=".$db."_".$table_name);
            }else{
                echo "<script>alert('Echec du insertion de la ligne');</script>";
            }
        }
        
    ?>