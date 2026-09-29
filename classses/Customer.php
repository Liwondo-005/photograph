<?php
require_once __DIR__ . '/User.php';

class Customer extends User
{
    public function listCustomers(): array
    {
        $result = $this->conn->query('SELECT c.*, u.full_name, u.email, u.status FROM customers c JOIN users u ON u.user_id = c.user_id ORDER BY c.customer_id DESC');
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function createCustomer(int $userId, array $data): bool
    {
        $stmt = $this->conn->prepare('INSERT INTO customers (user_id, gender, date_of_birth, address, phone, status) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('isssss', $userId, $data['gender'], $data['date_of_birth'], $data['address'], $data['phone'], $data['status']);
        return $stmt->execute();
    }

    public function updateCustomer(int $customerId, array $data): bool
    {
        $stmt = $this->conn->prepare('UPDATE customers SET gender = ?, date_of_birth = ?, address = ?, phone = ?, status = ? WHERE customer_id = ?');
        $stmt->bind_param('sssssi', $data['gender'], $data['date_of_birth'], $data['address'], $data['phone'], $data['status'], $customerId);
        return $stmt->execute();
    }

    public function deleteCustomer(int $customerId): bool
    {
        $stmt = $this->conn->prepare('DELETE FROM customers WHERE customer_id = ?');
        $stmt->bind_param('i', $customerId);
        return $stmt->execute();
    }

    public function bookSession(int $customerId, int $photographerId, int $serviceId, string $bookingDate, string $eventDate, string $location, string $message): bool
    {
        $stmt = $this->conn->prepare('INSERT INTO bookings (customer_id, photographer_id, service_id, booking_date, event_date, location, message, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $status = 'pending';
        $stmt->bind_param('iiisssss', $customerId, $photographerId, $serviceId, $bookingDate, $eventDate, $location, $message, $status);
        return $stmt->execute();
    }
}

?>