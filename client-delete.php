<?php
print_r($_POST);
require_once './class/Crud.php';

$Crud = new Crud;
$delete = $Crud -> delete('Client', $_POST['id']);

$insert;
