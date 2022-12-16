<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ path }}css\main.css">
</head>
<body>
    <aside>
    {% if errors is defined %}
            <span class="error">{{ errors | raw}}</span>
        {% endif %}
    </aside>

    <div class="container">
        <div class="nav">
            <ul>
                <li><a  class="logo"><h2>LIBRARIE</h2> </a></li>
                    {% if guest %}
                <li><a href="{{ path }}user/login"></a></li>
                    {% else %}
                <li><a href="{{ path }}user/logout">Logout</a></li>
                    {% endif %}
            </ul>
        </div>
    </div>

