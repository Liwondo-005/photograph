<?php
$pageTitle = 'Lens Studio | Premium Photography Services';
$bodyClass = '';
require_once 'includes/header.php';
?>
<nav class="navbar navbar-expand-lg navbar-transparent fixed-top px-3 py-3">
  <div class="container">
    <a class="navbar-brand fw-bold fs-3" href="#"><i class="fa-solid fa-camera me-2"></i>Lens Studio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="#photographers">Photographers</a></li>
        <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>
        <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonials</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
      </ul>
      <div class="ms-3 d-flex gap-2">
        <?php if (isset($_SESSION['user_id'])): ?>
          <a class="btn btn-outline-light" href="logout.php">Logout</a>
        <?php else: ?>
          <a class="btn btn-outline-light" href="login.php">Login</a>
          <a class="btn btn-light" href="register.php">Register</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<section id="home" class="hero-section px-3">
  <div class="container py-5">
    <div class="row align-items-center">
      <div class="col-lg-7 reveal">
        <p class="text-uppercase fw-semibold mb-3 letter-spacing">Award-winning photography studio</p>
        <h1 class="display-4 fw-bold mb-4">Capture Your Beautiful Moments</h1>
        <p class="lead mb-4">Professional photography services for weddings, birthdays, graduations, corporate events, family sessions, and more.</p>
        <div class="d-flex gap-3 flex-wrap">
          <a class="btn btn-primary btn-lg px-4" href="register.php">Book Now</a>
          <a class="btn btn-outline-light btn-lg px-4" href="#gallery">View Gallery</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="about" class="py-5 bg-white">
  <div class="container">
    <div class="row g-4 align-items-center">
      <div class="col-lg-6 reveal">
        <h2 class="section-title mb-3">About <span>Lens Studio</span></h2>
        <p class="text-muted">We blend artistic storytelling with modern photojournalism to create timeless images that elevate brands and preserve cherished memories.</p>
        <div class="row g-3 mt-3">
          <div class="col-md-6"><div class="card card-hover p-3 h-100"><h5>Mission</h5><p class="text-muted mb-0">Deliver meaningful, polished imagery that inspires and connects.</p></div></div>
          <div class="col-md-6"><div class="card card-hover p-3 h-100"><h5>Vision</h5><p class="text-muted mb-0">Become the preferred creative partner for memorable occasions.</p></div></div>
        </div>
      </div>
      <div class="col-lg-6 reveal">
        <div class="row g-3">
          <div class="col-6"><div class="card card-hover p-4 text-center"><h3 data-count="1500">0</h3><p class="mb-0">Happy Clients</p></div></div>
          <div class="col-6"><div class="card card-hover p-4 text-center"><h3 data-count="98">0</h3><p class="mb-0">Positive Reviews</p></div></div>
          <div class="col-6"><div class="card card-hover p-4 text-center"><h3 data-count="24">0</h3><p class="mb-0">Expert Photographers</p></div></div>
          <div class="col-6"><div class="card card-hover p-4 text-center"><h3 data-count="12">0</h3><p class="mb-0">Years Experience</p></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="services" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-4 reveal">
      <h2 class="section-title">Our <span>Services</span></h2>
      <p class="text-muted">Tailored photography experiences for every important milestone.</p>
    </div>
    <div class="row g-4">
      <?php $services = [['Wedding Photography','Wedding stories captured with cinematic elegance','fa-ring'],['Birthday Photography','Vibrant celebrations and joyful timeless portraits','fa-cake-candles'],['Graduation Photography','Polished portraits and memorable milestone moments','fa-graduation-cap'],['Passport Photography','Professional passport and ID photo sessions','fa-id-card'],['Corporate Photography','Executive portraits and event coverage','fa-briefcase'],['Family Photography','Warm, heartfelt family portraits','fa-people-roof'],['Outdoor Photography','Scenic and adventure-focused editorial photography','fa-mountain-sun'],['Traditional Photography','Iconic cultural and traditional event coverage','fa-camera-retro']]; foreach ($services as $service): ?>
      <div class="col-md-6 col-lg-3 reveal">
        <div class="card card-hover h-100">
          <img src="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="service">
          <div class="card-body">
            <div class="icon-box mb-3"><i class="fa-solid <?php echo $service[2]; ?> fa-2x text-primary"></i></div>
            <h5 class="card-title"><?php echo $service[0]; ?></h5>
            <p class="card-text text-muted"><?php echo $service[1]; ?></p>
            <a href="register.php" class="btn btn-outline-primary">Book Now</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section id="gallery" class="py-5 bg-white">
  <div class="container">
    <div class="text-center mb-4 reveal">
      <h2 class="section-title">Latest <span>Gallery</span></h2>
      <p class="text-muted">A glimpse into our latest creative work.</p>
    </div>
    <div class="d-flex flex-wrap gap-2 justify-content-center mb-4 reveal">
      <?php $filters = ['All'=>'all','Wedding'=>'wedding','Birthday'=>'birthday','Graduation'=>'graduation','Passport'=>'passport','Corporate'=>'corporate','Family'=>'family','Outdoor'=>'outdoor','Traditional'=>'traditional']; foreach ($filters as $label => $value): ?>
        <button class="btn btn-outline-primary filter-btn <?php echo $value === 'all' ? 'active' : ''; ?>" data-filter="<?php echo $value; ?>"><?php echo $label; ?></button>
      <?php endforeach; ?>
    </div>
    <div class="row g-4">
      <?php $items = [['Wedding','wedding','Wedding Story','Alicia'],['Birthday','birthday','Birthday Party','Mina'],['Graduation','graduation','Graduation Portrait','Daniel'],['Passport','passport','Passport Session','Sophie'],['Corporate','corporate','Corporate Event','Nora'],['Family','family','Family Portrait','Owen'],['Outdoor','outdoor','Outdoor Adventure','Liam'],['Traditional','traditional','Traditional Ceremony','Grace']]; foreach ($items as $item): ?><div class="col-md-6 col-lg-3 gallery-item reveal" data-category="<?php echo $item[1]; ?>">
        <div class="card card-hover overflow-hidden position-relative gallery-card">
          <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=80" alt="gallery image">
          <span class="badge bg-primary"><?php echo $item[0]; ?></span>
          <button class="btn btn-light btn-sm zoom-btn"><i class="fa-solid fa-eye"></i></button>
          <div class="overlay">
            <div>
              <h6 class="mb-1"><?php echo $item[2]; ?></h6>
              <small class="text-white-50">by <?php echo $item[3]; ?></small>
            </div>
          </div>
        </div>
      </div><?php endforeach; ?>
    </div>
  </div>
