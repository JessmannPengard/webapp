<?php

class UserController extends Controller
{

    public function index()
    {
        if (isset($_POST["email"]) || isset($_POST["password"])) {
            $db = new Database;
            $user = new User($db->getConnection());
            $id_user = $_SESSION["id_user"];
            $data = array();
            $data["user_email"] = $_POST["email"];
            if (isset($_POST["password"]) && $_POST["password"] != "") {
                $data["user_password"] = md5($_POST["password"]);
            }
            $user->updateById($id_user, $data);
            header("Location: " . URL_PATH . "/home");
        } else {
            $db = new Database;
            $user = new User($db->getConnection());

            $id_user = $_SESSION["id_user"];
            $data = $user->getById($id_user);
            $this->render("user/user", $data, "user/layout/user");
        }
    }

    public function watch()
    {
        $data = array();

        // Get id_user
        $req_url = explode("?", $_SERVER['REQUEST_URI']);
        $id_user = $req_url[1];

        // Get username and user create dateTime
        $db = new Database;
        $user = new User($db->getConnection());
        $u = $user->getById($id_user);
        $data["username"] = $u["user_name"];
        $data["user_create_datetime"] = $u["user_create_datetime"];

        // Get number of posts
        $posts = new Post($db->getConnection());
        $p = $posts->getPosts($id_user);
        $data["numPosts"] = count($p);

        // Get number of comments
        $comm = new Post($db->getConnection());
        $c = $comm->getCommentsByIdUser($id_user);
        $data["numComments"] = count($c);

        $this->render("user/watch", $data, "user/layout/user");
    }
}
