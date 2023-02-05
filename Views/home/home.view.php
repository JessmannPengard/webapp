<!-- Posts view -->
<section class="content">
  <section>
    <?php
    // Format and show messages
    foreach ($posts as $key => $value) {
      // Format time
      $postDate = new DateTime($posts[$key]["post_create_datetime"]);
      $nowDate = new DateTime("now");
      $time = format_interval_dates_short($nowDate, $postDate);
      //-------------
      // Format edit time
      if ($posts[$key]["post_edit_datetime"] != null) {
        $postEditDate = new DateTime($posts[$key]["post_edit_datetime"]);
        $editTime = format_interval_dates_short($nowDate, $postEditDate);
      }
      //-------------
    
      // Show post
      echo "<article class='article-post'>
              <div class='user-post'>
                <div>
                  <a href='" . URL_PATH . "/user/watch?" . $posts[$key]["id_user"] . "' class='a-username'><span class='user-name'>" . $posts[$key]["user_name"] . "</span></a>
                  <span class='post-date'> · " . $time . "</span>";
      if ($posts[$key]["post_edit_datetime"] != null) {
        echo "<span class='post-date'> · edited " . $editTime . "</span>";
      }
      echo "  </div>";
      // Show options button only on user posts
      if (isset($_SESSION["user_name"]) && $_SESSION["user_name"] == $posts[$key]["user_name"]) {
        echo "    <div class='optPosts'>
                        <a href='" . URL_PATH . "/home/editpost?" . $posts[$key]["id_post"] . "' class='optPost'> <i class='fa-solid fa-pen-to-square'></i></a>
                        <a href='" . URL_PATH . "/home/deletepost?" . $posts[$key]["id_post"] . "' class='optPost'> <i class='fa-sharp fa-solid fa-trash-can'></i></a>
                  </div>";
      }
      echo "</div>
      <a href='" . URL_PATH . "/home/viewpost?" . $posts[$key]["id_post"] . "' class='post-content'><p class='post-text'>" . $posts[$key]["post"] . "</p></a>";
      $db = new Database;
      $post = new Post($db->getConnection());
      // Get number of comments for each post and show
      $comments = $post->getPosts(0, $posts[$key]["id_post"]);
      echo "<p class='post-comments'>" . count($comments) . "<i class='fa-regular fa-comment img-comment'></i></p>
            </article>";
    }
    ?>

    <!-- New post button -->
    <?php
    if (isset($_SESSION["user_name"])) {
      echo "<div class='fab-container'>
            <div class='button iconbutton'>
              <a href='" . URL_PATH . "/home/newpost'><i class='fa-solid fa-plus'></i></a>
            </div>
          </div";
    }
    ?>
  </section>
</section>
<!-- /.content -->