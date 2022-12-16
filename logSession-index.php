{{ include('header.php', {title: 'user', pageHeader: 'User list'})}}
    <main>
        <section>
        {% if (session.privilege_id == 1) or (session.privilege_id == 2)  %} 
            <a href="{{ path }}livre/create" class="btn">Ajouter</a>
        {% endif %}   
            <table>
                <thead>
                    <tr>
                        <th>Isbn</th>
                        <th>Titre</th> 
                        <th>Author</th> 
                        <th>Edit</th>                       
                    </tr> 
                </thead>
                <tbody>
                    {% for livre in livres %}
                    <tr>
                        <td>{{ livre.isbn }}</td>
                        <td>{{ livre.titre }}</td>
                        <td>{{ livre.author }}</td>
                        <td><a href="{{ path }}livre/show/{{ livre.id }}">Edit</a></td>
                    </tr>
                    {% endfor %}
                </tbody>
                
            </table>
        </section>
    </main>
</body>
</html>