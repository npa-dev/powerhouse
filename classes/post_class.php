<?php
//connect to database class
require_once (dirname(__FILE__)) . '/../settings/db_class.php';

class Post extends db_connection
{
    public function create($title, $body)
    {
        // sql query
        $sql = "INSERT INTO `posts`(`title`, `body`) VALUES ('$title','$body')";

        // run query
        return $this->db_query($sql);
    }

    public function getPosts()
    {
        //sql query
        $sql = "SELECT * FROM `posts`";

        //run query
        return $this->db_query($sql);
    }

    public function getSinglePost($id)
    {
        // sql query
        $sql = "SELECT * FROM `posts` WHERE `id`='$id'";

        // run query
        return $this->db_query($sql);
    }

    public function update($id, $title, $body)
    {
        // sql query
        $sql = "UPDATE `posts` SET `title`='$title',`body`='$body' WHERE `id`='$id'";

        // run query
        return $this->db_query($sql);
    }

    public function delete($id)
    {
        // sql query
        $sql = "DELETE FROM `posts` WHERE `id`='$id'";

        // run query
        return $this->db_query($sql);
    }
}
