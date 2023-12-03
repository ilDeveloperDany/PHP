<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Istrogramma vettori</title>
</head>
<body>
    <h1>Istogramma vettori</h1>
    <p>Generare un vettore di numeri casuali da 1 a 50
        e visualizzarli sottoforma di istogramma.
    </p>

    <?php 

        $arrayNumeri = array();
        $arrayColori = array('#EBAD4B', '#EBD34B', '#EBC04C', '#EB934B', '#EBE74B', '#EB891E');

        for($j = 0; $j < 10; $j++){
            $num = mt_rand(1,50);
            array_push($arrayNumeri, $num);
        }

        foreach ($arrayNumeri as $value){
            $colore = $arrayColori[mt_rand(0,count($arrayColori)-1)];
            for($j = 0; $j < $value; $j++){
                echo "<span style='background-color:$colore; color: $colore;'>x</span>";
            }
            echo "<br><br>";
        }
        
    ?>

</body>
</html>