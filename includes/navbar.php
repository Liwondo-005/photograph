<?php $currentRole = $_SESSION['role'] ?? 'guest'; ?>
<nav class="topbar px-3 py-3 d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-outline-secondary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div>
            <h5 class="mb-0">Welcome back, <?php echo htmlspecialchars($_SESSION['name'] ?? 'User'); ?></h5>
            <small class="text-muted text-capitalize"><?php echo htmlspecialchars($currentRole); ?> workspace</small>
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <div class="input-group" style="max-width: 260px;">
            <span class="input-group-text bg-white border-0"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" class="form-control border-0 bg-white" placeholder="Search">
        </div>
        <button class="btn btn-light position-relative"><i class="fa-solid fa-bell"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span></button>
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"><i class="fa-solid fa-user-circle me-2"></i>Profile</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/profile.php"><i class="fa-solid fa-user me-2"></i>Profile</a></li>
                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
