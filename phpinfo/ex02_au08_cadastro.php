<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Aula 08 - Atividade</title>
</head>
<body>
    <?php include_once("../../estrutura/header.php"); ?>
    <h1>Cadastro de Pessoas</h1>
    <form action="" method="POST">
        <?php 
            for ($i = 1; $i <= 10; $i++) {
                echo "<h3>Pessoa $i</h3>";
                echo "<label>Nome:</label><br><input type='text' name='nome[]' required><br>";
                echo "<label>Cidade:</label><br><input type='text' name='cidade[]' required><br>";
                echo "<label>Idade:</label><br><input type='number' name='idade[]' min='0' required><br>";
                echo "<label>Sexo:</label><br>
                    <select name='sexo[]' required>
                        <option value='M'>Masculino</option>
                        <option value='F'>Feminino</option>
                    </select><br><br>";
            }
        ?>
        <button type="submit" name="enviar">Cadastrar</button>
    </form>
    <?php
        if (isset($_POST["enviar"])) {
            $_SESSION["pessoas"] = array();

            for ($i = 0; $i < 10; $i++) {
                $_SESSION["pessoas"][] = array(
                    "nome" => $_POST["nome"][$i],
                    "cidade" => $_POST["cidade"][$i],
                    "idade" => $_POST["idade"][$i],
                    "sexo" => $_POST["sexo"][$i]
                );
            }

            $pessoas = $_SESSION["pessoas"];

            echo "<h2>1. Lista de Nomes e Idades</h2><ul>";
            foreach ($pessoas as $p) {
                echo "<li>{$p['nome']} - {$p['idade']} anos</li>";
            }
            echo "</ul>";

            echo "<h2>2. Pessoas com mais de 18 anos</h2><ul>";
            foreach ($pessoas as $p) {
                if ($p["idade"] > 18) {
                    echo "<li>{$p['nome']}</li>";
                }
            }
            echo "</ul>";

            $masculinos = 0;
            foreach ($pessoas as $p) {
                if ($p["sexo"] == "M") {
                    $masculinos++;
                }
            }
            echo "<h2>3. Total de pessoas do sexo masculino: $masculinos</h2>";
        }
    ?>
    <?php include_once("../../estrutura/footer.php"); ?>
</body>
</html>