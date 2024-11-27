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
            'name'      => 'Arturo',
            'colours'   => ['red', 'green', 'blue']
        ]);
    }
}