<?php

session_start();
$_SESSION["pseudo"]="JudyHopps";
$_SESSION["mdp"]="carotte";

echo "<br> n°1 : ";
print_r($_SESSION); // Affichage des informations contenu dans la session (une session = un array)
unset($_SESSION['mdp']); // Nous pouvons vider une partie de la session / unset
echo "<br> n°2 : ";
print_r($_SESSION); // affichage des informations restantes 

//session_destroy(); // suppression de la session, mais il faut savoir que le session_destroy est vu par l'interpréteur il est gardé puis il est exécuté à la fin du script
echo "<br> n°3 : ";
print_r($_SESSION);
?>