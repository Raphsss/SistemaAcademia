<?php
function gerarOpcoesPlano() {
    require_once '../../config/db_connect.php';
    $sql = "SELECT id, nome_plano FROM planos_treino";
    $result = $conn->query($sql);

    $options = '<option value="">Selecione um plano</option>';
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $options .= '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['nome_plano']) . '</option>';
        }
    }
    return $options;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Plano de Treino</title>
    <link rel="stylesheet" href="../styles/forms.css">
</head>
<body>
    <div class="form-container">
        <h1>Cadastrar Plano de Treino</h1>
        <form action="../../CRUD/planos/cadastrar.php" method="POST">
            <label for="nome_plano">Nome do Plano:</label>
            <input type="text" id="nome_plano" name="nome_plano" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao"></textarea>

            <label for="duracao_semanas">Duração (semanas):</label>
            <input type="number" id="duracao_semanas" name="duracao_semanas">

            <label for="tipo_treino">Tipo de Treino:</label>
            <input type="text" id="tipo_treino" name="tipo_treino">

            <label for="instrutor_id">Instrutor Responsável:</label>
            <select id="plano_id" name="plano_id" required>
                <?php echo gerarOpcoesPlano(); ?>
            </select>   

            <button type="submit">Cadastrar</button>
            <a href="../home.html" class="back-link">Voltar</a>
        </form>
    </div>
</body>
</html>