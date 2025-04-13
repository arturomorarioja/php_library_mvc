<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Author;

class Authors extends \Core\Controller
{
    /**
     * Show the index page
     */
    public function indexAction(): void
    {
        $authors = Author::getAll();

        View::render('Authors/index.php', [
            'pageTitle' => 'Authors',
            'authors'   => $authors
        ]);
    }

    /**
     * Show the add new page
     */
    public function newAction(): void
    {
        View::render('Authors/new.php', [
            'pageTitle' => 'Add author',
        ]);
    }

    /**
     * Create a new author
     */
    public function createAction(): void
    {
        $result = Author::create($_POST);

        // Error
        if (gettype($result) === 'array') {
            View::render('Authors/new.php', [
                'pageTitle'        => 'Add author',
                'validationErrors' => $result
            ]);    
        } else {
            $_SESSION['message'] = 'Author successfully created';
            header('Location: ' . \App\Config::BASE_URL . 'authors');
        }
    }

    /**
     * Delete an author
     */
    public function deleteAction(): void
    {        
        if (!Author::delete($_POST['author_id'])) {
            $_SESSION['message'] = 'There was an error while deleting the author';            
        } else {
            $_SESSION['message'] = 'Author successfully deleted';
        }        
        header('Location: ' . \App\Config::BASE_URL . 'authors');
    }
}