<style>h2{margin: 0; font-size: 15px; color: red; }</style>
<h2>Ecriture et Affichage</h2>

<?php

echo 'Bonjour'; // echo est une instruction qui nous permet d'effectuer un affichage
echo '<br>'; // Nous pouvons également y mettre du HTML
echo 'Bienvenue'; /* Ceci est un commentaire sur
                  plusieurs lignes 
                  */
                  # commentaire sur une seule ligne
echo '<br>';
print 'Nous sommes le lundi';
echo '<br>';
echo '<h3>Bonjour</h3>'; // On peut mélanger du HTML et du PHP
?>

<h3><?php echo 'bonjour'; // Entrée et sortie répétitive du PHP (code moins professionel) ?></h3><br>

<hr><h2>Variables</h2>

<?php
// Déclaration d'une variable avec le signe $
$a = 123; // Affectation de la valeur 123 dans la variable nommée "a".
echo gettype($a); // Type retourné integer
echo '<br>';

$b = 1.5;
echo gettype($b); // Type retourné double
echo '<br>';

$c = "texte";
echo gettype($c); // Type retourné string
echo '<br>';

$d = "123";
echo gettype($d); // Type retourné string
echo '<br>';

$e = true;
echo gettype($e); // Type retourné boolean
echo '<br>';

$a = 130;
echo "$a"; // va afficher 130 car nous avons réaffecté une valeur à $a qui écrase la précedente à 123
echo '<br>';

$prenom = 'Charly Delaize';
echo "Bonjour, je m'appelle $prenom ";
echo '<br>';
echo "Comment vas-tu $prenom ?";
echo '<br>';
echo "moi, $prenom, je vais bien";

echo '<hr><h2>Assignation par référence</h2>';

$a = 'salut';
$b = $a;
echo $a;
echo "<br>";
echo $b;
$b = 123; // On essai d'affecter une nouvelle valeur à $b
//$b = &$a; // Assigne par référence $a à $b
echo $b; // Affiche salut et non pas 123 (si $a change, $b change aussi)

// ----------------------------------------------------------------------
echo '<hr><h2>La concaténation</h2>';
$x = "bonjour";
$y = "tout le monde";
echo $x . ' ' . $y . "<br>"; // Point de concaténation que l'on peut traduire par "suivi de"
echo "$x $y <br>"; // Meme chose sans concatenation
echo "Salut, " . $x . ' ' . $y . "<br>";
echo "Salut ", $x, $y; // Concaténation avec virgule (la virgule et le point sont similaires)
//--------------------------------------------------------------------------------------------
echo '<hr><h2>Concaténation lors de l\'affectation</h2>';
$prenom1 = "Toto"; // Affectation de la valeur "Toto" sur la variable $prenom1
$prenom1 = "Tata"; // Affectation de la valeur "Tata" sur la variable $prenom1... cela remplace Toto par Tata
echo $prenom1 . "<br>"; // Affiche : Tata
$prenom2 = "Titi "; // Affectation de la valeur "Toto" sur la variable $prenom2
$prenom2 .= "Tutu"; // Affectation de la valeur "Tutu" sur la variable $prenom2... cela l'ajoute SANS remplacer la valeur précédente grâce à l'opérateur .=
echo $prenom2; // Affiche : Titi Tutut
//------------------------------------
echo '<hr><h2>Guillemets et Quotes</h2>';
$message = 'aujourd\'hui'; // Ou bine $message = "aujourd'hui"
$txt = "Bonjour";
echo $txt . " " . "tout le monde <br>" ; //Concaténation
echo "$txt tout le monde <br>"; // Affichage dans les guillemets, la variable est évaluée
echo '$txt tout le monde <br>'; // Affichage dans les quotes, la variable n'est pas évaluée !
//-------------------------------------------------------------------------------------------
echo '<hr><h2>Constante et Constante magique</h2>';
define("CAPITALE", "Paris"); //Par convention, une constante se déclare toujours en majuscule
echo CAPITALE; '<br>';

// constante magique
echo __FILE__."<br>";
echo __LINE__."<br>";
// echo __FUNTION__; // Affiche le nom de la fonction dans laquelle nous sommes
// echo __CLASS__; // Affiche le nom de la classe dans laquelle on est
// echo __METHOD__; // Affiche le nom de la méthode dans laquelle on est
//-----------------------------------------------------------------------
echo '<hr><h2>Exo Variable</h2>';
// Exercice : Affiche Bleu-Blanc-Rouge (avec les tirets) en mettant chaque couleurs dans une variable
$couleur1 = 'Bleu';
$couleur2 = 'Blanc';
$couleur3 = 'Rouge';

