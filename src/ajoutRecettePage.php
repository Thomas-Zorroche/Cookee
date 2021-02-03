<?php
// Connection file to the database
include("database/connectDatabase.php");

// Create Recipe objects from database
$req = $bdd->query('SELECT nom FROM ingredient');
$ingredients = array();
while($resultats = $req->fetch())
{
    array_push($ingredients, $resultats['nom']);
}
?>

<html>
    <head>
        <meta charset="UTF-8"/>
        <title> Cookee </title>
        <link rel="stylesheet" href="../style/main.css"/>
        <link rel="stylesheet" href="../style/ajoutRecette.css"/>
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
            <h1>Ajouter une Recette</h1>

            <form method="post" action="cible.php">
            <div id="Form-cont">
                <label>Nom de la Recette <input type="text" name="nom" /> </label>

                <p>Ingrédients :</p>
                <div id="Ingrd-boxes-cont">
                <?php
                foreach($ingredients as $ingredient) {
                    echo('<label>'.$ingredient.'<input type="checkbox" name="'.$ingredient.'"> </label>');
                }
                ?>
                </div>

                <input type="submit" value="Valider" />
            </div>
            </form>

        </div>
    </body>
</html>