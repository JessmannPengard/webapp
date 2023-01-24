<?php

class LoginController extends Controller
{
    public function index()
    {
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
        $this->render("login/login", isset($params) ? $params : [null], "login/layout/login");

    }

    public function register()
    {
        if (isset($_POST["user"])) {
            $db = new Database;
            $user = new User($db->getConnection());
            $user->register($_POST["user"], $_POST["password"], $_POST["email"]);
            header("Location: " . URL_PATH . "/login");
            exit;
        }
        $this->render("login/register", [null], "login/layout/login");
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: " . URL_PATH . "/login");
    }
}