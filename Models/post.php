<?php

class Post extends Orm
{
    // Constructor
    public function __construct($conn)
    {
        parent::__construct("id_post", "posts", $conn);
    }

    // Get posts with specified conditions in params
    public function getPosts($id_user = 0, $id_parent_post = 0, $post_datetimeFROM = 0, $post_datetimeTO = 0)
    {
        // Prepare
        $sql = "SELECT P.id_post, U.user_name, P.post, P.post_create_datetime, P.id_parent_post
        FROM posts as P INNER JOIN users as U ON
        P.id_user=U.id_user WHERE 1=1 ";

        $param = array();

        if ($id_user != 0) {
            $sql .= " AND P.id_user=:id_user";
            $param[] = $id_user;
        }

        if ($id_parent_post != 0) {
            $sql .= " AND P.id_parent_post=:id_parent_post";
            $param[] = $id_parent_post;
        }

        if ($post_datetimeFROM != 0) {
            $sql .= " AND P.post_create_datetime>=:post_create_datetimeFrom";
            $param[] = $post_datetimeFROM;
        }

        if ($post_datetimeTO != 0) {
            $sql .= " AND P.post_create_datetime<=:post_create_datetimeTo";
            $param[] = $post_datetimeFROM;
        }

        $sql .= " ORDER BY P.post_create_datetime DESC";

        $stm = $this->dbconn->prepare($sql);

        if ($id_user != 0) {
            $stm->bindValue(":id_user", $id_user);
        }
        if ($id_parent_post != 0) {
            $stm->bindValue(":id_parent_post", $id_parent_post);
        }
        if ($post_datetimeFROM != 0) {
            $stm->bindValue(":post_create_datetimeFrom", $post_datetimeFROM);
        }
        if ($post_datetimeTO) {
            $stm->bindValue(":post_create_datetimeTo", $post_datetimeTO);
        }

        // Execute
        $stm->execute();

        // True if found, else False
        return $stm->fetchAll();
    }

}
?>