<!doctype html>
<html>
<head><title>Choose Genres</title></head>
<body>

<h2>Select Genres</h2>
<form method="post" action="db2.php">

<?php
$conn = new PDO("mysql:host=localhost;dbname=your_db", "username", "password");
$sql = "SELECT genre_id, genre_name FROM Genre";
$result = $conn->query($sql);

foreach ($result as $row) {
    echo "<input type='checkbox' name='genres[]' value='" . $row['genre_id'] . "'> " . $row['genre_name'] . "<br>";
}
?>

<br>
<input type="submit" value="Show Songs">
</form>

</body>
</html>
