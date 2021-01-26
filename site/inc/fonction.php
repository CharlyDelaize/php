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
?>