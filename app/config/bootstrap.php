<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = new Dotenv();

/*
 * Charge les variables d'environnement depuis le .env s'il existe
 * (les variables déjà définies, par Docker ou la CI, ont priorité).
 */
if (is_readable(dirname(__DIR__) . '/.env')) {
    $dotenv->bootEnv(dirname(__DIR__) . '/.env');
}
