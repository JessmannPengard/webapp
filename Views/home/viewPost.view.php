<?php

// Show post
// Format time
$postDate = new DateTime($parameters["post_create_datetime"]);
$nowDate = new DateTime("now");
$time = format_interval_dates_short($nowDate, $postDate);
//-------------
// Format edit time
if ($parameters["post_edit_datetime"] != null) {
    $postEditDate = new DateTime($parameters["post_edit_datetime"]);
    $editTime = format_interval_dates_short($nowDate, $postEditDate);
}
$db = new Database;
$user = new User($db->getConnection());
$username = $user->getById($parameters["id_user"]);
echo "<article>
<div class='user-post'>
  <div>
    <span class='user-name'>" . $username["user_name"] . "</span>
    <span class='post-date'> · " . $time . "</span>";
if ($parameters["post_edit_datetime"] != null) {
    echo "<span class='post-date'> · edited " . $editTime . "</span>";
}
echo "  </div>";
// Show options button only on user posts
if (isset($_SESSION["user_name"]) && $_SESSION["user_name"] == $username["user_name"]) {
    echo "    <div class='optPosts'>
          <a href='" . URL_PATH . "/home/editpost?" . $parameters["id_post"] . "' class='optPost'> <i class='fa-solid fa-pen-to-square'></i></a>
          <a href='" . URL_PATH . "/home/deletepost?" . $parameters["id_post"] . "' class='optPost'> <i class='fa-sharp fa-solid fa-trash-can'></i></a>
    </div>";
}
echo "</div>

<p class='post-text'>" . $parameters["post"] . "</p>";

// Show comment input
if (isset($_SESSION["user_name"])) {
    echo "
    <div class='div-send-post'>
        <form action='' method='post' class='send-post'>
            <div class='mb-3'>
                <textarea name='post-text' id='' maxlength='255' class='input-post' placeholder='Write something here...' required autofocus></textarea>
            </div>
            <input type='submit' value='Publish' class='submit-post'>
        </form>
    </div>
";
}

// Get, format and show comments
$db = new Database;
$comment = new Post($db->getConnection());
$comments = array();
$comments["comments"] = $comment->getPosts(0, $parameters["id_post"]);

foreach ($comments["comments"] as $key => $value) {
    // Format time
    $postDate = new DateTime($comments["comments"][$key]["post_create_datetime"]);
    $nowDate = new DateTime("now");
    $time = format_interval_dates_short($nowDate, $postDate);
    //-------------
    // Format edit time
    if ($comments["comments"][$key]["post_edit_datetime"] != null) {
        $postEditDate = new DateTime($comments["comments"][$key]["post_edit_datetime"]);
        $editTime = format_interval_dates_short($nowDate, $postEditDate);
    }
    //-------------

    // Show comment
    echo "<div class='user-comment'>
              <div>
                <span class='user-name-comment'>" . $comments["comments"][$key]["user_name"] . "</span>
                <span class='comment-date'> · " . $time . "</span>";
    if ($comments["comments"][$key]["post_edit_datetime"] != null) {
        echo "<span class='comment-date'> · edited " . $editTime . "</span>";
    }
    echo "  </div>";
    // Show options button only on user posts
    if (isset($_SESSION["user_name"]) && $_SESSION["user_name"] == $comments["comments"][$key]["user_name"]) {
        echo "    <div class='optPosts'>
                      <a href='" . URL_PATH . "/home/editpost?" . $comments["comments"][$key]["id_post"] . "' class='optPost'> <i class='fa-solid fa-pen-to-square'></i></a>
                      <a href='" . URL_PATH . "/home/deletepost?" . $comments["comments"][$key]["id_post"] . "' class='optPost'> <i class='fa-sharp fa-solid fa-trash-can'></i></a>
                </div>";
    }
    echo "</div>
          <p class='comment-text'>" . $comments["comments"][$key]["post"] . "</p>";

}


?>