</section>

<section id="photographers" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-4 reveal">
      <h2 class="section-title">Featured <span>Photographers</span></h2>
      <p class="text-muted">Meet professionals behind our premium visual storytelling.</p>
    </div>
    <div class="row g-4">
      <?php $photographers = [['Maya Chen','Wedding & Portrait','8 years','4.9'],['Noah Green','Corporate & Events','10 years','4.8'],['Ava Brooks','Family & Lifestyle','6 years','4.7']]; foreach ($photographers as $person): ?>
      <div class="col-md-6 col-lg-4 reveal">
        <div class="card card-hover photographer-card text-center p-4">
          <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=400&q=80" class="rounded-circle mx-auto mb-3" style="width:110px;height:110px;" alt="photographer">
          <h5><?php echo $person[0]; ?></h5>
          <p class="text-muted mb-2"><?php echo $person[1]; ?></p>
          <p class="small text-muted">Experience: <?php echo $person[2]; ?></p>
          <div class="text-warning mb-3"><i class="fa-solid fa-star"></i> <?php echo $person[3]; ?></div>
          <a href="register.php" class="btn btn-primary">Book</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section id="pricing" class="py-5 bg-white">
  <div class="container">
    <div class="text-center mb-4 reveal">
      <h2 class="section-title">Flexible <span>Pricing</span></h2>
      <p class="text-muted">Choose a package that fits your story.</p>
    </div>
    <div class="row g-4">
      <?php $packages = [['Basic','$199','2 hours','Online gallery'],['Standard','$399','4 hours','Edited highlights'],['Premium','$799','8 hours','Full event coverage']]; foreach ($packages as $index => $package): ?>
      <div class="col-md-6 col-lg-4 reveal">
        <div class="card card-hover p-4 h-100">
          <h5 class="fw-bold"><?php echo $index === 0 ? 'Basic' : ($index === 1 ? 'Standard' : 'Premium'); ?></h5>
          <div class="display-5 fw-bold my-3 text-primary"><?php echo $package[1]; ?></div>
          <p class="text-muted"><?php echo $package[2]; ?> session</p>
          <ul class="list-unstyled text-muted">
            <li><i class="fa-solid fa-check text-success me-2"></i><?php echo $package[3]; ?></li>
            <li><i class="fa-solid fa-check text-success me-2"></i>Professional retouching</li>
            <li><i class="fa-solid fa-check text-success me-2"></i>Instant delivery</li>
          </ul>
          <a href="register.php" class="btn btn-outline-primary mt-3">Choose Plan</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section id="testimonials" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-4 reveal">
      <h2 class="section-title">Client <span>Testimonials</span></h2>
      <p class="text-muted">What our clients say about the experience.</p>
    </div>
    <div class="row g-4">
      <?php $testimonials = [['Emily','Wedding','The team made our day feel effortless and magical.','4.9'],['Michael','Corporate','Exceptional quality and a very professional process.','5.0'],['Sophia','Family','Every detail was captured beautifully.','4.8']]; foreach ($testimonials as $item): ?>
      <div class="col-md-6 col-lg-4 reveal">
        <div class="card card-hover testimonial-card p-4">
          <div class="text-warning mb-2"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
          <p class="text-muted">“<?php echo $item[2]; ?>”</p>
          <div class="d-flex align-items-center gap-3 mt-3">
            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=200&q=80" class="rounded-circle" style="width:56px;height:56px;" alt="reviewer">
            <div>
              <h6 class="mb-0"><?php echo $item[0]; ?></h6>
              <small class="text-muted"><?php echo $item[1]; ?></small>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section id="contact" class="py-5 bg-white">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6 reveal">
        <div class="card contact-card p-4 h-100">
          <h2 class="section-title mb-3">Contact <span>Us</span></h2>
          <p class="text-muted">Let’s create something memorable together.</p>
          <form>
            <div class="mb-3"><input class="form-control" type="text" placeholder="Your Name"></div>
            <div class="mb-3"><input class="form-control" type="email" placeholder="Email Address"></div>
            <div class="mb-3"><textarea class="form-control" rows="4" placeholder="Tell us about your project"></textarea></div>
            <button class="btn btn-primary">Send Message</button>
          </form>
        </div>
      </div>
      <div class="col-lg-6 reveal">
        <div class="card contact-card p-4 h-100">
          <h5 class="fw-bold mb-3">Visit Our Studio</h5>
          <p class="text-muted mb-3"><i class="fa-solid fa-location-dot me-2"></i>45 West Avenue, New York, NY</p>
          <p class="text-muted mb-3"><i class="fa-solid fa-phone me-2"></i>+1 234 567 890</p>
          <p class="text-muted mb-3"><i class="fa-solid fa-envelope me-2"></i>hello@lensstudio.com</p>
          <div class="ratio ratio-16x9 rounded overflow-hidden mb-3"><iframe title="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.555..." loading="lazy"></iframe></div>
          <div class="d-flex gap-2">
            <a href="#" class="btn btn-outline-primary"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="btn btn-outline-primary"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="btn btn-outline-primary"><i class="fa-brands fa-x-twitter"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="footer py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-3"><h5 class="fw-bold">Lens Studio</h5><p class="text-muted">Premium photography experiences crafted with elegance and precision.</p></div>
      <div class="col-md-3"><h6 class="fw-bold">Quick Links</h6><ul class="list-unstyled"><li><a href="#about">About</a></li><li><a href="#services">Services</a></li><li><a href="#gallery">Gallery</a></li></ul></div>
      <div class="col-md-3"><h6 class="fw-bold">Contact</h6><ul class="list-unstyled"><li><a href="#">hello@lensstudio.com</a></li><li><a href="#">+1 234 567 890</a></li></ul></div>
      <div class="col-md-3"><h6 class="fw-bold">Newsletter</h6><div class="input-group"><input class="form-control" placeholder="Email"><button class="btn btn-primary">Join</button></div></div>
    </div>
  </div>
</footer>

<?php require_once 'includes/footer.php'; ?>