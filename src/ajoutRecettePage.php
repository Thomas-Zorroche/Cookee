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
                <label>Nom de la Recette : <input type="text" name="nom" /> </label>
                
                <label>Type de recette : 
                <select name="type">
                    <option value="Entree">Entree</option>
                    <option value="Plat">Plat</option>
                    <option value="Dessert">Dessert</option>
                </select> 
                </label>

                <label>Temps de préparation en minutes : <input type="number" name="prepa" min="1" max="300" /> </label>
                <label>Temps de cuisson en minutes : <input type="number" name="cuisson" min="0" max="300" /> </label>

                <p>Ingrédients :</p>
                <div id="Ingrd-boxes-cont">
                <?php
                foreach($ingredients as $ingredient) {
                    echo('<label>'.$ingredient.'<input type="checkbox" name="'.$ingredient.'"> </label>');
                }
                ?>
                </div>
                
                <label>Tags (max 3) : 
                <select name="tag">
                    <option value="Pizza" onclick="addTag(event)">Pizza</option>
                    <option value="Ete" onclick="addTag(event)">Ete</option>
                    <option value="Hiver" onclick="addTag(event)">Hiver</option>
                    <option value="Netflix" onclick="addTag(event)">Netflix</option>
                    <option value="Soiree" onclick="addTag(event)">Soiree</option>
                    <option value="Famille" onclick="addTag(event)">Famille</option>
                    <option value="Etudiants" onclick="addTag(event)">Etudiants</option>
                </select>
                </label>

                <div id="Tags-picked-cont"></div>

                <input type="submit" value="Valider" />
            </div>
            </form>

        </div>
    
        <script type="text/javascript" src="script/ajoutRecette.js"></script>
    </body>
</html>