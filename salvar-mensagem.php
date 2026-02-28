<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "escola_mariaroxa";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO mensagens (nome, email, mensagem)
        VALUES ('$nome', '$email', '$mensagem')";

if ($conn->query($sql) === TRUE) {
    echo "<!DOCTYPE html>
<html lang=pt-br>
<head>
    <meta charset=UTF-8>
    <meta name=viewport content=width=device-width, initial-scale=1.0>
    <link rel=stylesheet href=css/style-salvar.css>
    <link rel=icon href=imagens/icones/img-logo.png>
    <title>Contato - Escola Maria Roxa</title>
</head>

<body>

<header class=header>
    <a href=index.html>
        <img src=imagens/icones/img-logo.png class=img-logo>
    </a>

    <nav>
        <a href=sobre.html class=nav-menu> Sobre </a>
        <a href=atividades.html class=nav-menu> Atividades </a>
        <a href=equipe.html class=nav-menu> Equipe </a>
        <a href=galeria.html class=nav-menu> Galeria </a>
        <a href=contato.html class=nav-menu> Contato </a>
    </nav>
</header>

<div class=texto>
    <h2>Mensagem Enviada</h2>
    <a href=index.html class=inicio> Voltar para Página Principal </a>
</div>
</body>
</html>";
} else {
    echo "Erro" . $conn->error;
}

$conn->close();
?>