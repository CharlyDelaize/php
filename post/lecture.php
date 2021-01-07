<?php

$nom_fichier= "liste.txt";

$fichier = file($nom_fichier); // La fonction file fait tout son travail, elle nous retourne chaque ligne d'un fichier à des indices différents dans un tableau array

//var_dump($fichier);

print "<pre>"; print_r($fichier); print "</pre>";

foreach($fichier as $ligne){
    echo $ligne . "<br>";
}
//unlink($nom_fichier); //supprime le fichier