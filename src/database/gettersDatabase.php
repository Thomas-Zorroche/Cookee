<?php
/*
 *  RECETTES 
 */
$req = $bdd->query('SELECT nom FROM recette');
$recettes = array();
while($resultats = $req->fetch())
{
    array_push($recettes, $resultats['nom']);
}

/*
 *  INGREDIENTS 
 */
$req = $bdd->query('SELECT nom FROM ingredient');
$ingredients = array();
while($resultats = $req->fetch())
{
    array_push($ingredients, $resultats['nom']);
}

/*
 *  UNITES 
 */
$req = $bdd->query('SELECT nom FROM unite');
$unites = array();
while($resultats = $req->fetch()) {
    array_push($unites, $resultats['nom']);
}

/*
 *  TYPE 
 */
$req = $bdd->query('SELECT nom FROM type');
$types = array();
while($resultats = $req->fetch()) {
    array_push($types, $resultats['nom']);
}

function getAllIngrdPaths($bdd) {
    $req = $bdd->query('SELECT path FROM ingredient');
    $paths = array();
    while($resultats = $req->fetch()) {
        array_push($paths, $resultats['path']);
    }
    return $paths;
}

function getAllIngrdNames($bdd) {
    $req = $bdd->query('SELECT nom FROM ingredient');
    $noms = array();
    while($resultats = $req->fetch()) {
        array_push($noms, $resultats['nom']);
    }
    return $noms;
}

?>