<!-- Effectuer des liens pointant sur la meme pas dans une liste ul li -->
<h1>Votre langue : </h1>
<ul>
<li><a href="?pays=fr">France</a></li>
<li><a href="?pays=es">Espagne</a></li>
<li><a href="?pays=en">Angleterre</a></li>
<li><a href="?pays=it">Italie</a></li>
</ul>

<?php

if(isset($_GET['pays'])) // Si un pays est passé dans l'URL c'est que nous avons cliqué sur un lien
{
//echo $_GET['pays'];
$pays=$_GET['pays'];
}
elseif(isset($_COOKIE['pays'])) // On rentre dans le elseif uniquement si la condition précédente n'est pas passée et qu'un cookie existe
{
    $pays=$_COOKIE['pays'];
}
else // Dans le cas où le if et le else if ne se déclenche pas, c'est le cas par défaut qui est apppliqué
{
    $pays='fr';
}

$un_an = 365*24*3600; // nombre de secondes par an
setCookie("pays",$pays,time()+$un_an); // DAns tout les cas un cookie est créé car ce code n'est pas dans une condition
// setCookie("nom", valeur "durée de vie");

//echo $pays;
//----------------
switch($pays)
{
    case 'fr':
		print '<p>Bonjour, <br />	Vous visiter actuellement le site en fran�ais <br />Effectivement, la sauvegarde du cookie permet de retenir la langue avec laquelle vous naviguer sur le site pour vos prochaines visites. <br />A bient�t.</p>';
	break;
	case 'es':
		print '<p>�Hola <br />En este momento est� visitando el sitio en espa�ol <br />De hecho, la cookie permite la copia de seguridad de conservar el idioma que utilice el sitio para futuras visitas. <br />Pronto.</p>';
	break;
	case 'en':
		print '<p>Hello <br />You are currently visiting the site in English <br />Indeed, the cookie allows the backup to retain the language that you use the site for future visits. <br />Soon.</p>';
	break;
	case 'it':
		print '<p>Ciao <br />Si sta attualmente visitando il sito in Italiano <br />Infatti, il cookie consente il backup di mantenere la lingua che si usa il sito per visite future. <br />Presto.</p>';
	break;
}
?>