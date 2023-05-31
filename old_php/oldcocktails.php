<?php
include 'error_handler.php';

$name = isset($_GET['name']) ? $_GET['name'] : '';
$ingredients = isset($_GET['ingredients']) ? explode(',', $_GET['ingredients']) : [];
$categories = isset($_GET['category']) ? explode(',', $_GET['category']) : [];
$glasses = isset($_GET['glass']) ? explode(',', $_GET['glass']) : [];
$alcoholics = isset($_GET['alcoholic']) ? explode(',', $_GET['alcoholic']) : [];

$cocktails = [];
if (!empty($name)) {
    $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/search.php?s=" . urlencode($name);
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);
    if (!empty($data['drinks'])) {
        foreach ($data['drinks'] as $drink) {
            $cocktails[$drink['idDrink']] = $drink;
        }
    }
}

if (!empty($ingredients)) {
    foreach ($ingredients as $ingredient) {
        $ingredient = trim($ingredient);
        $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?i=" . urlencode($ingredient);

        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        if (!empty($data['drinks'])) {
            foreach ($data['drinks'] as $drink) {
                $cocktails[$drink['idDrink']] = $drink;
            }
        }
    }
}

if (!empty($categories)) {
    foreach ($categories as $category) {
        $category = trim($category);
        $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=" . urlencode($category);
        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        if (!empty($data['drinks'])) {
            foreach ($data['drinks'] as $drink) {
                $cocktails[$drink['idDrink']] = $drink;
            }
        }
    }
}

if (!empty($glasses)) {
    foreach ($glasses as $glass) {
        $glass = trim($glass);
        $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?g=" . urlencode($glass);
        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        if (!empty($data['drinks'])) {
            foreach ($data['drinks'] as $drink) {
                $cocktails[$drink['idDrink']] = $drink;
            }
        }
    }
}

if (!empty($alcoholics)) {
    foreach ($alcoholics as $alcoholic) {
        $alcoholic = trim($alcoholic);
        $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?a=" . urlencode($alcoholic);
        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        if (!empty($data['drinks'])) {
            foreach ($data['drinks'] as $drink) {
                $cocktails[$drink['idDrink']] = $drink;
            }
        }
    }
}

// var_dump($cocktails);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktail App - Results</title>
    <!-- <link rel="stylesheet" href="style.css"> -->

</head>

<body>
    <div class="container">
        <!-- <h1>Cocktail App</h1> -->
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