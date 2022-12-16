{{ include('header_client.php', {title: 'Client Details'})}}
<div class="form_container">
        <p><strong>Nom : </strong>{{client.nom}}</p>
        <p><strong>Adresse : </strong>{{client.adresse}}</p>
        <p><strong>Postal Code :</strong>{{ client.postal_code }}</p>
        <p><strong>Courriel : </strong>{{ client.courriel }}</p>
        <p><a href="{{ path }}client/edit/{{client.id}}">Modifier</a></p>
</div>
</body>
</html>

