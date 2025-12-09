### **Documento de Requisitos de Produto (PRD): Site para Padaria "Umbala do Pão"**

**Versão:** 1.0
**Data:** 29 de Maio de 2024
**Autor:** Gemini Code Assist

### 1. Introdução e Visão Geral

Este documento descreve os requisitos para a criação do novo website da "Umbala do Pão", uma padaria artesanal. O objetivo principal é estabelecer uma presença online profissional, atrair novos clientes e fornecer um canal de comunicação direto com os clientes existentes. O site servirá como uma vitrine digital dos produtos, da história e dos valores da padaria.

O projeto será desenvolvido utilizando **PHP puro**, sem o uso de frameworks, para garantir uma solução leve, customizada e com total controle sobre o código.

### 2. Objetivos do Produto

| Objetivo de Negócio | Objetivo do Usuário | Métrica de Sucesso |
| :--- | :--- | :--- |
| Aumentar a visibilidade da marca na região. | Encontrar facilmente informações de contato e horário de funcionamento. | Aumento de 20% nas ligações e visitas mencionando o site. |
| Apresentar o catálogo de produtos de forma atraente. | Visualizar os produtos disponíveis, com fotos, descrições e preços. | Tempo médio de permanência de 2 minutos na página de produtos. |
| Gerar um novo canal para encomendas e perguntas. | Enviar perguntas ou fazer encomendas de forma simples e rápida. | Média de 5 envios de formulário de contato por semana. |
| Fortalecer a imagem de uma padaria artesanal e de qualidade. | Conhecer a história e os diferenciais da padaria. | Visualizações da página "Sobre Nós". |

### 3. Personas (Público-Alvo)

*   **Ana, 32 anos (Cliente Local):** Moradora do bairro que busca pães e doces frescos para o dia a dia. Ela valoriza a conveniência e quer saber rapidamente os horários de funcionamento e os produtos do dia.
*   **Carlos, 45 anos (Organizador de Eventos):** Planeja um café da manhã corporativo e precisa encomendar salgados e bolos em quantidade. Ele busca um catálogo online claro e um meio fácil de solicitar um orçamento.
*   **Mariana, 28 anos (Turista/Visitante):** Está visitando a cidade e procura por "melhores padarias" na internet. Ela é atraída por boas fotos, avaliações positivas e uma história autêntica.

### 4. Requisitos Funcionais (Features)

#### **Fase 1: MVP (Produto Mínimo Viável)**

O foco inicial é lançar um site institucional completo e funcional.

**F4.1: Página Inicial (Home)**
*   **RF4.1.1:** Deve exibir um banner principal com imagens de alta qualidade dos produtos e do ambiente da padaria.
*   **RF4.1.2:** Deve apresentar uma seção de "Produtos em Destaque" com 3 a 4 itens populares.
*   **RF4.1.3:** Deve conter um breve texto de boas-vindas e um botão (Call-to-Action) "Conheça nosso cardápio".
*   **RF4.1.4:** Deve exibir o endereço e o horário de funcionamento de forma visível.

**F4.2: Página de Cardápio/Produtos**
*   **RF4.2.1:** Os produtos devem ser listados e organizados por categorias (ex: Pães, Bolos, Doces, Salgados).
*   **RF4.2.2:** Cada produto na listagem deve ter uma imagem, nome e preço.
*   **RF4.2.3:** Deve haver um filtro para que o usuário possa selecionar e visualizar apenas uma categoria por vez.
*   **RF4.2.4:** Ao clicar em um produto, um modal ou uma página de detalhe deve ser aberta com uma descrição mais completa e uma imagem maior.

**F4.3: Página "Sobre Nós"**
*   **RF4.3.1:** Deve contar a história da padaria, sua missão e seus valores.
*   **RF4.3.2:** Pode incluir fotos do fundador, da equipe e do processo artesanal.

**F4.4: Página de Contato**
*   **RF4.4.1:** Deve exibir todas as informações de contato:
    *   Endereço completo.
    *   Telefone(s).
    *   E-mail para contato.
    *   Horários de funcionamento detalhados para cada dia da semana.
