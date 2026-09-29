<?php
require_once __DIR__ . '/User.php';

class Photographer extends User
{
    public function listPhotographers(): array
    {
        $result = $this->conn->query('SELECT p.*, u.full_name, u.email, u.status FROM photographers p JOIN users u ON u.user_id = p.user_id ORDER BY p.photographer_id DESC');
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function createPhotographer(int $userId, array $data): bool
    {
        $stmt = $this->conn->prepare('INSERT INTO photographers (user_id, specialization, experience_years, biography, availability_status, rating, status) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('isissds', $userId, $data['specialization'], $data['experience_years'], $data['biography'], $data['availability_status'], $data['rating'], $data['status']);
        return $stmt->execute();
    }

    public function updatePhotographer(int $photographerId, array $data): bool
    {
        $stmt = $this->conn->prepare('UPDATE photographers SET specialization = ?, experience_years = ?, biography = ?, availability_status = ?, rating = ?, status = ? WHERE photographer_id = ?');
        $stmt->bind_param('sissdsi', $data['specialization'], $data['experience_years'], $data['biography'], $data['availability_status'], $data['rating'], $data['status'], $photographerId);
        return $stmt->execute();
    }

    public function deletePhotographer(int $photographerId): bool
    {
        $stmt = $this->conn->prepare('DELETE FROM photographers WHERE photographer_id = ?');
        $stmt->bind_param('i', $photographerId);
        return $stmt->execute();
    }

    public function uploadPhoto(int $photographerId, int $categoryId, string $title, string $image, string $description): bool
    {
        $stmt = $this->conn->prepare('INSERT INTO gallery (photographer_id, category_id, image_title, image_file, description, status) VALUES (?, ?, ?, ?, ?, ?)');
        $status = 'active';
        $stmt->bind_param('iissss', $photographerId, $categoryId, $title, $image, $description, $status);
        return $stmt->execute();
    }
}

?>