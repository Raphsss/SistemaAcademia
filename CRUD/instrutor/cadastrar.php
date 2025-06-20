<?php
require_once '../../config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $especialidade = trim($_POST['especialidade']);
    $cref = trim($_POST['cref']);
    $telefone = trim($_POST['telefone']);
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("INSERT INTO instrutores (nome, especialidade, cref, telefone, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $especialidade, $cref, $telefone, $email);

    if ($stmt->execute()) {
        echo "Cadastrado com sucesso!";
        exit();
    } 
}
?>