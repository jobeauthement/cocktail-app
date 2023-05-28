<?php
include 'error_handler.php';

// Check if `search_type` and `search_value` parameters are provided in the GET request. If not, default to empty strings
$search_type = isset($_GET['search_type']) ? $_GET['search_type'] : '';
$search_value = isset($_GET['search_value']) ? $_GET['search_value'] : '';

// Initialize an empty array to hold the cocktails data
$cocktails = [];
if (!empty($search_type) && !empty($search_value)) {
    switch ($search_type) {
        case 'name':
            $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=" . urlencode($search_value);
            break;
        case 'ingredient':
            $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?i=" . urlencode($search_value);
            break;
        case 'category':
            $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=" . urlencode($search_value);
            break;
        case 'glass':
            $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?g=" . urlencode($search_value);
            break;
        case 'alcoholic':
            $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?a=" . urlencode($search_value);
            break;
        default:
            // Default to searching by name if an unexpected search type is provided.
            $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=" . urlencode($search_value);
            break;
    }

    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);
    if (!empty($data['drinks'])) {
        foreach ($data['drinks'] as $drink) {
            $cocktails[$drink['idDrink']] = $drink;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktail App - Results</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="toolbar"><a href="index.php" class="search-link">Search</a></div>

        <?php if (!empty($cocktails)) : ?>
            <h2 class="heading2">Cocktail Results:</h2>
            <div class="cocktails-grid">

                <?php foreach ($cocktails as $id => $cocktail) : ?>
                    <div class="cocktail-card">
                        <a href="cocktail_detail.php?id=<?php echo htmlspecialchars($id); ?>">
                            <img src="<?php echo htmlspecialchars($cocktail['strDrinkThumb']); ?>" alt="<?php echo htmlspecialchars($cocktail['strDrink']); ?>">
                            <div class="cocktail-name"><?php echo htmlspecialchars($cocktail['strDrink']); ?></div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>No cocktails found.</p>
        <?php endif; ?>
    </div>
</body>

</html>