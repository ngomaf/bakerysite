<?php

namespace App\controllers;

use Ngomafortuna\RouteSystemSimple\Controller;


class NotFoundController extends Controller
{
    public function index(string $ctrl):void {
        $ctrl = ucfirst($ctrl);
        $message = "Crontroller {$ctrl} not found.";

        $this->view->render('error', [
            'title' => 'Error ' . 404,
            'description' => $message,
        ]);
    }

    public function show(string $ctrl, string $method):void {
        $ctrl = ucfirst($ctrl);
        $message = "The method {$method}() not exist, in crontroller {$ctrl}.";

        $this->view->render('error', [
            'title' => 'Error ' . 404,
            'description' => $message,
        ]);
    }
}
