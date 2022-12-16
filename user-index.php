{{ include('header.php', {title: 'user', pageHeader: 'User list'})}}
    <main>
        <section>
        {% if session.privilege_id == 1 %}
            <a href="{{ path }}user/index" class="btn">Ajouter</a>
        {% endif %}   
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Username</th> 
                        <th>Privilege</th> 
                        <!-- <th>Edit</th>                        -->
                    </tr> 
                </thead>
                <tbody>
                    {% for user in users %}
                    <tr>
                        <td>{{ user.nom }}</td>
                        <td>{{ user.username }}</td>
                        <td>{{ user.Privilege_id }}</td>
                        
                        <!-- <td><a href="{{ path }}user/edit/{{ user.id}}">Edit</a></td> -->
                        
                    </tr>
                    {% endfor %}
                </tbody>
            </table>
        </section>
    </main>
  
</body>
</html>