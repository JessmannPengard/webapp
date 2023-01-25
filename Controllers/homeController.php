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

    public function newpost()
    {
        if (isset($_POST['post-text'])) {
            $user_id = $_SESSION['id_user'];
            $post = $_POST['post-text'];
            // Publish post
            $db = new Database;
            $post = new Post($db->getConnection());
            $data = array();
            $data["id_user"] = $_SESSION["id_user"];
            $data["post"] = $_POST["post-text"];
            $data["post_create_datetime"] = date('Y-m-d H:i:s');
            $post->insert($data);
            header("Location: " . URL_PATH . "/home");
            exit();
        } else {
            // Check for session to alow publish
            include(__DIR__ . "/../auth_session.php");

            $this->render("home/newPost", [], "home/layout/home");
        }
    }

}