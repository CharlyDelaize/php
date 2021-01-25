<?php
require_once('inc/init.php');

if(isset($_GET['action'] && $_GET['action'] == 'deconnexion'))
{
    unset($_SESSION['membre']);
}

if(internauteEstConnecte()){
    header('location:profil.php');
    exit();
}

if($_POST)
{
    $r = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");
    if($r->rowCount() >=1)
    {
        $membre = $r->fetch(PDO::FETCH_ASSOC);
        if(password_verify($_POST["mdp"], $membre['mdp']))
        {
            $_SESSION['membre']['id_membre'] = $membre['id_membre'];
            $_SESSION['membre']['pseudo'] = $membre['pseudo'];
            $_SESSION['membre']['nom'] = $membre['nom'];
            $_SESSION['membre']['prenom'] = $membre['prenom'];
            $_SESSION['membre']['email'] = $membre['email'];
            $_SESSION['membre']['civilite'] = $membre['civilite'];
            $_SESSION['membre']['ville'] = $membre['ville'];
            $_SESSION['membre']['code_postal'] = $membre['code_postal'];
            $_SESSION['membre']['adresse'] = $membre['adresse'];
            $_SESSION['membre']['statut'] = $membre['statut'];

            header('location:profil.php');
        }else{
            $content .= '<div class="alert alert-danger" role="alert">Erreur de mot de passe</div>';
        }
    }else{
        $content .= '<div class="alert alert-danger" role="alert">Erreur de pseudo</div>';
    }
}

?>

<?php require_once('inc/haut.php');?>

<h1>Connection </h1>

<form method="post" action="">
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" class="form-control" placehorder="votre pseudo" name="pseudo" id="pseudo"><br>
    </div>
    <div>
        <label for="mdp">Mot de passe</label>
        <input type="password" class="form-control" placeholder="votre mot de passe" name="mdp" id="mdp" required><br>
    </div>
    <input type="submit" class="btn btn-default">
</form>

<?php require_once('inc/bas.php');?>