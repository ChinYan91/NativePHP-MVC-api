<?php

class Database{
    function __Construct(){
        $config = file_get_contents("utilities/config.json");
        $config = (array) json_decode($config);
        $this->credential = (array) $config["database"];
    }

    function createConnection(){
        $hostname = $this->credential["hostname"];
        $username = $this->credential["username"];
        $password = $this->credential["password"]; 
        $database = $this->credential["database"];
        $port = $this->credential["port"];
        $this->connection = new mysqli($hostname, $username, $password, $database, $port);
    }

    function closeConnection(){
        $this->connection->close();
    }

    function query($sql){
        $this->createConnection();
        $result = $this->connection->query($sql);
        if(!$result){
            return [ "error" => 1, "messqge" => "There is an error in query"];
        }
        if($result->num_rows > 0){
            $rows = [];
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        $this->closeConnection();
    }

    function insert($sql, array $param){

        $this->createConnection();
        $stmt = $this->connection->prepare($sql);
        call_user_func_array([$stmt, 'bind_param'], $param);
        $stmt->execute();
        //echo var_dump($this->connection);
        $insertID = $stmt->insert_id;
        $stmt->close();
        $this->closeConnection();

        return $insertID;
    }

    function select($sql, array $param){
        $this->createConnection();
        if( $stmt = $this->connection->prepare($sql)){
            call_user_func_array([$stmt, 'bind_param'], $param);
            $exercution = $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){

                echo var_dump($this->connection); exit();
                $result = $exercution->get_result();
                $rows = [];
                while($row = $result->fetch_assoc()){
                    $rows[] = $row;
                }
                return $rows;
            }else{
                return "0 rows return";
            }
        }else{
            return "error preparing statement";
        }
        $stmt->free_result();
        $stmt->close();
        $this->closeConnection();
    }

    function update($sql, array $param){
        $this->createConnection();
        if(!($stmt = $this->connection->prepare($sql))){ 
            echo var_dump($this->connection->error);
        }
        call_user_func_array([$stmt, 'bind_param'], $param);
        echo var_dump($this->connection);
        if(!$stmt->execute()){
            trigger_error($stmt->error, E_USER_ERROR);
        }
        echo var_dump($stmt);
        $stmt->close();
        $this->closeConnection();

        return $insertID;
    }

    function delete($sql, array $param){

        $this->createConnection();
        if(!($stmt = $this->connection->prepare($sql))){ echo var_dump($this->connection); }
        call_user_func_array([$stmt, 'bind_param'], $param);
        $stmt->execute();
        $stmt->close();
        $this->closeConnection();

        return $insertID;
    }
}

$GLOBALS["database"] = new Database();

