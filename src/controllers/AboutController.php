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

        // buscar membros da equipe (se existir a tabela `team`)
        $teamMembers = [];
        try {
            $teamModel = new \App\models\Team();
            $teamMembers = $teamModel->all();
        } catch (\Throwable $e) {
            // Se o model falhar (ex: tabela não existe), mantemos $teamMembers vazio
            $teamMembers = [];
        }

        $this->view->render('about', [
            'title' => $title,
            'description' => $description,
            'about' => $about,
            'teamMembers' => $teamMembers
        ]);
    }
}