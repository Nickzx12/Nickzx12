<?php 
session_start();

$login = 'Nicolas';
$senha = '12345';

// Verifica se houve tentativa de login
if(isset($_POST['acao'])) {
    $loginForm = $_POST['login'] ?? '';
    $senhaForm = $_POST['senha'] ?? '';

    if($login == $loginForm && $senha == $senhaForm) {
        $_SESSION['login'] = $login;
        header('Location: index.php');
        exit;
    } else {
        echo 'Dados inválidos.';
    }
}

// Verifica logout
if(isset($_GET['logout'])) {
    unset($_SESSION['login']);
    session_destroy();
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROZ TÉCNICO</title>
    <style>
        body { text-align: center; }
    </style>
</head>
<body>

<header>
    <h1>PROZ TÉCNICO</h1>
</header>

<nav>
    <a href="index.php">HOME</a>
    <a href="quemsomos.php">QUEM SOMOS</a>
    <a href="produtos.php">PRODUTOS</a>
    <a href="contatos.php">CONTATOS</a>
    
</nav>

<br><br>

<?php   
if(!isset($_SESSION['login'])) {
    // Exibe o formulário de login (pode ser um include ou direto no HTML)
    ?>
    <form method="post">
        <input type="text" name="login" placeholder="Usuário" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <button type="submit" name="acao">Entrar</button>
    </form>
    <?php
} else {
    // Se logado, mostra conteúdo restrito + botão de logout
    echo "Bem-vindo, " . $_SESSION['login'] . "! ";
    echo '<a href="index.php?logout=1">Sair</a>';
    include('home.php'); // Seu arquivo com conteúdo protegido
}
?>

<main>
    <article>
        <h2>Curso técnico</h2>
        <p>Lorem ipsum dolor sit amet...</p>
    </article>
</main>

<footer>
    &copy; Copyright Antonio Luis 2025
</footer>
</body>
</html>