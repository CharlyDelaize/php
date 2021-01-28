<?php require_once('../inc/init.php'); ?>

<?php 
    if(!internauteEstConnecteEtEstAdmin())
    {
        header('location:../connexion.php');
        exit();
    }

    if($_POST)
    {
        //debug($_POST);
        $photo_bdd = '';
        //debug($_FILES);
        if($_FILES['photo']['name'])
        {
            $nom_photo = $_POST['reference'] .'_' . $_FILES['photo']['name'];
            $photo_bdd = URL . "photo/$nom_photo";
            $photo_dossier = RACINE_SITE . "photo/$nom_photo";
            copy($_FILES['photo']['tmp_name'], $photo_dossier);
        }

        foreach($_POST as $indice => $valeur)
        {
            $_POST[$indice] = addslashes($valeur);
        }

        if(isset($_GET['action']) && $_GET['action'] == 'modification')//modif
        {
            $pdo->query("UPDATE produit SET reference = '$_POST[reference]', categorie = '$_POST[categorie]', titre = '$_POST[titre]', description = '$_POST[description]', couleur = '$_POST[couleur]', taille = '$_POST[taille]', public = '$_POST[public]', photo= '$photo_bdd', prix = '$_POST[prix]', stock = '$_POST[stock]' WHERE id_produit = '$_GET[id_produit]' ");
        }else{
        //ajout en bdd
            $pdo->query("INSERT INTO produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES ('$_POST[reference]','$_POST[categorie]', '$_POST[titre]', '$_POST[description]', '$_POST[couleur]', '$_POST[taille]', '$_POST[public]', '$photo_bdd', '$_POST[prix]', '$_POST[stock]') ");
        }
    }
        //suppression
        if(isset($_GET['action']) && $_GET['action'] == 'suppression')
        {
            $pdo->query("DELETE FROM produit WHERE id_produit = '$_GET[id_produit]'");
        }

        //affichage des produits
        $r = $pdo->query('SELECT * FROM produit');
            $content .= "<h1>Affichage des " . $r->rowCount() . " produits</h1>";
            $content .= "<table class=\"table\"><tr>";
            for($i= 0; $i < $r->columnCount(); $i++)
            {
                $colonne = $r->getColumnMeta($i);
                $content .= "<td>$colonne[name]</td>";
            }
            $content .= "<td>Modification<td>";
            $content .= "<td>Suppression<td>";
            $content .= "</tr>";

            while($ligne = $r->fetch(PDO::FETCH_ASSOC))
            {
                $content .= "<tr>";
                foreach($ligne as $indice => $valeur)
                {
                    if($indice == 'photo') $content .= "<td><img src=\"$valeur\" width=\"70\" class=\"img-responsive\"></td>";
                    else $content .= "<td>$valeur</td>";
                }
                $content .= "<td><a href=\"?action=modification&id_produit=$ligne[id_produit]\"><span class=\"glyphicon glyphicon-edit\"></span></a></td>";

                $content .= "<td><a href=\"?action=suppression&id_produit=$ligne[id_produit]\" onClick=\"return(confirm('En êtes vous certain ?'));\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>";
                $content .= "</tr>";
            }
            $content .= "</table>";
            $content .= "<hr>";

        //modification
        if(isset($_GET['action']) && $_GET['action'] == 'modification')
        {

            //debug($_GET);
            $r = $pdo->query("SELECT * FROM produit WHERE id_produit='$_GET[id_produit]'");
            $produit_actuel = $r->fetch(PDO::FETCH_ASSOC);
        }
        $id_produit = (isset($produit_actuel['id_produit'])) ? $produit_actuel['id_produit'] : '';
        $reference = (isset($produit_actuel['reference'])) ? $produit_actuel['reference'] : '';
        $categorie = (isset($produit_actuel['categorie'])) ? $produit_actuel['categorie'] : '';
        $titre = (isset($produit_actuel['titre'])) ? $produit_actuel['titre'] : '';
        $description = (isset($produit_actuel['description'])) ? $produit_actuel['description'] : '';
        $couleur = (isset($produit_actuel['couleur'])) ? $produit_actuel['couleur'] : '';
        $taille = (isset($produit_actuel['taille'])) ? $produit_actuel['taille'] : '';
        $public = (isset($produit_actuel['public'])) ? $produit_actuel['public'] : '';
        $photo = (isset($produit_actuel['photo'])) ? $produit_actuel['photo'] : '';
        $prix = (isset($produit_actuel['prix'])) ? $produit_actuel['prix'] : '';
        $stock = (isset($produit_actuel['stock'])) ? $produit_actuel['stock'] : '';
    
