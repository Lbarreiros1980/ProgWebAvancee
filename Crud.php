<?php  
//PDO cest une class maire de crud,. PDO viens avec php


class Crud extends PDO{

    public function __construct(){ //constructeur PDO -pre setted //quand on utilise CRUD la base de donnees est deja la!
        parent::__construct('mysql:host=localhost; dbname=librarie; port=8889; charset=utf8','root', 'root'); //_construct () c'est notre connexion avec la base de donnees. 
    }

    // FUNCTION/METHODE  pour prendre n'importe quelle table de notre base de donnees:

    public function select ($table, $field='id', $order='ASC'){
        $sql = "SELECT * FROM $table ORDER BY $field $order";  //la requete
        $stmt = $this-> query($sql);
        $query = $stmt-> fetchAll(); //- il vas me donner un objet que on vas transformer mes donnees en tableau multidimensionnel
        return $query;
    }

    public function selectId ($table, $value, $field='id', $url = 'client-index.php'){
        $sql = "SELECT * FROM $table WHERE $field = :$field" ; 
        
        $stmt = $this-> prepare($sql); //$this = le constructor de ma function __construct 
        $stmt->bindValue(":$field", $value);
        $stmt->execute(); // EVITER INJECTION SQL avec "PREPARE", BIND VALUE LA VALEUR , puis on execute.
        $count = $stmt->rowCount();
        if($count== 1){    //validation logique si tu cherche un id est la reponse eh == 1 go fetch it.
            return $stmt->fetch();
        }else {
            header("location: $url");
        }
    }

    public function insert ($table, $data){
        $nomChamp = implode(", ",array_keys($data));
        $valeurChamp = ":" .implode(" , :", array_keys($data));
// 
        $sql = "INSERT INTO $table ($nomChamp) VALUES($valeurChamp)";

        $stmt = $this-> prepare($sql);
        foreach($data as $key=>$value){
            $stmt -> bindValue (":$key" , $value);
        }
            //la cle c'est:nom, la valeur c'est:peter
            //:nom, peter
            //:addresse, pie IX
            //:postal code, 123
   

    if (!$stmt -> execute()){  // si le ssisteme execute le bindValue et il a un erreur:
            
            return $stmt-> errorInfo();

        }else{
            //si tout est ok
            return $this->lastInsertId();
        }
    }

    public function update ($table, $data, $champId = 'id'){

        $champRequete = null;

        foreach($data as $key=>$value){
            $champRequete .= ":$key = :$key, ";
        }
        $champRequete = rtrim ($champRequete, ", "); //rtrim -> nettoyer la derniere virgule de la donnee

        $sql = "UPDATE $table SET $champRequete WHERE $champId = :$champId";

        $stmt = $this-> prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue (":$key" , $value);
        }
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
            header('Location: '. $_SERVER['HTTP_REFERER']);
        }
    }

    public function delete ($table, $id, $champId = 'id', $url='client-index.php'){

        $sql = "DElETE FROM $table WHERE $champId = :$champId";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$champId", $id);
        if (!$stmt-> execute()){
            print_r($stmt-> errorInfo());  
        }else{
            header('Location: '. $url);
        }
    }
}
