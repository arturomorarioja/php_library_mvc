<?php

namespace App\Controllers;
use \Core\View;

class Home extends \Core\Controller
{
    /**
     * Show the index page
     */
    public function indexAction(): void
    {
        View::render('Home/index.php', [
            'pageTitle'     => 'Home',
            'library'       => 'KEA',
            'futureLibrary' => 'EK',
            'topics'        => [
                'Literature', 
                'History',
                'Art', 
                'Cultural Studies'
            ]
        ]);
    }
}