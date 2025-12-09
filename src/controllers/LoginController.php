<?php

namespace App\controllers;

use Ngomafortuna\RouteSystemSimple\Controller;

class LoginController extends Controller
{
    // Exibe o formulário de login
    public function index(): void
    {
        $this->view->render('login', [
            'title' => 'Login',
            'description' => 'Acesse sua conta na Umbala do Pão.'
        ]);
    }

    // Processa o login (POST)
    public function authenticate(): void
    {
        // Aqui você faria a validação dos dados e autenticação
        // Exemplo simples (simulado):
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        // Simulação de autenticação
        if ($email === 'admin@padaria.com' && $password === '123456') {
            // Sucesso: redireciona para dashboard
            header('Location: /admin/main/dashboard.php');
            exit;
        } else {
            // Falha: renderiza login com erro
            $this->view->render('login', [
                'title' => 'Login',
                'description' => 'Acesse sua conta na Umbala do Pão.',
                'error' => 'E-mail ou senha inválidos.'
            ]);
        }
    }

    // Logout
    public function logout(): void
    {
        // Aqui você destruiria a sessão do usuário
        session_start();
        session_destroy();
        header('Location: /');
        exit;
    }
}
