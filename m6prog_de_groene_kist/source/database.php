<?php

// filepath: source/database.php

require_once(__DIR__ . '/config.php');

// Maak een database verbinding met de constanten uit config.php
$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check op fouten
if ($connection->connect_error) {
    die('Database verbinding mislukt: ' . $connection->connect_error);
}