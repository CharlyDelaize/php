<?php
//Ecrire une fonction qui permet de retourner le pourcentage en lui donnant en paramètre 3%, 100% ou 3/88

function calculPourcentage($nb1, $nb2){
    $resultat = $nb1/$nb2*100;
    return $resultat . "%";
}
echo $pourcent = calculPourcentage(3, 88);
echo "<br><br>";

//Ecrire une fonction qui stock trois (ou plus) chaines de caratère avec des minuscules et des majuscules dans un tableau, et afficher chaque entrée avec leur index et seulement avec la première lettre du premier mot de chaque entrée en majuscule

$tabch = array("cArOtTe", "hoPpS", "jUdY");
function initmaj($tab){
    foreach($tab as $ind=>$val){
        $tab[$ind]=ucfirst(strtolower($val));
    }
    return $tab;
}
print_r(initmaj($tabch));
echo "<br><br>";

//Ecrire une fonction qui permet d'afficher un input, dont on lui passe en parametre les attributs name et type
function input($name, $type){
    return '<input type='.$type.' name= ' .$name. "<br>";
}
echo input("nom", "password");
// Ecrire une fonction qui renvoit la première lettre de chaque mot (acronyme) contenue dans un variable
$str = 'Tails, Fairy, Foxy';
echo implode(array_map(function($p){
    return strtoupper($p[0]);
},explode(' ', $str)));
// Ecrire une fonction qui affiche une image avec sa taille en parametre
function img($src, $witdh){
    echo '<p><img src= ' . $src . ' width= ' . $width . '/>';
}
echo img('img/renard2.jpg', 200);
// Ecrire une fonction qui génère un tableau d'un nombre de ligne égale à une valeur écrite dans une variable et passée en paramètres, remplis de nombres aléatoires de 0 jusqu'à la valeur choisie (param)
function createTable($nb){
    $table='<table>';
    for($i=0;$i<$nb;$i++)
    {
        $table.'<tr>';
        for($j=0;$j<$nb;$j++)
        {
            $table.='<td>'.rand(0,$nb).'</td>';
        }
        $table.='</tr>';
    }
    $table.='</table>';
    return $table;
}
echo createTable(5);



$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
$rand_keys = array_rand($input, 2);
echo $input[$rand_keys[0]] . "\n";
echo $input[$rand_keys[1]] . "\n";



?>