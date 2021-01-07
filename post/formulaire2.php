<?php

/*
Exercice : Créer un formulaire avec les champs suivants : ville, cp, adresse, puis récupérer les saisies sur la meme page
*/
if($_POST)
{
    echo "ville: " . $_POST['ville'] . '<br>';
    echo "code postal: " . $_POST['cp'] . '<br>';
    echo "adresse: " . $_POST['adresse'] . '<br>';
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
<hr>
<h1>FORMULAIRE 2</h1>
<form method="post" action="">
<label for="ville">Ville</label>
<input type="text" name="ville">
<br>
<label for="cp">Code postal</label>
<input type="text" name="cp">
<br>
<label for="adresse">Adresse</label>
<input type="text" name="adresse">
<br>
<input type="submit">
</form>
</body>
</html>

<?php /*
exoMeteo("hiver", "2");
function exoMeteo($saison, $temperature){
echo "Nous sommes en $saison et il fait $temperature degré";
{
    if($temperature < -1 || $temperature > 1){
        echo "s";
    }
}
} */ ?>