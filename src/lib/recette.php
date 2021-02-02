<?php
class Recette
{
    public $nom = "none";
    private $ingredients;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function displayCard()
    {
        echo('
        <a style="display:block" href="recette.html">
        <div class="recipe-container"> 
            <img src="../img/cookies.jpeg"> 
            <div class="desc-recipe-cont">
                <h2>' . $this->nom . '</h2>
                <p>Time: 30min</p>
            </div> 
        </div>
        </a>
        ');
    }

    public function getName()
    {
        return $this->nom;
    }

    public function getIngredients()
    {
        return $ingredients;
    }


}

?>