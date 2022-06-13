<?php
require_once \dirname(__DIR__) . '/vendor/autoload.php';

// store all environment variables from .env
(new \Symfony\Component\Dotenv\Dotenv())
    ->usePutenv(true)
    ->loadEnv(\dirname(__DIR__) . '/.env');

// Don't display errors on productions
if (\getenv('APP_ENV') != \App\Library\Type\Env::PRODUCTION->value) {
    \ini_set('display_errors', 1);
    \error_reporting(\E_ALL);
}

(new \App\Library\FrontController())
    ->run();