?>

<?php require_once('inc/header.php') ?>

<?= $content ?>

<h1><?php if(isset($_GET['action']) && $_GET['action'] == 'modification') echo 'Modification'; else echo 'Ajout'; ?> d'un produit</h1>
<form method="post" action="" enctype="multipart/form-data">

    <label for="reference">reference</label>
		<input type="text" name="reference" placeholder="reference" id="reference" class="form-control" value="<?=$reference?>">
		<label for="categorie">categorie</label>
		<input type="text" name="categorie" placeholder="categorie" id="categorie" class="form-control" value="<?=$categorie?>">
		<label for="titre">titre</label>
		<input type="text" name="titre" placeholder="titre" id="titre" class="form-control" value="<?=$titre?>">
		<label for="description">description</label>
		<textarea name="description" placeholder="description" id="description" class="form-control"><?=$description?></textarea>
		<label for="couleur">couleur</label>
        <select name="couleur" id="couleur" class="form-control">
            <option value="bleu" <?php if(isset($couleur) && $couleur == 'bleu') echo 'selected';?>>bleu</option>
            <option value="rouge" <?php if(isset($couleur) && $couleur == 'rouge') echo 'selected';?>>rouge</option>
            <option value="vert" <?php if(isset($couleur) && $couleur == 'vert') echo 'selected';?>>vert</option>
            <option value="blanc" <?php if(isset($couleur) && $couleur == 'blanc') echo 'selected';?>>blanc</option>
            <option value="noir" <?php if(isset($couleur) && $couleur == 'noir') echo 'selected';?>>noir</option>
            <option value="jaune" <?php if(isset($couleur) && $couleur == 'jeune') echo 'selected';?>>jaune</option>
            <option value="violet" <?php if(isset($couleur) && $couleur == 'violet') echo 'selected';?>>violet</option> 
        </select>
        <label for="taille">taille</label>
        <select name="taille" id="taille" class="form-control">
            <option value="S" <?php if(isset($taille) && $taille == 'S') echo 'selected';?>>S</option>
            <option value="M" <?php if(isset($taille) && $taille == 'M') echo 'selected';?>>M</option>
            <option value="L" <?php if(isset($taille) && $taille == 'L') echo 'selected';?>>L</option>
            <option value="XL" <?php if(isset($taille) && $taille == 'XL') echo 'selected';?>>XL</option>
        </select>
        <label for="public">public</label>
        <select name="public" id="public" class="form-control">
            <option value="m" <?php if(isset($public) && $public == 'm') echo 'selected';?>>Homme</option>
            <option value="f" <?php if(isset($public) && $public == 'f') echo 'selected';?>>Femme</option>
            <option value="mixte" <?php if(isset($public) && $public == 'mixte') echo 'selected';?>>Mixte</option>
        </select>
        <label for="photo>">Photo</label>
        <input type="file" name="photo" id="photo" class="form-control">
        <?php if(!empty($photo)): ?>
			<p>Vous pouvez uplaoder une nouvelle photo si vous souhaitez la changer.<br>
			<img src="<?=$photo ?>" width="100"></p>
		<?php	endif; 	?>
        <input type="hidden" name="photo_actuelle" value="<?= $photo?>" />
        <label for="prix">Prix</label>
        <input type="text" name="prix" placeholder="prix" id="prix" class="form-control" value="<?=$prix?>">
        <label for="stock">Stock</label>
        <input type="text" name="stock" placeholder="stock" id="stock" class="form-control" value="<?=$stock?>">
        <br><input type="submit" value="enregistrer le produit" class="btn btn-default">
</form>

<?php require_once('inc/footer.php');