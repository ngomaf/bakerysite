<?php

namespace App\controllers;

use App\services\OurServices;
use Ngomafortuna\RouteSystemSimple\Controller;


class ServiceController extends Controller
{
    public function index(): void
    {
        $this->view->render('services', [
            'title' => 'Services',
            'description' => 'They are, the ours services.',
            'services' => (new OurServices)->get()
        ]);
    }

    public function show(int $id): void
    {
        $service = new OurServices;
        
        $this->view->render('services', [
            'title' => $service->find($id)['name'],
            'description' => $service->find($id)['description'],
            'secoudtitle' => '<h2>Others services</h2>',
            'services' => $service->get()
        ]);
    }
}