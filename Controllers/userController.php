<?php

class UserController extends Controller{

    public function index(){
        if (isset($_POST["user"])) {
            $db = new Database;
            $user = new User($db->getConnection());

            $username = $_POST["user"];
            $password = $_POST["password"];
            $data = $user->login($username, $password);
            if ($data) {
                session_start();
                $_SESSION["id_user"] = $data["id_user"];
                $_SESSION["user_name"] = $data["user_name"];
                header("Location: " . URL_PATH . "/home");
                exit;
            } else {
                $params["error"] = "Wrong user/password combination";
            }
        }
        $this->render("user/user", isset($params) ? $params : [null], "user/layout/user");
    }

    public function watch(){
        $this->render("user/watch", isset($params) ? $params : [null], "user/layout/user");
    }
}