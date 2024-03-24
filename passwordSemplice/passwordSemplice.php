<?php 

/* AUTORE: Daniel Loddo 5^A inf 11/12/2023 
(senza usare la tabella ASCII)
*/

if(isset($_GET["password"])){
    $password = $_GET["password"];
    $lunghezza = strlen($password);
    $erroreStr = "<span style='color: red; font-weight: 500; text-transform: uppercase;'>Errore</span>: ";
    $ritorno = "<br><a href='passwordSemplice.html'>Torna alla pagina per inserire la password</a><br>";
    $errore = false; //Variabile booleana che segna se ci sono stati errori

    try {

        /* CONTROLLO LUNGHEZZA */
        if($lunghezza < 8 || $lunghezza > 12){
            $errore = true;
            echo  "$erroreStr La lunghezza della password dev'essere compresa tra 8 e 12 caratteri. Hai inserito $lunghezza caratteri. <br>";
        }

        /* CONTROLLO CARATTERI ALFABETICI */

        $carAlf = 0; //variabile di conta dei caratteri alfabetici
        $vettAlf = str_split("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"); //Vettore dei caratteri alfabetici
        $vettorePswd = str_split($password);
        $lunghezzaVettore = count($vettorePswd);

        for($j = 0; $j<$lunghezzaVettore; $j++){
            for($k = 0; $k < count($vettAlf); $k++){
                if($vettorePswd[$j]===$vettAlf[$k]){
                    $carAlf ++;
                }
            }
        }

        if ($carAlf < 4) {
            $errore = true;
            echo  "$erroreStr Devi inserire almeno 4 caratteri alfabetici, maiuscoli o minuscoli. Ne hai inseriti: $carAlf. <br>";
        }

        /* CONTROLLO CARATTERI NUMERICI */

        $carNum = 0;
        $vettNum = str_split("1234567890");
        $caratteriConsecutivi = false; // Variabile booleana per indicare se ci sono caratteri numerici o speciali consecutivi

        $j = 0;
        while($j<$lunghezzaVettore && $caratteriConsecutivi === false){
            for($k = 0; $k < count($vettNum); $k++){
                if($vettorePswd[$j]===$vettNum[$k]){
                    $carNum ++;

                    if($j>0){
                        $carPrecedente = $vettorePswd[$j-1];
                    }
                    if($j<$lunghezzaVettore){
                        $carSuccessivo = $vettorePswd[$j +1];
                    }

                    if(isset($carPrecedente)){
                        for($i = 0; $i < count($vettNum); $i++){
                            if($carPrecedente === $vettNum[$i]){
                                $caratteriConsecutivi = true;
                                $errore = true;
                                echo  "$erroreStr Non puoi inserire dei caratteri numerici consecutivi. <br>";
    
                            }
                        }
                    }

                    if(isset($carSuccessivo)){
                        for($i = 0; $i < count($vettNum); $i++){
                            if($carSuccessivo === $vettNum[$i]){
                                $caratteriConsecutivi = true;
                                $errore = true;
                                echo  "$erroreStr Non puoi inserire dei caratteri numerici consecutivi. <br>";
                            }
                        }
                    }
                }
            }
            $j++;
        }

        if($carNum < 1 || $carNum > 3){
            $errore = true;
            echo  "$erroreStr Devi inserire almeno un carattere numerico, ma non più di tre. Ne hai inserito: $carNum. <br>";
        }

        /* CONTROLLO CARATTERI SPECIALI ( ?&%*!+-^# )*/

        $carSpec = 0;
        $vettSpec = str_split("?&%*!+-^#"); // Vettore dei caratteri speciali accettati

        $j = 0;
        while($j < $lunghezzaVettore && $caratteriConsecutivi === false){
            for($k = 0; $k < count($vettSpec); $k++){
                if($vettorePswd[$j]===$vettSpec[$k]){
                    $carSpec ++;

                    if($j>0){
                        $carPrecedente = $vettorePswd[$j-1];
                    }
                    if($j<=$lunghezzaVettore-2){
                        $carSuccessivo = $vettorePswd[$j+1];
                    }

                    if(isset($carPrecedente)){
                        for($i = 0; $i < count($vettSpec); $i++){
                            if($carPrecedente === $vettSpec[$i]){
                                $caratteriConsecutivi = true;
                                $errore = true;
                                echo  "$erroreStr Non puoi inserire dei caratteri speciali consecutivi. <br>";
                            }
                        }
                    }

                    if(isset($carSuccessivo)){
                        for($i = 0; $i < count($vettSpec); $i++){
                            if($carSuccessivo === $vettSpec[$i]){
                                $errore = true;
                                $caratteriConsecutivi = true;
                                echo  "$erroreStr Non puoi inserire dei caratteri speciali consecutivi. <br>";
                            }
                        }
                    }
                }
            }
            $j++;
        }

        if ($carSpec <= 0) {
            $errore = true;
            echo  "$erroreStr Devi inserire almeno un carattere speciale. Caratteri ammessi: '?&%*!+-^#'. Ne hai inserito $carSpec. <br>";
        }

        /* TERMINE CONTROLLO */
        if($errore != true){
            //Creo un cookie con il risultato del controllo
            setcookie("passwordCorretta","true",time()+3600,"/"); // scade tra 3600 secondi e il cookie viene generato nel percorso "/"
            if(isset($_COOKIE["passwordCorretta"]))
                echo "Il cookie del controllo password è stato generato. Valore del cookie: ".$_COOKIE["passwordCorretta"];
        }
        
        echo $ritorno;


    } catch (Exception $e) {
        echo  "$erroreStr Torna alla <a href='passwordSemplice.html'>pagina per inserire la password</a>";
    }

} else {
    echo  "$erroreStr ";
}

?>