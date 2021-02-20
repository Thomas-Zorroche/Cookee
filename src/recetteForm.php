<?php
// Connection file to the database
include("database/connectDatabase.php");
// Retrieve data from Database
include("database/gettersDatabase.php");
?>

<html>
    <head>
        <meta charset="UTF-8"/>
        <title> Cookee </title>
        <link rel="stylesheet" href="../style/main.css"/>
        <link rel="stylesheet" href="../style/formulaire.css"/>
    </head>

    <body onload="createAlphabetIndex()">
        <?php include("lib/menuBar.php"); ?>

        <div id="Main-Window">
            <h1>Ajouter une Recette</h1>

            <div id="Form-cont">
            <form method="post" action="validateForm.php">
                <div class="form-windows-cont">
                    <h2>Nom de la Recette</h2>
                    <div class="form-inputs-cont">
                        <input type="text" name="Recette-name" id="Name" placeholder="Tarte au citron" autocomplete="off" oninput="ingrdTypingEvent('recette')"/>
                        <p id="Warning-ingrd-name"></p>
                    </div>
                </div>

                <div class="form-windows-cont">
                    <h2>Type</h2>
                    <div class="form-inputs-cont radio-cont">
                    <?php
                    foreach($types as $type) {
                        echo('<div><input type="radio" name="type" id="'.$type.'" value="ml"/> <label for="'.$type.'"> <span></span> '.$type.' </label> </div>');
                    }
                    ?>
                    </div>
                </div>

                <div class="form-windows-cont">
                    <h2>Temps de préparation en minutes</h2>
                    <div class="form-inputs-cont">
                        <span class="btn-number" onclick="Decrement(event)" onmousedown="DecrementNS(event)" onmouseup="StopTimer()">-</span>
                        <input type="number" name="prepa" min="1" max="300" />
                        <span class="btn-number" onclick="Increment(event)" onmousedown="IncrementNS(event)" onmouseup="StopTimer()">+</span>
                    </div>
                </div>

                <div class="form-windows-cont">
                    <h2>Besoin d'un Four ?</h2>
                    <div class="form-inputs-cont radio-cont">
                        <div><input type="radio" name="four" id="four-oui" value="oui"/> <label for="four-oui"> <span></span> oui </label> </div>
                        <div><input type="radio" name="four" id="four-non" value="non"/> <label for="four-non"> <span></span> non </label> </div>
                    </div>
                </div>
                
                <div class="form-windows-cont">
                    <h2>Besoin d'une Friteuse ?</h2>
                    <div class="form-inputs-cont radio-cont">
                        <div><input type="radio" name="friteuse" id="friteuse-oui" value="oui"/> <label for="friteuse-oui"> <span></span> oui </label> </div>
                        <div><input type="radio" name="friteuse" id="friteuse-non" value="non"/> <label for="friteuse-non"> <span></span> non </label> </div>
                    </div>
                </div>

                <div class="form-windows-cont">
                    <h2>Temps de cuisson en minutes</h2>
                    <div class="form-inputs-cont">
                        <span class="btn-number" onclick="Decrement(event)" onmousedown="DecrementNS(event)" onmouseup="StopTimer()">-</span>
                        <input type="number" name="cuisson" min="0" max="300" />
                        <span class="btn-number" onclick="Increment(event)" onmousedown="IncrementNS(event)" onmouseup="StopTimer()">+</span>
                    </div>
                </div>

                <div class="form-windows-cont">
                    <h2>Ingredients</h2>
                    <div class="form-inputs-cont">
                        <ul id="Alphabet-index" ></ul>
                        <div  id="ingrd-img-cont">
                            <?php
                            $ingrdPaths = getAllIngrdPaths($bdd);
                            $ingrdNames = getAllIngrdNames($bdd);
                            
                            for ($i = 0; $i < count($ingrdNames); $i++) {
                                echo('
                                <div class="thumbnail-cont" onclick="selectIngrd(event)">
                                    <img class="ingrd-img" src="https://spoonacular.com/cdn/ingredients_100x100/'.$ingrdPaths[$i].'" >
                                    <p>'.$ingrdNames[$i].'</p>
                                </div>
                                ');
                            } 
                            ?>
                        </div>
                    </div>
                </div>

                <div class="form-windows-cont">
                    <h2>Tags</h2>
                    <div class="form-inputs-cont">
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
                    </div>
                </div>

                <div class="form-windows-cont">
                    <h2>Commentaires</h2>
                    <div class="form-inputs-cont">
                        <textarea name="commentaire" rows="4" cols="45" style="align-content:left;">Commentaires...</textarea>
                    </div>
                </div>

                <input type="submit" id="Btn-validate" disabled="true" class="btn-form" value="Valider"  />
            </form>
            </div>

        </div>
    
        <script type="text/javascript" src="script/apiFood.js"></script>
        <script type="text/javascript" src="script/formulaireRecette.js"></script>
        <script type="text/javascript" src="script/form/textField.js"></script>
        <script type="text/javascript" src="script/form/numberPicker.js"></script>
    </body>
</html>