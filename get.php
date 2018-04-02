<?php
include("config.php");

$table = $_GET['table'];
$id = $_GET['id'];

if($table == ''){
    $a = array ('status' => '403', 'message' => 'Table name is required.');
    header("Content-type: application/json");
    echo json_encode($a);
}else{
    $sql = "SELECT * FROM ".$table;

    if(strlen($id)){
        $sql = $sql." WHERE id = ".$id;
    }

    $result = mysqli_query($conn, $sql);
    $arr = array();
    if(mysqli_num_rows($result) > 0){
        while($rows = mysqli_fetch_assoc($result)){
            array_push($arr, $rows);
        }
    }
    header("Content-type: application/json");
    $a = array ('status' => '200', 'lists' => $arr);
    echo json_encode($a);
}
?>