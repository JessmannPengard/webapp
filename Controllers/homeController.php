<?php
class HomeController extends Controller
{
    private $posts;

    public function __construct()
    {
        $db = new Database;
        $post = new Post($db->getConnection());
        $this->posts = $post->getAll();
        $this->posts = $post->getPosts();
    }

    public function index()
    {
        $params = array();
        $params["posts"] = $this->posts;

        $this->render("home/home", $params, "home/layout/home");
    }

    public function newmessage()
    {
        if (isset($_POST["destiny_user"])) {
            $db = new Database;
            $post = new Post($db->getConnection());
            $data = array();
            $data["id_user_origin"] = $_SESSION["id_user"];
            $data["id_user_destiny"] = $_POST["destiny_user"];
            $data["message"] = $_POST["message"];
            $post->insert($data);
            header("Location: " . URL_PATH . "/admin");
        } else {
            $db = new Database();
            $user = new User($db->getConnection());
            $users = $user->getAllButId($_SESSION["id_user"]);
            $options = "";
            foreach ($users as $key => $value) {
                $options .= "<option value=" . $value['id'] . ">" . $value['username'] . "</option>";
            }
            $params = array();
            $params["messages"] = $this->posts;
            $params["options"] = $options;
            $params["users"] = $users;

            $this->render("home/newPost", $params, "home/layout/home");
        }


    }
}