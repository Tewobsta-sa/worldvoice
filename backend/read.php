<?php 
include 'db.php';

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo "<h2>{$row['title']}</h2>";
    echo "<img src='uploads/{$row['image']}' width='200'><br>";
    echo "<p>{$row['content']}</p>";
    echo "<small>Posted on: {$row['created_at']}</small><br>";
    echo "<a href='update.php?id={$row['id']}'>Edit</a> | ";
    echo "<a href='delete.php?id={$row['id']}'>Delete</a><hr>";
}
?>
