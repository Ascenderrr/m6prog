<?php

include_once __DIR__ . "/../source/database.php";
include_once __DIR__ . "/../source/DataClasses/login.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $json = file_get_contents("php://input");
    $data = json_decode($json);
} else {
    http_response_code(500);
    exit;
}

$username = $data->username ?? '';
$password = $data->password ?? '';

$user = Login::GetUserByName($connection, $username);

if (!$user) {
    http_response_code(404);
    echo "Gebruiker niet gevonden.";
    exit;
}

if ($user->VerifyPassword($password)) {
    // Start sessie en sla gebruiker op
    session_start();
    $_SESSION['user_id'] = $user->idlogin;
    $_SESSION['username'] = $user->username;
    
    echo "<p>Welkom " . htmlspecialchars($user->username) . "! Je bent succesvol ingelogd.</p>";
} else {
    http_response_code(401);
    echo "Wachtwoord is incorrect.";
}
