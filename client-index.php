<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link rel="stylesheet" href="{{ path }}css\main.css">

</head>
<body>
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

    <main>
        <section>
            <br>
            <br>
            <br>
            <table>
                <thead>
                    <tr>
                        <th align = "center" colspan="6">
                        <h2>{{ client_list }}</h2>
                        </th>
                    </tr>
                    <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Postal Code</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Courriel</th>
                    <th scope="col">Edit</th>
                </tr>
                </thead>
                <tbody>
                    {% for client in clients %}
                    <tr>
                        <td>{{ client.nom }}</td>
                        <td>{{ client.adresse }}</td>
                        <td>{{ client.zipCode }}</td>
                        <td>{{ client.phone }}</td>
                        <td>{{ client.courriel }}</td>
                        <td><a href="{{ path }}client/edit/{{ client.id}}">Vue</a></td>
                    </tr>
                    {% endfor %}
                </tbody>
            </table>
            <br>
            <button><a href="{{ path }}client/create">Add New Clients</a></button>
        </section>
    </main>
    <footer>
        Tous les droits
    </footer>
</body>
</html>