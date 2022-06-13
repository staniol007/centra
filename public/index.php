<?php
require_once \dirname(__DIR__) . '/vendor/autoload.php';

// store all environment variables from .env
(new \Symfony\Component\Dotenv\Dotenv())
    ->usePutenv(true)
    ->loadEnv(\dirname(__DIR__)  . '/.env');

// Don't display errors on productions
if (\getenv('APP_ENV') != \App\Library\Type\Env::PRODUCTION->value) {
    \ini_set('display_errors', 1);
    \error_reporting(\E_ALL);
}

// Pseudo Front Controller Design :)
// get controller name
$controller = $_GET['_c'] ?? 'Index';
// get action name
$action = $_GET['_a'] ?? 'index';

$controllerClassName = '\App\Controller\\' . \ucfirst(\strtolower($controller));
$actionMethodName = \strtolower($action);

if (\class_exists($controllerClassName) === false) {
    throw new \Exception(\sprintf("Controller '%s' not found", $controllerClassName));
}

if (\method_exists($controllerClassName, $actionMethodName) === false) {
    throw new \Exception(\sprintf("Missing action: '%s' in controller: '%s'", $actionMethodName, $controllerClassName));
}

(new $controllerClassName())->$actionMethodName();
