<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora | Aula 08 - Atividade</title>
</head>
<body>
    <?php require_once("../../estrutura/header.php"); ?>
    <h1>Calculadora de Custo de Viagem</h1>
    <form action="" method="POST">
        <label>Distância (km):</label><br>
        <input type="number" name="distancia" step="0.1" required><br><br>

        <label>Preço do combustível (R$/litro):</label><br>
        <input type="number" name="preco" step="0.01" required><br><br>

        <label>Consumo médio (km/l):</label><br>
        <input type="number" name="consumo" step="0.1" required><br><br>

        <label>Número de pedágios:</label><br>
        <input type="number" name="pedagios" required><br><br>

        <label>Custo médio por pedágio (R$):</label><br>
        <input type="number" name="custoPedagio" step="0.01" required><br><br>

        <button type="submit" name="calcular">Calcular</button>
    </form>
    <?php
        function custoViagem($dist, $preco, $consumo, $numPed, $custoPed) {
            $litros = $dist / $consumo;
            $cCombustivel = $litros * $preco;
            $cPedagio = $numPed * $custoPed;
            $total = $cCombustivel + $cPedagio;

            return array(
                "litros" => $litros,
                "cCombustivel" => $cCombustivel,
                "cPedagio" => $cPedagio,
                "total" => $total
            );
        }

        if (isset($_POST["calcular"])) {
            $r = custoViagem($_POST["distancia"], $_POST["preco"], $_POST["consumo"], $_POST["pedagios"], $_POST["custoPedagio"]);

            echo "<h2>Resultados</h2>";
            echo "<p>Litros necessários: <strong>" . number_format($r["litros"], 2) . " L</strong></p>";
            echo "<p>Custo de combustível: <strong>R$ " . number_format($r["cCombustivel"], 2) . "</strong></p>";
            echo "<p>Custo total de pedágios: <strong>R$ " . number_format($r["cPedagio"], 2) . "</strong></p>";
            echo "<p><strong>Custo total da viagem: R$ " . number_format($r["total"], 2) . "</strong></p>";
        }
    ?>
    <?php require_once("../../estrutura/footer.php"); ?>
</body>
</html>