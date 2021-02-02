<?php
// Connection file to the database
include("database/connectDatabase.php");
// Include Recipe Class
include("lib/recette.php");

// Retrieve recipe name and ingredients list
$recetteName = $_GET["recette"];
$ingredients = array();
$req = $bdd->prepare(
    'SELECT i.nom FROM ingredient AS i
    JOIN recette_ingredient AS ri
    ON i.id_ingredient = ri.id_ingredient 
    JOIN recette AS r
    ON ri.id_recette = r.id_recette 
    WHERE r.nom = ?');
$req->execute(array($recetteName));

while($resultat = $req->fetch())
{
    array_push($ingredients, $resultat['nom']);
}

?>

<html>
    <head>
        <meta charset="UTF-8"/>
        <title> Cookee </title>
        <link rel="stylesheet" href="../style/main.css"/>
        <link rel="stylesheet" href="../style/recette.css"/>
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
            <?php
            echo("<h1>".$recetteName."</h1>")
            ?>

            <div id="ingredients-cont">
                <ul>
                <?php
                foreach($ingredients as $ingredient) {
                    echo("<li>".$ingredient."</li>");
                }
                ?>
                </ul> 
            </div>

            <!-- Youtube Video -->
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Vph7Z776AZw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </body>
</html>