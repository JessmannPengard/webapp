<?php
class HomeController extends Controller
{
    private $posts;

    public function __construct()
    {
        $db = new Database;
        $post = new Post($db->getConnection());
        $this->posts = $post->getPosts();
    }

    public function index()
    {
        $params = array();
        $params["posts"] = $this->posts;

        $this->render("home/home", $params, "home/layout/home");
    }

    public function viewpost()
    {
        $req_url = explode("?", $_SERVER['REQUEST_URI']);
        $id_post = $req_url[1];

        if (isset($_POST['post-text'])) {
            /* Comment logic
            
            ** TODO **
            
            */
        } else {
            // Get post
            $db = new Database;
            $post = new Post($db->getConnection());
            $result = array();
            $result['id_post'] = $post->getById($id_post);
            if ($result['id_post']) {
                $this->render("home/viewPost", $result, "home/layout/home");
            } else {
                $params = array();
                $params["posts"] = $this->posts;
                header("Location: " . URL_PATH . "/home");
            }
        }
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

    public function editpost()
    {
        $req_url = explode("?", $_SERVER['REQUEST_URI']);
        $id_post = $req_url[1];

        if (isset($_POST['post-text'])) {
            $post = $_POST['post-text'];
            // Edit post
            $db = new Database;
            $post = new Post($db->getConnection());
            $data = array();
            $data["post"] = $_POST["post-text"];
            $data["post_edit_datetime"] = date('Y-m-d H:i:s');
            $post->updateById($id_post, $data);
            header("Location: " . URL_PATH . "/home");
            exit();
        } else {
            // Check for session to alow edit
            include(__DIR__ . "/../auth_session.php");
            // Check for post owner
            $db = new Database;
            $post = new Post($db->getConnection());
            $data = array();
            $result = $post->getById($id_post);
            if ($result && $result["id_user"] == $_SESSION['id_user']) {
                $this->render("home/editPost", $result, "home/layout/home");
            } else {
                header("Location: " . URL_PATH . "/home");
            }
        }
    }

    public function deletepost()
    {
        $req_url = explode("?", $_SERVER['REQUEST_URI']);
        $id_post = $req_url[1];

        if (isset($_POST['post-text'])) {
            // Delete post
            $db = new Database;
            $post = new Post($db->getConnection());
            $data = array();
            $data["post_edit_datetime"] = date('Y-m-d H:i:s');
            $data["deleted"] = true;
            $post->deletePost($id_post, $data);
            header("Location: " . URL_PATH . "/home");
            exit();
        } else {
            // Check for session to alow edit
            include(__DIR__ . "/../auth_session.php");
            // Check for post owner
            $db = new Database;
            $post = new Post($db->getConnection());
            $data = array();
            $result = $post->getById($id_post);
            if ($result && $result["id_user"] == $_SESSION['id_user']) {
                $this->render("home/deletePost", $result, "home/layout/home");
            } else {
                header("Location: " . URL_PATH . "/home");
            }
        }
    }
}
