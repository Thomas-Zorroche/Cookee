<?php
// Connection file to the database
include("../database/connectDatabase.php");

if (isset($_POST["letter"]))
{
    $letter = $_POST["letter"];

    $req = $bdd->query("SELECT nom, path FROM ingredient WHERE nom LIKE '$letter%'");
    $data = array();
    while($resultats = $req->fetch()) {
        array_push($data, array($resultats['nom'],  $resultats['path']) );
    }
    echo json_encode($data);
}
else
{
    echo("Problème serveur");
    http_response_code(404);
}

?>