echo $couleur1 . "-" . $couleur2 . "-" . $couleur3 . '<br>';
echo "$couleur1-$couleur2-$couleur3";
//------------------------------------
echo '<hr><h2>Opérateurs arithmétiques</h2>';
$a = 10; $b = 2;
echo $a + $b . "<br>"; //Affiche 12

echo $a - $b . "<br>"; //Affiche 8

echo $a * $b . "<br>"; //Affiche 20

echo $a / $b . "<br>"; //Affiche 5

//Opération/affectation
$a = 10; $b = 2;
$a += $b; // Equivaut à $a = $a + $b, Affiche 12
echo $a."<br>";
$a -= $b; // Equivaut = $a = $a - $b, Affiche 10
$a *= $b; // Equivaut = $a = $a - $b, Affiche 20
$a /= $b; // Equivaut = $a = $a - $b, Affiche 10
//-----------------------------------------------
echo '<hr><h2>Structures conditionnelles (if/else) - Opérateurs de comparaison</h2>';
//isset & empty
//empty = test si c'est vide ----- isset = test si c'est défini
$var1 = 0;
$var2 = " ";
if(empty($var1)) echo 'ta variable contient 0, vide ou non définie <br>';
if(isset($var2)) echo 'var2 existe et est définie par rien <br>';

//if, else, elseif et opérateurs de comparaison
$a=10 ; $b=5 ; $c=2; 
if($a > $b) // Si $a est supérieur à $b
{
    echo "A est bien supérieur à B <br>";
}
else // sinon
{
    echo "non, A n'est pas supérieur à B<br>";
}
//--------------------------------------------
if($a > $b && $b > $c) // Si A est supérieur à B et qu'en meme temps B est supérieur à C
{
    echo "ok pour les 2 conditions <br>";
}

if($a == 9 || $b > $c) // Si A contient 9 ou que B est supérieur à C
{
    echo "ok, au moins une condition est bonne <br>";
}else{
    echo "aucune condition n'est bonne <br>";
}
// --------------------------------------
if($a == 8) // Le double égal permet de vérifier une infomation à l'intérieur d'une variable
{
    echo "1 - A est égal à 8 <br>"; // ne sera pas affiché car $a n'est pas égal à 8
}
elseif($a != 10) //SinonSi A est différent de 10
{
    echo "2 - A est différent de 10 <br>"; // Ne sera pas affiché car $a n'est pas différent de 10
}
else // Sinon, c'est que je suis ni tombé dans le if, ni dans le elseif, je me trouve dans le else
{
    echo "3 - Tout le monde a faux <br>"; // C'est cette echo qui sera affiché car conditions précédentes n''étaient pas bonnes
}
//-------------------------------------------------------------------------------------------------------------------------------
if($a == 10 XOR $b == 6) // XOR ; Seulement l'une des conditions doit etre valide
{
    echo 'ok bonne condition <br>'; // Si les deux conditions sont bonnes ou les deux conditions sont mauvaises, nous ne rentrerons pas ici
}
//------------------------------------------------------------------------------------------------------------------------------------------
// Forme congtractée : 2ème possibilitée d'écriture de if
echo ($a == 10) ? "a est égal à 10<br>" : "a n'est pas égal à 10<br>";
// Le ? pourrait remplacer le IF, les : remplace le else

$var1 = isset($maVar) ? $maVar : 'valeur_par_defaut'; // si $maVar existe, on affecte sa valeur à $var, sinon on y dépose une information par défaut
echo $var1 . '<br>';
$var2 = $maVar ?? 'valeur_par_defaut'; // la meme chose en plus court avec les ?? soit l'un soit l'autre.
echo $var2 . '<br>';
$var3 = $_GET['pays'] ?? $_GET['ville'] ?? 'pas d\'informations'; // soit on prend le pays, soit on prend la ville, soit on prend 'pas d'information'
echo $var3 . '<br>';
//-------------------
//Comparaison
$vara = 1;
$varb = "1";
if($vara == $varb)
{
    echo "il s'agit de la meme chose";
}
// avec le double égal le echo s'affiche mais pas avec le triple égal
/*
= Affectation
== Comparaison des valeurs
=== Comparaisons des valeurs et du type
*/
// -------------------------------------
echo '<hr><h2>Condition Switch</h2>';
$couleur = 'jaune';
switch ($couleur)
{
    case 'bleu';
        echo 'vous aimez le bleu <br>';
    break;
    case 'rouge';
        echo 'vous aimez le rouge <br>';
    break;
    case 'vert';
        echo 'vous aimez le vert <br>';
    break;
    default: 
    echo 'vous n\'aimez ni le bleu, ni le rouge, ni le vert... <br>';
    break;
}

