<!-- Search Bar -->
<div class="container search-bar">
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