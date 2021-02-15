

<?php

​

/* 1- Créer une base de données "contacts" avec une table "contact" :

	  id_contact PK AI INT(3)

	  nom VARCHAR(20)

	  prenom VARCHAR(20)

	  telephone VARCHAR(10)

	  annee_rencontre (YEAR)

	  email VARCHAR(255)

	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

​

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.

	

	3- Effectuer les vérifications nécessaires :

	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres

	   L'année de rencontre doit être une année valide

	   Le type de contact doit être conforme à la liste des types de contacts

	   L'email doit être valide

	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

​

	4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

​

*/

$message ='';

​
$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'));

​

// var_dump($_POST);

​

// Si le formulaire est soumis :

if ($_POST) {

​

	if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) $message.= '<div>Erreur sur le nom qui doit contenir 2 caractères minimum.</div>';

​

	if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) $message.= '<div>Erreur sur le prénom qui doit contenir 2 caractères minimum.</div>';

​

	if (!isset($_POST['telephone']) || !preg_match('#^[0-9]{10}$#', $_POST['telephone'])) $message.= '<div>Erreur sur le téléphone.</div>';

​

	if (!isset($_POST['annee_rencontre']) || !strtotime($_POST['annee_rencontre'])) $message.= '<div>Erreur sur l\'année de rencontre.</div>';

​

	if (!isset($_POST['type_contact']) || ($_POST['type_contact'] != 'ami' && $_POST['type_contact'] != 'professionnel' && $_POST['type_contact'] != 'famille' && $_POST['type_contact'] != 'autre')) $message.= '<div>Erreur sur le type de contact.</div>';  

​

	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $message.= '<div>Erreur sur l\'email.</div>';  

​

​

	// Si pas d'erreur sur le formulaire, on enregistre en BDD :

	if (empty($message)) {  

		foreach ($_POST as $indice => $valeur) {

			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);

		}

		

		$query = $pdo->prepare("INSERT INTO contact (nom, prenom, telephone, annee_rencontre, email, type_contact) VALUES(:nom, :prenom, :telephone, :annee_rencontre, :email, :type_contact)");

​

		$query->bindParam(':nom', $_POST['nom']);

		$query->bindParam(':prenom', $_POST['prenom']);

		$query->bindParam(':telephone', $_POST['telephone']);

		$query->bindParam(':annee_rencontre', $_POST['annee_rencontre']);

		$query->bindParam(':email', $_POST['email']);

		$query->bindParam(':type_contact', $_POST['type_contact']);

​

		$succes = $query->execute();	

​

		if ($succes) {

			$message .= '<div>Le contact a été enregistré !</div>';

		} else {

			$message .= '<div>Erreur lors de l\'enregistrement du contact...</div>';

		}

	}

} // fin du if ($_POST)

​

​

​

$contenu = '';  // variable d'affichage

​

// On sélectionne tous les contacts :

$query = $pdo->prepare("SELECT * FROM contact");

$query->execute();  // les méthodes prepare() et execute() vont toujours ensemble

​

// On prépare le tableau HTML :

$contenu .= '<table border="1">';

	$contenu .= '<tr>';

		$contenu .= '<th>Nom</th>';

		$contenu .= '<th>Prénom</th>';

		$contenu .= '<th>Téléphone</th>';

		$contenu .= '<th>Autres infos</th>';

	$contenu .= '</tr>';

​

// Tant qu'il y a un résultat dans $query, on prépare la ligne de la table HTML correspondant au contact :

while ($contact = $query->fetch(PDO::FETCH_ASSOC)) {

	/*echo '<pre>';

		print_r($contact);

	echo '</pre>';*/

	

	$contenu .= '<tr>';

		$contenu .= '<td>'. $contact['nom'] .'</td>';

		$contenu .= '<td>'. $contact['prenom'] .'</td>';

		$contenu .= '<td>'. $contact['telephone'] .'</td>';

		// lien cliquable "plus d'infos" :

		$contenu .= '<td><a href="?id_contact='. $contact['id_contact'] .'">plus d\'infos</a></td>';

	$contenu .= '</tr>';

} 

$contenu .= '</table>';

​

// Si on a cliqué sur un lien "plus d'infos" :

if (isset($_GET['id_contact'])) {   // si l'indice "id_contact" est dans $_GET, donc dans l'url, c'est qu'on a demandé le détail d'un contact

    // die ('ligne 43');  // on peut faire un echo ou un exit ou un die pour vérifier que l'on passe bien dans cette condition

	 

	$_GET['id_contact'] = htmlspecialchars( $_GET['id_contact'], ENT_QUOTES);  	// permet de transformer les caractères spéciaux en entités HTML pour se prémunir des risques JS (XSS) et CSS	

​

	// on fait une requête préparée de sélection du contact dans la BDD :

	$query = $pdo->prepare("SELECT * FROM contact WHERE id_contact = :id_contact");

	$query->bindParam(':id_contact', $_GET['id_contact']);

	$query->execute();  // avec un prepare() TOUJOURS un execute()

​

	// on transforme le résultat de la requête en un array associatif :

	$contact = $query->fetch(PDO::FETCH_ASSOC);   // pas de while car on certain de n'avoir qu'un seul résultat

	

	// On affiche les infos du contact :

	$contenu .= '<h2>Détail du contact</h2>';

​

	// var_dump($contact);

​

	if ($contact == false) {

		$contenu .= '<p>Ce contact n\'existe pas !</p>';	

	} else {

		$contenu .= '<ul>';

			$contenu .= '<li>'. $contact['nom'] .'</li>';

			$contenu .= '<li>'. $contact['prenom'] .'</li>';

			$contenu .= '<li>'. $contact['telephone'] .'</li>';

			$contenu .= '<li>'. $contact['email'] .'</li>';

			$contenu .= '<li>'. $contact['annee_rencontre'] .'</li>';

			$contenu .= '<li>'. $contact['type_contact'] .'</li>';

		$contenu .= '</ul>';

	}

} // fin du if (isset($_GET['id_contact']))

​

​

​

​

?>

<!DOCTYPE html>

<html lang="fr">

<head>

	<meta charset="UTF-8">

	<title>Ajouter un contact</title>

	<style>

		label { display: block; }

		body {margin-left: 20px;}

	</style>

</head>

<body>

	<h1>Ajouter un contact</h1>

	

	<h2>Formulaire</h2>

	<?php echo $message; ?>

​

	<form method="post" action="">

		<div>

			<label for="nom">Nom</label>

			<input type="text" id="nom" name="nom">

		</div>

​

		<div>

			<label for="prenom">Prénom</label>

			<input type="text" id="prenom" name="prenom">

		</div>

	

		<div>

			<label for="telephone">Téléphone</label>

			<input type="text" id="telephone" name="telephone">

		</div>

	

		<div>

			<label for="annee_rencontre">Année de rencontre</label>

			<select name="annee_rencontre" id="annee_rencontre">

				<?php

					for ($i = date('Y'); $i >= date('Y')-100; $i--) {

						echo "<option>$i</option>";	

					}

				?>

			</select>

		</div>

​

		<div>

			<label for="type_contact">Type de contact</label>

			<select name="type_contact" id="type_contact">

				<option value="ami">ami</option>

				<option value="famille">famille</option>

				<option value="professionnel">professionnel</option>

				<option value="autre">autre</option>

			</select>

		</div>

​

		<div>

			<label for="email">Email</label>

			<input type="text" id="email" name="email">

		</div>

	

		<input type="submit" value="enregistrer">

	</form>

​

	<br>

​

	<h2>Contacts</h2>

	<?php echo $contenu; ?> 

​

</body>

</html>

