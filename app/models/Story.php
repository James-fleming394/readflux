<?php
use App\Core\Database;

class Story
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM stories ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title, $body, $userId)
    {
        $stmt = $this->db->prepare("INSERT INTO stories (title, body, user_id) VALUES (:title, :body, :user_id)");
        $stmt->execute([
            ':title' => $title,
            ':body' => $body,
            ':user_id' => $userId
    ]);
    }

}
