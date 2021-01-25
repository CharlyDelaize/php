<?php
require_once('inc/init.php');

if($_POST)
{
    //debug($pdo);
    //debug($_POST);
    $erreur="";
    if(strlen($_POST['pseudo']) <= 3 || strlen($_POST['pseudo']) > 20)
    {
        $erreur .= '<div class="alert alert-danger" role="alert">erreur taille du pseudo</div>';
    }

    if(!preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']))
    {
        $erreur .= '<div class="alert alert-danger" role="alert">erreur format du pseudo</div>';
    }

    $r = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");
    if($r->rowCount() >= 1)
    {
        $erreur .= '<div class="alert alert-danger" role="alert">pseudo déja existant</div>';
    }

    foreach($_POST as $indice => $valeur)
    {
        $_POST[$indice] = addslashes($valeur);
    }

    $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    if(empty($erreur))
    {
        $pdo->exec("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES ('$_POST[pseudo]' , '$_POST[mdp]' , '$_POST[nom]' , '$_POST[prenom]' , '$_POST[email]' , '$_POST[civilite]' , '$_POST[ville]' , '$_POST[cp]' , '$_POST[adresse]')");

        $content .= '<div class="alert alert-success" role="alert">Inscription validée</div>';
    }
    $content .= $erreur;

}

?>



<?php require_once('inc/haut.php'); ?>

<?= $content ?>

<form method="post" action="">
    <label for="pseudo">Pseudo</label>
    <input type="text" class="form-control" placehorder="votre pseudo" name="pseudo" id="pseudo"><br>
    <label for="mdp">Mot de passe</label>
    <input type="password" class="form-control" placeholder="votre mot de passe" name="mdp" id="mdp" required><br>

    <label for="nom">Nom</label>
    <input type="text" class="form-control" placeholder="votre nom" name="nom" id="nom"><br>

    <label for="prenom">Prénom</label>
    <input type="text" class="form-control" placeholder="votre prenom" name="prenom" id="prenom"><br>

    <label for="email">Email</label>
    <input type="email" class="form-control" placeholder="votre email" name="email" id="email"><br>

    <label for="civilite">Civilite</label>
    <input type="radio" class="" placeholder="civitite" name="civilite" id="civilite" value="m" required>
    Homme -- Femmes
    <input type="radio" class="" placeholder="civitite" name="civilite" id="civilite" value="f" required><br>

    <label for="ville">Ville</label>
    <input type="text" class="form-control" placeholder="votre ville" name="ville" id="ville"><br>

    <label for="cp">Code Postal</label>
    <input type="text" class="form-control" placeholder="votre code postal" name="cp" id="cp"><br>

    <label for="adresse">Adresse</label>
    <textarea class="form-control" placeholder="votre adresse" name="adresse" id="adresse"></textarea><br>

    <input type="submit" class="btn btn-default">
</form>

<?php require_once('inc/bas.php'); ?>