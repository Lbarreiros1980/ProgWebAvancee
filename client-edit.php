<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ path }}css\main.css">
    <title>Librarie</title>
</head>
<body>
    <div class="container">
     <div class="nav">
        <ul>
            <li class="active"><a href="{{ path }}client/create">Nouveau Client</a></li>
            <li><a href="{{ path }}client">Liste de Clients</a></li>
            <li><a href="{{ path }}client/edit">Modifier</a></li>
            <li><a href="#">Livres</a></li>
        </ul>
        
    </div>
    <div class="form_container">
   
        <h1>Modifier</h1>

        <form action="{{ path }}client/update" method="post">
            <input type="hidden"  name="id" value="{{ client.id }}">
            <div class="row">
                <label>Nom 
                    <br>
                    <input type="text" name="nom" value="{{ client.nom}}">
                </label>
            </div>
            <div class="row">
                <label>Courriel
                    <br>
                    <input type="email" name="courriel" value="{{ client.courriel}}">
                </label>
            </div>
            <div class="row">
                <label>Adresse
                    <input type="text" name="adresse" value="{{ client.adresse}}">
                </label>
            </div>
            <div class="row">
                <label>Code Postale
                    <input type="text" name="zipCode" value="{{ client.zipCode}}">
                </label>
            </div>
            <div class="row">
                <label for="phone">Téléphone
                <input type="text" name="phone" value="{{ client.phone}}">
                </label>
            </div>
            <div class="row">
                <input type="submit" value="Modifier"> 
            </div>
                <form action="{{ path }}client/delete" method="post">
                    <input type="hidden" name="id" value="{{ client.id}}">
                    <input type="submit" value="Effacer">
                </form>
        </form>    
    </div>
</body>
</html>