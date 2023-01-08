<?php

// Insert new post with specified data in params
function publishPost($id_user, $text_post, $id_parent_post = 0, $post_datetime)
{
    include("db.php");

    // Prepare
    $stmt = $conn->prepare("INSERT INTO posts (id_user,post,id_parent_post,post_create_datetime) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $id_user, $text_post, $id_parent_post, $post_datetime);

    // Execute
    $stmt->execute();

    // Close connection
    $stmt->close();
    mysqli_close($conn);

    // True if execute was succesfully, else False
    return $stmt;
}


// Get posts with specified conditions in params
function getPosts($id_user = 0, $id_parent_post = 0, $post_datetimeFROM = 0, $post_datetimeTO = 0)
{
    include("db.php");

    // Prepare
    $format = "i";
    $param = array();

    $sql = "SELECT * FROM posts WHERE 1=?";
    $param[] = 1;
    if ($id_user != 0) {
        $sql .= " AND id_user=?";

        $format .= "i";
        $param[] = $id_user;
    }
   
    $sql .= " AND id_parent_post=?";

    $format .= "i";
    $param[] = $id_parent_post;

    if ($post_datetimeFROM != 0) {
        $sql .= " AND post_create_datetime>?";

        $format .= "s";
        $param[] = $post_datetimeFROM;
    }
    if ($post_datetimeTO != 0) {
        $sql .= " AND post_create_datetime<?";

        $format .= "s";
        $param[] = $post_datetimeTO;
    }
    $sql .= " ORDER BY post_create_datetime DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param($format, ...$param);
    $stmt->bind_result($post['id_post'], $post['id_user'], $post['post'], $post['id_parent_post'], $post['post_create_datetime']);

    // Execute
    $stmt->execute();
    $stmt->store_result();

    $result = array();
    // Store rows in an array
    for ($i = 0; $i < $stmt->num_rows; $i++) {
        $stmt->data_seek($i);
        $stmt->fetch();
        foreach ($post as $key => $value) {
            $result[$i][$key] = $value;
        }
    }

    // Close connection
    $stmt->close();
    mysqli_close($conn);

    // Return array
    return $result;
}

function getComments($id_post)
{
    include("db.php");

    // Prepare
    $format = "i";
    $param = array();

    $sql = "SELECT * FROM posts WHERE id_parent_post=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_post);
    $stmt->bind_result($post['id_post'], $post['id_user'], $post['post'], $post['id_parent_post'], $post['post_create_datetime']);

    // Execute
    $stmt->execute();
    $stmt->store_result();

    $result = array();
    // Store rows in an array
    for ($i = 0; $i < $stmt->num_rows; $i++) {
        $stmt->data_seek($i);
        $stmt->fetch();
        foreach ($post as $key => $value) {
            $result[$i][$key] = $value;
        }
    }

    // Close connection
    $stmt->close();
    mysqli_close($conn);

    // Return array
    return $result;
}

?>