<?php
// ------------ 01.PDO  = PHP Data Object ---------------
echo "<h1>PDO : CONNEXION </h1>";
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// Argument : 1 (serveur + base de données), 2 (user, pseudo), 3(mdp), 4 (options).
var_dump($pdo);
// echo "<pre>"; print_r(get_class_methods($pdo)); echo "</pre>";

// ------------ 02.PDO = EXEC - INSERT, UPDATE, DELETE -----------

echo "<h1>PDO / EXEC - INSERT, UPDATE, DELETE</h1>";

$resultat = $pdo->exec('INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ("Fairy", "Podere", "m", "informatique", "2021-01-21", "1500")');
echo "nombre d'enregistrements affecté par l'INSERT : $resultat <br>";
echo "dernier id généré : ". $pdo->lastInsertId() . "<br>";
$id = $pdo->lastInsertId();
$resultat = $pdo->exec("UPDATE employes SET salaire=5000 WHERE id_employes = 8084 ");
echo "nombre d'enregistrement effectué par l'update : $resultat";

$resultat = $pdo->exec("DELETE FROM employes WHERE id_employes = 997 ");
echo "nombre d'enregistrement effectué par l'update : $resultat";

// ----------------------- 03. PDO - QUREY - SELECT + FETCH_ASSOC (1 résultat)

echo "<h1>PDO : QUREY - SELECT + FETCH_ASSOC (1 résultat)</h1>";
$resultat = $pdo->query("SELECT * FROM employes WHERE prenom='Fairy'");
var_dump($resultat);
echo "<pre>"; print_r(get_class_methods($resultat));echo "</pre>"; // premert d'afficher les méthodes de la classe PDOTATEMENT

$employe = $resultat->fetch(PDO::FETCH_ASSOC); // Pour obtenir un tableau indexé avec le nom des champs /fetch(PDO::FTECH::ROW) indexé numeriquement uniquement / fetch() mélange le fetch_assoc et fetch_row
// fetch(PDO::FETCH_OBJECT) // Retourne un objet avec les noms des champs comme propriété publique.
// Vous ne pouvez pas faire plusieurs traitements dans le meme résultat
echo "<pre>"; print_r($employe);echo "</pre>";

echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service]<br>";

/* $pdo représente un objet issu de la classe prédéfini PDO
Quand on écéxute une requete de séléction via la méthode query sur l'objet PDO:
Succès : On obtient un autre objet issu de la classe PDOStatement, cet objet a donc des méthodes et des propriétés différentes !
Echec : on obtient un booléen : FALSE
Quand on écéxute une requete INSET/UPDATE/DELETE via la méthode query sur l'objet PDO:
Succès : On obtient une booléen : TRUE
Echec : on obtient un booléen : FALSE */

// ----------------- 04 . PDO - WHILE + FETCH_ASSOC (plusieurs résultats)

echo "<h1>PDO - WHILE + FETCH_ASSOC (plusieurs résultats)</h1>";

$resultat = $pdo->query('SELECT * FROM employes');
echo "Nombre d'employes : " . $resultat->rowCount() . "<br>"; // Permet de compter le nombre de lignes retournées
while ($contenu = $resultat->fetch(PDO::FETCH_ASSOC))
{
echo "<div class ='row'>";
echo $contenu['id_employes']. "<br>";
echo $contenu['prenom']. "<br>";
echo $contenu['nom']. "<br>";
echo $contenu['sexe']. "<br>";
echo $contenu['service']. "<br>";
echo $contenu['date_embauche']. "<br>";
echo $contenu['salaire']. "<br>";
echo "</div>";
}

echo "<hr><hr>";
// Attention, il n'y a pas un tableau array avec tout enregistrement dedans mais un tableau array par enregistrement , un array par employé.
// Votre requete sort plusieurs résultats, j'utilise une boucle
// Votre requete ne doit sortir qu'un seul et unique résultat, pas de boucle
// Votre requete ne sort qu'un seul résultat mais peut potentiellement en sortir plusieurs

// ----------------- 04 . PDO - QUERY + FETCHALL + FETCH_ASSOC
echo "<h1>PDO - QUERY + FETCHALL + FETCH_ASSOC</h1>";
$resultat = $pdo->query('SELECT * FROM employes');
$donnees = $resultat->fetchAll(PDO::FETCH_ASSOC); // Retourne toutes les lignes de résultat dans un tableau multidimensionel sans faire de boucle
echo "<pre>", print_r($donnees); echo "</pre>";
echo "<span>Foreach</span>";

foreach($donnees as $indice => $contenu){
    echo "<div>";
    foreach ($contenu as $indice2 => $contenu2)
    {
        echo $indice2. " : " . $contenu2 . "<br>";
    }
    echo "</div>";

}

// ----------------- 05 . PDO - QUERY + FETCH + BBD
//exercice : afficher la liste des bases de données puis dans une liste, puis dans une liste ul li
$resultat = $pdo->query("SHOW DATABASES");
echo "<ul>";
while($base=$resultat->fetch(PDO::FETCH_ASSOC))
{
    print "<li>" . $base['Database'] . "</li>";
}
echo "</ul>";

// ----------------- 06 . PDO : QUERY - TABLE ----------------

// exercice : Afficher tous les employés dans un tableau <table>
echo "<h1>PDO : QUERY - TABLE</h1>";