<?php 
try {
    $o1 = trim($_GET["operando1"]);
    $o2 = trim($_GET["operando2"]);
    $o = trim($_GET["operatore"]);
    $risultato = 0;
    $msgErrore = "ERRORE: ";
    
    if((isset($o1)&&isset($o2)&&isset($o)) && ($o != "" && $o1 != "" && $o2 != "")){
        if(!is_numeric($o1)){
            echo "$msgErrore il primo operando inserito non è valido!";
            linkRitorno();
        } else if(!is_numeric($o2)){
            echo "$msgErrore il secondo operando inserito non è valido!";
            linkRitorno();
        } else if($o != "+" && $o != "-" && $o != "*" && $o != "/"){
            echo "$msgErrore l'operatore inserito non è valido! <br>
            Sono accettati soltanto i caratteri + - / *";
            linkRitorno();
        } else {
            switch($o){
                case ("+"): $risultato = $o1 + $o2; break;
                case ("-"): $risultato = $o1 - $o2; break;
                case ("*"): $risultato = $o1 * $o2; break;
                case ("/"): $risultato = $o1 / $o2; break;
            }
    
            echo "$risultato";
            linkRitorno();
        }
    } else {
        echo "Tutti i campi devono essere compilati!";
        linkRitorno();
    }
} catch (Exception $e) {
    echo "Si è verificato un errore!";
    linkRitorno();
} catch (DivisionByZeroError $e) {
    echo "Non è possibile dividere per zero!";
    linkRitorno();
}

function linkRitorno(){
    echo "<br><br><a href='calcolatrice.html'>Torna alla calcolatrice</a>";
}


?>