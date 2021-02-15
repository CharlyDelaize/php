<?php 

$pdo = new PDO('mysql:host=localhost;dbname=contact', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$erreur ="";
$content = '';

if($_POST){
    // echo "Titre: " . $_POST['nom'] . '<br>';
    // echo "Titre: " . $_POST['prenom'] . '<br>';
    // echo "Titre: " . $_POST['telephone'] . '<br>';
    // echo "Titre: " . $_POST['annee_rencontre'] . '<br>';
    // echo "Titre: " . $_POST['email'] . '<br>';
    // echo "Titre: " . $_POST['type_contact'] . '<br>';

        if (strlen($_POST['nom']) < 2) {
            $erreur .= '<div class="alert alert-danger" role="alert">Le nom doit avoir au minimum 2 caractères</div>';
        }

        if (strlen($_POST['prenom']) < 2) {
            $erreur .= '<div class="alert alert-danger" role="alert">Le prénom doit avoir au minimum 2 caractères</div>';
        }

    if(strlen($_POST['telephone']) != 10)
            {
                $erreur .= '<div class="alert alert-danger" role="alert">Le numéro de téléphone doit avoir 10 chiffres</div>';
            }
    if ($_POST['type_contact'] == 'autre'){
        $erreur .= '<div class="alert alert-danger" role="alert">Contact non valide</div>';
    }

    if(empty($erreur))
            {
                $pdo->query("INSERT INTO contact ( nom, prenom, telephone, annee_rencontre, email, type_contact) VALUES ( '$_POST[nom]' , '$_POST[prenom]' , '$_POST[telephone]' , '$_POST[annee_rencontre]' , '$_POST[email]' , '$_POST[type_contact]')");
    
                $content .= 'Inscription validée';
                echo $content;
            }else{
                echo $erreur;
            }
    
        }
$content = $erreur;
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <form action="" method="post">
        <label>nom
        <input type="text" id="nom" name="nom" min="2" />
        </label><br>
        <label>prenom
        <input type="text" id="prenom" name="prenom" min="2" />
        </label><br>
        <label>telephone
        <input type="text" id="telephone" name="telephone">
        </label><br>
        <label>Année rencontre
        <select name="annee_rencontre">
            <?php
                /* $annee_courante = 1950;
                for($i=2021; $i<=$annee_courante; $i++){
                    echo '<option value="2021">' . $i . '<br></option>';
                    } */
                   /* $annee=1921;
                    for($i=2021;$i>=$annee ;$i--){
                        echo '<option>'.$i.'</option>';}
                        echo '</select>';
                        echo '<br /><br />'; */
                    for ($i = date('Y'); $i >= date('Y')-100; $i--) {
                        echo "<option>$i</option>";	
                    }
            ?>
        </select>
        </label><br>
        <label>email
        <input type="email" name="email">
        </label><br>
        <select name="type_contact">
            <option value="ami">ami</option>
            <option value="famille">famille</option>
            <option value="professionel">professionel</option>
            <option value="autre">autre</option>
        </select>
        <input type="submit" name="envoyer">
    </form>
</body>
</html>

<?php

// echo "<table border=1>";
// echo "<tr>";
// echo "<th><strong>Nom</strong></th>";
// echo "<th><strong>Prénom</strong></th>";
// echo "<th><strong>Téléphone</strong></th>";
// echo "<th><strong>Autres infos</strong></th>";
// echo "</tr>";
$r = $pdo->query("SELECT * FROM contact");
echo "<table border='1'>
            <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Telephone</th>
            <th>Autre infos</th>
            </tr>";
        $r = $pdo -> query($requete);
/*while($bdd = $r->fetch(PDO::FETCH_ASSOC)){
     $content .= "<tr>";
    foreach($bdd as $indice => $valeur){
        $content .= "<td>$valeur" . ' ' . "</td>";
    }
    $content .= "<a href='#'>plus d'infos</a></tr><br>"; 
}*/
while ($ligne =  $r->fetch(PDO::FETCH_ASSOC)) {            
    echo "<tr>";
    echo "<td>".$ligne['nom']. "</td>";
    echo "<td>".$ligne['prenom']. "</td>";
    echo "<td>".$ligne['telephone']. "</td>";
    echo "<td><a href =?id_contact=".$ligne['id_contact'].">Plus dinfo</a></td>";            
    echo "</tr>";


}
echo '</table>';// fin du tableau.
 ?>

