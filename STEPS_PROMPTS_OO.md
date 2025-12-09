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

## Imagens
```
convert -size 1400x500 xc:'#ddd' -gravity center -pointsize 48 -fill '#666' -annotate 0 "Umbala do Pão" assets/images/banner.jpg
convert -size 600x400 xc:'#eee' -gravity center -pointsize 28 -fill '#666' -annotate 0 "Pão Italiano" assets/images/pao-italiano.jpg
convert -size 600x400 xc:'#eee' -gravity center -pointsize 28 -fill '#666' -annotate 0 "Bolo de Laranja" assets/images/bolo-laranja.jpg
convert -size 600x400 xc:'#eee' -gravity center -pointsize 28 -fill '#666' -annotate 0 "Croissant" assets/images/croissant.jpg
```

Recomendações de IA gratuitas

- Hugging Face Spaces (Stable Diffusion / SDXL): fácil de usar via navegador, sem instalação; boa qualidade e costuma ser grátis para uso leve. Ex.: https://huggingface.co/spaces/stabilityai/stable-diffusion-xl
- Bing Image Creator / Microsoft Designer: gera imagens de alta qualidade gratuitamente com login Microsoft.
- Rodar Stable Diffusion localmente (Automatic1111): grátis se você puder executar localmente (GPU recomendada) — controle total e melhor privacidade.

Observação: alguns serviços têm limites; SDXL em Hugging Face permite escolher dimensões ou gerar quadrado e depois cortar. Muitos spaces geram 1024x1024 ou custom sizes.

Prompts prontos (Português e Inglês) — copie/cole no HF Space ou Bing

Banner (panorama — interior de padaria)
PT:
"Interior acolhedor de uma padaria artesanal em estilo rústico, balcões de madeira com vitrines cheias de pães, bolos e doces, luz da manhã quente entrando pelas janelas, atmosfera convidativa, alta nitidez, fotorealista, iluminação suave, profundidade de campo média — sem texto, sem logotipos, sem watermark"
EN:
"Cozy artisanal bakery interior, rustic wooden counters with display of breads, cakes and pastries, warm morning light through windows, inviting atmosphere, high detail, photorealistic, soft lighting, medium depth of field — no text, no logos, no watermark"
Pão Italiano (close / produto)
PT:
"Close de um pão italiano artesanal com crosta dourada e textura porosa no miolo, iluminação natural, fundo suave de padaria, fotorealista, alta definição, sem texto, sem watermark"
EN:
"Close-up of an artisanal Italian bread with golden crust and porous crumb texture, natural light, soft bakery background, photorealistic, high detail, no text, no watermark"
Bolo de Laranja (produto)
PT:
"Bolo de laranja caseiro com cobertura brilhante, fatia cortada mostrando textura húmida, decoração simples com raspas de laranja, fundo neutro e acolhedor, fotorealista, alta definição — sem texto, sem watermark"
EN:
"Homemade orange cake with glossy glaze, a sliced piece showing moist texture, simple decoration with orange zest, neutral cozy background, photorealistic, high detail — no text, no watermark"
Croissant (produto)
PT:
"Croissant folhado e amanteigado em close, camadas visíveis e textura folhada, iluminação de padaria matinal, fundo desfocado, fotorealista, alta definição — sem texto, sem watermark"
EN:
"Flaky buttery croissant close-up, visible layers and flaky texture, morning bakery lighting, blurred background, photorealistic, high detail — no text, no watermark"
Negative prompt (use se o gerador aceitar)

PT: "texto, marca d'água, assinatura, logotipo, baixa resolução, deformado, borrado, parte do corpo, extra limbs"
EN: "text, watermark, signature, logo, lowres, deformed, blurry, extra limbs"
Instruções rápidas de geração e salvamento

Abra o Hugging Face Space (ex.: Stable Diffusion XL) ou Bing Image Creator.
Cole o prompt (PT ou EN) e ajuste tamanho/steps/scale conforme acima.
Gere a imagem, revise e, se necessário, ajuste prompt até obter resultado satisfatório.
Baixe a imagem em JPG.
Renomeie e coloque dentro do projeto:
banner.jpg → /opt/lampp/htdocs/tests/aiassisted/bakerysite/assets/images/banner.jpg
pao-italiano.jpg → /opt/lampp/htdocs/tests/aiassisted/bakerysite/assets/images/pao-italiano.jpg
bolo-laranja.jpg → /opt/lampp/htdocs/tests/aiassisted/bakerysite/assets/images/bolo-laranja.jpg
croissant.jpg → /opt/lampp/htdocs/tests/aiassisted/bakerysite/assets/images/croissant.jpg
Exemplo (no terminal) para mover um download chamado "download.jpg" e redimensionar com ImageMagick


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