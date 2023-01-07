<?php

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
    if ($id_parent_post != 0) {
        $sql .= " AND id_parent_post=?";

        $format .= "i";
        $param[] = $id_parent_post;
    }
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

    // Execute
    $stmt->execute();
    $stmt->store_result();

    // Store in an array
    $stmt->bind_result($post['id_post'], $post['id_user'], $post['post'], $post['id_parent_post'], $post['post_create_datetime']);

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

    // Return selected posts
    return $result;
}


?>