*   **RF4.4.2:** Deve incluir um mapa interativo (Google Maps) mostrando a localização da padaria.
*   **RF4.4.3:** Deve conter um formulário de contato com os campos: Nome, E-mail, Telefone e Mensagem.
*   **RF4.4.4:** O formulário deve ter validação de campos (ex: e-mail válido, campos obrigatórios).
*   **RF4.4.5:** Após o envio, o sistema deve enviar um e-mail com os dados do formulário para o e-mail da padaria e exibir uma mensagem de sucesso para o usuário.

**F4.5: Componentes Globais**
*   **RF4.5.1: Cabeçalho:** Deve conter o logotipo da padaria e o menu de navegação principal (Início, Cardápio, Sobre Nós, Contato).
*   **RF4.5.2: Rodapé:** Deve conter informações de contato, links para redes sociais e links de navegação.

#### **Fase 2: Evolução (Pós-Lançamento)**

*   **F4.6: Painel Administrativo (Admin):**
    *   Acesso protegido por login e senha.
    *   Funcionalidade para gerenciar (criar, editar, excluir) os produtos e categorias do cardápio.
    *   Uma área para visualizar as mensagens recebidas pelo formulário de contato.
*   **F4.7: Sistema de Encomendas Online:**
    *   Adicionar um botão "Encomendar" nos produtos.
    *   Carrinho de compras para adicionar múltiplos itens.
    *   Checkout simplificado para finalizar a encomenda (sem pagamento online, apenas para retirada na loja).
*   **F4.8: Blog/Notícias:**
    *   Seção para postar novidades, promoções e receitas.
*   **F4.9: Sistema de Login para Clientes:**
    *   Permitir que clientes criem contas e façam login (e-mail + senha).
    *   Implementar recuperação de senha via e-mail.
    *   Sessões seguras com proteção contra sequestro de sessão e força bruta.
    *   Preferência por autenticação por e-mail (sem integração com redes sociais nesta fase).

### 5. Requisitos Não-Funcionais

*   **RNF5.1: Desempenho:** O site deve carregar em menos de 3 segundos em uma conexão 3G. As imagens devem ser otimizadas para a web.
*   **RNF5.2: Responsividade:** O layout deve se adaptar perfeitamente a dispositivos móveis (celulares), tablets e desktops.
*   **RNF5.3: Segurança:**
    *   O formulário de contato deve ser protegido contra spam (ex: Google reCAPTCHA) e ataques de injeção.
    *   O site deve rodar em HTTPS (requer certificado SSL).
*   **RNF5.4: SEO (Otimização para Motores de Busca):**
    *   As páginas devem ter URLs amigáveis (ex: `site.com/cardapio/pao-italiano`).
    *   As tags de título (`<title>`) e meta descrições (`<meta name="description">`) devem ser únicas e personalizáveis.
*   **RNF5.5: Manutenibilidade:** O código PHP deve ser bem-estruturado e comentado, separando a lógica (PHP), a estrutura (HTML) e a apresentação (CSS), para facilitar futuras manutenções.

### 6. Stack Tecnológico

*   **Linguagem de Backend:** PHP 8.0+ (Puro)
*   **Linguagem de Frontend:** HTML5, CSS3, JavaScript (ES6+)
*   **Framework Frontend:** Bootstrap (recomenda-se Bootstrap 5 para componentes responsivos prontos)
*   **Banco de Dados:** MySQL ou MariaDB (para a Fase 2)
*   **Servidor Web:** Apache
*   **Dependências:** Minimizar dependências; usar Bootstrap como framework frontend. Não usar frameworks PHP no backend nesta versão.

### 7. Fora do Escopo (Para esta versão)

*   Sistema de pagamento online (cartão de crédito, Pix).
*   Integração com sistemas de delivery (iFood, Rappi).
*   Site multi-idioma.

---

Este documento serve como a "fonte da verdade" para o projeto. Qualquer alteração ou adição de funcionalidade deve ser discutida e, se aprovada, incorporada a este PRD.

<!--
[PROMPT_SUGGESTION]Crie a estrutura de pastas e arquivos inicial para este projeto PHP, seguindo as boas práticas.[/PROMPT_SUGGESTION]
[PROMPT_SUGGESTION]Escreva o código PHP para o formulário de contato (RF4.4.3) com validação e envio de e-mail.[/PROMPT_SUGGESTION]
\ No newline at end of file

