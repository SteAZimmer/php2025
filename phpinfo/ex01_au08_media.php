<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média | Aula 08 - Atividade</title>
</head>
<body>
    <h1>Média dos alunos do 3EM da disciplina de: <em>Física</em></h1>
    <form action="" method="POST">
        <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<label>Nome do aluno $i:</label><br>";
                echo "<input type='text' name='nome[]' required><br>";
                echo "<label>Nota:</label><br>";
                echo "<input type='number' name='nota[]' step='0.01' min='0' max='10' required><br><br>";
            }
        ?>
        <button type="submit" name="enviar">Calcular média da turma</button>
    </form>
    <?php
        function calcularMedia($notas) {
            return array_sum($notas) / count($notas);
        }

        if (isset($_POST["enviar"])) {
            $_SESSION["alunos"] = $_POST["nome"];
            $_SESSION["notas"] = $_POST["nota"];

            $nomes = $_SESSION["alunos"];
            $notas = $_SESSION["notas"];

            $media = calcularMedia($notas);
            $maior = max($notas);
            $indiceMaior = array_search($maior, $notas);
            $melhorAluno = $nomes[$indiceMaior];

            echo "<h2>Resultado</h2>";
            echo "<p>Média da turma: <strong>" . number_format($media, 2) . "</strong></p>";
            echo "<p>Maior nota: <strong>$maior</strong> (Aluno: <strong>$melhorAluno</strong>)</p>";

            echo "<h3>Lista de alunos</h3><ul>";
            foreach ($nomes as $i => $n) {
                echo "<li>$n - Nota: $notas[$i]</li>";
            }
            echo "</ul>";
        }
    ?>
    <?php
        require_once("../../estrutura/footer.php");
    ?>
</body>
</html>