<?php
$success = false;
$errors  = [];
$formData = ['name'=>'','email'=>'','phone'=>'','service'=>'','message'=>''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name    = htmlspecialchars(trim($_POST['name']    ?? ''));
  $email   = htmlspecialchars(trim($_POST['email']   ?? ''));
  $phone   = htmlspecialchars(trim($_POST['phone']   ?? ''));
  $service = htmlspecialchars(trim($_POST['service'] ?? ''));
  $message = htmlspecialchars(trim($_POST['message'] ?? ''));
  $formData = compact('name','email','phone','service','message');

  if (strlen($name) < 2)                              $errors['name']    = 'Please enter your full name.';
  if (!filter_var($email, FILTER_VALIDATE_EMAIL))     $errors['email']   = 'Please enter a valid email address.';
  if (strlen($message) < 10)                          $errors['message'] = 'Message must be at least 10 characters.';

  if (empty($errors)) {
    $to      = 'mistrivai79@gmail.com';
    $subject = "New Inquiry from $name — Mistri Vai";
    $body    = "Name: $name\nEmail: $email\nPhone: $phone\nService: $service\n\nMessage:\n$message";
    $headers = "From: $email\r\nReply-To: $email";
    // @mail($to, $subject, $body, $headers); // Uncomment in production
    $success = true;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact — Mistri Vai Engineering Club</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'mv-dark':    '#0d0d0d',
            'mv-darkgray':'#141414',
            'mv-card':    '#1a1a1a',
            'mv-border':  '#2a2a2a',
            'mv-gold':    '#c9a84c',
            'mv-gold-lt': '#e8c96b',
            'mv-text':    '#e5e5e5',
            'mv-muted':   '#888888',
          },
          fontFamily: {
            sans: ['Inter','system-ui','sans-serif'],
            mono: ['JetBrains Mono','monospace'],
          }
        }
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
  <style>
    .blueprint-bg {
      background-color: #0d0d0d;
      background-image:
        linear-gradient(rgba(201,168,76,.05) 1px, transparent 1px),
        linear-gradient(90deg, rgba(201,168,76,.05) 1px, transparent 1px);
      background-size: 60px 60px;
    }
    .stripe-accent {
      background: repeating-linear-gradient(-45deg,transparent,transparent 4px,rgba(201,168,76,.06) 4px,rgba(201,168,76,.06) 8px);
    }
    .reveal { opacity: 0; transform: translateY(28px); transition: opacity .65s ease, transform .65s ease; }
    .reveal.visible { opacity: 1; transform: translateY(0); }
    .gold-clip {
      background: linear-gradient(135deg,#c9a84c 0%,#e8c96b 50%,#a07830 100%);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .nav-link::after { content:''; display:block; height:1px; background:#c9a84c; transform:scaleX(0); transition:transform .25s ease; transform-origin:left; }
    .nav-link:hover::after, .nav-link.active::after { transform:scaleX(1); }
    /* form inputs */
    .form-input {
      width: 100%; background: transparent; border: 1px solid #2a2a2a;
      color: #e5e5e5; padding: .75rem 1rem; font-size: .875rem;
      outline: none; transition: border-color .2s;
      font-family: 'Inter', sans-serif;
    }
    .form-input:focus { border-color: #c9a84c; }
    .form-input.error { border-color: #ef4444; }
    select.form-input {
      -webkit-appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23888888' stroke-width='2'%3E%3Cpath d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 1rem center;
    }
    select.form-input option { background: #141414; color: #e5e5e5; }
    textarea.form-input { resize: vertical; min-height: 140px; }
    .error-msg { color: #ef4444; font-size: .75rem; margin-top: .25rem; }
    /* map grid */
    .map-grid {
      background-image:
        linear-gradient(rgba(201,168,76,.1) 1px, transparent 1px),
        linear-gradient(90deg, rgba(201,168,76,.1) 1px, transparent 1px);
      background-size: 40px 40px;
    }
    /* success checkmark animation */
    @keyframes checkDraw {
      to { stroke-dashoffset: 0; }
    }
    .check-path {
      stroke-dasharray: 50;
      stroke-dashoffset: 50;
      animation: checkDraw .6s .3s ease forwards;
    }
    /* FAQ accordion */
    .faq-body { max-height: 0; overflow: hidden; transition: max-height .35s ease; }
    .faq-item.open .faq-body { max-height: 200px; }
    .faq-item.open .faq-chevron { transform: rotate(180deg); }
    .faq-chevron { transition: transform .3s; }
  </style>
</head>
<body class="bg-mv-dark text-mv-text font-sans overflow-x-hidden">

<!-- NAV -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-mv-darkgray border-b border-mv-border">
  <div class="max-w-7xl mx-auto px-6 flex items-center justify-between h-16">
    <a href="index.html" class="flex items-center gap-3 group">
      <div class="relative w-8 h-8">
        <div class="absolute inset-0 border-2 border-mv-gold rotate-45 group-hover:rotate-90 transition-transform duration-300"></div>
        <div class="absolute inset-1.5 bg-mv-gold rotate-45 group-hover:rotate-0 transition-transform duration-300"></div>
      </div>
      <span class="text-mv-text font-semibold tracking-widest text-sm uppercase">Mistri<span class="text-mv-gold">Vai</span></span>
    </a>
    <div class="hidden md:flex items-center gap-8">
      <a href="index.html"    class="nav-link text-xs uppercase tracking-widest text-mv-muted hover:text-mv-text transition-colors">Home</a>
      <a href="about.html"    class="nav-link text-xs uppercase tracking-widest text-mv-muted hover:text-mv-text transition-colors">About</a>
      <a href="services.html" class="nav-link text-xs uppercase tracking-widest text-mv-muted hover:text-mv-text transition-colors">Services</a>
      <a href="projects.html" class="nav-link text-xs uppercase tracking-widest text-mv-muted hover:text-mv-text transition-colors">Projects</a>
      <a href="contact.php"   class="nav-link active text-xs uppercase tracking-widest text-mv-gold">Contact</a>
    </div>
    <a href="contact.php" class="hidden md:flex items-center gap-2 border border-mv-gold text-mv-gold text-xs uppercase tracking-widest px-4 py-2 hover:bg-mv-gold hover:text-mv-dark transition-all duration-200">
      Start Project
    </a>
    <button id="menuBtn" class="md:hidden flex flex-col gap-1.5 p-2">
      <span class="w-5 h-px bg-mv-text block"></span>
      <span class="w-5 h-px bg-mv-text block"></span>
      <span class="w-5 h-px bg-mv-text block"></span>
    </button>
  </div>
  <div id="mobileMenu" class="hidden md:hidden bg-mv-darkgray border-t border-mv-border px-6 py-4 flex flex-col gap-4">
    <a href="index.html"    class="text-xs uppercase tracking-widest text-mv-muted">Home</a>
    <a href="about.html"    class="text-xs uppercase tracking-widest text-mv-muted">About</a>
    <a href="services.html" class="text-xs uppercase tracking-widest text-mv-muted">Services</a>
    <a href="projects.html" class="text-xs uppercase tracking-widest text-mv-muted">Projects</a>
    <a href="contact.php"   class="text-xs uppercase tracking-widest text-mv-gold">Contact</a>
  </div>
</nav>

<!-- ══ PAGE HERO ══ -->
<section class="blueprint-bg pt-32 pb-20 relative overflow-hidden">
  <div class="absolute inset-0 pointer-events-none">
    <div class="absolute top-0 right-0 w-96 h-96 border border-mv-gold opacity-5 translate-x-1/2 -translate-y-1/2 rotate-45"></div>
  </div>
  <div class="max-w-7xl mx-auto px-6 relative">
    <div class="flex items-center gap-4 mb-6 reveal">
      <div class="w-12 h-px bg-mv-gold"></div>
      <span class="font-mono text-xs text-mv-gold tracking-[0.3em] uppercase">Get In Touch</span>
    </div>
    <h1 class="text-5xl md:text-7xl font-black leading-none tracking-tight mb-6 reveal" style="transition-delay:.1s">
      Contact<br/><span class="gold-clip">Us</span>
    </h1>
    <p class="text-mv-muted text-xl max-w-2xl leading-relaxed reveal" style="transition-delay:.2s">
      Have a project in mind? We'd love to hear from you.
    </p>
    <div class="flex items-center gap-2 mt-8 font-mono text-xs text-mv-muted reveal" style="transition-delay:.3s">
      <a href="index.html" class="hover:text-mv-gold transition-colors">Home</a>
      <span class="opacity-40">/</span>
      <span class="text-mv-gold">Contact</span>
    </div>
  </div>
</section>

<!-- ══ MAIN CONTACT AREA ══ -->
<section class="py-24 bg-mv-dark">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid lg:grid-cols-5 gap-12">

      <!-- FORM COL (3/5) -->
      <div class="lg:col-span-3 reveal">
        <?php if ($success): ?>
        <!-- SUCCESS STATE -->
        <div class="border border-mv-gold bg-mv-darkgray p-12 flex flex-col items-center gap-6 text-center">
          <svg width="72" height="72" viewBox="0 0 72 72" fill="none" class="mb-2">
            <circle cx="36" cy="36" r="34" stroke="#c9a84c" stroke-width="2"/>
            <path class="check-path" d="M20 36 L31 47 L52 26" stroke="#c9a84c" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
          </svg>
          <div>
            <div class="font-mono text-xs text-mv-gold uppercase tracking-widest mb-3">Message Received</div>
            <h3 class="text-2xl font-black text-mv-text mb-3">Thank you, <?= htmlspecialchars($formData['name']) ?>!</h3>
            <p class="text-mv-muted text-sm leading-relaxed max-w-sm">We'll review your inquiry and reach out within 24–48 business hours.</p>
          </div>
          <a href="index.html" class="border border-mv-gold text-mv-gold text-xs uppercase tracking-widest px-8 py-3 hover:bg-mv-gold hover:text-mv-dark transition-all">
            Back to Home
          </a>
        </div>
        <?php else: ?>
        <!-- FORM -->
        <div class="flex items-center gap-4 mb-8">
          <div class="w-12 h-px bg-mv-gold"></div>
          <span class="font-mono text-xs text-mv-gold tracking-[0.3em] uppercase">Send a Message</span>
        </div>

        <?php if (!empty($errors) && count($errors) >= 1): ?>
        <div class="border border-red-500 bg-mv-darkgray p-4 mb-6 text-red-400 text-sm">
          Please fix the errors below before submitting.
        </div>
        <?php endif; ?>

        <form method="POST" action="contact.php" id="contactForm" novalidate class="space-y-5">
          <!-- Name + Email -->
          <div class="grid md:grid-cols-2 gap-5">
            <div>
              <label class="block font-mono text-xs text-mv-muted uppercase tracking-widest mb-2">Full Name *</label>
              <input type="text" name="name" id="name" class="form-input <?= isset($errors['name']) ? 'error' : '' ?>"
                     placeholder="Your name" value="<?= htmlspecialchars($formData['name']) ?>" required>
              <?php if (isset($errors['name'])): ?><p class="error-msg"><?= $errors['name'] ?></p><?php endif; ?>
            </div>
            <div>
              <label class="block font-mono text-xs text-mv-muted uppercase tracking-widest mb-2">Email Address *</label>
              <input type="email" name="email" id="email" class="form-input <?= isset($errors['email']) ? 'error' : '' ?>"
                     placeholder="your@email.com" value="<?= htmlspecialchars($formData['email']) ?>" required>
              <?php if (isset($errors['email'])): ?><p class="error-msg"><?= $errors['email'] ?></p><?php endif; ?>
            </div>
          </div>
          <!-- Phone + Service -->
          <div class="grid md:grid-cols-2 gap-5">
            <div>
              <label class="block font-mono text-xs text-mv-muted uppercase tracking-widest mb-2">Phone Number</label>
              <input type="tel" name="phone" id="phone" class="form-input"
                     placeholder="+977-9XXXXXXXXX" value="<?= htmlspecialchars($formData['phone']) ?>">
            </div>
            <div>
              <label class="block font-mono text-xs text-mv-muted uppercase tracking-widest mb-2">Service of Interest</label>
              <select name="service" id="service" class="form-input">
                <option value="" <?= $formData['service']==='' ? 'selected':'' ?>>Select a service…</option>
                <option value="civil"      <?= $formData['service']==='civil'      ? 'selected':'' ?>>Civil Construction</option>
                <option value="arch"       <?= $formData['service']==='arch'       ? 'selected':'' ?>>Architectural Design</option>
                <option value="interior"   <?= $formData['service']==='interior'   ? 'selected':'' ?>>Interior Design</option>
                <option value="landscape"  <?= $formData['service']==='landscape'  ? 'selected':'' ?>>Landscape & Garden</option>
                <option value="structural" <?= $formData['service']==='structural' ? 'selected':'' ?>>Structural Consulting</option>
              </select>
            </div>
          </div>
          <!-- Message -->
          <div>
            <label class="block font-mono text-xs text-mv-muted uppercase tracking-widest mb-2">Message *</label>
            <textarea name="message" id="message" class="form-input <?= isset($errors['message']) ? 'error' : '' ?>"
                      placeholder="Describe your project…"><?= htmlspecialchars($formData['message']) ?></textarea>
            <?php if (isset($errors['message'])): ?><p class="error-msg"><?= $errors['message'] ?></p><?php endif; ?>
          </div>
          <button type="submit" id="submitBtn" class="w-full bg-mv-gold text-mv-dark font-bold text-xs uppercase tracking-widest py-4 hover:bg-mv-gold-lt transition-colors">
            Send Message →
          </button>
        </form>
        <?php endif; ?>
      </div>

      <!-- INFO COL (2/5) -->
      <div class="lg:col-span-2 space-y-6">
        <!-- Info cards -->
        <div class="border border-mv-border bg-mv-darkgray p-6 reveal" style="transition-delay:.1s">
          <div class="font-mono text-xs text-mv-gold uppercase tracking-widest mb-4">Email</div>
          <a href="mailto:mistrivai79@gmail.com" class="text-mv-text hover:text-mv-gold transition-colors text-sm">mistrivai79@gmail.com</a>
        </div>
        <div class="border border-mv-border bg-mv-darkgray p-6 reveal" style="transition-delay:.15s">
          <div class="font-mono text-xs text-mv-gold uppercase tracking-widest mb-4">Phone</div>
          <a href="tel:+977984595056" class="text-mv-text hover:text-mv-gold transition-colors text-sm">+977-984595056</a>
        </div>
        <div class="border border-mv-border bg-mv-darkgray p-6 reveal" style="transition-delay:.2s">
          <div class="font-mono text-xs text-mv-gold uppercase tracking-widest mb-4">Offices</div>
          <div class="space-y-3 text-sm text-mv-muted">
            <div><span class="text-mv-gold font-mono text-xs">01</span> &nbsp;Liwali, Bhaktapur</div>
            <div><span class="text-mv-gold font-mono text-xs">02</span> &nbsp;Dhulikhel-6, Kavre</div>
          </div>
        </div>
        <!-- Map placeholder -->
        <div class="border border-mv-border reveal" style="transition-delay:.25s; height:200px">
          <div class="map-grid w-full h-full relative flex items-center justify-center bg-mv-darkgray">
            <svg viewBox="0 0 300 200" class="w-full h-full opacity-60 absolute inset-0" fill="none">
              <!-- Roads -->
              <line x1="150" y1="0" x2="150" y2="200" stroke="#c9a84c" stroke-width="1" opacity=".3"/>
              <line x1="0" y1="100" x2="300" y2="100" stroke="#c9a84c" stroke-width="1" opacity=".3"/>
              <line x1="0" y1="60" x2="300" y2="140" stroke="#c9a84c" stroke-width="0.5" opacity=".2"/>
              <!-- Location pin -->
              <circle cx="150" cy="95" r="7" fill="#c9a84c"/>
              <path d="M150 102 L150 118" stroke="#c9a84c" stroke-width="1.5" stroke-linecap="round"/>
              <!-- Pulse rings -->
              <circle cx="150" cy="95" r="14" stroke="#c9a84c" stroke-width="0.6" opacity=".5"/>
              <circle cx="150" cy="95" r="22" stroke="#c9a84c" stroke-width="0.4" opacity=".3"/>
            </svg>
            <span class="relative font-mono text-xs text-mv-muted mt-16">Bhaktapur, Nepal</span>
          </div>
        </div>
        <!-- Socials -->
        <div class="flex gap-3 reveal" style="transition-delay:.3s">
          <a href="#" class="border border-mv-border p-3 hover:border-mv-gold hover:text-mv-gold text-mv-muted transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
          </a>
          <a href="#" class="border border-mv-border p-3 hover:border-mv-gold hover:text-mv-gold text-mv-muted transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
          </a>
          <a href="#" class="border border-mv-border p-3 hover:border-mv-gold hover:text-mv-gold text-mv-muted transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 001.46 6.42 29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.96A29 29 0 0023 12a29 29 0 00-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="#141414"/></svg>
          </a>
          <a href="#" class="border border-mv-border p-3 hover:border-mv-gold hover:text-mv-gold text-mv-muted transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ FAQ ══ -->
<section class="py-20 bg-mv-darkgray border-t border-mv-border">
  <div class="max-w-3xl mx-auto px-6">
    <div class="flex items-center gap-4 mb-12 reveal">
      <div class="w-12 h-px bg-mv-gold"></div>
      <span class="font-mono text-xs text-mv-gold tracking-[0.3em] uppercase">FAQ</span>
    </div>

    <div class="space-y-px">
      <?php
      $faqs = [
        ['How long does a typical project take?',
         'Project timelines vary by scope. A standard residential design takes 2–4 weeks for plans and 4–8 months for construction. We provide detailed schedules at project kickoff.'],
        ['Do you handle building permit approvals?',
         'Yes. Our team prepares all documentation required for municipality and NBC approvals. We guide you through the full permit process.'],
        ['Can I get a quote before committing?',
         'Absolutely. Contact us with your project brief and we'll provide an initial estimate at no cost.'],
        ['Do you work outside Bhaktapur and Kavre?',
         'We take on projects throughout the Bagmati Province. For larger or unique projects we assess on a case-by-case basis.'],
      ];
      foreach ($faqs as $i => $faq):
      ?>
      <div class="faq-item border border-mv-border bg-mv-card reveal" style="transition-delay:<?= $i * 0.06 ?>s">
        <button class="w-full flex items-center justify-between p-6 text-left hover:bg-mv-darkgray transition-colors" onclick="this.closest('.faq-item').classList.toggle('open')">
          <span class="text-mv-text font-medium text-sm"><?= $faq[0] ?></span>
          <svg class="faq-chevron w-4 h-4 text-mv-gold shrink-0 ml-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="faq-body">
          <p class="px-6 pb-6 text-mv-muted text-sm leading-relaxed"><?= $faq[1] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══ FOOTER ══ -->
<footer class="bg-mv-darkgray border-t border-mv-border pt-16 pb-8">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-4 gap-10 mb-12">
      <div>
        <div class="flex items-center gap-3 mb-4">
          <div class="relative w-7 h-7"><div class="absolute inset-0 border-2 border-mv-gold rotate-45"></div><div class="absolute inset-1.5 bg-mv-gold rotate-45"></div></div>
          <span class="text-mv-text font-semibold tracking-widest text-sm uppercase">Mistri<span class="text-mv-gold">Vai</span></span>
        </div>
        <p class="text-mv-muted text-xs leading-relaxed">Engineering Club — building Nepal's built environment since 2019.</p>
      </div>
      <div>
        <div class="font-mono text-xs text-mv-gold uppercase tracking-widest mb-4">Navigation</div>
        <ul class="space-y-2">
          <li><a href="index.html"    class="text-mv-muted text-xs hover:text-mv-text transition-colors">Home</a></li>
          <li><a href="about.html"    class="text-mv-muted text-xs hover:text-mv-text transition-colors">About</a></li>
          <li><a href="services.html" class="text-mv-muted text-xs hover:text-mv-text transition-colors">Services</a></li>
          <li><a href="projects.html" class="text-mv-muted text-xs hover:text-mv-text transition-colors">Projects</a></li>
        </ul>
      </div>
      <div>
        <div class="font-mono text-xs text-mv-gold uppercase tracking-widest mb-4">Services</div>
        <ul class="space-y-2">
          <li><span class="text-mv-muted text-xs">Civil Construction</span></li>
          <li><span class="text-mv-muted text-xs">Architectural Design</span></li>
          <li><span class="text-mv-muted text-xs">Interior Design</span></li>
          <li><span class="text-mv-muted text-xs">Landscape & Garden</span></li>
          <li><span class="text-mv-muted text-xs">Structural Consulting</span></li>
        </ul>
      </div>
      <div>
        <div class="font-mono text-xs text-mv-gold uppercase tracking-widest mb-4">Contact</div>
        <ul class="space-y-2">
          <li><a href="mailto:mistrivai79@gmail.com" class="text-mv-muted text-xs hover:text-mv-text transition-colors">mistrivai79@gmail.com</a></li>
          <li><a href="tel:+977984595056" class="text-mv-muted text-xs hover:text-mv-text transition-colors">+977-984595056</a></li>
          <li><span class="text-mv-muted text-xs">Liwali, Bhaktapur</span></li>
          <li><span class="text-mv-muted text-xs">Dhulikhel-6, Kavre</span></li>
        </ul>
      </div>
    </div>
    <div class="border-t border-mv-border pt-6 flex flex-col md:flex-row items-center justify-between gap-4">
      <span class="font-mono text-xs text-mv-muted opacity-40">© 2026 Mistri Vai Engineering Club. All rights reserved.</span>
      <span class="font-mono text-xs text-mv-muted opacity-30">Bhaktapur · Kavre · Nepal</span>
    </div>
  </div>
</footer>

<script>
  document.getElementById('menuBtn').addEventListener('click', () => {
    document.getElementById('mobileMenu').classList.toggle('hidden');
  });
  const reveals = document.querySelectorAll('.reveal');
  const ro = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.1 });
  reveals.forEach(r => ro.observe(r));

  // Client-side validation + loading state
  const form = document.getElementById('contactForm');
  if (form) {
    const inputFields = ['name','email','message'];
    inputFields.forEach(id => {
      const el = document.getElementById(id);
      if (el) el.addEventListener('input', () => el.classList.remove('error'));
    });
    form.addEventListener('submit', function(e) {
      let valid = true;
      const name = document.getElementById('name');
      const email = document.getElementById('email');
      const message = document.getElementById('message');
      if (name && name.value.trim().length < 2)    { name.classList.add('error'); valid = false; }
      if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) { email.classList.add('error'); valid = false; }
      if (message && message.value.trim().length < 10) { message.classList.add('error'); valid = false; }
      if (!valid) { e.preventDefault(); return; }
      const btn = document.getElementById('submitBtn');
      if (btn) { btn.textContent = 'Sending…'; btn.disabled = true; }
    });
  }
</script>
</body>
</html>
