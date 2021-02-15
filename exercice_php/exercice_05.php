<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <h1>Afficher liste de contacts dans un tableau</h1> 
        <?php    
        $pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        
        // $requete = "SELECT * FROM contact WHERE id_contact = $_GET['id_contact']";
        
        //     echo "<table border='1'>
        //         <tr>
        //         <th>Nom</th>
        //         <th>Prenom</th>
        //         <th>Telephone</th>
        //         <th>Autre infos</th>
        //         </tr>";
        //     $resultat = $pdo -> query($requete);        
        //     while ($ligne =  $resultat->fetch(PDO::FETCH_ASSOC)) {            
        //         echo "<tr>";
        //         echo "<td>".$ligne['nom']. "</td>";
        //         echo "<td>".$ligne['prenom']. "</td>";
        //         echo "<td>".$ligne['telephone']. "</td>";
        //         echo '<td><a href ="?id_contact='.$ligne['id_contact'].">Plus dinfo</a></td>";            
        //         echo "</tr>";        
        //     }
        
        //     print "test:" . $_GET['nom'] . "<br>";
        //     print "test:" . $_GET['prenom'] . "<br>";
        //     print "test:" . $_GET['telephone'] . "<br>";

        // }
        // echo "</table>";        
        // 
        $contenu = '';$recup = $pdo -> query("SELECT * FROM contact");
            $contenu .= "<h1> Affichage des " . $recup -> rowCount() . " contacts </h1>";
            $contenu .=  "<table border='5'> <tr>";
            for($i = 0; $i < $recup -> columnCount(); $i++) {
                $colonne = $recup -> getColumnMeta($i);
                $contenu .= "<td> $colonne[name] </td>";
            }   
            $contenu .=  "</tr>";            
            while($ligne = $recup -> fetch(PDO::FETCH_ASSOC)) {
                $contenu .= "<tr>";
                foreach($ligne as $indice => $valeur) {
                    $contenu .= "<td> $valeur </td>";                
                }                
                if(isset($_GET['id_contact'])) {
                    $r = $pdo->query("SELECT * FROM contact WHERE id_contact = $_GET[id_contact]");
                    $contact = $r->fetch(PDO::FETCH_ASSOC);                
                    $nom = $contact['nom'];
                    $prenom = $contact['prenom'];
                    $tel = $contact['telephone'];
                    $annee = $contact['annee_rencontre'];
                    $email = $contact['email'];              }               
                    $contenu .= "<td> <a href=\"?action=voir&id_contact=$ligne[id_contact]\">Voir plus</a> </td>";                
                    $contenu .= "</tr>";
                }       
                $contenu .= "</table>";?>
                
                <?= $contenu ?>
                <div > <h1>fiche du contact</h1>
 <h3><?= $nom ?></h3>
 <h3><?= $prenom ?></h3>
 <h3><?= $tel ?></h3>
 <h3><?= $annee ?></h3>
 <h3><?= $email ?></h3></div>
    </body> 
</html>