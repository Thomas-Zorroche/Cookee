<?php
$typeForm = "";
if (isset($_POST["Name"]) && isset($_POST["ingrd-path"]) && isset($_POST["unite"]))
{
    $typeForm = "ingredient";
}
else if (isset($_POST["Name"]) && isset($_POST["Type"]) && isset($_POST["prepa"]) && isset($_POST["four"])
      && isset($_POST["friteuse"]) && isset($_POST["cuisson"]) && isset($_POST["ingredients-list"]) && isset($_POST["commentaire"]))
{
    $typeForm = "recette";
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
        <!-- Barre de Menu -->
        <?php include("lib/menuBar.php"); ?>

        <div id="Main-Window">
            <!-- Titre de la page -->
            <?php
            if ($typeForm == "ingredient") echo("<h1>Valider l'Ingrédient</h1>");
            else if ($typeForm == "recette") echo("<h1>Valider la Recette</h1>");
            else echo("<h1>Erreur Fomulaire, veuillez réessayer</h1>");
            ?>

            <!-- Résumé du formulaire -->
            <div id="Resume-form-cont">
                <?php 
                if ($typeForm == "ingredient") { ?>
                    <img src="https://spoonacular.com/cdn/ingredients_100x100/<?php echo($_POST["ingrd-path"]); ?>">
                    <p><?php echo($_POST["Name"]); ?></p>
                    <p><?php echo($_POST["unite"]); ?></p>
                <?php
                }
                if ($typeForm == "recette") { ?>

                <?php
                }
                ?>
            </div>

            <!-- Boutons { Valider, Modifier, Annuler } -->
            <div id="Btn-validate-cont">
                <?php 
                if ($typeForm == "ingredient") {
                    echo('<p class="btn-form" onclick="ajoutIngrd()">Valider</p>');
                    echo('<a href="ingrdForm.php"><p class="btn-form">Modifier</p></a>');
                } 
                else if ($typeForm == "recette") {
                    echo('<p class="btn-form" onclick="ajoutRecette()">Valider</p>');
                    echo('<a href="recetteForm.php"><p class="btn-form">Modifier</p></a>');
                }
                ?>
                <a href="index.php"><p class="btn-form">Annuler</p></a>
            </div>
        </div>
    
    <script type="text/javascript" src="script/form/textField.js"></script>
    <script type="text/javascript" src="script/ajoutIngrd.js"></script>
    <script type="text/javascript" src="script/ajoutRecette.js"></script>
        
    </body>
</html>