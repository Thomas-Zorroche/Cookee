<div id="PopupValidateForm">
    <div id="Resume-ingrd-cont">
        <img src="https://spoonacular.com/cdn/ingredients_100x100/<?php echo($_POST["ingrd-path"]); ?>">
        <p><?php echo($_POST["Ingrd-name-fr"]); ?></p>
        <p><?php echo($_POST["unite"]); ?></p>
    </div>

    <div id="Btn-validate-cont">
        <p class="btn-form" onclick="validate()">Valider</p>
        <a href="ajoutIngrdPage.php"><p class="btn-form">Modifier</p></a>
        <a href="index.php"><p class="btn-form">Annuler</p></a>
    </div>
</div>
