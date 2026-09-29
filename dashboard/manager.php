<?php
$pageTitle = 'Manager Dashboard';
$bodyClass = 'dashboard-body';
require_once '../includes/auth.php';
if ($_SESSION['role'] != 'manager') { header('Location: ../login.php'); exit(); }
require_once '../includes/header.php';
?>
<div class="d-flex">
    <?php require_once '../includes/sidebar.php'; ?>
    <main class="main-content flex-grow-1">
        <?php require_once '../includes/navbar.php'; ?>
        <div class="row g-4">
            <?php $stats = [['Bookings','fa-calendar-check',24,'78','primary'],['Photographers','fa-camera',9,'64','success'],['Payments','fa-credit-card',15,'50','warning'],['Reports','fa-chart-line',6,'90','info']]; foreach ($stats as $stat): ?>
            <div class="col-sm-6 col-xl-3"><div class="stat-card p-4"><div class="d-flex justify-content-between align-items-start"><div><p class="text-muted mb-1"><?php echo $stat[0]; ?></p><h3 class="fw-bold mb-3"><?php echo $stat[1]; ?></h3><div class="progress"><div class="progress-bar bg-<?php echo $stat[4]; ?>" style="width: <?php echo $stat[3]; ?>%"></div></div></div><div class="icon-box bg-<?php echo $stat[4]; ?> bg-opacity-10 text-<?php echo $stat[4]; ?>"><i class="fa-solid <?php echo $stat[1]; ?>"></i></div></div><p class="small text-muted mt-3 mb-0"><span class="text-<?php echo $stat[4]; ?> fw-semibold">+<?php echo $stat[3]; ?>%</span> this month</p></div></div>
            <?php endforeach; ?>
        </div>
        <div class="row g-4 mt-1">
            <div class="col-lg-8"><div class="card table-card p-4"><h5 class="fw-bold mb-3">Recent Bookings</h5><div class="table-responsive"><table class="table mb-0"><thead><tr><th>Client</th><th>Photographer</th><th>Status</th></tr></thead><tbody><tr><td>Emma</td><td>Riley</td><td><span class="badge bg-success">Approved</span></td></tr><tr><td>Brandon</td><td>Chris</td><td><span class="badge bg-warning">Pending</span></td></tr></tbody></table></div></div></div>
            <div class="col-lg-4"><div class="card table-card p-4"><h5 class="fw-bold mb-3">Quick Actions</h5><div class="d-grid gap-2"><a class="btn btn-primary" href="../manager/photographers.php">Manage Photographers</a><a class="btn btn-outline-primary" href="../manager/bookings.php">Review Bookings</a><a class="btn btn-outline-secondary" href="../manager/reports.php">Generate Reports</a></div></div></div>
        </div>
    </main>
</div>
<?php require_once '../includes/footer.php'; ?>