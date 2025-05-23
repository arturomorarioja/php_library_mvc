<?php

/**
 * Error and exception handler
 */

namespace Core;

class Error
{
    /**
     * Turns all errors into exceptions,
     * so that both are handled in the same place
     */
    public static function errorHandler(
        int $level, string $message, string $file, int $line): void
    {
        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function exceptionHandler(\Throwable $exception): void
    {
        // HTTP status code might be 404 Not found or 500 Internal server error
        $code = $exception->getCode();
        if ($code !== 404) {
            $code = 500;
        }
        http_response_code($code);

        // Error information is formatted
        $exceptionClass = get_class($exception);
        $exceptionInfo =<<<EXCEPTION
            <section>
                <p>Uncaught exception: $exceptionClass</p>
                <p>Message: {$exception->getMessage()}</p>
                <p>Stack trace: {$exception->getTraceAsString()}</p>
                <p>Thrown in: {$exception->getFile()} on line {$exception->getLine()}</p>
            </section>
        EXCEPTION;

        // The error information is prepared for either showing or logging
        if (\App\Config::SHOW_ERRORS) {            
            View::render("Errors/$code.php", [
                'pageTitle' => 'Error',
                'errorInfo' => $exceptionInfo
            ]);
        } else {
            $log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '.html';
            ini_set('error_log', $log);            
            error_log("$exceptionInfo<hr>");

            View::render("Errors/$code.php", ['pageTitle' => 'Error']);
        }

    }
}