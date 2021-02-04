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

            <div id="Form-cont">
            <form method="post" action="cible.php">
                <div class="form-group-cont">
                    <h2>Nom de l'ingrédient (Fr)</h2>
                    <div class="form-inputs-cont">
                        <input type="text" name="nom" value="Sucre" />
                    </div>
                </div>

                <div class="form-group-cont">
                    <h2>Nom de l'ingrédient (En)</h2>
                    <div class="form-inputs-cont">
                        <input type="text" id="nom-english" name="nom-english" value="Sugar" />
                        <a href="https://www.wordreference.com/"><p>wordreference.com</p></a>
                        <p class="btn-form" onclick="displayIngrdThumbnail()">Preview</p>
                        <p>Sélectionner l'image appropriée pour l'ingrédient.</p>
                    <div id="ingrd-img-cont"></div>
                    </div>
                </div>

                <div class="form-group-cont">
                    <h2>Unitée</h2>
                    <div class="form-inputs-cont">
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
                    </div>
                </div>
                
                <input type="submit" id="Btn-validate" class="btn-form" value="Valider"  />

            </form>
            </div>

        </div>
    
        <script type="text/javascript" src="script/config.js"></script>
        <script type="text/javascript" src="script/apiFood.js"></script>
        <script type="text/javascript" src="script/ajoutIngrd.js"></script>

    </body>
</html>