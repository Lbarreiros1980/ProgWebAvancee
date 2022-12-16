{{ include('header.php', {title: 'New Client'})}}

<main class="main">
    <div class="container">
        <div class="form_container">
            <h2>Saisir</h2>
            <span class="error">{{ errors|raw }}</span>
        
            <form action="{{ path }}client/store" method="post">
                <div class="row">
                    <label>Nom 
                        <input type="text" name="nom" value="{{ data.nom }}">
                    </label>
                 </div>
                <div class="row">
                    <label>Adresse
                        <input type="text" name="adresse" value="{{ data.adresse }}">
                    </label>
                    </div>
                <div class="row">
                    <label>Ville
                    <input type="text" name="ville" value="{{ data.ville }}">
                    </label>
                    </div>
                <div class="row">
                    <input type="submit" value="Save">
                </div>
            </form>
        </div>
    </div>
</main>
</html>