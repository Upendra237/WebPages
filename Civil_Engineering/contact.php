<?php
// ══════════════════════════════════════════════════
//  Mistri Vai Engineering Club — Contact Page
//  PHP form processing + HTML/Tailwind/JS page
// ══════════════════════════════════════════════════

$success = false;
$errors  = [];
$values  = ['name'=>'','email'=>'','phone'=>'','service'=>'','message'=>''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitise
    $values['name']    = trim(htmlspecialchars($_POST['name']    ?? ''));
    $values['email']   = trim(htmlspecialchars($_POST['email']   ?? ''));
    $values['phone']   = trim(htmlspecialchars($_POST['phone']   ?? ''));
    $values['service'] = trim(htmlspecialchars($_POST['service'] ?? ''));
    $values['message'] = trim(htmlspecialchars($_POST['message'] ?? ''));

    // Validate
    if (strlen($values['name']) < 2)         $errors['name']    = 'Please enter your full name.';
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Please enter a valid email address.';
    if (strlen($values['message']) < 10)     $errors['message'] = 'Message must be at least 10 characters.';

    if (empty($errors)) {
        // Mail (configure SMTP on server or replace with preferred mail library)
        $to      = 'mistrivai79@gmail.com';
        $subject = 'New Project Enquiry — ' . $values['name'];
        $body    = "Name: {$values['name']}\n"
                 . "Email: {$values['email']}\n"
                 . "Phone: {$values['phone']}\n"
                 . "Service Interest: {$values['service']}\n\n"
                 . "Message:\n{$values['message']}";
        $headers = "From: {$values['email']}\r\nReply-To: {$values['email']}\r\n";

        // @mail($to, $subject, $body, $headers); // Uncomment when deploying on a server with mail()
        $success = true; // always true in prototype
    }
}
?><!DOCTYPE html>
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
      background: repeating-linear-gradient(-45deg,transparent,transparent 4px,rgba(201,168,76,.07) 4px,rgba(201,168,76,.07) 8px);
    }
    .reveal { opacity: 0; transform: translateY(28px); transition: opacity .65s ease, transform .65s ease; }
    .reveal.visible { opacity: 1; transform: translateY(0); }
    .gold-clip {
      background: linear-gradient(135deg,#c9a84c 0%,#e8c96b 50%,#a07830 100%);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }
    .nav-link::after { content:''; display:block; height:1px; background:#c9a84c; transform:scaleX(0); transition:transform .25s ease; transform-origin:left; }
    .nav-link:hover::after, .nav-link.active::after { transform:scaleX(1); }
    /* Form inputs */
    .form-input {
      background: transparent;
      border: 1px solid #2a2a2a;
      color: #e5e5e5;
      transition: border-color .2s, box-shadow .2s;
      outline: none;
      width: 100%;
      padding: 0.875rem 1rem;
      font-family: inherit;
      font-size: 0.875rem;
    }
    .form-input:focus { border-color: #c9a84c; box-shadow: 0 0 0 2px rgba(201,168,76,.12); }
    .form-input::placeholder { color: #555; }
    .form-input.error { border-color: #ef4444; }
    /* Select arrow */
    select.form-input { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23888' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1rem; padding-right: 2.5rem; }
    select.form-input option { background: #1a1a1a; color: #e5e5e5; }
    /* Success animation */
    @keyframes checkDraw { from { stroke-dashoffset: 50; } to { stroke-dashoffset: 0; } }
    .check-path { stroke-dasharray: 50; stroke-dashoffset: 50; animation: checkDraw .6s .3s ease forwards; }
    /* Map placeholder grid */
    .map-grid {
      background-image:
        linear-gradient(rgba(201,168,76,.08) 1px, transparent 1px),
        linear-gradient(90deg, rgba(201,168,76,.08) 1px, transparent 1px);
      background-size: 40px 40px;
    }
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
    <div class="absolute top-0 right-0 w-64 h-64 border border-mv-gold opacity-5 translate-x-1/3 -translate-y-1/3 rotate-45"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 border border-mv-gold opacity-5 -translate-x-1/3 translate-y-1/3 rotate-45"></div>
  </div>
  <div class="max-w-7xl mx-auto px-6 relative">
    <div class="flex items-center gap-4 mb-6 reveal">
      <div class="w-12 h-px bg-mv-gold"></div>
      <span class="font-mono text-xs text-mv-gold tracking-[0.3em] uppercase">Get In Touch</span>
    </div>
    <h1 class="text-5xl md:text-7xl font-black leading-none tracking-tight mb-6 reveal" style="transition-delay:.1s">
      Let's<br/><span class="gold-clip">Talk.</span>
    </h1>
    <p class="text-mv-muted text-xl max-w-xl leading-relaxed reveal" style="transition-delay:.2s">
      We'd love to hear about your project. Reach out and our team will respond as soon as possible.
    </p>
    <div class="flex items-center gap-2 mt-8 font-mono text-xs text-mv-muted reveal" style="transition-delay:.3s">
      <a href="index.html" class="hover:text-mv-gold transition-colors">Home</a>
      <span class="opacity-40">/</span>
      <span class="text-mv-gold">Contact</span>
    </div>
  </div>
</section>

<!-- ══ CONTACT GRID ══ -->
<section class="py-24 bg-mv-dark">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-5 gap-12">

    <!-- Left — info -->
    <div class="md:col-span-2 space-y-10">

      <div class="reveal">
        <div class="flex items-center gap-4 mb-8">
          <div class="w-12 h-px bg-mv-gold"></div>
          <span class="font-mono text-xs text-mv-gold tracking-[0.3em] uppercase">Contact Details</span>
        </div>

        <!-- Email -->
        <a href="mailto:mistrivai79@gmail.com" class="flex items-start gap-5 p-5 border border-mv-border hover:border-mv-gold transition-colors group mb-4">
          <div class="w-10 h-10 border border-mv-border group-hover:border-mv-gold flex items-center justify-center shrink-0 transition-colors">
            <svg class="w-5 h-5 text-mv-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
            </svg>
          </div>
          <div>
            <div class="font-mono text-xs text-mv-muted uppercase tracking-widest mb-1">Email</div>
            <div class="text-mv-text text-sm group-hover:text-mv-gold transition-colors">mistrivai79@gmail.com</div>
          </div>
        </a>

        <!-- Phone -->
        <a href="tel:+977984595056" class="flex items-start gap-5 p-5 border border-mv-border hover:border-mv-gold transition-colors group mb-4">
          <div class="w-10 h-10 border border-mv-border group-hover:border-mv-gold flex items-center justify-center shrink-0 transition-colors">
            <svg class="w-5 h-5 text-mv-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
            </svg>
          </div>
          <div>
            <div class="font-mono text-xs text-mv-muted uppercase tracking-widest mb-1">Phone</div>
            <div class="text-mv-text text-sm group-hover:text-mv-gold transition-colors">+977-984595056</div>
          </div>
        </a>

        <!-- Office -->
        <div class="flex items-start gap-5 p-5 border border-mv-border mb-4">
          <div class="w-10 h-10 border border-mv-border flex items-center justify-center shrink-0">
            <svg class="w-5 h-5 text-mv-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
            </svg>
          </div>
          <div>
            <div class="font-mono text-xs text-mv-muted uppercase tracking-widest mb-1">Head Office</div>
            <div class="text-mv-text text-sm leading-relaxed">Liwali, Bhaktapur, Nepal</div>
            <div class="text-mv-muted text-xs mt-1">Branch: Dhulikhel-6, Kavre</div>
          </div>
        </div>
      </div>

      <!-- Map placeholder -->
      <div class="reveal" style="transition-delay:.1s">
        <div class="border border-mv-border h-56 map-grid relative overflow-hidden flex items-center justify-center">
          <!-- Stylised map pin SVG -->
          <svg viewBox="0 0 300 220" class="absolute inset-0 w-full h-full opacity-30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <!-- Roads -->
            <line x1="0"   y1="110" x2="300" y2="110" stroke="#c9a84c" stroke-width="1.5" opacity=".5"/>
            <line x1="150" y1="0"   x2="150" y2="220" stroke="#c9a84c" stroke-width="1.5" opacity=".5"/>
            <line x1="0"   y1="50"  x2="300" y2="170" stroke="#c9a84c" stroke-width="0.5" opacity=".3"/>
            <line x1="0"   y1="170" x2="300" y2="50"  stroke="#c9a84c" stroke-width="0.5" opacity=".3"/>
            <!-- Location dot -->
            <circle cx="150" cy="110" r="16" fill="rgba(201,168,76,.25)" stroke="#c9a84c" stroke-width="2"/>
            <circle cx="150" cy="110" r="5"  fill="#c9a84c"/>
            <!-- Pulse rings -->
            <circle cx="150" cy="110" r="28" stroke="#c9a84c" stroke-width="0.7" fill="none" stroke-dasharray="4,6" opacity=".4"/>
            <circle cx="150" cy="110" r="45" stroke="#c9a84c" stroke-width="0.4" fill="none" stroke-dasharray="3,8" opacity=".25"/>
            <!-- Blocks -->
            <rect x="30"  y="70"  width="50" height="30" stroke="#c9a84c" stroke-width="0.5" fill="rgba(201,168,76,.05)"/>
            <rect x="220" y="70"  width="50" height="30" stroke="#c9a84c" stroke-width="0.5" fill="rgba(201,168,76,.05)"/>
            <rect x="30"  y="120" width="50" height="30" stroke="#c9a84c" stroke-width="0.5" fill="rgba(201,168,76,.05)"/>
            <rect x="220" y="120" width="50" height="30" stroke="#c9a84c" stroke-width="0.5" fill="rgba(201,168,76,.05)"/>
          </svg>
          <div class="relative z-10 text-center">
            <div class="text-mv-gold font-mono text-xs uppercase tracking-widest mb-1">Liwali, Bhaktapur</div>
            <div class="text-mv-muted text-xs">Nepal</div>
          </div>
        </div>
      </div>

      <!-- Social -->
      <div class="reveal" style="transition-delay:.15s">
        <div class="font-mono text-xs text-mv-gold tracking-widest uppercase mb-4">Follow Us</div>
        <div class="flex gap-3">
          <a href="#" class="w-9 h-9 border border-mv-border text-mv-muted text-xs flex items-center justify-center hover:border-mv-gold hover:text-mv-gold transition-all">fb</a>
          <a href="#" class="w-9 h-9 border border-mv-border text-mv-muted text-xs flex items-center justify-center hover:border-mv-gold hover:text-mv-gold transition-all">in</a>
          <a href="#" class="w-9 h-9 border border-mv-border text-mv-muted text-xs flex items-center justify-center hover:border-mv-gold hover:text-mv-gold transition-all">yt</a>
          <a href="#" class="w-9 h-9 border border-mv-border text-mv-muted text-xs flex items-center justify-center hover:border-mv-gold hover:text-mv-gold transition-all">ig</a>
          <a href="#" class="w-9 h-9 border border-mv-border text-mv-muted text-xs flex items-center justify-center hover:border-mv-gold hover:text-mv-gold transition-all">tk</a>
        </div>
      </div>
    </div>

    <!-- Right — form -->
    <div class="md:col-span-3 reveal" style="transition-delay:.1s">

      <?php if ($success): ?>
      <!-- SUCCESS STATE -->
      <div class="border border-mv-gold bg-mv-card p-12 flex flex-col items-center text-center">
        <div class="w-16 h-16 border-2 border-mv-gold flex items-center justify-center mb-6">
          <svg class="w-8 h-8" viewBox="0 0 32 32" fill="none" stroke="#c9a84c" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path class="check-path" d="M6 16 L13 23 L26 9"/>
          </svg>
        </div>
        <h3 class="text-mv-text font-bold text-2xl mb-3">Message Sent!</h3>
        <p class="text-mv-muted leading-relaxed max-w-sm mb-8">
          Thank you<?= $values['name'] ? ', '.$values['name'] : '' ?>. We've received your enquiry and will be in touch shortly.
        </p>
        <a href="contact.php" class="border border-mv-gold text-mv-gold text-xs uppercase tracking-widest px-8 py-3 hover:bg-mv-gold hover:text-mv-dark transition-all">
          Send Another
        </a>
      </div>

      <?php else: ?>
      <!-- FORM -->
      <div class="border border-mv-border bg-mv-card p-8 md:p-10 relative overflow-hidden">
        <!-- Arch corner decoration -->
        <div class="absolute top-0 right-0 w-16 h-16 border-b border-l border-mv-gold opacity-20"></div>
        <div class="absolute bottom-0 left-0 w-16 h-16 border-t border-r border-mv-gold opacity-20"></div>

        <div class="mb-8">
          <h2 class="text-mv-text font-bold text-2xl mb-2">Send a Message</h2>
          <p class="text-mv-muted text-sm">Fill in the form and we'll get back to you within 24 hours.</p>
        </div>

        <?php if (!empty($errors)): ?>
        <div class="border border-red-800 bg-red-950 bg-opacity-30 p-4 mb-6">
          <p class="text-red-400 text-xs font-mono uppercase tracking-widest mb-2">Please fix the following:</p>
          <ul class="space-y-1">
            <?php foreach ($errors as $err): ?>
            <li class="text-red-400 text-xs">— <?= $err ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; ?>

        <form method="POST" action="contact.php" id="contactForm" novalidate>
          <div class="grid md:grid-cols-2 gap-5 mb-5">
            <!-- Name -->
            <div>
              <label class="block font-mono text-xs text-mv-muted uppercase tracking-widest mb-2">Full Name *</label>
              <input type="text" name="name" value="<?= htmlspecialchars($values['name']) ?>"
                     placeholder="e.g. Ram Sharma"
                     class="form-input<?= isset($errors['name']) ? ' error' : '' ?>" required />
              <?php if (isset($errors['name'])): ?>
              <p class="text-red-400 text-xs mt-1"><?= $errors['name'] ?></p>
              <?php endif; ?>
            </div>
            <!-- Email -->
            <div>
              <label class="block font-mono text-xs text-mv-muted uppercase tracking-widest mb-2">Email Address *</label>
              <input type="email" name="email" value="<?= htmlspecialchars($values['email']) ?>"
                     placeholder="you@example.com"
                     class="form-input<?= isset($errors['email']) ? ' error' : '' ?>" required />
              <?php if (isset($errors['email'])): ?>
              <p class="text-red-400 text-xs mt-1"><?= $errors['email'] ?></p>
              <?php endif; ?>
            </div>
          </div>

          <div class="grid md:grid-cols-2 gap-5 mb-5">
            <!-- Phone -->
            <div>
              <label class="block font-mono text-xs text-mv-muted uppercase tracking-widest mb-2">Phone Number</label>
              <input type="tel" name="phone" value="<?= htmlspecialchars($values['phone']) ?>"
                     placeholder="+977-98XXXXXXXX"
                     class="form-input" />
            </div>
            <!-- Service -->
            <div>
              <label class="block font-mono text-xs text-mv-muted uppercase tracking-widest mb-2">Service Interest</label>
              <select name="service" class="form-input">
                <option value="" <?= $values['service'] === '' ? 'selected' : '' ?>>Select a Service</option>
                <option value="Civil Construction"      <?= $values['service'] === 'Civil Construction' ? 'selected' : '' ?>>Civil Construction</option>
                <option value="Architectural Design"    <?= $values['service'] === 'Architectural Design' ? 'selected' : '' ?>>Architectural Design</option>
                <option value="Interior Design"         <?= $values['service'] === 'Interior Design' ? 'selected' : '' ?>>Interior Design</option>
                <option value="Landscape & Gardens"     <?= $values['service'] === 'Landscape & Gardens' ? 'selected' : '' ?>>Landscape & Gardens</option>
                <option value="Structural Consulting"   <?= $values['service'] === 'Structural Consulting' ? 'selected' : '' ?>>Structural Consulting</option>
                <option value="General Enquiry"         <?= $values['service'] === 'General Enquiry' ? 'selected' : '' ?>>General Enquiry</option>
              </select>
            </div>
          </div>

          <!-- Message -->
          <div class="mb-8">
            <label class="block font-mono text-xs text-mv-muted uppercase tracking-widest mb-2">Message *</label>
            <textarea name="message" rows="6" placeholder="Tell us about your project — location, size, timeline..."
                      class="form-input resize-none<?= isset($errors['message']) ? ' error' : '' ?>" required><?= htmlspecialchars($values['message']) ?></textarea>
            <?php if (isset($errors['message'])): ?>
            <p class="text-red-400 text-xs mt-1"><?= $errors['message'] ?></p>
            <?php endif; ?>
          </div>

          <!-- Submit -->
          <div class="flex items-center justify-between gap-4 flex-wrap">
            <button type="submit" id="submitBtn"
                    class="relative overflow-hidden group bg-mv-gold text-mv-dark text-xs uppercase tracking-widest font-semibold px-10 py-4 flex items-center gap-3 hover:bg-mv-gold-lt transition-colors">
              <span class="relative z-10">Send Message</span>
              <svg class="w-4 h-4 relative z-10 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </button>
            <p class="text-mv-muted text-xs">We respond within 24 hours.</p>
          </div>
        </form>
      </div>
      <?php endif; ?>

    </div>
  </div>
</section>

<!-- ══ FAQ ══ -->
<section class="py-24 bg-mv-darkgray">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex items-center gap-4 mb-6 reveal">
      <div class="w-12 h-px bg-mv-gold"></div>
      <span class="font-mono text-xs text-mv-gold tracking-[0.3em] uppercase">FAQ</span>
    </div>
    <h2 class="text-4xl font-black text-mv-text mb-12 reveal" style="transition-delay:.05s">
      Common <span class="gold-clip">Questions</span>
    </h2>
    <div class="grid md:grid-cols-2 gap-6">
      <div class="border border-mv-border p-6 hover:border-mv-gold transition-colors reveal">
        <h4 class="text-mv-text font-semibold mb-3">How do I start a project with Mistri Vai?</h4>
        <p class="text-mv-muted text-sm leading-relaxed">Fill out the contact form above or call us directly. We'll schedule an initial site visit and consultation — typically within 2–3 working days.</p>
      </div>
      <div class="border border-mv-border p-6 hover:border-mv-gold transition-colors reveal" style="transition-delay:.05s">
        <h4 class="text-mv-text font-semibold mb-3">What areas do you serve?</h4>
        <p class="text-mv-muted text-sm leading-relaxed">We primarily operate in Bhaktapur and Kavre districts. For larger projects, we serve clients across the Bagmati Province and neighbouring regions.</p>
      </div>
      <div class="border border-mv-border p-6 hover:border-mv-gold transition-colors reveal" style="transition-delay:.1s">
        <h4 class="text-mv-text font-semibold mb-3">Do you handle building permits?</h4>
        <p class="text-mv-muted text-sm leading-relaxed">Yes. Our architectural and engineering team prepares full NBC-compliant drawings and assists with municipal building permit submissions.</p>
      </div>
      <div class="border border-mv-border p-6 hover:border-mv-gold transition-colors reveal" style="transition-delay:.15s">
        <h4 class="text-mv-text font-semibold mb-3">How long does a residential project take?</h4>
        <p class="text-mv-muted text-sm leading-relaxed">Timeline depends on scope. A typical residential build (1,500–3,000 sqft) takes 8–18 months from design to handover. We provide a detailed schedule at project kickoff.</p>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="bg-mv-darkgray border-t border-mv-border pt-16 pb-8">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-4 gap-12 mb-12">
      <div class="md:col-span-2">
        <div class="flex items-center gap-3 mb-6">
          <div class="relative w-8 h-8">
            <div class="absolute inset-0 border-2 border-mv-gold rotate-45"></div>
            <div class="absolute inset-1.5 bg-mv-gold rotate-45"></div>
          </div>
          <span class="text-mv-text font-semibold tracking-widest text-sm uppercase">Mistri<span class="text-mv-gold">Vai</span></span>
        </div>
        <p class="text-mv-muted text-sm leading-relaxed max-w-xs mb-6">Civil engineering, architecture & design solutions from the heart of Nepal.</p>
        <div class="flex gap-4">
          <a href="#" class="w-8 h-8 border border-mv-border flex items-center justify-center text-mv-muted hover:border-mv-gold hover:text-mv-gold transition-all text-xs">f</a>
          <a href="#" class="w-8 h-8 border border-mv-border flex items-center justify-center text-mv-muted hover:border-mv-gold hover:text-mv-gold transition-all text-xs">in</a>
          <a href="#" class="w-8 h-8 border border-mv-border flex items-center justify-center text-mv-muted hover:border-mv-gold hover:text-mv-gold transition-all text-xs">yt</a>
          <a href="#" class="w-8 h-8 border border-mv-border flex items-center justify-center text-mv-muted hover:border-mv-gold hover:text-mv-gold transition-all text-xs">ig</a>
        </div>
      </div>
      <div>
        <div class="font-mono text-xs text-mv-gold tracking-widest uppercase mb-6">Pages</div>
        <ul class="space-y-3">
          <li><a href="index.html"    class="text-mv-muted text-sm hover:text-mv-text transition-colors">Home</a></li>
          <li><a href="about.html"    class="text-mv-muted text-sm hover:text-mv-text transition-colors">About</a></li>
          <li><a href="services.html" class="text-mv-muted text-sm hover:text-mv-text transition-colors">Services</a></li>
          <li><a href="projects.html" class="text-mv-muted text-sm hover:text-mv-text transition-colors">Projects</a></li>
          <li><a href="contact.php"   class="text-mv-gold text-sm">Contact</a></li>
        </ul>
      </div>
      <div>
        <div class="font-mono text-xs text-mv-gold tracking-widest uppercase mb-6">Contact</div>
        <ul class="space-y-4">
          <li class="text-mv-muted text-sm"><a href="mailto:mistrivai79@gmail.com" class="hover:text-mv-text transition-colors">mistrivai79@gmail.com</a></li>
          <li class="text-mv-muted text-sm"><a href="tel:+977984595056" class="hover:text-mv-text transition-colors">+977-984595056</a></li>
          <li class="text-mv-muted text-sm leading-relaxed">Liwali, Bhaktapur<br/><span class="text-xs opacity-70">Branch: Dhulikhel-6, Kavre</span></li>
        </ul>
      </div>
    </div>
    <div class="border-t border-mv-border pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
      <div class="font-mono text-xs text-mv-muted">© 2026 Mistri Vai Engineering Club. All rights reserved.</div>
      <div class="font-mono text-xs text-mv-muted opacity-40">Liwali, Bhaktapur — NP</div>
    </div>
  </div>
</footer>

<script>
  document.getElementById('menuBtn').addEventListener('click', () => {
    document.getElementById('mobileMenu').classList.toggle('hidden');
  });
  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.1 });
  reveals.forEach(r => observer.observe(r));

  // Client-side form validation enhancement
  const form = document.getElementById('contactForm');
  if (form) {
    form.addEventListener('submit', function(e) {
      const name    = form.querySelector('[name="name"]');
      const email   = form.querySelector('[name="email"]');
      const message = form.querySelector('[name="message"]');
      let valid = true;

      [name, email, message].forEach(f => f.classList.remove('error'));

      if (!name.value.trim() || name.value.trim().length < 2)  { name.classList.add('error');    valid = false; }
      if (!email.value.trim() || !/\S+@\S+\.\S+/.test(email.value)) { email.classList.add('error');   valid = false; }
      if (!message.value.trim() || message.value.trim().length < 10) { message.classList.add('error'); valid = false; }

      if (!valid) {
        e.preventDefault();
        const firstError = form.querySelector('.error');
        if (firstError) firstError.focus();
      } else {
        const btn = document.getElementById('submitBtn');
        btn.innerHTML = '<span class="relative z-10">Sending...</span>';
        btn.disabled = true;
        btn.classList.add('opacity-70');
      }
    });

    // Live border feedback
    form.querySelectorAll('.form-input').forEach(input => {
      input.addEventListener('input', function() { this.classList.remove('error'); });
    });
  }
</script>
</body>
</html>
