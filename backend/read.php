<?php 
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to external CSS -->
</head>
<body>

    <div class="container">
        <h1 class="page-title">Recent Blog Posts</h1>

        <!-- Add New Post Button -->
        <div class="add-post-container">
            <a href="create.php" class="add-post-btn">➕ Add New Post</a>
        </div>

        <div class="posts">
            <?php 
            $sql = "SELECT * FROM posts ORDER BY created_at DESC";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()): ?>
                <div class="post">
                    <h2 class="post-title"><?= $row['title'] ?></h2>
                    <img src="uploads/<?= $row['image'] ?>" class="post-image" alt="<?= $row['title'] ?>">
                    <p class="post-content"><?= nl2br($row['content']) ?></p>
                    <small class="post-date">Posted on: <?= $row['created_at'] ?></small>
                    <div class="post-actions">
                        <a href="update.php?id=<?= $row['id'] ?>" class="edit-btn">✏️ Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this post?')">🗑️ Delete</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

</body>
</html>
