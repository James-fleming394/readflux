<?php
class HomeController extends \App\Core\Controller
{
    public function index()
    {
        $this->view('home/index', ['title' => 'Welcome to ReadFlux']);
    }
}
