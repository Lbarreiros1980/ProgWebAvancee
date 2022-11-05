<?php
print_r($_POST);
require_once 'class/Crud.php';

$Crud = new Crud;
$insert = $Crud -> insert('Client', $_POST);

$insert;
header('Location: client-index.php');
