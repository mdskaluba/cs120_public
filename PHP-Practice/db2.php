<!doctype html>
<html>
<head>
<title>Results</title>
<style>
    .song {
        font-family: Arial, sans-serif;
        border: 1px solid #ccc;
        padding: 10px;
        margin: 8px 0;
        width: 300px;
    }
    .title {
        font-weight: bold;
    }
    .artist {
        color: #555;
    }
</style>
</head>
<body>

<h2>Matching Songs</h2>

<?php
if (!isset($_POST['genres'])) {
    echo "No genres selected.";
    exit;
}

$conn = new PDO("mysql:host=localhost;dbname=your_db", "username", "password");
$ids = $_POST['genres'];
$marks = implode(',', array_fill(0, count($ids), '?'));

$sql = "SELECT s.title, s.artist
        FROM Song s
        JOIN songGenre sg ON s.song_id = sg.song_id
        WHERE sg.genre_id IN ($marks)
        GROUP BY s.song_id";

$stmt = $conn->prepare($sql);
$stmt->execute($ids);
$data = $stmt->fetchAll();

if (count($data) == 0) {
    echo "No songs found.";
} else {
    foreach ($data as $row) {
        echo "<div class='song'>";
        echo "<div class='title'>" . htmlspecialchars($row['title']) . "</div>";
        echo "<div class='artist'>by " . htmlspecialchars($row['artist']) . "</div>";
        echo "</div>";
    }
}
?>

</body>
</html>
