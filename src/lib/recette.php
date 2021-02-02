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
        <a style="display:block" href="recettePage.php?recette='.$this->nom.'">
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

    public function displayIngredients()
    {
        echo("<ul>");
        foreach($this->ingredients as $ingredient) 
        {
            echo("<li>".$ingredient."</li>");
        }
        echo("</ul>");
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