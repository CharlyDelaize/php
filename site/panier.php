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

        if($produit['stock'] < $_SESSION['panier']['quantite'][$i])
        {
            $content .= 'stock restant : ' . $produit['stock'] . '<br>';
            $quantite .= 'quantité demandée : ' . $_SESSION['panier']['quantite'][$i] . '<br><hr>';
            if($produit['stock'] > 0) //Il reste un peu de stock
            {
                $_SESSION['panier']['quantite'][$i] = $produit['stock'];
                $content .= '<div class="alert alert-warning" role="alert">La quantité du produit' . $_SESSION['panier']['id_produit'][$i] . 'a été réduite car notre stock était insuffisant, veuillez vérifier vos achats. </div>';
            }
            else //plus de stock
            {
                $_SESSION['panier']['quantite'][$i] = $produit['stock'];
                $content .= '<div class="alert alert-warning" role="alert">Le produit' . $_SESSION['panier']['id_produit'][$i] . 'a été retiré de votre panier, car nous sommes en rupture de stock </div>';
                retireProduitPanier($_SESSION['panier']['id_produit'][$i]);
                $i--;
            }
            $erreur = true;
        }
    }

    //debug($_SESSION)
    if(!isset($erreur)){
        $pdo->query("INSERT INTO commande (id_membre, montant, date_enregistrement) VALUES('". $_SESSION['membre']['id_membre'] ."','". montantTotal() . "',NOW() )");

        $id_commande = $pdo->lastInsertId();
        for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
        {
            $pdo->query('INSERT INTO details_commande (id_commande, id_produit, quantite, prix) VALUES ("' . $id_commande . '","' . $_SESSION['panier']['id_produit'][$i] . '","' . $_SESSION['panier']['quantite'][$i] . '","' . $_SESSION['panier']['prix'][$i] . '") ');
            
            $pdo->query('UPDATE produit SET stock = stock - "' . $_SESSION['panier']['quantite'][$i].'" WHERE id_produit = "'. $_SESSION['panier']['id_produit'][$i] . '"');
        }
        unset($_SESSION['panier']);
        $content .= '<div class="alert alert-success" role="alert"> Merci pour votre commande, votre n° de suivi est le ' . $id_commande . '</div>';
    }
}

//------

if(isset($_GET['action']) && $_GET['action'] == "vider_panier")
{
    unset($_SESSION['panier']);
}

if(isset($_GET['action']) && $_GET['action'] == "suppression")
{
    retireProduitPanier($_GET['id_produit']);
}

$content .= '<table class="table">';
$content .= '<tr><th>titre</th><th>id produit</th><th>quantite</th><th>prix</th><th>action</th></tr>';
if(empty($_SESSION['panier']['id_produit']))
{
    $content .= '<tr><td colspan="3">Votre panier est vide !</td></tr>';
}
else
{
    for($i=0; $i < count($_SESSION['panier']['id_produit']); $i++)
    {
        $id_produit = $_SESSION['panier']['id_produit'][$i];

        $content .= '<tr>';
        $content .= '<td>' . $_SESSION['panier']['titre'][$i] . '</td>';
        $content .= '<td>' . $_SESSION['panier']['id_produit'][$i] . '</td>';
        $content .= '<td>' . $_SESSION['panier']['quantite'][$i] . '</td>';
        $content .= '<td>' . $_SESSION['panier']['prix'][$i] . '</td>';
        $content .= "<td><a href=\"?action=suppression&id_produit=$id_produit\" onClick=\"return(confirm('En êtes vous certain ?'));\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>";
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
    $content .= "<tr><td colspan='5'><a href=\"?action=vider_panier\" onClick=\"return(confirm('En êtes vous certain ?'));\">Vider mon panier</a></td></tr>";
    
}
$content .= '</table>';



?>

<?php require_once('inc/haut.php') ?>

<h1>Panier</h1>
<?= $content ?>

<?php require_once('inc/bas.php') ?>