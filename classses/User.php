<?php
require_once __DIR__ . '/Database.php';

class User extends Database
{
    protected $table = 'users';

    public function register(array $data): bool
    {
        $stmt = $this->conn->prepare('INSERT INTO users (full_name, email, phone, password, role, status) VALUES (?, ?, ?, ?, ?, ?)');
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $role = $data['role'] ?? 'customer';
        $status = 'active';
        $stmt->bind_param('ssssss', $data['full_name'], $data['email'], $data['phone'], $password, $role, $status);
        return $stmt->execute();
    }

    public function login(string $email, string $password)
    {
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function findByEmail(string $email)
    {
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getAllUsers(): array
    {
        $result = $this->conn->query('SELECT * FROM users ORDER BY created_at DESC');
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function getUser(int $id)
    {
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE user_id = ? LIMIT 1');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function deleteUser(int $id): bool
    {
        $stmt = $this->conn->prepare('DELETE FROM users WHERE user_id = ?');
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public function updatePassword(int $userId, string $password): bool
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare('UPDATE users SET password = ? WHERE user_id = ?');
        $stmt->bind_param('si', $hash, $userId);
        return $stmt->execute();
    }

    public function setResetToken(string $email, string $token, string $expires): bool
    {
        $stmt = $this->conn->prepare('UPDATE users SET reset_token = ?, reset_expires = ? WHERE email = ?');
        $stmt->bind_param('sss', $token, $expires, $email);
        return $stmt->execute();
    }

    public function findByResetToken(string $token)
    {
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE reset_token = ? LIMIT 1');
        $stmt->bind_param('s', $token);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function clearResetToken(int $userId): bool
    {
        $stmt = $this->conn->prepare('UPDATE users SET reset_token = NULL, reset_expires = NULL WHERE user_id = ?');
        $stmt->bind_param('i', $userId);
        return $stmt->execute();
    }
}
