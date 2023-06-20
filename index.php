<?php
include 'pilotos.php'
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultado da Corrida</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Resultado da Corrida</h1>
    <nav>
        <img src="formula-1-logo-7.png" alt="logo" class="logo">
    </nav>
    <section>
    <table>
        <tr>
            <th>Posição</th>
            <th>Chegada</th>
            <th>Código</th>
            <th>Nome do Piloto</th>
            <th>Quantidade de Voltas Completadas</th>
            <th>Tempo Total de Prova</th>
        </tr>
        <?php
        $position = 1;
        foreach ($raceResults as $code => $result) {
            $name = $result['name'];
            $laps = $result['laps'];
            $totalTime = formatTime($result['totalTime']);
            $arrivalTime = formatTime($result['totalTime'] - $raceResults[0]['totalTime']);

            echo "<tr>";
            echo "<td>" . $position . "</td>";
            echo "<td>" . $arrivalTime . "</td>";
            echo "<td>" . $code . "</td>";
            echo "<td>" . $name . "</td>";
            echo "<td>" . $laps . "</td>";
            echo "<td>" . $totalTime . "</td>";
            echo "</tr>";

            $position++;
        }
        ?>
    </table>
    </section>
</body>
</html>}
