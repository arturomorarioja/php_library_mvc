<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Publisher;

class Publishers extends \Core\Controller
{
    /**
     * Show the index page
     */
    public function indexAction(): void
    {
        $publishers = Publisher::getAll();

        View::render('Publishers/index.php', [
            'pageTitle' => 'Publishers',
            'publishers'   => $publishers
        ]);
    }

    /**
     * Show the add new page
     */
    public function newAction(): void
    {
        View::render('Publishers/new.php', [
            'pageTitle' => 'Add publisher',
        ]);
    }

    /**
     * Create a new publisher
     */
    public function createAction(): void
    {
        $result = Publisher::create($_POST);

        // Error
        if (gettype($result) === 'array') {
            View::render('Publishers/new.php', [
                'pageTitle'        => 'Add publisher',
                'validationErrors' => $result
            ]);    
        } else {
            $_SESSION['message'] = 'Publisher successfully created';
            header('Location: ' . \App\Config::BASE_URL . 'publishers');
        }
    }

    /**
     * Delete an author
     */
    public function deleteAction(): void
    {        
        if (!Publisher::delete($_POST['publisher_id'])) {
            $_SESSION['message'] = 'There was an error while deleting the publisher';            
        } else {
            $_SESSION['message'] = 'Publisher successfully deleted';
        }
        header('Location: ' . \App\Config::BASE_URL . 'publishers');        
    }
}