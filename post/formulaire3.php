<?php
 // Exercice : réaliser un fomulaire avec les champs pseudos et email en affichant les informations directement sur la page formulaire 4
 if($_POST)
{
    echo "pseudo: " . $_POST['pseudo'] . '<br>';
    echo "email: " . $_POST['email'] . '<br>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        label{float: left; width: 95px; font-style: italic; font-family: Calibri;}
    </style>
</head>
<body>
<h1>FORMULAIRE 3</h1>
<form method="post" action="formulaire4.php">
<label for="pseudo">Pseudo</label>
<input type="text" name="pseudo">
<br>
<label for="email">Email</label>
<input type="text" name="email">
<br>
<input type="submit">
</form>
</body>
</html>