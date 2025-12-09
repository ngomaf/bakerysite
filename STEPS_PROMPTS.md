# Passo a passo — Prompts para criação do site "Umbala do Pão"

Este arquivo contém 12 passos; cada passo corresponde a um prompt pronto para ser usado (ou colado em uma conversa com uma IA) para orientar a implementação do site em PHP puro com Bootstrap e Apache.

Cada passo está numerado e inclui um título seguido do prompt em português.

1. Inicializar repositório e estrutura

Prompt:
"Crie a estrutura de pastas e arquivos inicial para o projeto PHP 'Umbala do Pão' (PHP puro) — inclua `public/`, `public/index.php`, `public/assets/` (css, js, images), `resources/views/` (master.php, home.php, about.php, services.php, contact.php), `src/controllers/`, `src/services/`, `storage/`, `README.md` e um `composer.json` mínimo. Forneça o conteúdo inicial de cada arquivo e explique como rodar localmente com Apache e PHP."

2. Configurar ambiente local

Prompt:
"Explique passo a passo como configurar um ambiente local no Linux com Apache, PHP 8.x e MySQL/MariaDB para rodar o site 'Umbala do Pão'. Inclua configuração de virtual host Apache, document root apontando para `public/`, ajustes de `php.ini` recomendados e comandos para criar banco de dados."

3. Criar template mestre com Bootstrap

Prompt:
"Escreva o código para `resources/views/master.php` usando Bootstrap 5: inclua header com menu (Início, Cardápio, Sobre Nós, Contato), footer com contatos, e placeholders para título e conteúdo. Forneça CSS mínimo e explique como incluí-lo em `public/assets/css`."

4. Desenvolver página Home

Prompt:
"Crie `resources/views/home.php` e o controller correspondente `src/controllers/HomeController.php` para exibir banner, seção 'Produtos em Destaque' (3-4 itens) e CTA para o cardápio. Use imagens de placeholder e mostre como carregar dados de um array PHP (sem DB)."

5. Criar página de Cardápio/Produtos

Prompt:
"Implemente `resources/views/services.php` (cardápio) e lógica para listar produtos por categoria. Adicione filtro em JavaScript para mostrar somente a categoria selecionada e uma página/modal de detalhe do produto. Forneça estrutura de dados exemplo (array ou JSON) e markup responsivo com Bootstrap."

6. Criar página Sobre Nós

Prompt:
"Escreva `resources/views/about.php` com a história da padaria, missão, fotos da equipe e seção de valores. Forneça conteúdo de exemplo e estrutura HTML/CSS compatível com o template mestre."

7. Criar página de Contato (frontend)

Prompt:
"Desenvolva `resources/views/contact.php` com formulário (Nome, E-mail, Telefone, Mensagem) usando Bootstrap, validação client-side (JS) e integração com o endpoint PHP `public/contact_submit.php`. Inclua integração opcional com Google reCAPTCHA v2/v3 e instruções de como configurar a chave."

8. Implementar backend do formulário de contato

Prompt:
"Escreva `public/contact_submit.php` em PHP puro: validação server-side, sanitização, envio de e-mail (mail() ou PHPMailer se preferir), gravação opcional em `storage/messages.json` e retorno JSON para AJAX. Implemente proteção básica contra spam (limitador por IP) e explique como configurar SMTP seguro."

9. Implementar sistema de login para clientes

Prompt:
"Implemente um sistema de autenticação simples em PHP (sem frameworks): páginas `auth/register.php`, `auth/login.php`, `auth/logout.php`, `auth/forgot.php`, `auth/reset.php`; tabelas SQL sugeridas; hashing de senha com `password_hash()`, verificação de sessão, proteção contra CSRF e sugestões para hardening. Forneça código e instruções de teste."

10. Criar painel administrativo (CRUD)

Prompt:
"Desenvolva um painel `admin/` protegido por autenticação para gerenciar produtos e categorias: listagem, criar/editar/excluir produtos (com upload de imagem), visualizar mensagens do contato. Forneça rotas, controllers e exemplos de views em PHP/Bootstrap."

11. Testes, otimização e SEO

Prompt:
"Liste casos de teste manual e automatizados (se aplicável), instruções para otimizar imagens/responsive images, cache, e recomendações de SEO (meta tags, sitemap.xml, robots.txt). Inclua comandos e ferramentas para análise de performance."

12. Preparar deploy no Apache (produção)

Prompt:
"Forneça passo a passo para preparar o deploy em um servidor Apache: configuração de VirtualHost, ativar HTTPS com Let's Encrypt, permissões de diretórios (`storage/`), variáveis de ambiente, configuração de backup do banco e comandos para deploy (git pull, composer install se necessário)."

---

Cada prompt está pronto para ser usado; se quiser, posso executar o primeiro (criar a estrutura de pastas e arquivos) diretamente no repositório agora.
