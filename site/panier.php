<?php 
require_once('inc/init.php'); 
if (isset($_POST['ajout_panier']))
{
    $r = $pdo->query("SELECT * FROM produit WHERE id_produit = '$_POST[id_produit]'");
    $produit = $r->fetch(PDO::FETCH_ASSOC);
    ajoutProduitDansPanier($produit['titre'], $produit['id_produit'], $_POST['quantite'], $produit['prix']);
    //debug($_SESSION);
}

if(isset($_POST['payer']))
{
    for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
    {
        $r = $pdo->query("SELECT * FROM produit WHERE id_produit = '" . $_SESSION['panier']['id_produit'][$i] ." '");
        $produit = $r->fetch(PDO::FETCH_ASSOC);
        debug($produit);

        if($produit['stock'] < $_SESSION['panier']['quantite'][$i])
        {
            $content .= 'stock restant : ' . $produit['stock'] . '<br>';
            $quantite .= 'quantité demandée : ' . $_SESSION['panier']['quantite'][$i] . '<br><hr>';
            if($produit['stock'] > 0) //Il reste un peu de stock
            {
                $_SESSION['panier']['quantite'][$i] = $produit['stock'];
                $content .= '<div class="alert alert-warning" role="alert">La quantité du produit' . $_SESSION['panier']['id_produit'][$i] . 'a été réduite car notre stock était insuffisant, veuillez vérifier vos achats. </div>';
            }
            else
            {
                $_SESSION['panier']['quantite'][$i] = $produit['stock'];
                $content .= '<div class="alert alert-warning" role="alert">Le produit' . $_SESSION['panier']['id_produit'][$i] . 'a été retiré de votre panier, car nous sommes en rupture de stock </div>';
                retireProduitPanier($_SESSION['panier']['id_produit'][$i]);
                $i--;
            }
        }
    }
}
//------

$content .= '<table class="table">';
$content .= '<tr><th>titre</th><th>id produit</th><th>quantite</th><th>prix</th></tr>';
if(empty($_SESSION['panier']['id_produit']))
{
    $content .= '<tr><td colspan="3">Votre panier est vide !</td></tr>';
}
else
{
    for($i=0; $i < count($_SESSION['panier']['id_produit']); $i++)
    {
        $content .= '<tr>';
        $content .= '<td>' . $_SESSION['panier']['titre'][$i] . '</td>';
        $content .= '<td>' . $_SESSION['panier']['id_produit'][$i] . '</td>';
        $content .= '<td>' . $_SESSION['panier']['quantite'][$i] . '</td>';
        $content .= '<td>' . $_SESSION['panier']['prix'][$i] . '</td>';
        $content .= '</tr>';
    }

    $content .= '<th colspan="3">' . montantTotal() . '€</th>';
    if(internauteEstConnecte())
    {
        $content .= '<form method="post" action="">';
        $content .= '<tr><td colspan="3"><input type="submit" value="valider le paiement" name="payer" class="btn btn-default"></td></tr>';
        $content .= '</form>';
    }
    else
    {
        $content .= '<tr><td coldpan="3">Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php"> connecter</a>';
    }
    
}
$content .= '</table>'


?>

<?php require_once('inc/haut.php') ?>

<h1>Panier</h1>
<?= $content ?>

<?php require_once('inc/bas.php') ?>