<?php

/**
 * Base controller
 */

namespace Core;

abstract class Controller
{
    protected $routeParams = [];

    public function __construct(array $routeParams)
    {
        $this->routeParams = $routeParams;
    }

    /**
     * Calling action methods this way allows to 
     * e.g., check that the user is logged in
     */
    public function __call(string $name, array $args)
    {
        $method = "{$name}Action";

        if (method_exists($this, $method)) {
            if ($this->before()) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
            throw new \Exception("Method $method not found in controller " . get_class($this));
        }
    }

    /**
     * Executed before an action method
     */
    protected function before(): bool
    {
        return true;
    }

    /**
     * Executed after an action method
     */
    protected function after(): void
    {
    }
}