<?php

namespace Core;

class Utils
{
    /**
     * It displays the string or array it receives 
     * as a parameter in the browser
     */
    public static function show(string|array $text = '', bool $preformatted = true): void
    {
        if ($preformatted) {
            echo '<pre>';
        }

        if (gettype($text) === 'string') {
            echo $text;
        } else {
            print_r($text);
        }

        if ($preformatted) {
            echo '</pre>';
        }
    }
}