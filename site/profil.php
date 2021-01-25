<?php require_once('inc/init.php');
if(!internauteEstConnecte())
{
    header('location:connexion.php');
    exit();
}

if(internauteEstConnecteEtAdmis())
{
    $content .= "<h1>Vous etes administrateur du site</h1>";
}
?>

<?php require_once('inc/haut.php');?>
<?= $content ?>

Bonjour (pseudo) vous êtez bien connecté<br>
Voici vos informations :<br>
Votre nom (nom)<br>
Votre prenom (prenom)<br>
Votre email (email)<br>

<?php require_once('inc/bas.php');?>