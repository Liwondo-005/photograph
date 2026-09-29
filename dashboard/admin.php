<?php
$pageTitle = 'Admin Dashboard';
$bodyClass = 'dashboard-body';
require_once '../includes/auth.php';
if ($_SESSION['role'] != 'admin') { header('Location: ../login.php'); exit(); }
require_once '../includes/header.php';
?>
<div class="d-flex">
    <?php require_once '../includes/sidebar.php'; ?>
    <main class="main-content flex-grow-1">
        <?php require_once '../includes/navbar.php'; ?>
        <div class="row g-4">
            <?php $stats = [['Total Users','fa-users',124,'85','success'],['Total Bookings','fa-calendar-check',86,'72','primary'],['Pending','fa-hourglass-half',18,'25','warning'],['Revenue','fa-dollar-sign',15420,'92','success']]; foreach ($stats as $stat): ?>
            <div class="col-sm-6 col-xl-3">
                <div class="stat-card p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1"><?php echo $stat[0]; ?></p>
                            <h3 class="fw-bold mb-3"><?php echo $stat[1] === 'fa-dollar-sign' ? '$'.number_format($stat[2],0) : $stat[2]; ?></h3>
                            <div class="progress" style="height: 8px;"><div class="progress-bar bg-<?php echo $stat[4]; ?>" style="width: <?php echo $stat[3]; ?>%"></div></div>
                        </div>
                        <div class="icon-box bg-<?php echo $stat[4]; ?> bg-opacity-10 text-<?php echo $stat[4]; ?>"><i class="fa-solid <?php echo $stat[1]; ?>"></i></div>
                    </div>
                    <p class="small text-muted mt-3 mb-0"><span class="text-<?php echo $stat[4]; ?> fw-semibold">+<?php echo $stat[3]; ?>%</span> vs last month</p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="row g-4 mt-1">
            <div class="col-lg-8">
                <div class="card table-card p-4">
                    <h5 class="fw-bold mb-3">Monthly Revenue</h5>
                    <canvas id="revenueChart" height="180"></canvas>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card table-card p-4">
                    <h5 class="fw-bold mb-3">Bookings Status</h5>
                    <canvas id="bookingChart" height="180"></canvas>
                </div>
            </div>
        </div>
        <div class="row g-4 mt-1">
            <div class="col-xl-7">
                <div class="card table-card p-4">
                    <h5 class="fw-bold mb-3">Recent Bookings</h5>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead><tr><th>Customer</th><th>Service</th><th>Status</th><th>Date</th></tr></thead>
                            <tbody><tr><td>Sarah</td><td>Wedding</td><td><span class="badge bg-success">Approved</span></td><td>2026-07-26</td></tr><tr><td>Daniel</td><td>Family</td><td><span class="badge bg-warning">Pending</span></td><td>2026-07-27</td></tr></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="card table-card p-4">
                    <h5 class="fw-bold mb-3">Quick Actions</h5>
                    <div class="d-grid gap-2">
                        <a class="btn btn-primary" href="../admin/photographers.php"><i class="fa-solid fa-camera me-2"></i>Add Photographer</a>
                        <a class="btn btn-outline-primary" href="../admin/customers.php"><i class="fa-solid fa-user me-2"></i>Add Customer</a>
                        <a class="btn btn-outline-success" href="../admin/bookings.php"><i class="fa-solid fa-calendar-plus me-2"></i>Add Booking</a>
                        <a class="btn btn-outline-secondary" href="../admin/gallery.php"><i class="fa-solid fa-images me-2"></i>Upload Gallery</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const revenueChart = new Chart(document.getElementById('revenueChart'), {type:'line', data:{labels:['Jan','Feb','Mar','Apr','May','Jun'],datasets:[{label:'Revenue',data:[1200,1800,2100,2500,3100,3600],borderColor:'#0d6efd',backgroundColor:'rgba(13,110,253,0.1)',fill:true,tension:0.4}]}});
const bookingChart = new Chart(document.getElementById('bookingChart'), {type:'doughnut', data:{labels:['Approved','Pending','Cancelled'],datasets:[{data:[60,25,15],backgroundColor:['#198754','#ffc107','#dc3545']}]}});
</script>
<?php require_once '../includes/footer.php'; ?>