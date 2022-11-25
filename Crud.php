<?php

abstract class Crud extends PDO {

    public function __construct(){
        parent::__construct('mysql:host=localhost; dbname=e2194603; charset=utf8', 'e2194603', 'KtRHNY8lur3M8MkeUWDm');
    }

    public function select($champ='id', $order='ASC' ){
        $sql = "SELECT * FROM $this->table ORDER BY $champ $order";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
    }

    public function selectId($value){
        $sql ="SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            return $stmt->fetch();
        }else{
            header("location: ../../home/error");
        }
    }

    public function insert($data){
        $data_keys = array_fill_keys($this->fillable, ''); // funçao que separa as keys do tableau fillable et enche ele com valueus vazios, assim dah pra comparar a table do post com a table do fillable
        $data_map = array_intersect_key($data, $data_keys); // ixi il fait na comparasion du tableau POST avec celui do fillable (ce qu"il n'est pas la vas ne vas pas rentrer dans le fillable et on vas pas avoir un erreur non plus)
        
        $nomChamp = implode(", ",array_keys($data_map));
        $valeurChamp = ":".implode(", :", array_keys($data_map));
        $sql = "INSERT INTO $this->table ($nomChamp) VALUES ($valeurChamp)";
        $stmt = $this->prepare($sql);
        foreach($data_map as $key=>$value){
            $stmt->bindValue(":$key", $value);
        } 
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{

            return $this->lastInsertId();
        }
    }
    
    public function update($data){
        $champRequete = null;
        foreach($data as $key=>$value){
            $champRequete .= "$key = :$key, ";
        }
        $champRequete = rtrim($champRequete, ", ");

        $sql = "UPDATE $this->table SET $champRequete WHERE $this->primaryKey = :$this->primaryKey";

        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        } 
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
           // header('Location: ' . $_SERVER['HTTP_REFERER']);
           return true;
        }
    }

    public function delete($id){

        $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $id);
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
            return true;
        }
    }
}


?>