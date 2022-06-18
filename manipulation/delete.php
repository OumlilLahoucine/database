<?php
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
            $query = "delete from $table_name where ";
            $j = 0;
            foreach($columns as $column){
                if($j<$nbr-1){
                    $query .= $column[0] ." = '".$row3[$j]."' and ";
                }else{
                    $query .= $column[0] ." = '".$row3[$j]."'";
                }
                $j++;
            }
        }
        $i++;
    }
}
if($result2 = mysqli_query($connect, $query)){
    header("Location: data.php?table=".$_GET["table"]);
}else{
    echo "<script>alert('Echec du suppression de la ligne');</script>";
}
?>