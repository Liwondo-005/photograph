<?php
$role = $_SESSION['role'] ?? 'guest';
$base = BASE_URL;
$links = [
    'admin' => [
        ['Dashboard', $base . '/dashboard/admin.php', 'fa-gauge-high'],
        ['Managers', $base . '/admin/managers.php', 'fa-users-gear'],
        ['Photographers', $base . '/admin/photographers.php', 'fa-camera'],
        ['Customers', $base . '/admin/customers.php', 'fa-user-group'],
        ['Bookings', $base . '/admin/bookings.php', 'fa-calendar-check'],
        ['Payments', $base . '/admin/payments.php', 'fa-credit-card'],
        ['Gallery', $base . '/admin/gallery.php', 'fa-images'],
        ['Reports', $base . '/admin/reports.php', 'fa-chart-line'],
    ],
    'manager' => [
        ['Dashboard', $base . '/dashboard/manager.php', 'fa-gauge-high'],
        ['Photographers', $base . '/manager/photographers.php', 'fa-camera'],
        ['Customers', $base . '/manager/customers.php', 'fa-user-group'],
        ['Bookings', $base . '/manager/bookings.php', 'fa-calendar-check'],
        ['Gallery', $base . '/manager/gallery.php', 'fa-images'],
        ['Payments', $base . '/manager/payments.php', 'fa-credit-card'],
        ['Reports', $base . '/manager/reports.php', 'fa-chart-line'],
    ],
    'photographer' => [
        ['Dashboard', $base . '/dashboard/photographer.php', 'fa-gauge-high'],
        ['My Gallery', $base . '/photographer/gallery.php', 'fa-images'],
        ['Upload', $base . '/photographer/upload.php', 'fa-upload'],
        ['Bookings', $base . '/photographer/bookings.php', 'fa-calendar-check'],
        ['Payments', $base . '/photographer/payments.php', 'fa-credit-card'],
        ['Profile', $base . '/photographer/profile.php', 'fa-user'],
    ],
    'customer' => [
        ['Dashboard', $base . '/dashboard/customer.php', 'fa-gauge-high'],
        ['Book Session', $base . '/customer/booking.php', 'fa-calendar-plus'],
        ['My Bookings', $base . '/customer/dashboard.php', 'fa-calendar-check'],
        ['Payments', $base . '/customer/payments.php', 'fa-credit-card'],
        ['Downloads', $base . '/customer/downloads.php', 'fa-download'],
        ['Profile', $base . '/customer/profile.php', 'fa-user'],
    ],
];
$linksToUse = $links[$role] ?? $links['customer'];
?>
<div class="sidebar d-flex flex-column p-3">
    <a class="navbar-brand text-white fs-4 fw-bold mb-4" href="<?php echo $base; ?>/index.php"><i class="fa-solid fa-camera me-2"></i>Lens Studio</a>
    <div class="text-muted small text-uppercase mb-3">Main Menu</div>
    <nav class="nav nav-pills flex-column">
        <?php foreach ($linksToUse as $link): ?>
            <a class="nav-link text-white mb-1" href="<?php echo $link[1]; ?>"><i class="fa-solid <?php echo $link[2]; ?> me-2"></i><?php echo $link[0]; ?></a>
        <?php endforeach; ?>
    </nav>
    <div class="mt-auto pt-3 border-top border-secondary">
        <a class="nav-link text-white" href="<?php echo $base; ?>/logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
    </div>
</div>
