<?php
    require_once "class/Crud.php";

$Crud = new Crud;

$client = $Crud-> select('Client'); 
$client = $Crud-> select('Client', 'nom', 'DESC'); 


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
           <li class=""><a href="./client-create.php">Nouveau Client</a></li>
           <li class="active"><a href="./client-index.php">Liste de Clients</a></li>
           <li class=""><a href="./client-edit.php">Modifier</a></li>
           <li><a href="#">Livres</a></li>
      </ul>
   </div>
   
    <div class="form_container">
    <h1>Liste des Clients</h1>
        <table>
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Postal Code</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Courriel</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    foreach($client as $row){
    
                ?>
                    <tr>
                        <td><a a href="client-edit.php?id=<?php echo $row['id'] ?>"><?php echo $row['nom'] ?> </a></td>
                        <td><?php echo $row['adresse'] ?></td>
                        <td><?php echo $row['zipCode'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['courriel'] ?></td>
                    </tr>
                <?php       
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>