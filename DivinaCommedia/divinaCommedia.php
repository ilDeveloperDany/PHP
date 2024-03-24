<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenuto del file "DivinaCommedia.txt"</title>
</head>
<body>
   <h1>Visualizza il contenuto formattato del file "DivinaCommedia.txt"</h1>
   <p style="font-style: italic; font-size: 12px; margin: 30px 0;">Esercizio PHP fatto da Daniel Loddo 5^A inf.</p>
   <?php 
        $divinaCommedia0 = file_get_contents("DivinaCommedia.txt");
        $codSpazio = "&nbsp;"; //codice HTML per il carattere 'spazio'

        //DOPO OGNI ; SI VA A CAPO
        $divinaCommedia1 = explode(";",$divinaCommedia0);
        $divinaCommediaFormattata0 = ""; //stringa finale, unione dei valori dell'array

        for($j = 0; $j < count($divinaCommedia1); $j++){
            $divinaCommedia1[$j].= "<br>";
            $divinaCommediaFormattata0 .= $divinaCommedia1[$j];
        }

        //DOPO OGNI . SI VA DUE VOLTE A CAPO E LA NUOVA RIGA E' SPOSTATA VERSO DESTRA DA TRE SPAZI
        $divinaCommedia2 = explode(".",$divinaCommediaFormattata0);
        $divinaCommediaFormattata1 = "";

        for($j = 0; $j<count($divinaCommedia2); $j++){
            $divinaCommedia2[$j].= "<br><br>$codSpazio $codSpazio $codSpazio";
            $divinaCommediaFormattata1 .= $divinaCommedia2[$j];
        }

        echo $divinaCommediaFormattata1;

   ?>
</body>
</html>