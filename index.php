<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktail App - Search</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <header class="header">
        <div class="topnav">
            <a class="active" href="#home">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
        </div>
    </header>


    <!-- include is a PHP statement which takes all the text/code/markup in the specified file and copies it into the file that uses the include statement -->
    <!-- PHP foreach loop which iterates over each item in the $tips array (which is defined in tips_data.php) -->
    <!-- For each tip, it generates an HTML div that includes the tip. The div is initially hidden (style=" display: none") -->
    <?php
    include 'header.php';
    include 'searchbar.php';
    include 'tips_data.php';
    foreach ($tips as $index => $tip) : ?>
        <!-- Each tip div has a class of "tip", and the content is structured as "Tip {tip number}: {tip text}". The tip number is one more than the array index (since array indices start at 0) -->
        <!-- The explode function is used to split the $tip string into two parts at ': '. The second part is the actual tip, which is displayed -->
        <div class="tip" style="display: none;">
            Tip <?php echo ($index + 1) . ': ' . explode(': ', $tip)[1]; ?>
        </div>
    <?php endforeach; ?>
    <!-- Including an external JavaScript file (tips.js) which contains logic for showing and hiding tips plugin -->
    <script src="tips.js"></script>
</body>

</html>