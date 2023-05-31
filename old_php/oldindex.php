<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktail Artist App</title>
</head>

<body>
    <div class="container">
        <h1>Cocktail App</h1>
        <form action="results.php" method="get">
            <input type="text" name="query" placeholder="Search..." required>
            <select name="type">
                <option value="name">Name</option>
                <option value="ingredients">Ingredients</option>
                <option value="category">Category</option>
                <option value="glass">Glass</option>
                <option value="alcoholic">Alcoholic</option>
            </select>
            <button type="submit">Search</button>
        </form>
    </div>


    <div class="container">
        <h1>Search Cocktails</h1>
        <form action="cocktails.php" method="get">
            <h2>Search Cocktails By Name</h2>
            <input type="text" name="name" placeholder="Enter cocktail name">
            <h2>Search Cocktails By Ingredient</h2>
            <input type="text" name="ingredients" placeholder="Enter ingredient">
            <h2>Search Cocktails By Category</h2>
            <input type="text" name="category" placeholder="Enter category">
            <h2>Search Cocktails By Glass Type</h2>
            <input type="text" name="glass" placeholder="Enter glass type">
            <h2>Search Cocktails By Alcohol Content</h2>
            <input type="text" name="alcoholic" placeholder="Enter 'Alcoholic', 'Non alcoholic' or 'Optional alcohol'">
            <button type="submit">Find Cocktails</button>
        </form>
    </div>
</body>

</html>