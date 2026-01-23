<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/styling/style.css">
    <script src="assets/js/main.js" defer></script>
</head>
<body>
    <div class="container">
        <h2>UserName:</h2>
        <input type="text" id="username" placeholder="Username">
        
        <h2>Password:</h2>
        <input type="password" id="password" placeholder="Password">
        
        <button onclick="login()">Submit</button>
        
        <section id="result"></section>
    </div>
</body>
</html>