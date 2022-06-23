<?php declare(strict_types=1);

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 */

use Symfony\Component\Dotenv\Dotenv;

require \dirname(__DIR__) . '/vendor/autoload.php';

if (\method_exists(Dotenv::class, 'bootEnv') === false) {
    throw new \Exception('Method bootEnv does not exist');
}

// set all environments from the .env / .env.local file
(new Dotenv())
    ->usePutenv(true)
    ->bootEnv(\dirname(__DIR__) . '/.env');

// checking if environment is other, then production
// It is not recommended execute PHPUnit tests on production environment
if (\App\Library\Utilities::env('APP_ENV') == \App\Library\Type\Env::PRODUCTION->value) {
    echo 'You are running PhpUnit tests on production environment. Are you sure you want to do this?  Type \'yes\' to continue: ';

    $handle = \fopen('php://stdin', 'r');
    $line = \fgets($handle);

    if (\strtolower(\trim($line)) != 'yes') {
        echo 'Aborting tests!' . PHP_EOL;
        exit;
    }

    \fclose($handle);
}
