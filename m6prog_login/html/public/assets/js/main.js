async function hashPassword(password) {
    const encoder = new TextEncoder();
    const data = encoder.encode(password);
    
    const hashBuffer = await crypto.subtle.digest("SHA-256", data);
    const hashBase64 = new Uint8Array(hashBuffer).toBase64();
    
    return hashBase64;
}

async function login() {
    // Haal user en password uit de elementen
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    
    // Maak een JSON object (verstuur plain text wachtwoord via HTTPS)
    const data = {
        username: username,
        password: password
    };
    
    // POST naar login.php
    const response = await fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });
    
    // Haal de text uit de response
    const result = await response.text();
    
    // Zet de text in de result section
    document.getElementById('result').innerHTML = result;
}



