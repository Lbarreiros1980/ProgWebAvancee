<?php  

if(isset($_GET['id'])){  

    $id = $_GET['id'];  
    require_once "class/Crud.php";
    
    $Crud = new Crud;
    $client = $Crud-> selectId('client', $id);
    // print_r ($client);
    extract ($client); // pour avoir tout les donnees du client comme variables.


}else{
    
    header('Location: client-index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Librarie</title>
</head>
<body>
<div class="container">
    <div class="nav">
        <ul>
            <li><a href="./client-create.php">Nouveau Client</a></li>
            <li><a href="./client-index.php">Liste de Clients</a></li>
            <li class="active"><a href="./client-edit.php">Modifier</a></li>
            <li><a href="#">Livres</a></li>
        </ul>
    </div>
    <div class="form_container">
   
        <h1>Modifier</h1>

        <form action="client-update.php"  method="post">
        <input type="hidden"  name="id" value="<?php echo $id;?>">
        <div class="row">
            <label>Nom 
                <br>
                <input type="text" name="nom" value="<?php echo $nom;?>">
            </label>
        </div>
        <div class="row">
            <label>Courriel
                <br>
                <input type="email" name="courriel" value="<?php echo $courriel;?>">
            </label>
        </div>
        <div class="row">
            <label>Adresse
                <input type="text" name="adresse" value="<?php echo $adresse;?>">
            </label>
        </div>
        <div class="row">
            <label>Code Postale
                <input type="text" name="zipCode" value="<?php echo $zipCode;?>">
            </label>
        </div>
        <div class="row">
            <label for="phone">Téléphone
            <input type="text" name="phone" placeholder="<?php echo $phone;?>">
            </label>
        </div>
        <input type="submit" value="Modifier"> 
        <input type="submit" value="Effacer" name="delete">
        </div>
    </form>    
</div>
<!-- <form action="client-delete.php" method="post">
        <a href="client-edit.php?id= <?php echo $id; ?>">Modifier</a>
        <a href="client-delete.php?id= <?php echo $id; ?>">Effacer</a>
        <input type="hidden"  name="id" value="<?php echo $id;?>">
        <input type="submit" value="Effacer">
</form> -->
</body>
</html>
