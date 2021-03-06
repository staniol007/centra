<?php declare(strict_types=1);

namespace App\Controller;

/**
 * @author Marcin Stanik <marcin.stanik@gmail.com>
 * @since 06.2022
 * @version 1.0.1
 */
abstract class AbstractController
{

    /** @var \Mustache_Engine */
    private \Mustache_Engine $MustacheEngine;

    /**
     * @return void
     */
    abstract public function index(): void;

    public function __construct()
    {
        $this->MustacheEngine = new \Mustache_Engine(array(
            'loader' => new \Mustache_Loader_FilesystemLoader('../views'),
        ));
    }

    /**
     * @param string $viewName
     * @param array $data
     * @return string
     */
    protected function render(string $viewName, array $data): string
    {
        return $this->MustacheEngine
            ->render($viewName, $data);
    }

}
