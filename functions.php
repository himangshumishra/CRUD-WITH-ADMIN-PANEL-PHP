<?php
include 'db.php';

function getPosts() {
    global $conn;
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);
    $posts = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }
    return $posts;
}

function addPost($title, $content) {
    global $conn;
    $title = $conn->real_escape_string($title);
    $content = $conn->real_escape_string($content);
    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    return $conn->query($sql);
}

function getPostById($id) {
    global $conn;
    $sql = "SELECT * FROM posts WHERE id=$id";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function updatePost($id, $title, $content) {
    global $conn;
    $title = $conn->real_escape_string($title);
    $content = $conn->real_escape_string($content);
    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";
    return $conn->query($sql);
}

function deletePost($id) {
    global $conn;
    $sql = "DELETE FROM posts WHERE id=$id";
    return $conn->query($sql);
}


?>
