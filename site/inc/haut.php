<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Boutique</title>
	<link rel="stylesheet" href="inc/css/bootstrap.min.css">
	<link rel="stylesheet" href="inc/css/style.css">
  </head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container"> 
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"        data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Boutique</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav"> 
                    <li><a href="">Accueil</a></li>
                    <?php if (internauteEstConnecteEtEstAdmin()): ?>
                        <li><a href="">BackOffice</a></li>
                    <?php endif; ?>

                    <?php if (internauteEstConnecte()): ?>
                    <li><a href="">Panier</a></li>
                    <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Membre <span class="caret"></span></a>
                        <ul class="dropdown-menu navbar-right">
                            <li><a href="">Profil</a>
                            <li><a href="">Deconnexion</a>
                        </ul>
                    </li>
                    <?php else:?>

                    <li><a href="">panier</a></li>
                    <li class="dropdown">
					    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Membre <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= URL ?>inscription.php">Inscription</a></li>
                            <li><a href="<?= URL ?>connexion.php">Connexion</a></li>
                        </ul>
				    </li>
                    <?php endif;?>
                </ul>    
            </div>
        </div>          
    </nav>

    <div class="container">
        <div class="starter-template">
