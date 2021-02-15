<?php

/* $pays = array(0 => array("pays" => "France", "capitale" => "Paris"), 1 => array("pays" => "Italie", "capitale" => "Rome"), 2 => array("pays" => "Espagne", "capitale" => "Madrid"), 3 => array("pays" => "inconnu", "capitale" => "?"), 4 => array("pays" => "Allemagne", "capitale" => "Berlin"));

 for($i = 0; $i < sizeof($pays); $i++)
{
    echo 'La capitale ' . $pays[$i]['capitale'] . ' se situe en ' . $pays[$i]['pays'] . "<br>";
    if($pays[$i]['pays'] === "inconnu"){
        echo "ça n'existe pas ! <br>";
    }
} */

$pays = array(
    'France' => 'Paris',
    'Italie' => 'Rome',
    'Espagne' => 'Madrid',
    'inconnu' => '?',
    'Allemagne' => 'Berlin'
);

foreach($pays as $cle => $valeur){
    if($cle == 'inconnu'){
        echo "ça n'existe pas ! <br>";
    }else{
        echo "la capitale " . $valeur . " se situe en " . $cle . "<br>";
    }
}

?>

