<?php require_once('../inc/init.php') ?>

<?php if(!internauteEstConnecteEtAdmis())
{
    header('location../connection.php');
    exit();
}
?>

<?php require_once('../inc/haut.php'); ?>

<form method="post" action="" enctype="miltipart/form-data">
    <input name="id_produit" value="">

    <label for="reference">reference</label>
		<input type="text" name="reference" placeholder="reference" id="reference" class="form-control" value="">
		<label for="categorie">categorie</label>
		<input type="text" name="categorie" placeholder="categorie" id="categorie" class="form-control" value="">
		<label for="titre">titre</label>
		<input type="text" name="titre" placeholder="titre" id="titre" class="form-control" value="">
		<label for="description">description</label>
		<textarea name="description" placeholder="description" id="description" class="form-control"></textarea>
		<label for="couleur">couleur</label>
        <select name="couleur" id="couleur">
        <option value="">bleu</option>
        <option value="">rouge</option>
        <option value="">vert</option>
        <option value="">blanc</option>
        <option value="">noir</option>
        <option value="">jaune</option>
        <option value="">violet</option>
        </select>
        <label for="taille">couleur</label>
        <select name="taille" id="taille">
        <option value=>S</option>
        <option value=>M</option>
        <option value=>L</option>
        <option value=>XL</option>
        </select>
        <label for="public">couleur</label>
        <select name="public" id="public">
        <option value=>Homme</option>
        <option value=>Femme</option>
        <option value=>Mixte</option>
        </select>
        <label for="photo">Photo</label>
        <input type="file" name="photo" id="photo" class="form-control">
        <label for="prix">Prix</label>
        <input type="text" name="prix" placeholder="prix" class="form-control">
        <label for="stock">Stock</label>
        <input type="text" name="stock" placeholder="stock" class="form-control"><br>
        <input type="submit" value="enregistrer le produit" class="btn btn-default">
</form>

<?php require_once('../inc/bas.php'); ?>