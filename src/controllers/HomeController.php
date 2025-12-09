<?php

namespace App\controllers;

use Ngomafortuna\RouteSystemSimple\Controller;


class HomeController extends Controller
{
    public function index():void {

        $this->view->render('home', [
            'title' => 'Home page',
            'description' => 'This is the home page.'
        ]);
        
    }
}