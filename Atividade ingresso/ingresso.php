<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ingressos</title>
</head>
<body>
    <div class="form-container">
    <h2>Formulário de ingresso</h2>
    <form method="POST" action="">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite aqui" required>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" placeholder="Digite aqui" required>

        <label for="tipo">Tipo de ingresso:</label>
        <select id="tipo" name="tipo">
            <option value="Regular">Regular</option>
            <option value="VIP">VIP</option>
        </select>

        <button type="submit">Enviar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = htmlspecialchars($_POST["nome"]);
        $idade = (int)$_POST["idade"];
        $tipo = $_POST["tipo"];

        // Verificação de idade
        if ($idade < 18) {
            echo "<p class='negado'>Acesso negado ❌ — Apenas maiores de 18 anos.</p>";
        } else {
            // Definir preço conforme tipo de ingresso
            $valor = ($tipo == "VIP") ? 50 : 20;

            echo "<div class='autorizado'>";
            echo "<p>Olá, <strong>$nome</strong>!</p>";
            echo "<p class='ok'>Acesso autorizado ✅</p>";
            echo "<p>Tipo de ingresso: <strong>$tipo</strong> custando R$ " . number_format($valor, 2, ',', '.') . "</p>";
            echo "</div>";
        }
    }
    ?>
</div>

    
</body>
</html>