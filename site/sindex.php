<?php require_once('inc/init.php'); ?>

<?php
    $r = $pdo->query('SELECT DISTINCT(categorie) FROM produit');
    $content .= '<div class="row">';
    $content .= '<div class="col-md-3"><div class="list-group">';
    while ($categorie = $r->fetch(PDO::FETCH_ASSOC))
    {
        $content .= "<a href=\"?categorie=$categorie[categorie]\" class=\"list-group-item\">$categorie[categorie]</a></li>";
    }
    $content .= '</div></div>';
    $content .= '<div class="col-md-8 col-md-offset-1">';

    if(isset($_GET['categorie']))
    {
        $r = $pdo->query("SELECT * FROM produit WHERE categorie = '$_GET[categorie]'");
        while($produit = $r->fetch(PDO::FETCH_ASSOC))
            {
                $content .= '<div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <a href="fiche_produit.php?id_produit=' . $produit['id_produit'] . '"><img src=" ' . $produit['photo'] . '" alt = ""></a>
                        <div class="caption">
                            <a href=""></a>
                            <p>' . $produit['description'] . '<strong>' . $produit['prix'] . ' €</strong></p>
                        </div>
                    </div>
                </div>';
            }
    }
    $content .= '</div>';
?>

<?php include('inc/haut.php'); ?>

<h1>Nos Produits</h1>
<p class="lead">Voici notre catalogue produit.</p>
<hr>
<?= $content ?>
<?php include('inc/bas.php'); ?>
