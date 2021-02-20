<?php
// Connection file to the database
include("../database/connectDatabase.php");

if (isset($_POST["name"]) && isset($_POST["path"]) && isset($_POST["unite"]))
{
    $name = $_POST["name"];
    $path = $_POST["path"];
    $unite = $_POST["unite"];

    $req = $bdd->exec("INSERT INTO ingredient (nom, id_unite, path)
    VALUES ('$name', (SELECT id_unite FROM unite WHERE nom = '$unite'), '$path')");

    echo("L'ingrédient ". $name ." a été ajouté !");
}
else
{
    echo("Problème serveur");
    http_response_code(404);
}

?>