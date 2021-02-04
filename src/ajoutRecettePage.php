<?php
// Connection file to the database
include("database/connectDatabase.php");

// Retrieve ingredients from database
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
        <link rel="stylesheet" href="../style/formulaire.css"/>
    </head>

    <body>
        <?php include("lib/menuBar.php"); ?>

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
                
                <div class="radio-cont">
                    Besoin d'un Four ?
                    <label>Oui<input type="radio" name="four" value="oui"/></label>
                    <label>Non<input type="radio" name="four" value="non" checked="checked"/></label>
                </div>

                <div class="radio-cont">
                    Besoin d'une Friteuse ?
                    <label>Oui<input type="radio" name="friteuse" value="oui"/></label>
                    <label>Non<input type="radio" name="friteuse" value="non" checked="checked"/></label>
                </div>

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

                <textarea name="message" rows="4" cols="45" style="align-content:left;">Commentaires...</textarea>

                <input type="submit" value="Valider" />
            </div>
            </form>

        </div>
    
        <script type="text/javascript" src="script/ajoutRecette.js"></script>
    </body>
</html>