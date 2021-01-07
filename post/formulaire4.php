<?php
 // Faites en sorte que le champ pseudo ne puisse pas être vide en affichant un message d'erreur dans ce cas là
 if($_POST)
{
    if(strlen($_POST['pseudo']) == 0 || strlen($_POST['email']) == 0 || strpos($_POST['email'], "@") == false){
        echo "Vos informations ne sont pas renseignées ou incorrectes";
    }
    else{
    echo "pseudo: " . $_POST['pseudo'] . '<br>';
    echo "email: " . $_POST['email'] . '<br>';
    }

    $f = fopen("liste.txt", "a"); // fopen() en mode "a" permet de créer le fichier s'il n'est pas trouvé, sinon l'ouvrir
        fwrite($f, $_POST['pseudo']. "-" . $_POST['email'] ); // fwrite() permet d'écrire dans le fichier $f qui est liste.txt
        fwrite($f, "\n"); // \n permet de faire un saut à la ligne dans un fichier
    $f = fclose($f); //fclose, qui n'est pas indispensable, permet de fermer le fichier et ainsi liberer la ressource.
}

// extract($_POST); // Cette fonction crée des variables dont les noms sont les indices du tableau $_POST et affecte la valeur associée;
// echo $pseudo;
?>