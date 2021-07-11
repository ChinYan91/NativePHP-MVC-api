<?php
require_once "models/score.model.php";

class ScoreController{
    static function migration(){
        $result = ScoreModel::migration();
        echo (!$result)? "score_result Table \n Successfully Created or \n already Exist" : " Table fail created";
    }

    static function tableStructure(){
        $result = ScoreModel::tableStructure();
        echo json_encode($result);
        echo "<script>console.log('res => ', ".json_encode($result).")</script>";

    }

    static function insert(){
        if(!empty($_POST['data'])){
            $data=  json_decode($_POST['data']);
            $data = (array) $data;
            $name = $data['first_name']." ".$data['last_name'];
            $score = $data['score'];
            $count = $data['count'];

            //echo("name : ".$name."\nscore : ".$score."\ncount : ".$count."\n");
            $insertID = ScoreModel::insert($name, $score, $count);
            if($insertID){
                echo json_encode([ "error"=>0 , "insertID" => $insertID]);
            }else{
                echo json_encode([ "error"=>1 , "message" => "insert failed"]);
            }
        }else{
            echo json_encode(["error"=>1,"message"=>"Unauthorized"]);
        }
    }

    static function selectOne(){
        $id = $_GET["id"];
        $result = ScoreModel::selectOne($id);
        echo json_encode(["error" => 0, "data" => $result]);

    }

    static function update(){
        $data=  json_decode($_POST['data']);
            $score = $data->score;
            $count = $data->count;
            $id = $data->id;
        $result = ScoreModel::update($score,$count,$id);
        echo json_encode(["error" => 0, "data" => "data updated"]);
    }

    static function delete(){
        $id = $_POST["id"];
        $result = ScoreModel::delete($id);
        echo json_encode(["error" => 0, "data" => $result]);

    }
}