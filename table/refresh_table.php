
<?php
include "../connexion/connexion.php";

        global $connect;

        if(isset($_POST["submit_create_table"])){
            $table_name = $_POST['table_name'];
            $size = $_POST['size'];
            $db = $_POST['db'];
            $column = $_POST['nameColumn'];
            $type = $_POST['typeColumn'];

            if(isset($_POST['primary']))
                $primary = $_POST['primary'];
            if(isset($_POST['unique']))
                $unique = $_POST['unique'];
            if(isset($_POST['not_null']))
                $not_null = $_POST['not_null'];
            if(isset($_POST['foreign']))
                $foreign = $_POST['foreign'];
            
            $str = "";
            
            for($i=0; $i<$size; $i++)
            {
                $str .= $column[$i]." ".$type[$i]."";
                if($type[$i] == "varchar")
                    $str .= "(255)";
                if(isset($primary) && $i == $primary)
                    $str .= " primary key";
                if(isset($not_null) && in_array($i, $not_null))
                    $str .=  " not null";
                if(isset($unique) && in_array($i, $unique))
                    $str .= " unique";
                $str .= ",";
                if(isset($foreign) && $foreign[$i] != "")
                    $str .= " foreign key (".$column[$i].") references " . $foreign[$i] . ",";
                
            }
            $str = substr($str, 0, -1);
            
            mysqli_select_db($connect, $db);
            $query = "CREATE TABLE ".$table_name." (".$str.")";
            $result = mysqli_query($connect, $query);

            header("Refresh:0; url=table.php");
        }
        if(isset($_POST['submit_delete_table'])){
            $db = $_POST['database'];
            $table_name = $_POST['table_delete'];
            mysqli_select_db($connect, $db);
            $query = "drop table ".$table_name;
            $result = mysqli_query($connect, $query);
            header("Refresh:0; url=table.php");
        }
?>