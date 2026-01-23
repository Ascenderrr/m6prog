<?php
 
include_once __DIR__ . "/../source/database.php";
include_once __DIR__ . "/../source/dataclasses/user.php";
 
if($_SERVER["REQUEST_METHOD"] === "POST" )
{
  $json = file_get_contents("php://input");
  $data = json_decode($json);
}
else
{
    http_response_code(500);
     exit;
}
 
 
$username = $data->username ?? '';
$password = $data->password ?? ''; 

$user = User::GetUserByName($connection, $username);
 
if (!$user) {
    http_response_code(404);
    echo "Gebruiker niet gevonden.";
    exit;
}
 
if ($user->VerifyPassword($password))
{
    echo "<p>User logged in: " . $user->displayname . "</p>";
}
else
{
    http_response_code(401);
    echo "wachtwoord verkeerd";
}
