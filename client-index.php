{{ include('header.php', {title: 'Client', pageHeader: 'Client list'})}}

<main>
        <section>
        {% if session.privilege_id == 1 %} 
        <!--  se la personne a les droits admin ou employee  elle aura access a cette session-->
            <a href="{{ path }}client/create" class="btn">Ajouter</a>
        {% endif %}   
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Adresse</th> 
                        <th>Ville</th> 
                        <th>Edit</th>                           
                    </tr> 
                </thead>
                <tbody>
                    {% for client in clients %}
                    <tr>
                        <td>{{ client.nom }}</td> 
                        <!-- "nom" doive etre = dans les input = dans le fillable -->
                        <td>{{ client.adresse}}</td>
                        <td>{{ client.ville_id}}</td>
                        <td><a href="{{ path }}client/edit/{{ client.id}}">Edit</a></td>
                        <!-- path = une variable globale de chemin qui est defini sur library/twig/ line 8 -->
                    </tr> 
                    {% endfor %}
                </tbody>
                
            </table>
        </section>
    </main>
   
</body>
</html>

