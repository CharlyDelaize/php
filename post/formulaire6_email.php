<?php
// envoyer du HTML par mail
 if($_POST)
 {
     foreach($_POST as $indice => $valeur){
         echo "$indice : " . $valeur . "<br>";
     }
     $expediteur = $_POST['expediteur'];
     $destinataire = $_POST['destinataire'];
     $message = $_POST['message'];
     $sujet = $_POST['sujet'];
    
     $expediteur = "From: $_POST[expediteur] \n";
     $expediteur .= "MIME-Version: 1.0 \n";
     $expediteur .= "Content-type: text/html; charset-iso-8859-1 \n";
     //$expe = "From: " . $expediteur;
    
     mail($destinataire, $sujet, $message, $expediteur);
 } 

?>

<!-- réalisez un formulaire avec 4 champs : Destinataires, expéditeurs, Sujet, Message-->

<style>
    #message{float: left; width: 400px; height: 300px; font-style: italic; font-family: Calibri;}
</style>
<form method="post" action="">
<label for="destinataire">Destinataire</label>
<input type="email" name="destinataire" id="destinataire" placeholder="destinataire">
<br>
<label for="expediteur">Expéditeur</label>
<input type="email" name="expediteur" id="expediteur" placeholder="expediteur">
<br>
<label for="sujet">Sujet</label>
<input type="text" name="sujet" id="sujet" placeholder="sujet">
<br>
<label for="message">Message</label>
<input type="text" name="message" id="message" placeholder="message">
<br>
<input type="submit">
</form>