<?php
require_once "utilities/database.class.php";

$database = New Database();

$sqlSelect = "SELECT * FROM score_result WHERE Status='Pending';";
$dataList = $database->query($sqlSelect);
//echo var_dump($dataList);
for($i=0; $i < count($dataList); $i++){
    $data = (array) $dataList[$i];
    $id = $data["ID"];
    $average = (float)$data['Score'] / (int) $data['Count'];
    $average = round($average,2);
    $sqlUpdate = "UPDATE score_result SET Status='Ready', Average =?, Modified_Date = NOW() WHERE ID =?";
    $type = "si";
    $param = [ $type, $average, $id ];
    $database->update($sqlUpdate, $param);
}
