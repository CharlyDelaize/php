<?php

function debug($var, $mod = 1)
{
    $trace = debug_backtrace();
    $trace = array_shift($trace);echo("<strong>debug demandé dans le fichier : $trace[file] en ligne : $trace[line]</strong>");

    if($mod == 1)
    {
        echo '<pre>'; print_r($var); echo '</pre>';
    }
    else
    {
        echo '<pre>'; var_dump($var); echo '</pre>';
    }
}

function internauteEstConnecte()
{
    if(isset($_SESSION['membre'])) return true;
    else return false;
}

function internauteEstConnecteEtEstAdmin()
{
    if(internauteEstConnecte() && $_SESSION['membre']['statut'] = 1) return true;
    else return false;
}

function creation_panier()
{
    if(!isset($_SESSION['panier']))
    {
        $_SESSION['panier'] = array();
        $_SESSION['panier']['titre'] = array();
        $_SESSION['panier']['id_produit'] = array();
        $_SESSION['panier']['quantite'] = array();
        $_SESSION['panier']['prix'] = array();
    }
}

function ajoutProduitDansPanier($titre, $id_produit, $quantite, $prix)
{
    creation_panier();
    $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);
    if($position_produit !== false) // Produit existant
    {
        $_SESSION['panier']['quantite'][$position_produit] += $quantite;
    }
    else // nouveau produit
    {
        $_SESSION["panier"]["titre"][] = $titre;
        $_SESSION["panier"]["id_produit"][] = $id_produit;
        $_SESSION["panier"]["quantite"][] = $quantite;
        $_SESSION["panier"]["prix"][] = $prix;
    }
}

function montantTotal()
{
    $total = 0;
    for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
    {
        $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
    }
    return round($total, 2);
}
function retireProduitPanier($id_produit_a_supprimer)
{
    $position_produit = array_search($id_produit_a_supprimer, $_SESSION['panier']['id_produit']);
    if($position_produit !== false)
    {
        array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
        array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
        array_splice($_SESSION['panier']['prix'], $position_produit, 1);

    }
}

?>