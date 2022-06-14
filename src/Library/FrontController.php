<?php declare(strict_types=1);

namespace App\Library;

/**
 * Pseudo Front Controller Design :)
 * @since 06.2022
 * @version 1.0.0
 */
class FrontController
{

    public function __construct()
    {
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function run(): void
    {
        $controllerClassName = $this->getControllerClassName();
        $actionMethodName = $this->getActionMethodName();

        if (\class_exists($controllerClassName) === false) {
            throw new \Exception(\sprintf("Controller '%s' not found", $controllerClassName));
        }

        if (\method_exists($controllerClassName, $actionMethodName) === false) {
            throw new \Exception(\sprintf("Missing action: '%s' in controller: '%s'", $actionMethodName, $controllerClassName));
        }

        (new $controllerClassName())
            ->$actionMethodName();
    }

    /**
     * @return string
     */
    public function getControllerClassName(): string
    {
        return '\App\Controller\\'
            . \ucfirst(\strtolower($_GET['_c'] ?? 'Index')) . 'Controller';;
    }

    /**
     * @return string
     */
    public function getActionMethodName(): string
    {
        $action = $_GET['_a'] ?? 'index';

        return \strtolower($action);
    }

}
