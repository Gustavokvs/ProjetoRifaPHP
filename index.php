<?php
$mensagem = "";
$contadorDeRifas = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST["numeroDeRifas"], $_POST["nomeCampanha"], $_POST["premios"], $_POST["valorRifa"]) &&
        !empty(trim($_POST["numeroDeRifas"])) &&
        !empty(trim($_POST["nomeCampanha"])) &&
        !empty(trim($_POST["premios"])) &&
        !empty(trim($_POST["valorRifa"]))
    ) {
        $nomeCampanha = strval(trim($_POST["nomeCampanha"]));
        $premios = htmlspecialchars(trim($_POST["premios"]));
        $valorRifa = htmlspecialchars(trim($_POST["valorRifa"]));
        $numeroDeRifas = intval($_POST["numeroDeRifas"]);

        $mensagem .= "<h2 class='campanha-titulo'>$nomeCampanha</h2>";
        $mensagem .= "<p><strong>Prêmios:</strong> $premios</p>";
        $mensagem .= "<p><strong>Valor da Rifa:</strong> R$ $valorRifa</p>";
        $mensagem .= "<div class='rifas-container'>";

        for ($i = 0; $i < $numeroDeRifas; $i++) {
            $contadorDeRifas = str_pad($i + 1, 3, "0", STR_PAD_LEFT);
            $mensagem .= "
<div class='bilhete'>
    <div class='canhoto'>
        <p><strong>Campanha:</strong> $nomeCampanha</p>
        <p><strong>Número:</strong> $contadorDeRifas</p>
        <p><strong>Prêmio:</strong> $premios</p>
        <p><strong>Valor:</strong> R$ $valorRifa</p>
    </div>
    <div class='canhoto'>
        <p><strong>Campanha:</strong> $nomeCampanha</p>
        <p><strong>Número:</strong> $contadorDeRifas</p>
        <p><strong>Prêmio:</strong> $premios</p>
        <p><strong>Valor:</strong> R$ $valorRifa</p>
    </div>
</div>";
        }

        $mensagem .= "</div>";
    } else {
        $mensagem = "<div class='erro'>Por favor, preencha todos os campos.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gerador de Rifas</title>
    <link rel="stylesheet" href="./styles/styles.css" />
    <link rel="stylesheet" href="./styles/reset.css">
</head>

<body>
    <div class="main">
        <form id="campo" method="post">
            <label for="numeroDeRifas">Quantos números quer gerar?:</label>
            <input type="number" name="numeroDeRifas"
                value="<?= isset($_POST["numeroDeRifas"]) ? htmlspecialchars($_POST["numeroDeRifas"]) : '' ?>" />

            <label for="nomeCampanha">Qual o nome da campanha?:</label>
            <input type="text" name="nomeCampanha"
                value="<?= isset($_POST["nomeCampanha"]) ? htmlspecialchars($_POST["nomeCampanha"]) : '' ?>" />

            <label for="premios">Quais os prêmios?:</label>
            <input type="text" name="premios"
                value="<?= isset($_POST["premios"]) ? htmlspecialchars($_POST["premios"]) : '' ?>" />

            <label for="valorRifa">Valor da rifa (R$):</label>
            <input type="number" name="valorRifa"
                value="<?= isset($_POST["valorRifa"]) ? htmlspecialchars($_POST["valorRifa"]) : '' ?>" />

            <button type="submit">Gerar</button>
        </form>

        <div class="resultado">
            <?= $mensagem ?>
        </div>

        <div class="botoes">
            <button type="button" onclick="window.location.href='index.php'">Limpar</button>
            <button type="button" onclick="window.print()">Imprimir</button>
        </div>
    </div>
</body>

</html>