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
            $authors = Author::getAll();

            View::render('Authors/index.php', [
                'pageTitle' => 'Authors',
                'message'   => 'Author successfully created',
                'authors'   => $authors
            ]);    
        }
    }

    /**
     * Delete an author
     */
    public function deleteAction(): void
    {        
        if (!Author::delete($_POST['author_id'])) {
            $message = 'There was an error while deleting the author';            
        } else {
            $message = 'Author successfully deleted';
        }
        
        $authors = Author::getAll();
        View::render('Authors/index.php', [
            'pageTitle' => 'Authors',
            'message'   => $message,
            'authors'   => $authors
        ]);
    }
}