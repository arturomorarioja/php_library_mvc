<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;

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
        $authors = Author::getAll();
        $publishers = Publisher::getAll();

        View::render('Books/new.php', [
            'pageTitle'  => 'Add book',
            'authors'    => $authors,
            'publishers' => $publishers
        ]);
    }

    /**
     * Create a new book
     */
    public function createAction(): void
    {
        $result = Book::create($_POST);

        // Error
        if (gettype($result) === 'array') {
            $authors = Author::getAll();
            $publishers = Publisher::getAll();

            View::render('Books/new.php', [
                'pageTitle'        => 'Add book',
                'authors'          => $authors,
                'publishers'       => $publishers,
                'validationErrors' => $result
            ]);
        } else {            
            $_SESSION['message'] = 'Book successfully created';
            header('Location: ' . \App\Config::BASE_URL . 'books');
        }
    }

    /**
     * Delete a book
     */
    public function deleteAction(): void
    {        
        if (!Book::delete($_POST['book_id'])) {
            $_SESSION['message'] = 'There was an error while deleting the book';            
        } else {
            $_SESSION['message'] = 'Book successfully deleted';
        }
        header('Location: ' . \App\Config::BASE_URL . 'books');
    }
}