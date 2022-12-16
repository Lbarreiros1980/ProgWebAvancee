{{ include('header.php', {title: 'Edit Client', pageHeader:'Modifier'})}}
<main>
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
                <label>Ville
                <select name="ville_id">
                    {% for ville in villes %}
                        <option value="{{ ville.id }}" 
                        {% if ville.id == client.ville_id %} selected {% endif %}> 
                        {{ ville.ville }}</option>
                    {% endfor %}
                </select>
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
</main>
</body>
</html>