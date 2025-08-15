# Sistema de Padaria - Bumba meu Pão
<img src="assets/logo.png" alt="Logotipo da Padaria" width="200"/>

## Sobre
Esse repositório contém um sistema de padaria onde o usuário pode registrar os produtos e os pedidos dos clientes com um carrinho. É um trabalho para a Atividade 6 - Desenvolvimento de um CRUD para Padaria da matéria de Desenvolvimento de Sistemas.

## Funcionalidades
- Criação, edição, visualização e exclusão de produtos;
- Visualização de pedidos específico de um cliente;
- Visualização de todos os pedidos;
- Adição de produto em carrinho, com modificação de quantidade;
- Modificação de status e quantidadde de pedido.

## Como conectar com o Banco de Dados
Antes de utilizar o sistema, é importante verificar se as variáveis no arquivo `db.php` estão corretas para o seu servidor. Modifique principalmente as linhas a seguir com o usuário, senha e porta do MySql adequadas.

```
  $username = "";
  $password = "";
```

> [!IMPORTANT]
> Sem os dados corretos, podem ocorrer erros ao acessar as páginas que utilizam conexão com banco de dados.

## Script SQL

Execute o arquivo `db.sql` no banco de dados para criar o banco e adicionar um usuário e um cliente que será utilizado em operações básicas do sistema.
