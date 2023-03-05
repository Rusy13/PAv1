
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Maze</title>
</head>
<body>
    <h1>Maze</h1>
    <form action="shortest_path.php" method="post">
        <label for="maze">Maze:</label><br>
        <textarea id="maze" name="maze" rows="7" cols="50"></textarea><br>
        <label for="start">Start:</label>
        <input type="text" id="start" name="start"><br>
        <label for="end">End:</label>
        <input type="text" id="end" name="end"><br>
        <input type="submit" value="Find Shortest Path">
    </form>
</body>
</html>