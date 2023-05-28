<?php
include 'error_handler.php';

$query = isset($_GET['query']) ? $_GET['query'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : 'name';

$cocktails = [];
$apiUrl = '';

if ($query) {
    switch ($type) {
        case 'name':
            $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=" . urlencode($query);
            break;
        case 'ingredients':
            $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?i=" . urlencode($query);
            break;
        case 'category':
            $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=" . urlencode($query);
            break;
        case 'glass':
            $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?g=" . urlencode($query);
            break;
        case 'alcoholic':
            $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?a=" . urlencode($query);
            break;
        default:
            $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=" . urlencode($query);
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
<!-- Include here your HTML for displaying the results, similar to the previous HTML I've given -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktail App - Results</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <?php include 'searchbar.php'; ?>
    <div class="container">
        <h1>Cocktail App - Results</h1>
        <div class="toolbar"><a href="index.php" class="search-link">New Search</a></div>

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
            <p>No cocktails found. Try another search.</p>
        <?php endif; ?>
    </div>
</body>

</html>