<?php
// Connection file to the database
include("database/connectDatabase.php");
// Include Recipe Class
include("lib/recette.php");

// Create Recipe objects from database
$req = $bdd->query('SELECT nom FROM recette');
$recettes = array();
while($resultats = $req->fetch())
{
    array_push($recettes, new Recette($resultats['nom']));
}
?>

<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Cookee</title>
        <link rel="stylesheet" href="../style/main.css"/>
    </head>

    <body>
        <?php include("lib/menuBar.php"); ?>

        <div id="Main-Window">
            <h1>Recettes</h1>
            <div id="Recipe-Grid"> 
                <?php
                foreach($recettes as $recette) {
                    $recette->displayCard();
                }
                ?>
            </div>
        </div>

    </body>
</html>