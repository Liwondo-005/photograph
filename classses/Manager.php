<?php
require_once __DIR__ . '/User.php';

class Manager extends User
{
    public function listManagers(): array
    {
        $result = $this->conn->query('SELECT m.*, u.full_name, u.email, u.status FROM managers m JOIN users u ON u.user_id = m.user_id ORDER BY m.manager_id DESC');
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function createManager(int $userId, array $data): bool
    {
        $stmt = $this->conn->prepare('INSERT INTO managers (user_id, department, office_phone, hire_date, status) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('issss', $userId, $data['department'], $data['office_phone'], $data['hire_date'], $data['status']);
        return $stmt->execute();
    }

    public function updateManager(int $managerId, array $data): bool
    {
        $stmt = $this->conn->prepare('UPDATE managers SET department = ?, office_phone = ?, hire_date = ?, status = ? WHERE manager_id = ?');
        $stmt->bind_param('ssssi', $data['department'], $data['office_phone'], $data['hire_date'], $data['status'], $managerId);
        return $stmt->execute();
    }

    public function deleteManager(int $managerId): bool
    {
        $stmt = $this->conn->prepare('DELETE FROM managers WHERE manager_id = ?');
        $stmt->bind_param('i', $managerId);
        return $stmt->execute();
    }
}
