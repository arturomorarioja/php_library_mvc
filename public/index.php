<?php
/**
 * Front controller
 */

/**
 * Autoloader
 * It avoids having to require each class file independently
 */
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $file;
    }
});

/**
 * Error and exception handling
 */
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing
 */
$router = new Core\Router();
$router->add('', [
    'controller' => 'Home',
    'action' => 'index'
]);
$router->add('books', [
    'controller' => 'Books',
    'action' => 'index'
]);
$router->add('books/new', [
    'controller' => 'Books',
    'action' => 'new'
]);

$url = $_SERVER['QUERY_STRING'];
$dispatchStatus = $router->dispatch($url);
if (gettype($dispatchStatus) === 'string') {
    \Core\Utils::show($dispatchStatus);
}