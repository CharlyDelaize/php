<?php
    // var_dump($_POST); //retourne un array
    // $_POST (en majuscule) est une superglobale qui sert à récupérer les saisies d'un formulaire et de les afficher sur la page web.
    
    if($_POST)
    {
        echo "prenom: " . $_POST['prenom'] . '<br>';
        echo "description: " . $_POST['description'] . '<br>';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        label{float: left; width: 95px; font-style: italic; font-family: Calibri;}
        h1{margin: 0 0 10px 200px; font-family: Calibri;}
    </style>
</head>
    <body>
        <hr>
        <h1>Formulaire 1</h1>
        <form method="post" action="">

        <label for="">Prenom</label>
        <input type="text" name="prenom" id="prenom">
        <br>
        <label for="">Description</label>
        <textarea name="description" id="description"></textarea>
        <br>
        <input type="submit">
        </form>
    </body>
</html>