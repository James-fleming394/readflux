<?php
class StoryController extends \App\Core\Controller
{
    public function index()
    {
        require_once '../app/models/Story.php';
        $storyModel = new Story();
        $stories = $storyModel->getAll();

        $this->view('story/index', ['stories' => $stories]);
    }

        public function create()
    {
        $this->view('story/create');
    }

    public function store()
    {
        require_once '../app/models/Story.php';
        $storyModel = new Story();

        // Fake user ID for now
        $userId = 1;

        $title = $_POST['title'] ?? '';
        $body = $_POST['body'] ?? '';

        if (!empty($title) && !empty($body)) {
            $storyModel->create($title, $body, $userId);
            header("Location: " . BASE_URL . "/story");
            exit;
        } else {
            echo "<p>Please fill in all fields.</p>";
        }
    }

}
