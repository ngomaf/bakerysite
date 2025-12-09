<?php

namespace App\controllers;

use Ngomafortuna\RouteSystemSimple\Controller;


class AboutController extends Controller
{
    public function index(): void
    {
        // buscar dados de 'about' via model
        $aboutModel = new \App\models\About();
        $about = $aboutModel->get();

        $title = is_object($about) ? ($about->company_name ?? 'Sobre nós') : ($about['company_name'] ?? 'Sobre nós');
        $description = is_object($about) ? ($about->slogan ?? '') : ($about['slogan'] ?? '');

        $this->view->render('about', [
            'title' => $title,
            'description' => $description,
            'about' => $about
        ]);
    }
}