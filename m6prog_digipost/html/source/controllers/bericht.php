<?php
require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../DataClasses/bericht.php';

function handleGet() {
    // format: /bericht of /bericht/5
    $request_url = explode('/', $_SERVER['REQUEST_URI']);
    
    if (isset($request_url[2]) && !empty($request_url[2])) {
        $id = (int)$request_url[2];
        $bericht = Bericht::GetBerichtById($id);
        
        if ($bericht) {
            echo json_encode([
                'data' => $bericht
            ]);
        }
    } else {
        $berichten = Bericht::GetAllBerichten();
        echo json_encode([
            'count' => count($berichten),
            'data' => $berichten
        ]);
    }
}

$method = $_SERVER['REQUEST_METHOD'];

header('Content-Type: application/json');
 
if ($method === 'GET') {
    handleGet();
}
