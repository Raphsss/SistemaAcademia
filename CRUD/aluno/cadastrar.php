<?php
require_once '../../config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $cpf = trim($_POST['cpf']);
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = trim($_POST['telefone']);
    $plano_id = $_POST['plano_id'];

    $stmt = $conn->prepare("INSERT INTO alunos (nome, email, cpf, data_nascimento, telefone, plano_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $nome, $email, $cpf, $data_nascimento, $telefone, $plano_id);

    if ($stmt->execute()) {
        echo "Cadastrado com sucesso!";
        exit();
    } 
}
?>