{{ include('header-login.php', {title: 'Home'})}}

<body>
    <main >
            
        <div class="container">	
            <span class="error">{{ errors|raw }}</span>

            <div class="form_container">
                <h1>Log in</h1>
                <span class="error">{{ errors|raw }}</span>
            <form action="{{ path }}user/auth" method="post">
                <div class="row">
                    <label for="username">Username</label>
                    <input type="email" name="username" value="{{ user.username }}" placeholder="username@mail.com" required>
                 </div>
                <div class="row">
                    <label for="password">Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" value="Connecter">Submit</button>
                </form>
        </div>
    </main>
</body>
</html>