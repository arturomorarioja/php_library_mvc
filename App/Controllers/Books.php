<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Book;

class Books extends \Core\Controller
{
    /**
     * Show the index page
     */
    public function indexAction(): void
    {
        $books = Book::getAll();

        View::render('Books/index.php', [
            'pageTitle' => 'Books',
            'books'     => $books
        ]);
    }

    /**
     * Show the add new page
     */
    public function newAction(): void
    {
        echo 'Hello from the new action in the Books controller!';
    }

    /**
     * Show the edit page
     */
    public function editAction(): void
    {
        echo 'Hello from the edit action in the Books controller!';
        echo '<p>Router parameters: <pre>' . htmlspecialchars(print_r($this->routeParams, true)). '</pre></p>';
    }
}