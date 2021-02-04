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
            <h1>Ajouter un Ingredient</h1>

            <form method="post" action="cible.php">
            <div id="Form-cont">
                <label>Nom de l'ingrédient (Français) : <input type="text" name="nom" /> </label>
                
                <div id="Ingrd-english-cont">
                    <label>Nom de l'ingrédient (Anglais) : <input type="text" id="nom-english" name="nom-english" /> </label>
                    <p class="btn-preview"  onclick="displayIngrdThumbnail()">Preview</p>
                </div>
                <a href="https://www.wordreference.com/"><p>wordreference.com</p></a>
                <p>Sélectionner l'image appropriée pour l'ingrédient.</p>

                <div id="ingrd-img-cont"></div>
                
                <label>Unitée : 
                <select name="unite">
                    <option value="Entree">ml</option>
                    <option value="Plat">g</option>
                    <option value="Dessert">c.a.c</option>
                    <option value="Dessert">c.a.s</option>
                    <option value="Dessert">sachet</option>
                    <option value="Dessert">none</option>
                </select> 
                </label>

                <input type="submit" value="Valider"  />
            </div>
            </form>

        </div>
    
        <script type="text/javascript" src="script/config.js"></script>
        <script type="text/javascript" src="script/apiFood.js"></script>
        <script type="text/javascript" src="script/ajoutIngrd.js"></script>

    </body>
</html>