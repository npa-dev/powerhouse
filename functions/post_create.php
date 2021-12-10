<?php
//connect to post controller
include_once (dirname(__FILE__)) . '/../controllers/post_controller.php';


if (isset($_POST['submit'])) {
    // Grab form inputs
    $title = $_POST['title'];
    $body = $_POST['body'];

    // create post if not empty
    $newPost = createPost($title, $body);
    if ($newPost) {
        header("location: ../interactions.php");
    }
}
