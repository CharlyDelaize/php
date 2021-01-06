<h1>Page 2</h1>
<?php
// $_GET représente l'url, il s'agit d'une superglobale, si elle n'est pas écrite en majuscule, ça ne marchera pas. 
if ($_GET) // Si le $_GET n'est pas vide , c'est qu'il y a des informations.
{
print "parametre1: " . $_GET['article'] . "<br />";
print "parametre2: " . $_GET['couleur'] . "<br />";
print "parametre3: " . $_GET['prix'] . "<br />";
}
print "<pre>"; print_r($_GET); print "</pre>";
// var_dump($_GET);

// ?article=jean&couleur=bleu&prix=10
// ?cle=valeur&cle=valeur&cle=valeur
// pour acceder à une valeur via &_GET on précise la clé entre crochets $_GET['cle'] car $_GET comme toutes autre superglobale est un ARRAY