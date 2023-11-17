<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sito prova</title>
</head>
<body>
    <h1>Pagina PHP di prova</h1>
    <p>
        <b>Obbiettivo</b>: scrivere 1000 volte "ciao". Utilizzo un semplice ciclo for con php.
    </p>
    <p>
        <?php 
            for($j = 0; $j < 1000; $j++)
                echo "ciao <br>";
        ?>
    </p>
</body>
</html>