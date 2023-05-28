<?php
include 'error_handler.php';

function getCocktailById($id)
{
    $apiUrl = "https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=" . urlencode($id);

    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    return !empty($data['drinks']) ? $data['drinks'][0] : null;
}

// include the following in your cocktail_detail.php

// <?php
// include 'api.php';

// $id = isset($_GET['id']) ? $_GET['id'] : '';

// $cocktail = getCocktailById($id);
// 
