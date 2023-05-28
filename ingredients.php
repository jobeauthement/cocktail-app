<?php
// ingredients.php
function displayIngredients($cocktail)
{
    for ($i = 1; $i <= 15; $i++) {
        $ingredient = $cocktail["strIngredient$i"];
        $measure = $cocktail["strMeasure$i"];

        if (!empty($ingredient)) {
            echo '<li>';
            echo '<img src="https://www.thecocktaildb.com/images/ingredients/' . rawurlencode($ingredient) . '.png" alt="' . htmlspecialchars($ingredient) . '" width="200">';
            echo ' ' . htmlspecialchars($ingredient);
            if (!empty($measure)) {
                echo ' (' . htmlspecialchars($measure) . ')';
            }
            echo '</li>';
        }
    }
}

// Include the ingredients.php file in cocktail_detail.php:

 After the line "<h3>Ingredients:</h3>" 
<ul>
    <?php
    include 'ingredients.php';
    displayIngredients($cocktail);
    ?>
</ul>