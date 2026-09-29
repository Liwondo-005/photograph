<?php
$pageTitle = 'Customer Dashboard';
$bodyClass = 'dashboard-body';
require_once '../includes/auth.php';
if ($_SESSION['role'] != 'customer') { header('Location: ../login.php'); exit(); }
require_once '../includes/header.php';
?>
<div class="d-flex">
    <?php require_once '../includes/sidebar.php'; ?>
    <main class="main-content flex-grow-1">
        <?php require_once '../includes/navbar.php'; ?>
        <div class="row g-4">
            <?php $stats = [['My Bookings','fa-calendar-check',4,'75','primary'],['Upcoming Sessions','fa-clock',2,'60','success'],['Pending Payments','fa-credit-card',1,'30','warning'],['Downloads','fa-download',6,'85','info']]; foreach ($stats as $stat): ?>
            <div class="col-sm-6 col-xl-3"><div class="stat-card p-4"><div class="d-flex justify-content-between align-items-start"><div><p class="text-muted mb-1"><?php echo $stat[0]; ?></p><h3 class="fw-bold mb-3"><?php echo $stat[2]; ?></h3><div class="progress"><div class="progress-bar bg-<?php echo $stat[4]; ?>" style="width: <?php echo $stat[3]; ?>%"></div></div></div><div class="icon-box bg-<?php echo $stat[4]; ?> bg-opacity-10 text-<?php echo $stat[4]; ?>"><i class="fa-solid <?php echo $stat[1]; ?>"></i></div></div><p class="small text-muted mt-3 mb-0"><span class="text-<?php echo $stat[4]; ?> fw-semibold">+<?php echo $stat[3]; ?>%</span> this month</p></div></div>
            <?php endforeach; ?>
        </div>
        <div class="row g-4 mt-1">
            <div class="col-lg-8"><div class="card table-card p-4"><h5 class="fw-bold mb-3">Booking Timeline</h5><ul class="list-group list-group-flush"><li class="list-group-item d-flex justify-content-between"><span>Session confirmed</span><span class="text-muted">Today</span></li><li class="list-group-item d-flex justify-content-between"><span>Photographer assigned</span><span class="text-muted">Tomorrow</span></li></ul></div></div>
            <div class="col-lg-4"><div class="card table-card p-4"><h5 class="fw-bold mb-3">Quick Book</h5><a class="btn btn-primary w-100" href="../customer/booking.php">Book a Session</a></div></div>
        </div>
    </main>
</div>
<?php require_once '../includes/footer.php'; ?>