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
            if (isset($_POST["password"])) {
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
        $this->render("user/watch", isset($params) ? $params : [null], "user/layout/user");
    }
}
