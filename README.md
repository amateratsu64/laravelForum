# laravelForum

Descrição
Este projeto é uma aplicação web desenvolvida com Laravel que oferece diversas funcionalidades para gerenciamento de usuários, tópicos, postagens e tags. O projeto segue o padrão MVC (Model-View-Controller) para organização e manutenção do código.

Funcionalidades Principais
Páginas Funcionais
Página Inicial:

Página simples de boas-vindas com links para login e registro.
Usuários:

Formulário de registro onde novos usuários podem se inscrever fornecendo informações básicas como nome, e-mail e senha.

Perfil:
Funcionalidade para editar as informações do usuário e excluir a conta.

Sistema de Login:
Formulário de login para usuários cadastrados acessarem funcionalidades restritas do site.

Logout:
Função para encerrar a sessão do usuário autenticado.

Páginas Não Funcionais

Página Inicial:
Áreas reservadas para tópicos, postagens, etc.

Postagens:
Criar, editar, visualizar e excluir postagens.

Requisitos Funcionais
Registro de Usuário
Formulário de registro com campos para nome, email e senha.
Validação dos campos (nome obrigatório, email válido e senha com mínimo de 8 caracteres).
Armazenamento seguro das senhas utilizando hashing.
Feedback ao usuário em caso de erros de validação.
Login de Usuário
Formulário de login com campos para email e senha.
Validação dos campos (email obrigatório e senha obrigatória).
Verificação das credenciais de login.
Redirecionamento do usuário autenticado para a página inicial.
Feedback ao usuário em caso de falha na autenticação.
Página Inicial
Página acessível a todos os usuários (autenticados e não autenticados).
Exibição de uma mensagem de boas-vindas personalizada com o nome do usuário.
Logout
Função para encerrar a sessão do usuário.
Redirecionamento para a página inicial após o logout.
Estrutura do Projeto
O projeto segue o padrão MVC:

Models:

Definição das classes responsáveis pela interação com a base de dados, como o modelo User.
Views:

Arquivos Blade para renderização das páginas de registro, login e dashboard.
Controllers:

Classes que gerenciam a lógica de negócio, incluindo o controle de autenticação e registro de usuários.
Tecnologias Utilizadas

Framework:
Laravel
Linguagem:
PHP
Banco de Dados:
MySQL
Autenticação:

Pacote de autenticação padrão do Laravel
Integrantes do Projeto
Integrante 1: Matheus henrique schopp peixoto
