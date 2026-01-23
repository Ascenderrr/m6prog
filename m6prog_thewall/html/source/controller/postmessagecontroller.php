<?php
require_once __DIR__ . '/../dataclasses/user.php';

class PostMessageController
{
    public function handlePost()
    {

        $name = $_POST['name'] ?? '';
        $bericht = $_POST['bericht'] ?? '';

        $user = new User(0, $name, $bericht);
        $user->insert();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    public function handlePostFromJson()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        
        $name = $data['sign'] ?? '';
        $bericht = $data['text'] ?? '';
        
        $user = new User(0, $name, $bericht);
        $user->insert();
    }
}   