// switch($couleur){
//     case 'jaune' : switch($autrevar){
//         case 'autrepossibilite';
//             echo '....';
//         break;
//     }
// }

// EXERCICE : Reproduisez la meme chose que le switch avec des conditions

$couleur = 'vert';

if ($couleur == 'bleu'){
    echo 'vous aimez le bleu <br>';
}
elseif($couleur == 'rouge'){
    echo 'vous aimez le rouge <br>';
}
elseif($couleur == 'vert'){
    echo 'vous aimez le vert <br>';
}
else{
    echo 'aucune des conditions n\'est bonne <br>';
}
//--------------------------------------------------
echo '<hr><h2>Fonctions Prédéfinies</h2>';
echo '<br>Date :<br>';
print date("d/m/Y");
echo '<br>';
//---------
echo '<hr><h2>Fonctions Prédéfinies : Traitement des chaines (iconv_strlen, strpos, substr) </h2>';
$email1 = "toto@gmail.com";
echo strpos($email1, "@");
//------------------------
$email2 = "bonjour";
echo strpos($email2, "@");
var_dump(strpos($email2, "@"));
/*
strpos() est une fonction prédéfinie permettant de trouver la position d'un caractère dans une chaine de caractères
Succès : integer (int)
Echec : boolean false (boolean)
Arguments :
1. Nous devons lui fournir la chaine dans laquelle nous devons chercher
2. Nous devons lui fournir l'information à chercher
*/
//-------
$phrase = "Ceci est une chaine de caractere";
echo iconv_strlen($phrase);
/*
iconv_strlen() est une fonction prédéfinie permettant de retourner la taille d'une chaine :
Succès : int
Echec : boolean false
Argument :
Nous devons lui fournir la chaine dont laquelle nous souhaitons connaitre la taille
*/
//-------
$texte = "La situation est inchangée ce mardi avec une dépression en Méditerranée et un anticyclone en Mer du Nord, dirigeant un flux de nord-est froid";
echo substr($texte, 0, 10); "<a href=''>Lire la suite</a>";
/*
substr() est une fonction prédéfinie permettant de retourner une partie de la chaine
Succès : string
Echec : Boolean false
Arguments : boolean false
1. Nous devons lui fournir la chaine que l'on souhaite couper
2. Nous devons lui préciser la position de début 
3. Nous devons lui préciser la position de fin
*/
//-------
echo '<hr><h2>Fonctions Utilisateurs</h2>';
// Les fonctions qui ne sont pas définis dans le langage sont déclaré et éxecuté par l'utilisateur
function separation() // Déclaration d'une fonction prévue pour ne pas laisser d'arguments
{
    echo "<hr><hr><hr>";
}

separation();
//----------
// Fonction avec arguments :
function bonjour($qui)
{
    return "Bonjour $qui <br>";
}
$prenom = 'Sara';
//execution
// La fonction bonjour() attend toujours un argument qui est obligatoire pour l'execution
echo bonjour($prenom); // L'argument peut etre une variable
echo bonjour('david'); // Mais aussi une chaine
//---------------------------------------------
function appliqueTva($nombre)
{
    return $nombre*1.2;
}
echo appliqueTva(100) . '<br>';
//--- Exercice : Pourriez-cous améliorer cette fonction afin que l'on puisse calculer un nombre avec les taux de notre choix(19.6%, 5.5%, 7%)
function appliqueTva2($nombre, $tva = 1.196)
{
    return $nombre*$tva;
}
echo '100€ avec une TVA à 7% font ' . appliqueTva2(100) . '<br>';
//---------------------------------------------------------------
meteo("hiver", "2");
function meteo($saison, $temperature)
{
    echo "Nous sommes en $saison et il fait $temperature degré(s) <br>";
}

//Exercice gérez le S de degrés en fonction de la température
exoMeteo("hiver", "1");
function exoMeteo($saison, $temperature)
{
    if($temperature >= -1 && $temperature <= 1){
        echo "Nous sommes en $saison et il fait $temperature degré <br>";
    }else{
        echo "Nous sommes en $saison et il fait $temperature degrés <br>";
    }
} 
//----------------------------------------------------------------------
function jourSemaine()
{
    $jour = "Lundi <br>"; // variable local
    return $jour; // Une fonction peut retourner qq chose (à ce moment là on quitte la fonction)
    echo 'coucou';// /!\ CETTE LIGNE NE SORTIRA JAMAIS CAR IL Y A UN RETURN AVANT
}
//echo $jour; // ne s'affiche pas car $jour est une variable locale
echo jourSemaine(); // affiche 'Lundi' et pas le 'coucou' qui lui est après le return
//-----------------------------------------------------------------------------------
$pays = 'Maroc';

