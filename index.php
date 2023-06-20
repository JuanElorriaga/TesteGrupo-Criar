<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Criar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="corpo">
   <header class="header">
    <nav class="nav">
    <ul class="menu">
            <li> <img src="formula-1-logo-7.png" alt="logo"class="logo"></li>
            <li><a href="#corredores">Corredores</a></li>
            <li> <a href="#tempo">Tempo</a></li>
            <li> <a href="#Melhor">Melhor Volta de cada piloto</a></li>
        </ul>
    <nav>
   </header> 
    <main>
        <div>
            <p> A corrida mais incrível está para começar, descubra quem foi o campeão:</p>
            <?php include './pitolos.php'?>
 
        </main>
    <footer>

    </footer>
</body>
</html>