<?php
/*
    exercice:

    Après avoir créé la BDD 'dialogue' et y avoir créé la table 'commentaire'
        1.Effectuer la connection à la BDD
        2.Creer un formulaire HTML (pour l'ajout de message)
        3.Récupérer et afficher les saisies en PHP
        4.Essayer de faire des requetes d'Insertion en BDD
*/

$pdo = new PDO('mysql:host=localhost;dbname=dialogue', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//var_dump($pdo);

if($_POST)
{
    // echo $_POST["pseudo"] . '<br>';
    // echo $_POST["message"] . '<hr>';
    $req = $pdo->query("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES ('$_POST[pseudo]', '$_POST[message]', NOW())");
}

$resultat = $pdo->query("SELECT * FROM commentaire ORDER BY date_enregistrement DESC");
echo'<legend><h2>' . $resultat->rowCount() . 'commentaire(s)</h2></legend>';

while ($commentaire = $resultat->fetch(PDO::FETCH_ASSOC))
{
    echo '<div class="message">';
    echo '<div class="titre"> par: ' . $commentaire['pseudo'] . ', le ' . $commentaire['date_enregistrement'] . "</div>";
    echo '<div class="contenu">' . $commentaire['message'] . '</div>';
    echo '</div><hr>';
}
?>

<html>
    <link rel="stylesheet" href="style.css">
<form method="post" action="">
    <fieldset>
        <legend>Formulaire de dialogue</legend>
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" size="50"><br>
    
        <label for="message">Message</label><br>
        <textarea id="message" name="message" cols="50" rows="7"></textarea><br>
<input type="submit" name="inscription" value="Envoyer">
</fieldset>
</form>
</html>

<?php
/*
- Faille de sécurité XSS :
		Faille XSS : Mettre une alerte à l'infini dans le corps du message :
			<script type="text/javascript">
			var point = true;
			while(point == true)
			alert("bonjour")
			</script>
		Faille 2/  Mettre une injection css dans le corps du message : 
			<style>
				body{
				display: none;
				}
			</style>
		...injection de fichier JS venant de l'exérieur, redirection forcé (document.location), vol de cookie (document.cookie), redirection non voulu (document.location),  etc.
------------------------------------------------------------------------------------------------
	- Faille de sécurité par INJECTION SQL :
	Exemple d'injection SQL (dans le champ message) :  
		-- ok'); DELETE FROM commentaire; (
------------------------------------------------------------------------------------------------
	- Moyen de contre :
	- strip_tags() permet de supprimer toutes les balises HTML.
	- htmlspecialchars() permet de rendre innoffensives les balises HTML.
	- htmlentities() permet de convertir les balises HTML.
	- prepare + execute permettent d'empécher les injections.
		// $r = $pdo->prepare("INSERT INTO commentaires (pseudo, date_enregistrement, message) VALUES (:pseudo, NOW(), :message)");
		// $r->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR); // le parametre de la requête SQL, la valeur qu'on lie, le type attendu
		// $r->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
		// $r->execute();
*/
?>