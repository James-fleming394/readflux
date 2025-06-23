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
}
