<?php

namespace Core;

class View
{
    public static function render(string $view, array $args = []): void
    {
        // For each key-value pair in $args, it stores the value
        // in a new variable named after the key.
        // EXTR_SKIP prevents overwriting existing variables
        extract($args, EXTR_SKIP);

        // The header base view expects a page title
        if (!isset($pageTitle)) {
            $pageTitle = 'App';
        }

        $file = "../App/Views/$view";

        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("File $file not found");
        }
    }
}