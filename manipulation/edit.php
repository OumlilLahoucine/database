<?php
include "../main/header.php";
include "../connexion/connexion.php";
global $connect;

$res = explode("_", $_GET["table"]);
 
$db = $res[0];
$table_name = $res[1];
$index = $_GET["index"];

$columns = null;
$query="";

mysqli_select_db($connect, $db);

if($result = mysqli_query($connect, "SHOW COLUMNS from ".$table_name)){
    $i = 0;
    while($row = mysqli_fetch_row($result)){
            $columns[$i] = $row;
            $i++;
    }
}
if($result1 = mysqli_query($connect, "select * from ".$table_name)){
    $nbr = mysqli_num_fields($result1);
    $i = 0;
    while($row3 = mysqli_fetch_row($result1)){
        if($i == $index)
        {
            
            $j = 0;
            echo "<form action='' method='POST'>
                <input type='hidden' name='selectedDb' value='".$db."'>
                <input type='hidden' name='selectedTable' value='".$table_name."'>
                <input type='hidden' name='numRow' value='".$index."'>
                <table>
            ";
            foreach($columns as $column){
                echo "<tr><td>".$column[0] .":</td><td><input type='text' name='".$row3[$j]."' value='".$row3[$j]."'></td></tr>";
                $j++;
            }
            echo "</table>";
            echo  "<input type='submit' name='update' value='modifier'></form>";
            
        }
        $i++;
    }
}
if(isset($_POST['update'])){
    
    if($result3 = mysqli_query($connect, "select * from ".$table_name)){
        $nbr = mysqli_num_fields($result3);
        $i = 0;
        $query = "update ".$table_name." set ";
        while($row3 = mysqli_fetch_row($result3)){
            if($i == $index)
            {
                $j=0;
                foreach($columns as $column){
                    if($j<$nbr-1)
                        $query .= $column[0] ." = '".$_POST[$row3[$j]]."', ";
                    else
                        $query .= $column[0] ." = '".$_POST[$row3[$j]]."' ";
                    $j++;
                    
                }
                break;
            }
            $i++;
        }
    }

    if($result3 = mysqli_query($connect, "select * from ".$table_name)){
        $query .="where ";
        $i = 0;
        while($row3 = mysqli_fetch_row($result3)){
            if($i == $index)
            {
                $j=0;
                foreach($columns as $column){
                    if($j<(mysqli_num_fields($result3)-1))
                        $query .= $column[0] ." = '".$row3[$j]."' and ";
                    else
                        $query .= $column[0] ." = '".$row3[$j]."'";
                    $j++;
                    
                }
                break;
            }
            $i++;
        }
    }
    echo $query;
    if($result4 = mysqli_query($connect, $query)){
        header("Location: data.php?table=".$_GET["table"]);
    }else{
        echo "<script>alert('Echec du modification de la ligne');</script>";
    }
}
include "../main/footer.php";
?>