function affichePays()
{
    global $pays;
    echo $pays;
}
affichePays();
//------------
function facultatif() // fonction avec argument facultatif
{
    print "<pre>"; print_r(func_get_args()); print "<pre>";
    $array = func_get_args();
    foreach($array as $indice => $element) // func_get_args() permet d'obtenir un tableau avec les arguments passés.
    {
        echo $indice, "->", $element, "<br>";
    }
}
facultatif();
facultatif("France", "Italie", "Algérie", 7);
facultatif("allo");
//-----------------
//On précise en amont le type obligatoire des valeurs entrantes des arguments
function identite(string $nom, int $age)
{
    return $nom . ' a ' . $age . ' ans' . '<br>';
}
echo identite('Hocine', "37");
//----------------------------
// On précise en amont la valeur de retour que doit ressortire la fonction
function isAdult(int $age) : bool
{
    return $age >= 18;
}
var_dump(isAdult(7));
//-------------------
echo '<hr><h2>Structures itérative : Boucle</h2>';
$i = 0; // valeur de départ
while($i<3) // tant que $i est inférieur à 3
{
    echo "$i---"; // affiche moi $i
    $i++; // ceci est une forme contractée de : $i = $i + 1; c'est l'incrémentation du compteur et elle est effectué à chaque tour de boucle
}
// Affiche "0---1---2---"
echo '<br>';
// Exercice : Faites en sorte de ne pas avoir de tiret à la fin : 0---1---2

$j = 0; // valeur de départ
while($j<3) // tant que $i est inférieur à 3
{
    if($j < 2)
    { // Je rentre 2 fois tant que $j est inférieur à 2
        echo "$j---";
    }else
    { // Je rentre une fois quand j est égal à 2
        echo "$j";
    }
    $j++;
}echo '<br>';
//-----------
// Boucle for
for($j=0; $j < 15; $j++)
{
    print $j . '<br>';
}
// Exercice : afficher 30 options via une boucle
// echo '<select>';
// echo "<option>$k</option>";
// echo "<option>$k</option>";
// echo '</select>';
//Correction
echo '<select>';
for($k=1; $k <= 30; $k++)
{
    echo "<option>$k</option>";
}
echo '</select>';
echo '<br>';
// --------------
// Exercice : faites une boucle qui affiche de 0 à 9 sur la meme ligne dans un tableau

echo '<table border=1><tr>';
for($l=0; $l <= 9; $l++)
{
    echo "<td>$l</td>";
}
echo '</tr></table><br>';
// Exercice : faites la meme chose en allant de 0 à 99 sur plusieurs lignes sans faire 10 boucles

echo '<table border=1>';
    for($m=1 ; $m <= 1; $m++){

        echo "<tr>";
        for($o=0; $o <= 9; $o++){
            echo "<td>";
            echo $o;
            echo "</td>";
        }
        echo "</tr>";
        for($o=10; $o <= 19; $o++){
            echo "<td>";
            echo $o;
            echo "</td>";
        }
        echo "</tr>";
        for($o=20; $o <= 29; $o++){
            echo "<td>";
            echo $o;
            echo "</td>";
        }
        echo "</tr>";
        for($o=30; $o <= 39; $o++){
            echo "<td>";
            echo $o;
            echo "</td>";
        }
        echo "</tr>";
        for($o=40; $o <= 49; $o++){
            echo "<td>";
            echo $o;
            echo "</td>";
        }
        echo "</tr>";
        for($o=50; $o <= 59; $o++){
            echo "<td>";
            echo $o;
            echo "</td>";
        }
        echo "</tr>";
        for($o=60; $o <= 69; $o++){
            echo "<td>";
            echo $o;
            echo "</td>";
        }
        echo "</tr>";
        for($o=70; $o <= 79; $o++){
            echo "<td>";
            echo $o;
            echo "</td>";
        }
        echo "</tr>";
        for($o=80; $o <= 89; $o++){
            echo "<td>";
            echo $o;
            echo "</td>";
        }
        echo "</tr>";
        for($o=90; $o <= 99; $o++){
            echo "<td>";
            echo $o;
            echo "</td>";
        }
    }
echo '</table>';

?>