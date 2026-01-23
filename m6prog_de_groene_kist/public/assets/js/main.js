async function hashPassword(password) {
    const enc = new TextEncoder();
    const data = enc.encode(password);
    const hashBuffer = await crypto.subtle.digest('SHA-256', data);
    const hashArray = Array.from(new Uint8Array(hashBuffer));
    const hashHex = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
    return hashHex;
}
 
async function login() {
    const userEl = document.getElementById('username');
    const passEl = document.getElementById('password');
    const resultEl = document.getElementById('result');
 
    const username = userEl ? userEl.value.trim() : '';
    const password = passEl ? passEl.value : '';
 
    if (!username) {
        resultEl.textContent = 'Vul een gebruikersnaam in';
        return;
    }

    if (!password) {
        resultEl.textContent = 'Vul een wachtwoord in';
        return;
    }
 
    try {
        const resp = await fetch('/login_api.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username: username, password: password })
        });
 
        const text = await resp.text();
        resultEl.innerHTML = text;

        // Redirect naar home na succesvolle login
        if (resp.ok) {
            setTimeout(() => {
                window.location.href = '/';
            }, 1500);
        }
    } catch (err) {
        resultEl.textContent = 'Fout bij verzenden: ' + err;
    }
}
 