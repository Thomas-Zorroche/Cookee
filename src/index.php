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
        <title> Cookee </title>
        <link rel="stylesheet" href="../style/main.css"/>
    </head>

    <body>
        <div id="Menu-Bar">
            <a href="index.php"><p>Cookee</p></a>
            <ul>
                <li>placard</li>
                <li>recettes</li>
                <li>repas</li>
                <li>admin</li>
            </ul>    
        </div>

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