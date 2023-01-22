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
    
      echo "<article>
              <div class='user-post'>
              <div>
                <span class='user-name'>" . $posts[$key]["user_name"] . "</span>
                <span class='post-date'> · " . $time . "</span>
              </div>";

      // Show options button only on user posts
      if (isset($_SESSION["user_name"]) && $_SESSION["user_name"] == $posts[$key]["user_name"]) {
        echo "<a href=''><i class='fa-solid fa-ellipsis-vertical dots'></i></a>";
      } else {
        echo "<span></span>";
      }
      echo "  </div>
                <p class='post-text'>" . $posts[$key]["post"] . "</p>";
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
              <i class='fa-solid fa-plus'></i>
            </div>
          </div";
    }
    ?>
  </section>
</section>
<!-- /.content -->