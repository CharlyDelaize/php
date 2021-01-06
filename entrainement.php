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
echo '<hr><h2>Boucle imbriquée - Méthode 1</h2>';
echo '<table border="1"><tr>';
for($l=0; $l <= 9; $l++)
{
    echo "<td>$l</td>";
}
echo '</tr></table><br>';
// Exercice : faites la meme chose en allant de 0 à 99 sur plusieurs lignes sans faire 10 boucles
echo '<table border="1">';
for($ligne = 0; $ligne < 10; $ligne++)
{
    print "<tr>";
    for($cellule = 0; $cellule < 10; $cellule++)
    {
        print "<td>". (10 * $ligne + $cellule) . "</td>"; //10 * 0 + 0, 10 * 0 + 1, 10 * 0 + 2 ....... 10 * 9 + 9 fin des boucles car la suite ne valide pas la condition <10 pour les cellules et les lignes
    }
    print "</tr>";
}
echo "</table>";
//--------------
echo '<hr><h2>Boucle imbriquée - Méthode 2</h2>';
echo '<table border = "1">';
$i=0;
while($i <= 99)
{
    echo '<tr>';
    for($k = 0; $k <= 9; $k++)
    {
        echo "<td>$i</td>";
        $i++;
    }
    echo '</tr>';
}
echo '</table>';
//--------------
echo '<hr><h2>Inclusion de fichiers</h2>';
echo "Première fois: ";
include("exemple.inc.php");
echo '<br>';
echo "Deuxième fois: ";
include_once("exemple.inc.php");
echo '<br>';
echo "Troisième fois: ";
require("exemple.inc.php");
echo '<br>';
echo "Quatrième fois: ";
require_once("exemple.inc.php");
/* La différence entre un "include()" et "include_once()" c'est que le premier peut faire autant d'inclusion demandé et que l'autre inclut qu'une seule fois.
Pareil pour le "require()" et le "require_once()".
Il n'y a aucune différence entre include et require, sauf en cas d'erreur sur le nom du fichier.
- Include fait une erreur et continue l'éxécution du code.
- Le require fait une erreur et stoppe l'éxécution du code.
*/
//--------------
echo '<hr><h2>Tableau de données ARRAY</h2>';
$liste = array("Niamatullah", "David", "Ornella", "Charly", "Sara", "Amine");
echo "<br>print_r: ";
print_r($liste); // print_r() affiche le contenu du tableau
print "<pre>"; print_r($liste); print "</pre>"; // <pre> est une balise html permettant de formater le text; cela nous permet de mettre en forme la sortie du print_r

echo "<br>var_dumb : ";
print "<pre>"; var_dump($liste); print "</pre>"; // var_dump() affiche le contenu du tableau plus certaines informations comme le type de variables...
//-----------------------------------------------------------------------------------------------------------------------------------------------------
echo '<hr><h2>Boucle Foreach pour les tableaux de données Array</h2>';
$tab[] = "France"; // autre moyen d'affecter une valeur dans un tableau. Le mot clé Array est remplacé par.
$tab[] = "Italie"; 
$tab[] = "Espagne";
$tab[] = "Angleterre";
$tab[] = "Suisse";
$tab[] = "Portugal";
print "<pre>"; print_r($tab); print "</pre>";
// Exercice : tentez de m'afficher Angleterre en passant par le tableau
echo $tab[3] . '<br><br>';

// Exercice : afficher successivement des éléments du tableau
foreach($tab as $element)
{
    echo $element . "<br>";
}
// Récuperer les indices et les valeurs en les affichant sous cette forme : indice-valeur
foreach($tab as $indice => $valeur) // Quand il y a 2 variables. la 1ère parcours la colonne des indices et la 2ème la colonne des valeurs
{
    echo $indice . '-' . $valeur . "<br>";
}

//----------------------------------------
$couleur = array("j" => "jaune", "b" => "bleu", "v" => "vert"); //on peut choisir nos indices, ici, "j", "b", "v"
print "<pre>"; print_r($couleur); print "</pre>";
echo 'taille du tableau: '. sizeof($couleur) . '<br>'; // affiche 3
echo 'taille du tableau: '. count($couleur) . '<br>'; // count est pareil que sizeof sauf qu'il renvoie la taille du tableau, pas de différences.

print implode("-", $couleur) . '<br>'; // Implode() est une fonction prédéfinie qui rassemble les éléments d'un tableau en une chaine (séparé par un symbole).
//------------------------------------------------------------------------------------------------------------------------------------------------------------
echo '<hr><h2>Tableau Multidimensionnel</h2>';
// Nous parlons de tableau multidimensionnel quand un tableau est contenu dans un autre tableau.
$tab_multi = array(0 => array("prenom" => "Muhammet", "nom" => "Karahan"), 1 => array("prenom" => "Jordan", "nom" => "Moutawakil"), 2 => array("prenom" => "Jérémy", "nom" => "Rocard"));
print "<pre>"; print_r($tab_multi); print "</pre>";
// Exercice : afficher Jordan en passant par le tableau
echo $tab_multi[1]['prenom'] . '<br>' . '<br>';


for($i = 0; $i < sizeof($tab_multi) ; $i++) // tant que $i est inférieur au nombre d'éléments du tableau (et non <=) car il y a 3 éléments dans le tableau et nous voulons faire 0, 1, 2 soit 3 tours
{
    print $tab_multi[$i]['prenom'] . '<br>'; // on affiche l'élément du tableau d'indice $i
}
//-----------------------------------------------------------------------------------------
echo '<hr><h2>Objets</h2>';
// Un objet est un autre type de données. Un peu comme un Array, il permet de regrouper des informations.
// Cependant, cela va beaucoup plus loin car on peu y déclarer des variables (appelées : attributs ou propriétés) mais aussi des fonctions (appelés : méthodes)
class Etudiant
{
    public $prenom = "Rachid"; // Permet de préciser que l'élément sera acessible partout dans le code. Il existe aussi protected et private.
    public $age = 36;
    public function pays()
    {
        return "France";
    }
}

$objet = new Etudiant(); //new est mot clé permettant d'instancier la class et d'en faire un objet, c'est ce qui nous permet de le déployer afin que l'on puisse s'en servir, on se sert de ce qui est dans la class via l'objet !

print "<pre>"; var_dump($objet); print "</pre>";
echo $objet->prenom. '<br>'; // Nous pouvons acceder à un indice d'un tableau avec des [], mais dans un objet on accède aux propriétés et méthode avec "->"
echo $objet->age. '<br>';
echo $objet->pays(). '<br>'; // L'appel d'une méthode se fait toujours avec les ()
//--------------------------------------------------------------------------------
goto b; // On va au point "b"
echo 'Bonjour'; // Cette ligne ne s'affiche et ne s'éxecute pas

b: // On arrive au point "b"
echo 'Hello'; // après le point "b" le code s'exécute normalement
//phpinfo();

