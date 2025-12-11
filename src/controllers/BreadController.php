<?php

namespace App\controllers;

use App\models\Bread;
use Ngomafortuna\RouteSystemSimple\Controller;

class BreadController extends Controller
{
    // Lista todos os pães
    public function index(): void
    {
        $breads = new Bread();
        $breads = $breads->all();

        // Buscar categorias dinamicamente
        $type = new \App\models\Type();
        $categories = $type->all();

        // dd($breads);

        $this->view->render('breads', [
            'title' => 'Pães',
            'description' => 'Veja nossa seleção de pães artesanais.',
            'breads' => $breads,
            'categories' => $categories
        ]);
    }

    // Mostra detalhes de um pão específico
    public function show(string $slug): void
    {
        $bread = new Bread();
        $bread = $bread->findBySlug($slug);

        $this->view->render('bread', [
            'bread' => $bread,
            'title' => $bread->name,
            'description' => $bread->description
        ]);
    }

    // Lista pães por tipo/categoria
    public function type(array $type): void
    {
        $type = $type[0];
        // Exemplo: buscar pães por categoria (simulado)
        $this->view->render('breads', [
            'title' => 'Pães ' . ucfirst($type),
            'description' => 'Veja os pães da categoria ' . $type . '.',
            'filter' => $type
        ]);
    }
}
