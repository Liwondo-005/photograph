<?php
$pageTitle = 'Photographer Dashboard';
$bodyClass = 'dashboard-body';
require_once '../includes/auth.php';
if ($_SESSION['role'] != 'photographer') { header('Location: ../login.php'); exit(); }
require_once '../includes/header.php';
?>
<div class="d-flex">
    <?php require_once '../includes/sidebar.php'; ?>
    <main class="main-content flex-grow-1">
        <?php require_once '../includes/navbar.php'; ?>
        <div class="row g-4">
            <?php $stats = [['My Photos','fa-images',18,'82','primary'],['Bookings','fa-calendar-check',7,'65','success'],['Pending Jobs','fa-hourglass-half',3,'40','warning'],['Revenue','fa-dollar-sign',2800,'74','info']]; foreach ($stats as $stat): ?>
            <div class="col-sm-6 col-xl-3"><div class="stat-card p-4"><div class="d-flex justify-content-between align-items-start"><div><p class="text-muted mb-1"><?php echo $stat[0]; ?></p><h3 class="fw-bold mb-3"><?php echo $stat[1] === 'fa-dollar-sign' ? '$'.number_format($stat[2],0) : $stat[2]; ?></h3><div class="progress"><div class="progress-bar bg-<?php echo $stat[4]; ?>" style="width: <?php echo $stat[3]; ?>%"></div></div></div><div class="icon-box bg-<?php echo $stat[4]; ?> bg-opacity-10 text-<?php echo $stat[4]; ?>"><i class="fa-solid <?php echo $stat[1]; ?>"></i></div></div><p class="small text-muted mt-3 mb-0"><span class="text-<?php echo $stat[4]; ?> fw-semibold">+<?php echo $stat[3]; ?>%</span> this month</p></div></div>
            <?php endforeach; ?>
        </div>
        <div class="row g-4 mt-1">
            <div class="col-lg-8"><div class="card table-card p-4"><h5 class="fw-bold mb-3">Recent Photos</h5><div class="row g-3"><?php for ($i=0; $i<3; $i++): ?><div class="col-md-4"><img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=400&q=80" class="img-fluid rounded" alt="photo"></div><?php endfor; ?></div></div></div>
            <div class="col-lg-4"><div class="card table-card p-4"><h5 class="fw-bold mb-3">Quick Actions</h5><div class="d-grid gap-2"><a class="btn btn-primary" href="../photographer/upload.php">Upload Photos</a><a class="btn btn-outline-primary" href="../photographer/bookings.php">View Bookings</a><a class="btn btn-outline-secondary" href="../photographer/profile.php">Edit Profile</a></div></div></div>
        </div>
    </main>
</div>
<?php require_once '../includes/footer.php'; ?>