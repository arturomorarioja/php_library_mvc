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
            'pageTitle' => 'Home',
            'school'    => 'KEA',
            'concepts'  => [
                'Routing', 
                'Logging',
                'Error management', 
                'MVC'
            ]
        ]);
    }
}