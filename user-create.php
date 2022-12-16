{{ include('header.php', {title: 'User', pageHeader: 'Saisir User'})}}
<main class="main">
    <div class="container">
        <div class="form_container">
            <form action="{{ path }}user/store" method="post">
            <div class="row">
                <label>Nom 
                    <input type="text" name="nom" value="{{ data.nom }}">
                </label>
            </div>
            <div class="row">
                <label>Username 
                    <input type="email" name="username" value="{{ user.username }}">
                </label>
            </div>
            <div class="row">
                <label>Password 
                    <input type="password" name="password">
                </label>
            </div>
            <div class="row">
                <label>Privilege 
                <select name="privilege_id">
                        <option value="">Select</option>
                        {% for privilege in privileges%}
                        <option value="{{ privilege.id }}" {% if privilege.id == user.privilege_id %} selected {% endif %}>{{ privilege.privilege }}</option>
                        {% endfor %}
                    </select>
                </label>
                </div>
            <div class="row">
                <input type="submit" value="Sauvegarder">
            </form>
        </div>
    </div>
 </main>