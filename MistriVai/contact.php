<?php
$sent = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name        = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email       = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone       = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $service     = htmlspecialchars(trim($_POST['service'] ?? ''));
    $area_type   = htmlspecialchars(trim($_POST['area_type'] ?? ''));
    $description = htmlspecialchars(trim($_POST['description'] ?? ''));
    $message     = htmlspecialchars(trim($_POST['message'] ?? ''));

    if ($name && $email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to      = 'nischitshrestha18@gmail.com';
        $subject = 'New Enquiry from MistriVai  ' . $name;
        $body    = "New project enquiry from the Mistri Vai website.\n\n";
        $body   .= "Name:        $name\n";
        $body   .= "Email:       $email\n";
        $body   .= "Phone:       $phone\n";
        $body   .= "Service:     $service\n";
        $body   .= "Area Type:   $area_type\n";
        $body   .= "Description: $description\n\n";
        $body   .= "Message:\n$message\n";

        $headers  = "From: mail.mistrivai@gmail.com\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $body, $headers)) {
            $sent = true;
        } else {
            $error = 'Mail could not be sent. Please email us directly at mail.mistrivai@gmail.com';
        }
    } else {
        $error = 'Please fill in your name and a valid email address.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
  <title>Contact Us  Mistri Vai Engineering Club</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Inter:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css"/>
</head>
<body>

<!-- NAV -->
<nav class="nav" id="navbar">
  <div class="nav__inner">
    <a href="index.html" class="nav__logo">
      <img src="assets/logo.png" alt="Mistri Vai Engineering Club" class="nav__logo-img"/>
    </a>
    <div class="nav__links" id="navLinks">
      <a href="index.html" class="nav__link">Home</a>
      <a href="about.html" class="nav__link">About</a>
      <a href="services.html" class="nav__link">Services</a>
      <a href="projects.html" class="nav__link">Projects</a>
      <a href="gallery.html" class="nav__link">Gallery</a>
      <a href="team.html" class="nav__link">Team</a>
    </div>
    <a href="contact.php" class="nav__cta nav__cta--active">Contact Us</a>
    <button class="nav__hamburger" id="hamburger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- PAGE HERO -->
<section class="page-hero">
  <div class="page-hero__inner container">
    <span class="label">Get In Touch</span>
    <h1 class="t-h1">Contact Us</h1>
    <p class="page-hero__sub">Have a project, question, or want to join Mistri Vai? We would love to hear from you.</p>
  </div>
</section>

<!-- CONTACT SECTION -->
<section class="section bg-white">
  <div class="container">
    <div class="contact-grid">

      <!-- FORM -->
      <div class="contact-form-wrap reveal">
        <span class="label">Send a Message</span>
        <h2 class="t-h3" style="margin-bottom:1.5rem;">Tell us about your project</h2>

        <?php if ($sent): ?>
        <div class="form-success">
          <strong>Message sent!</strong> We will get back to you within 24 hours at <strong><?= htmlspecialchars($_POST['email'] ?? '') ?></strong>.
        </div>
        <?php elseif ($error): ?>
        <div class="form-error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" class="contact-form" novalidate>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="name">Full Name *</label>
              <input class="form-input" type="text" id="name" name="name" placeholder="Hari Bahadur Shrestha" required value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"/>
            </div>
            <div class="form-group">
              <label class="form-label" for="email">Email Address *</label>
              <input class="form-input" type="email" id="email" name="email" placeholder="you@example.com" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"/>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="phone">Phone Number</label>
              <input class="form-input" type="tel" id="phone" name="phone" placeholder="+977-98XXXXXXXX" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>"/>
            </div>
            <div class="form-group">
              <label class="form-label" for="service">Service Required</label>
              <select class="form-input form-select" id="service" name="service">
                <option value="" disabled selected>Select a service</option>
                <option value="Civil Construction">Civil Construction</option>
                <option value="Architectural Design">Architectural Design</option>
                <option value="Structural Engineering">Structural Engineering</option>
                <option value="Interior Design">Interior Design</option>
                <option value="Landscape & Garden">Landscape &amp; Garden Design</option>
                <option value="Construction Consulting">Construction Consulting</option>
                <option value="Surveying & Site Analysis">Surveying &amp; Site Analysis</option>
                <option value="Water Supply & Sanitation">Water Supply &amp; Sanitation</option>
                <option value="Other">Other / General Enquiry</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="area_type">Area / Property Type</label>
              <input class="form-input" type="text" id="area_type" name="area_type" placeholder="e.g. Residential, Commercial, Community" value="<?= htmlspecialchars($_POST['area_type'] ?? '') ?>"/>
            </div>
            <div class="form-group">
              <label class="form-label" for="description">House / Building Description</label>
              <input class="form-input" type="text" id="description" name="description" placeholder="e.g. 2-storey, 3-bedroom, Bhaktapur" value="<?= htmlspecialchars($_POST['description'] ?? '') ?>"/>
            </div>
          </div>
          <div class="form-group form-group--full">
            <label class="form-label" for="message">Message</label>
            <textarea class="form-input form-textarea" id="message" name="message" rows="5" placeholder="Tell us more about your requirements, location, timeline, or any specific questions"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
          </div>
          <button type="submit" class="btn btn--primary btn--full">Send Message </button>
        </form>
      </div>

      <!-- CONTACT INFO -->
      <div class="contact-info reveal">
        <span class="label">Our Details</span>
        <h2 class="t-h3" style="margin-bottom:1.5rem;">Find us</h2>

        <div class="contact-info__items">
          <div class="contact-info__item">
            <div class="contact-info__icon"></div>
            <div>
              <div class="contact-info__il">Email</div>
              <a href="mailto:mail.mistrivai@gmail.com" class="contact-info__val">mail.mistrivai@gmail.com</a>
            </div>
          </div>
          <div class="contact-info__item">
            <div class="contact-info__icon"></div>
            <div>
              <div class="contact-info__il">Phone</div>
              <a href="tel:+9779860590678" class="contact-info__val">+977-9860590678</a>
            </div>
          </div>
          <div class="contact-info__item">
            <div class="contact-info__icon"></div>
            <div>
              <div class="contact-info__il">Head Office</div>
              <span class="contact-info__val">Liwali, Bhaktapur, Nepal</span>
            </div>
          </div>
          <div class="contact-info__item">
            <div class="contact-info__icon"></div>
            <div>
              <div class="contact-info__il">Branch Office</div>
              <span class="contact-info__val">Dhulikhel-6, Kavrepalanchok</span>
            </div>
          </div>
          <div class="contact-info__item">
            <div class="contact-info__icon"></div>
            <div>
              <div class="contact-info__il">Registration</div>
              <span class="contact-info__val">Regd. No. 15648/082/083</span>
            </div>
          </div>
          <div class="contact-info__item">
            <div class="contact-info__icon"></div>
            <div>
              <div class="contact-info__il">PAN</div>
              <span class="contact-info__val">133885297</span>
            </div>
          </div>
        </div>

        <div class="contact-info__social">
          <div class="contact-info__il" style="margin-bottom:.75rem;">Follow Us</div>
          <div class="social-links">
            <a href="https://www.instagram.com/mistrivai" target="_blank" rel="noopener" class="social-link">Instagram</a>
            <a href="https://mistrivai.odoo.com/" target="_blank" rel="noopener" class="social-link">Website</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-band">
  <div class="cta-band__inner container">
    <div>
      <span class="label" style="color:var(--navy);opacity:.6;">Join the Club</span>
      <h2 class="t-h2" style="color:var(--navy);">Want to be a part of MistriVai?</h2>
    </div>
    <div class="cta-band__actions">
      <a href="about.html" class="btn btn--dark">Learn About Us</a>
      <a href="team.html" class="btn btn--outline-dark">Meet the Team</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="footer">
  <div class="footer__inner container">
    <div class="footer__grid">
      <div class="footer__brand">
        <img src="assets/logo.png" alt="Mistri Vai" class="footer__logo"/>
        <p>Student-led engineering club from Nepal  learning, designing, and building together.</p>
        <div class="footer__reg">
          <span>Regd. No. 15648/082/083</span>
          <span>PAN: 133885297</span>
        </div>
      </div>
      <div class="footer__col">
        <div class="footer__col-title">Pages</div>
        <a href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="services.html">Services</a>
        <a href="projects.html">Projects</a>
        <a href="gallery.html">Gallery</a>
        <a href="team.html">Team</a>
      </div>
      <div class="footer__col">
        <div class="footer__col-title">Contact</div>
        <a href="mailto:mail.mistrivai@gmail.com">mail.mistrivai@gmail.com</a>
        <a href="tel:+9779860590678">+977-9860590678</a>
        <span>Liwali, Bhaktapur</span>
        <span>Dhulikhel-6, Kavre</span>
      </div>
    </div>
    <div class="footer__bottom">
      <span> 2082 BS Mistri Vai Engineering Club. All rights reserved.</span>
      <span>Regd. No. 15648/082/083  PAN 133885297</span>
    </div>
  </div>
</footer>

<script>
  const nb = document.getElementById('navbar');
  window.addEventListener('scroll', () => nb.classList.toggle('nav--scrolled', window.scrollY > 40));
  document.getElementById('hamburger').addEventListener('click', () => {
    document.getElementById('navLinks').classList.toggle('nav__links--open');
  });
  const ro = new IntersectionObserver((es) => es.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); }), { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(el => ro.observe(el));
</script>
</body>
</html>
