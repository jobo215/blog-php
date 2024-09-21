<?php

include "../scripts/db/Database.php";
include '../scripts/helpers/SessionHelper.php';
include '../scripts/helpers/PostHelper.php';
include '../scripts/helpers/SecurityHelper.php';
if (isset($_GET['id'])) {
    $post = PostHelper::getPostById($_GET['id'])[0];
    SecurityHelper::preventUnauthorizedPostEdit($post['userID']);
}

include '../scripts/helpers/CategoryHelper.php';
$categories = CategoryHelper::getCategories();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="./css/create-post.css">
</head>

<body>
    <div class="container">
        <?php include './header.php'; ?>
        <a href="javascript:history.back()" class="back-button">Back</a>
        <h1>Create New Post</h1>
        <form action="../scripts/posts/edit.php" method="POST">
            <input type="hidden" name="postID" id="postID" value="<?= $post['id'] ?>">
            <div class="form-group">
                <label for="post-title">Title</label>
                <input type="text" id="post-title" name="post-title" placeholder="Enter post title" required
                    value="<?= $post['title'] ?>">
            </div>

            <div class="form-group">
                <label for="post-content">Content</label>
                <textarea id="post-content" name="post-content" placeholder="Enter post content"
                    required><?= $post['content'] ?></textarea>
            </div>

            <div class="form-group">
                <label for="post-category">Category</label>
                <select id="post-category" name="post-category">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= $post['category_title'] == $category['category_title'] ? "selected" : "" ?>>
                            <?= $category['category_title'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <button type="submit">Create Post</button>
        </form>
    </div>

</body>

</html>