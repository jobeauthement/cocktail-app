<?php
include 'error_handler.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

$cocktail = null;
if (!empty($id)) {
    $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=" . urlencode($id);

    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (!empty($data['drinks'])) {
        $cocktail = $data['drinks'][0];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktail Details</title>
    <link rel="stylesheet" href="style.css">
</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktail App - Results</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Start Search Bar -->
    <?php include 'searchbar.php'; ?>
    <!-- End Search Bar -->
    <div class="container">
        <h1>Cocktail Details</h1>
        <a href="index.php">Search again</a>
        <?php if (!empty($cocktail)) : ?>
            <h2><?php echo htmlspecialchars($cocktail['strDrink']); ?></h2>
            <img src="<?php echo htmlspecialchars($cocktail['strDrinkThumb']); ?>" alt="<?php echo htmlspecialchars($cocktail['strDrink']); ?>" width="400">
            <p><strong>Glass:</strong> <?php echo htmlspecialchars($cocktail['strGlass']); ?></p>
            <p><strong>Instructions:</strong> <?php echo htmlspecialchars($cocktail['strInstructions']); ?></p>
            <h3>Ingredients:</h3>
            <ul>
                <?php
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
                ?>
            </ul>
        <?php else : ?>
            <p>No cocktail found.</p>
        <?php endif; ?>
    </div>
</body>

</html>