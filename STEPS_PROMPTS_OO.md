---

## Páginas do Site (Arquitetura OO)

O site "Umbala do Pão" será composto pelas seguintes páginas, cada uma implementada com um Controller, View e, quando necessário, Model e Service, seguindo PSR-4:

- **Home** (`/`): Página inicial com banner, produtos em destaque e chamada para o cardápio.
- **Cardápio/Produtos** (`/produtos`): Listagem de produtos por categoria, filtro e detalhes de cada produto.
- **Sobre Nós** (`/sobre`): História da padaria, missão, equipe e valores.
- **Contato** (`/contato`): Formulário de contato com validação e envio de mensagem.
- **Login/Registro** (`/login`, `/registro`): Autenticação de clientes (login, registro, recuperação de senha).
- **Painel Administrativo** (`/admin`): CRUD de produtos/categorias, visualização de mensagens de contato.
- **Blog/Notícias** (`/blog`): (Opcional) Publicação de novidades e receitas.

Cada página deve ser implementada com classes Controller e View separadas, e Models/Services quando necessário, conforme os prompts anteriores.
# Passo a passo — Prompts para site OO seguindo PSRs (PHP-FIG)

Este documento orienta a criação do site "Umbala do Pão" em PHP puro, com implementação orientada a objetos e seguindo as PSRs (PHP-FIG), especialmente PSR-1, PSR-2, PSR-4 (autoload), e boas práticas de organização de código.

Cada passo é um prompt pronto para uso.

---

1. **Inicializar estrutura OO e Composer**

Prompt:
"Crie a estrutura de pastas e arquivos inicial para um projeto PHP OO seguindo PSR-4: `public/`, `src/Controllers/`, `src/Models/`, `src/Services/`, `src/Views/`, `resources/views/`, `storage/`, `tests/`, `vendor/`, `composer.json` com autoload PSR-4. Inclua um exemplo de classe Controller, Model e Service, e explique como rodar localmente com Apache e Composer."

2. **Configurar ambiente local**

Prompt:
"Explique como configurar um ambiente local no Linux com Apache, PHP 8.x e MySQL/MariaDB para rodar o site OO. Inclua virtual host Apache, document root em `public/`, configuração do Composer, e comandos para criar banco de dados."

3. **Criar template mestre OO com Bootstrap**

Prompt:
"Implemente uma classe `View` em `src/Views/View.php` para renderizar templates. Escreva um template mestre OO em `resources/views/master.php` usando Bootstrap 5, com placeholders para título e conteúdo. Explique como usar a classe View para renderizar páginas."

4. **Desenvolver página Home OO**

Prompt:
"Implemente `HomeController` em `src/Controllers/HomeController.php` e uma view OO para exibir banner, produtos em destaque e CTA. Use um array de objetos Produto (Model) e mostre como passar dados do controller para a view."

5. **Criar página de Cardápio/Produtos OO**

Prompt:
"Implemente `ProductController` e `Product` (Model) para listar produtos por categoria. Adicione filtro JS e página/modal de detalhe. Use PSR-4, classes e autoload. Forneça exemplos de código."

6. **Criar página Sobre Nós OO**

Prompt:
"Implemente `AboutController` e view OO para a história da padaria, missão, equipe e valores. Use a classe View para renderizar."

7. **Criar página de Contato OO (frontend)**

Prompt:
"Implemente `ContactController` e view OO com formulário (Nome, E-mail, Telefone, Mensagem) usando Bootstrap, validação client-side (JS) e integração com endpoint OO."

8. **Implementar backend OO do formulário de contato**

Prompt:
"Implemente `ContactService` e `ContactMessage` (Model) para validação, sanitização, envio de e-mail (PHPMailer recomendado), gravação em arquivo, e resposta JSON. Use PSR-4 e explique como injetar dependências."

9. **Implementar sistema de login OO para clientes**

Prompt:
"Implemente `AuthController`, `User` (Model), e `AuthService` para autenticação OO: registro, login, logout, recuperação de senha, hashing seguro, sessões, CSRF, e exemplos de rotas."

10. **Criar painel administrativo OO (CRUD)**

Prompt:
"Implemente `AdminController`, `ProductService`, e views OO para CRUD de produtos/categorias, upload de imagem, e visualização de mensagens. Use PSR-4, controllers, services e views separados."

11. **Testes, otimização e SEO OO**

Prompt:
"Liste casos de teste unitário (PHPUnit), exemplos de testes para controllers/services/models, otimização de imagens, cache, e recomendações de SEO. Explique como rodar testes com Composer."

12. **Preparar deploy OO no Apache (produção)**

Prompt:
"Explique como preparar deploy de um projeto OO: VirtualHost, HTTPS, permissões, variáveis de ambiente, backup, deploy com Composer, e comandos para produção."

---

Todos os prompts acima seguem orientação a objetos, PSR-4, e boas práticas PHP-FIG. Se quiser, posso executar o primeiro passo e criar a estrutura OO no repositório agora.