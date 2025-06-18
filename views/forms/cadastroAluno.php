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
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="../styles/forms.css">
</head>
<body>
    <div class="form-container">
        <h1>Cadastrar Aluno</h1>
        <form action="../../CRUD/aluno/cadastrar.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" maxlength="14" required>

            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone">

            <label for="plano_id">Plano Contratado:</label>
            <select id="plano_id" name="plano_id" required>
                <?php echo gerarOpcoesPlano(); ?>
            </select>
            <button type="submit">Cadastrar</button>
            <a href="../home.html" class="back-link">Voltar</a>
        </form>
    </div>
</body>
</html>