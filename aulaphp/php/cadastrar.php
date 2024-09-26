<?php
    /* Conexão com o banco de dados */
    $host = 'localhost';
    $db = 'senai_aulaphp';
    $user = 'Rennan';
    $pass = '123456';
    $port = 3307;
    require_once 'php/connection.php';
    $database = new Database($host, $db, $user, $pass, $port);
    $database->connect();
    $pdo = $database->getConnection();
 
    // Obtendo os dados do formulário (via GET)
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $senha = $_GET['senha'];

    // Exibe os dados recebidos (para depuração)
    echo($nome . "<br>" . $email . "<br>" . $senha . "<br>");

    // Inserindo dados na tabela 'usuarios' de forma segura usando placeholders
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, senha, email) VALUES (:nome, :senha, :email)");
    $stmt->execute([':nome' => $nome, ':senha' => $senha, ':email' => $email]);

    // Validação simples para login
    /*if ($email == "rennanfera8@gmail.com" && $senha == "123456") {
        echo("logado");
    } else {
        echo("login ou senha incorretos");
    }

?>

