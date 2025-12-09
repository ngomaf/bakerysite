<?php

namespace App\controllers;

use Ngomafortuna\RouteSystemSimple\Controller;

class BreadController extends Controller
{
    // Lista todos os pães
    public function index(): void
    {
        $this->view->render('breads', [
            'title' => 'Pães',
            'description' => 'Veja nossa seleção de pães artesanais.'
        ]);
    }

    // Mostra detalhes de um pão específico
    public function show(string $slug): void
    {
        // Exemplo: buscar pão por $id (aqui apenas simulado)
        $bread = [
            'id' => $slug,
            'name' => 'Pão Italiano',
            'category' => 'grande',
            'weight' => '800g',
            'price' => 'R$ 8,50',
            'description' => 'Crosta crocante, miolo aerado, feito com fermentação natural.'
        ];
        $this->view->render('bread', [
            'bread' => $bread,
            'title' => $bread['name'],
            'description' => $bread['description']
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
