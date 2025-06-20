<?php
require_once '../../config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_plano = trim($_POST['nome_plano']);
    $descricao = trim($_POST['descricao']);
    $duracao_semanas = $_POST['duracao_semanas'];
    $tipo_treino = trim($_POST['tipo_treino']);
    $instrutor_id = $_POST['instrutor_id'];

    $stmt = $conn->prepare("INSERT INTO planos_treino (nome_plano, descricao, duracao_semanas, tipo_treino, instrutor_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisi", $nome_plano, $descricao, $duracao_semanas, $tipo_treino, $instrutor_id);

    if ($stmt->execute()) {
        echo "Cadastrado com sucesso!";
        exit();
    } 
}
?>