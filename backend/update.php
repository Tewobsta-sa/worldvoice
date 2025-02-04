<?php 
include 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM posts WHERE id = $id");
    $row = $result->fetch_assoc();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if (!empty($image)) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $sql = "UPDATE posts SET title='$title', content='$content', image='$image' WHERE id=$id";
    } else {
        $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";
    }

    if ($conn->query($sql)) {
        header("Location: read.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
