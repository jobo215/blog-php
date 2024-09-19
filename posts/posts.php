<?php
include '../scripts/helpers/PostHelper.php';
include '../scripts/db/Database.php';
$posts = PostHelper::getPosts();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="./css/posts.css">
    <script src="../dist/jquery.js" defer></script>
    <script src="./js/posts.js" defer></script>
</head>

<body>
    <div class="container">
        <h1 class="page-title">Blog Posts Overview</h1>
        <div class="cards-grid">
            <?php foreach ($posts as $post): ?>
                <a href="./post.php?id=<?= $post['id'] ?>" class="card-link">
                    <div class="card">
                        <span class="card-category"><?= $post['category_title'] ?></span>
                        <h2 class="card-title"><?= $post['title'] ?></h2>
                        <p class="card-content"><?= $post['content'] ?></p>
                        <p class="card-author">Author: <?= $post['author'] ?></p>
                        <p class="card-date">Created on: <?= PostHelper::formatDates($post['created_date']) ?></p>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </div>
</body>

</html>