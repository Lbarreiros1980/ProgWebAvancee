<?php
print_r($_POST);
require_once './class/Crud.php';

    if($_POST['delete']){
        $Crud = new Crud;
        $delete = $Crud -> delete('client', $_POST['id']);
    
}else {

$Crud = new Crud;
$update = $Crud ->update('Client', $_POST);
header('Location: client-show.php');

}

// echo $update;
// print_r ( $update);  //pour afficher un tableau