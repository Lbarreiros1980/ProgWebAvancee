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
            <li class="active"><a href="./client-create.php">Nouveau Client</a></li>
            <li><a href="./client-index.php">Liste de Clients</a></li>
            <li><a href="./client-edit.php">Modifier</a></li>
            <li><a href="#">Livres</a></li>
        </ul>
   </div>
   
   <div class="form_container">
    <h1>Nouveau Client</h1>
        <form action="client-store.php"  method="post">
            <div class="row">
                <label for="nom">Nom</label>
                <input type="name" name="nom" placeholder="Prénom et nom">
            </div>
        <div class="row">
            <label for="email">Courriel</label>
            <input type="email" name="courriel" placeholder="courriel@example.com">
        </div>
        <div class="row">
            <label for="adresse">Adresse</label>
            <input type="name" name="adresse" placeholder=" adresse residentiel">
        </div>
        <div class="row">
            <label for="zipCode">Code Postale</label>
            <input type="name" name="zipCode" placeholder="H1H1H1">
        </div>
        <div class="row">
            <label for="phone">Téléphone</label>
            <input type="name" name="phone" placeholder=" (514)5554433">
        </div>
        <button type="submit" value="Save">Enregistrer</button>
        </form>
</div>
    </footer> 
   </div>
</div>
</body>