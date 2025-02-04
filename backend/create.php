<?php 
include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO posts (title, content, image) VALUES ('$title','$content','$image')";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../blog.php"); // Redirect to frontend
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Failed to upload image";
    }
}
?>
