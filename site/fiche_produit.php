<?php require_once('inc/init.php'); ?>

<?php
    if(!isset($_GET['id_produit'])){header('location:sindex.php'); exit();}

    if(isset($_GET['id_produit']))
    {
        $r = $pdo->query("SELECT * FROM produit WHERE id_produit = '$_GET[id_produit]'");
    }

    //if($r-rowCount() <= 0){header('location:sindex.php'); exit();}

    $produit = $r->fetch(PDO::FETCH_ASSOC);

    $content .= "<h1>$produit[titre]</h1>";
    $content .= "<p>categorie : $produit[categorie]</p>";
    $content .= "<p>couleur : $produit[couleur]</p>";
    $content .= "<p>taille : $produit[taille]</p>";
    $content .= "<p><img src=\"$produit[photo]\"></p>";
    $content .= "<p>prix : $produit[prix]</p>";

    if($produit['stock'] > 0)
    {
        $content .= "Nombre de produit disponible : $produit[stock]<br>";
        $content .= "<form method=\"post\" action=\"panier.php\">";
        $content .= "<input type \"hidden\" name=\"id_produit\" value=\"$produit[id_produit]\"><br><br>";
        $content .= "<label for=\"quantite\">Quantité</label>";
        $content .= "<select name=\"quantite\" id=\"quantite\">";
        for($i = 1; $i <= $produit['stock']; $i++)
        {
            $content .= "<option>$i</option>";
        }
        $content .= "<select><br><br>";
        $content .= "<input type=\"submit\" value=\"ajouter au panier\" name=\"ajout_panier\" class=\"btn btn-default\"><br><br>";
        $content .= "</form>";
    }else{
        $content .= "<p>Rupture de stock !</p>";
    }

    $content .= "<a href=\"sindex.php?categorie=$produit[categorie]\">Retour vers la catégorie $produit[categorie]</a>";

?>

<?php require_once('inc/haut.php') ?>

<em>Fiche produit</em>
<?= $content ?>

<?php require_once('inc/bas.php') ?>