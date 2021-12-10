<?php
//connect to post class
include_once (dirname(__FILE__)) . '/../classes/post_class.php';

// Inserting a new post
function createPost($title, $body)
{
    // Create new post object
    $post = new Post;

    // Run query
    $runQuery = $post->create($title, $body);

    if ($runQuery) {
        return $runQuery;
    } else {
        return false;
    }
}

function getPosts()
{
    // Create new post object
    $post = new Post;

    // Run query
    $runQuery = $post->getPosts();

    if ($runQuery) {
        $posts = array();
        while ($record = $post->db_fetch()) {
            $posts[] = $record;
        }
        return $posts;
    } else {
        return false;
    }
}

function getSinglePost($id)
{
    // Create new post object
    $post = new Post;

    // Run query
    $runQuery = $post->getSinglePost($id);

    if ($runQuery) {

        $posts = $post->db_fetch();
        if (!empty($posts)) {
            return $posts;
        } else {
            return [];
        }
    } else {
        return false;
    }
}

function updatePost($id, $title, $body)
{
    // Create new post object
    $post = new Post;

    // Run query
    $runQuery = $post->update($id, $title, $body);

    if ($runQuery) {
        return $runQuery;
    } else {
        return false;
    }
}

function deletePost($id)
{
    // Create new post object
    $post = new Post;

    // Run query
    $runQuery = $post->delete($id);

    if ($runQuery) {
        return $runQuery;
    } else {
        return false;
    }
}
