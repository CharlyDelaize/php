<?php
 if($_POST)
 {
     foreach($_POST as $indice => $valeur){
         echo "$indice : " . $valeur . "<br>";
     }
     /*echo "destinataire: " . $_POST['destinataire'] . '<br>';
    echo "expediteur: " . $_POST['expediteur'] . '<br>';
    echo "sujet: " . $_POST['sujet'] . '<br>';
    echo "message: " . $_POST['message'] . '<br>';*/
 } 

 $expediteur = $_POST['expediteur'];
 $destinataire = $_POST['destinataire'];
 $message = $_POST['message'];
 $sujet = $_POST['sujet'];

 $expe = "From: " . $expediteur;

 mail($destinataire, $sujet, $message, $expe);
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