<?php
/**
 * Toon alle errors (voor development)
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Parse .env bestand
 */
$env_array = parse_ini_file(dirname(__DIR__, 1) . '/.env');

/**
 * Definieer database constanten
 */
define('DB_HOST', isset($env_array['DB_HOST']) ? $env_array['DB_HOST'] : '127.0.0.1');
define('DB_NAME', isset($env_array['DB_NAME']) ? $env_array['DB_NAME'] : 'music_library');
define('DB_USERNAME', isset($env_array['DB_USERNAME']) ? $env_array['DB_USERNAME'] : 'music_user');
define('DB_PASSWORD', isset($env_array['DB_PASSWORD']) ? $env_array['DB_PASSWORD'] : 'wachtwoord');

/** 
 * Maak MySQLi database verbinding
 */
$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($connection->connect_error) {
    die('Database verbinding mislukt: ' . $connection->connect_error);
}
