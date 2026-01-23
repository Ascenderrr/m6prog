<main>
    <section class="content-section login-section">
        <h2>Inloggen</h2>
        <div class="login-container">
            <div class="login-form">
                <div class="form-group">
                    <label for="username">Gebruikersnaam:</label>
                    <input type="text" id="username" placeholder="Voer je gebruikersnaam in">
                </div>
                
                <div class="form-group">
                    <label for="password">Wachtwoord:</label>
                    <input type="password" id="password" placeholder="Voer je wachtwoord in">
                </div>
                
                <button onclick="login()" class="login-btn">Inloggen</button>
                
                <section id="result" class="login-result"></section>
            </div>
        </div>
    </section>
</main>
