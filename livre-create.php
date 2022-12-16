{{ include('header.php', {title: 'User', pageHeader: 'Saisir User'})}}
<main class="main">
    <div class="container">
        <div class="form_container">
        <h2>Saisir Livres</h2>
                <form action="{{ path }}livre/store" method="post">
                <div class="row">
                    <label>Isbn 
                        <input type="text" name="isbn" value="{{ livre.isbn }}">
                    </label>
                </div>
                <div class="row">
                    <label>Titre 
                        <input type="text" name="titre" value="{{ livre.titre }}">
                    </label>
                    </div>
                    <div class="row">
                    <label>Author 
                        <input type="text" name="author" value="{{ livre.author }}">
                    </label>
                    </div>
                <div class="row">
                    {%  if ( session.privilege_id == 1) or ( session.privilege_id == 2) %} 
                    <label>Genre
                        <select name="genre_idGenre">
                            <option value="">Select</option>
                            {% for genre in genres%}
                            <option value="{{ genre.id }}" {% if privilege.id == livre.genre_idGenre %} selected {% endif %}>{{ genre.genre }}</option>
                            {% endfor %}
                        </select>
                    </label>
                </div>
                    {% endif %} 
                    <input type="submit" value="Sauvegarder">
                </form>
    </main>
</body>
</html>