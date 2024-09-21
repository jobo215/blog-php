<?php

include "../scripts/helpers/SecurityHelper.php";
include "../scripts/helpers/SessionHelper.php";
include "../scripts/helpers/ValidationHelper.php";

SecurityHelper::preventUnauthorizedUsers();

include '../scripts/db/Database.php';
include '../scripts/helpers/PostHelper.php';
include '../scripts/helpers/CommentHelper.php';

$postID = 0;
if (isset($_GET) && isset($_GET['id']) && $_GET["id"]) {
    $postID = $_GET['id'];
    $post = PostHelper::getPostById($postID);
    if (count($post) == 0) {
        $postID = 0;
    } else {
        $post = $post[0];
        $comments = CommentHelper::getCommentsByPostId($postID);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="./css/post.css">
    <script src="../dist/jquery.js" defer></script>
    <script src="./js/post.js" defer></script>
</head>

<body>
    <div class="container">
        <?php include './header.php'; ?>
        <br>
        <a href="javascript:history.back()" class="back-button">Back</a>
        <?php if ($postID == 0): ?>
            <div class="not-found">
                <strong>Post Not Found</strong><br>
                Sorry, the post you're looking for doesn't exist.
            </div>
        <?php else: ?>
            <div class="post-header">
                <h1 class="post-title"><?= $post['title'] ?></h1>
                <div class="post-meta">
                    <span>By <?= $post['author'] ?></span>
                    <span>Published on <?= PostHelper::formatDates($post['created_date']) ?></span>
                </div>
                <div>
                    <span class="post-categories"><?= $post['category_title'] ?></span>
                </div>
                <?php if ($post['userID'] == SessionHelper::getLoggedUserId()): ?>
                    <div class="post-actions">
                        <button class="edit-btn" id="edit-btn">Edit</button>
                        <button class="delete-btn" id="delete-btn">Delete</button>
                    </div>
                <?php endif ?>
            </div>

            <div class="post-content">
                <p><?= $post['content'] ?></p>
            </div>

            <div class="post-footer">
                <p><em>Last updated on <?= PostHelper::formatDates($post['updated_date']) ?></em></p>
            </div>

            <div class="comment-section">
                <h3>Comments</h3>

                <?php foreach ($comments as $comment): ?>
                    <div class="comment">
                        <div class="comment-meta">
                            <span>Username: <?= $comment['username'] ?></span>
                            <span>Commented on: <?= PostHelper::formatDates($comment['created_date']) ?></span>
                        </div>
                        <div class="comment-content">
                            <?= $comment['content'] ?>
                        </div>
                    </div>
                <?php endforeach ?>

                <div class="comment-form">
                    <h4>Leave a Comment</h4>
                    <form action="../scripts/posts/addComment.php" method="POST">
                        <label for="comment" class="comment-label">Comment:</label>
                        <textarea id="comment" name="comment" placeholder="Write your comment here" required></textarea>
                        <input type="hidden" name="postID" value="<?= $postID ?>">
                        <button type="submit">Submit Comment</button>
                    </form>
                </div>
            </div>
        <?php endif ?>
    </div>

    <div class="overlay" id="deleteOverlay">
        <div class="dialog">
            <p>Are you sure you want to delete this post?</p>
            <button class="cancel-btn" id="cancel-btn">Cancel</button>
            <button class="confirm-btn" id="overlay-delete">Delete</button>
        </div>
        <form action="../scripts/posts/delete.php" method="POST" id="delete-form">
            <input type="hidden" name="postID" id="postID" value="<?= $postID ?>">
        </form>
    </div>
</body>

</html>