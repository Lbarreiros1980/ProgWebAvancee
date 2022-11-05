<?php  

if(isset($_GET['id'])){  

    $id = $_GET['id'];  
    require_once "class/Crud.php";
    
    $Crud = new Crud;
    $client = $Crud-> selectId('Client', $id);
    //print_r ($client);
    extract($client); // pour avoir tout les donnees du client comme des variables.


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
    <title>Document</title>
</head>
<body>
    <div class="form_container">
    <h1>Modifier</h1>
        <form action=""  method="post">
            <div class="row">
                <label for="nom">Nom</label>
                <input type="name" name="nom" placeholder=<?php echo $nom; ?>>
            </div>
            <div class="row">
                <label for="email">Courriel</label>
                <input type="email" name="courriel" placeholder=<?php echo $courriel; ?>>
            </div>
            <div class="row">
                <label for="adresse">Adresse</label>
                <input type="name" name="adresse" placeholder=<?php echo $adresse; ?>>
            </div>
            <div class="row">
                <label for="zipCode">Code Postale</label>
                <input type="name" name="zipCode" placeholder=<?php echo $zipCode; ?>>
            </div>
            <div class="row">
                <label for="phone">Téléphone</label>
                <input type="phone" name="phone" placeholder=<?php echo $zipCode; ?>>
            </div>
        <p> <a href="client-edit.php?id= <?php echo $id; ?>">Modifier</a></p>
    
</body>
</html>