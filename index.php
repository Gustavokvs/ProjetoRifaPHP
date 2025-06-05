<?php

$mensagem = "";
$contadorDeRifas = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST["numeroDeRifas"]) && !empty(trim($_POST["numeroDeRifas"]))
    ) {

        $numeroDeRifas = intval($_POST["numeroDeRifas"]);

        $mensagem = "<ul>";

        for ($i = 0; $i < $numeroDeRifas; $i++) {
            $contadorDeRifas = str_pad($i + 1, 3, "0", STR_PAD_LEFT);

            $mensagem .= "<li>$contadorDeRifas</li>";
        }

        $mensagem .= "</ul>";


    } else {
        $mensagem = "Por favor, preencha o campo.";
    }
}




?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de rifas</title>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .resultado,
            .resultado * {
                visibility: visible;
            }

            .resultado {
                position: absolute;
                top: 0;
                left: 0;
            }
        }
    </style>
</head>

<body>

    <form method="post">
        <label for="numeroDeRifas">Quantos números quer gerar?:</label>
        <input type="number" name="numeroDeRifas" id="numeroDeRifas"
            value="<?= isset($_POST["numeroDeRifas"]) ? htmlspecialchars($_POST["numeroDeRifas"]) : '' ?>">


        <button type="submit">Gerar</button>
    </form>

    <div class="resultado">
        <h1>Resultado</h1>
        <?= $mensagem ?>
        <br><br>
        <button type="button" onclick="window.location.href='http://localhost/Rifa/'">Voltar</button>
        <button type="button" onclick="window.print()">Imprimir</button>
    </div>



</body>

</html>