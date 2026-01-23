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

define('DB_HOST', isset($env_array['DB_HOST']) ? $env_array['DB_HOST'] : 'not set');
define('DB_SCHEMA_NAME', isset($env_array['DB_SCHEMA_NAME']) ? $env_array['DB_SCHEMA_NAME'] : 'not set');
define('DB_USERNAME', isset($env_array['DB_USERNAME']) ? $env_array['DB_USERNAME'] : 'not set');
define('DB_PASSWORD', isset($env_array['DB_PASSWORD']) ? $env_array['DB_PASSWORD'] : 'not set');
