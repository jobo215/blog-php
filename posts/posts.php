<?php

include "../scripts/helpers/SecurityHelper.php";
include "../scripts/helpers/SessionHelper.php";
include "../scripts/helpers/ValidationHelper.php";

SecurityHelper::preventUnauthorizedUsers();

include '../scripts/helpers/PostHelper.php';
include '../scripts/db/Database.php';
include '../scripts/helpers/CategoryHelper.php';
$categories = CategoryHelper::getCategories();
$posts = isset($_GET['category']) ? PostHelper::getPostsByCategoryId($_GET['category']) : PostHelper::getPosts();
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
        <?php include './header.php'; ?>
        <h1 class="page-title">Blog Posts Overview</h1>
        <div class="category-filter">
            <label for="categoryDropdown">Filter by Category:</label>
            <select id="categoryDropdown">
                <option value="">All Categories</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>" <?= isset($_GET['category']) && $_GET['category'] == $category['id'] ? "selected" : "" ?>>
                        <?= $category['category_title'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
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
        <?php include './footer.php'; ?>
    </div>
</body>

</html>