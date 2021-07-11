<?php
class ScoreModel{
    static function migration(){
        global $database;
        $sql = " CREATE TABLE IF NOT EXISTS score_result( 
            `ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            `Name` VARCHAR(255) NOT NULL, 
            `Score` VARCHAR(255) NOT NULL, 
            `Count` VARCHAR(255) NOT NULL, 
            `Average` VARCHAR(255) DEFAULT NULL, 
            `Status` VARCHAR(255) NOT NULL DEFAULT 'Pending', 
            `Modified_Date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ) ENGINE = INNODB; ";
        $result = $database->query($sql);
        return $result;
    }

    static function tableStructure(){
        global $database;
        $sql = "describe score_result;";
        $result = $database->query($sql);
        return $result;
    }

    static function insert($name,$score,$count){
        global $database;
        $sql = "INSERT INTO score_result(Name,Score,Count) VALUES(?,?,?);";
        $type = "sss";
        $param = [ $type, $name, $score, $count ];
        //echo var_dump($param);
        $insertID = $database->insert($sql, $param);
        return $insertID;
    } 

    static function selectOne($id){
        global $database;
        $sql = "SELECT * FROM score_result WHERE ID = ?";
        $injection = "select * from score_result where ID = ".$id.";";
        $param = ["s", $id];
        //$result = $database->select($sql, $param);
        $result = $database->query($injection);
        return $result;
    } 

    static function update($score,$count,$id){
        global $database;
        $sql = "UPDATE score_result SET Score=?, Count=?, Status='Panding', Average = null WHERE ID =?";
        echo $injection;
        $type = "ssi";
        $param = [ $type, $score, $count, $id ];
        $insertID = $database->update($sql, $param);
        return $insertID;
    } 

    static function delete($id){
        global $database;
        $sql = "DELETE FROM score_result WHERE ID = ?";
        $injection = "DELETE FROM score_result where ID = ".$id.";";
        $param = ["i", $id];
        $result = $database->delete($sql, $param);
        //$result = $database->query($injection);
        return $result;
    } 


}