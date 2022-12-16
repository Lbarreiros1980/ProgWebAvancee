<?php

class RequirePage{
    static public function requireModel($model){
        return require_once "model/$model.php";
    }
    static public function redirectPage($page){
        return header("Location: http://localhost:8888/AUTUMN_2022/PROG_WEB_AVANCEE(PHP)/TP3_PHP/".$page);
    }
}

?>