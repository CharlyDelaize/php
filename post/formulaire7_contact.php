<?php
/* 
Exercice : Réaliser un formulaire de contact pour votre site
1 - Vous devez être l'unique destinataire du message
2 - Ajouter des champs Société, Nom, Prénom, email, sujet et message
*/

if($_POST)
{
    echo $_POST['sujet'];
    echo $_POST['message'];
    echo $_POST['expediteur'];

    $email = "From: $_POST[expediteur] \n";
    $email .= "MIME-Version: 1.0";
    $email .= "Content-type: text/html; charset-iso-8859-1 \r\n";

    $destinataire = "charly.delaize@lepoles.com";
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $societe = $_POST['societe'];
    $sujet = $_POST['sujet'];
    $email = $_POST['expediteur'];

    $message = "Société : " . $societe . "Nom : ". $nom . "Prenom : ". $prenom . "\nEmail : ". $_POST['expediteur'] . $_POST['message'];

    echo $message;
    mail($destinataire, $sujet, $message, $email);
} 




?>
<html>
<style>
    #message{float: left; width: 400px; height: 300px; font-style: italic; font-family: Calibri;}
</style>
<h1>Contact</h1>
<form method="post" action="">
<label for="destinataire">Destinataire</label>
<input type="email" name="destinataire" id="destinataire" placeholder="destinataire" value="charly.delaize@lepoles.com">
<br>
<label for="societe">Société</label>
<input type="text" name="societe" id="societe" placeholder="societe">
<br>
<label for="nom">Nom</label>
<input type="text" name="nom" id="nom" placeholder="nom">
<br>
<label for="societe">Prénom</label>
<input type="text" name="prenom" id="prenom" placeholder="prenom">
<br>
<label for="expediteur">email</label>
<input type="text" name="expediteur" id="expediteur" placeholder="expediteur">
<br>
<label for="sujet">Sujet</label>
<input type="text" name="sujet" id="sujet" placeholder="sujet">
<br>
<label for="message">Message</label>
<textarea type="text" name="message" id="message" placeholder="message"></textarea>
<br>
<input type="submit">
</form>
</html>