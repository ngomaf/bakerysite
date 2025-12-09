<?php

namespace App\controllers;

use Ngomafortuna\RouteSystemSimple\Controller;


class AboutController extends Controller
{
    public function index(): void
    {
        $this->view->render('about', [
            'title' => 'About as',
            'description' => 'Hi! Well come to our corp.'
        ]);
    }
}