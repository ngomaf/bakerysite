<?php

namespace App\controllers;

use App\models\Bread;
use Ngomafortuna\RouteSystemSimple\Controller;


class HomeController extends Controller
{
    public function index():void {
        $bread = new Bread();
        $breads = $bread->all();

        $this->view->render('home', [
            'title' => 'Página Inicial',
            'description' => 'This is the home page.',
            'breads' => $breads
        ]);
        
    }
}