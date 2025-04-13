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
    'action'     => 'index'
]);
$router->add('books', [
    'controller' => 'Books',
    'action'     => 'index'
]);
$router->add('books/new', [
    'controller' => 'Books',
    'action'     => 'new'
]);
$router->add('books/create', [
    'controller' => 'Books',
    'action'     => 'create',
    'method'     => 'POST'
]);
$router->add('books/delete', [
    'controller' => 'Books',
    'action'     => 'delete',
    'method'     => 'POST'
]);
$router->add('authors', [
    'controller' => 'Authors',
    'action'     => 'index'
]);
$router->add('authors/new', [
    'controller' => 'Authors',
    'action'     => 'new'
]);
$router->add('authors/create', [
    'controller' => 'Authors',
    'action'     => 'create',
    'method'     => 'POST'
]);
$router->add('authors/delete', [
    'controller' => 'Authors',
    'action'     => 'delete',
    'method'     => 'POST'
]);
$router->add('publishers', [
    'controller' => 'Publishers',
    'action'     => 'index'
]);
$router->add('publishers/new', [
    'controller' => 'Publishers',
    'action'     => 'new'
]);
$router->add('publishers/create', [
    'controller' => 'Publishers',
    'action'     => 'create',
    'method'     => 'POST'
]);
$router->add('publishers/delete', [
    'controller' => 'Publishers',
    'action'     => 'delete',
    'method'     => 'POST'
]);

$url = $_SERVER['QUERY_STRING'];
$method = $_SERVER['REQUEST_METHOD'];

// var_dump($url);
// var_dump($method);
// exit;

$dispatchStatus = $router->dispatch($url, $method);
if (gettype($dispatchStatus) === 'string') {
    \Core\Utils::show($dispatchStatus);
}