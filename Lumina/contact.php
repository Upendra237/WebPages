<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Contact Lumina — Share your thoughts, feedback, or questions.">
  <title>Contact — Lumina</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>tailwind.config={theme:{extend:{fontFamily:{sans:['Inter','system-ui','sans-serif'],serif:['Georgia','Cambria','serif']}}}}</script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>✨</text></svg>">
</head>
<body class="bg-slate-950 text-slate-200 font-sans antialiased overflow-x-hidden">

  <!-- NAV -->
  <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-transparent transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <a href="index.html" class="flex items-center space-x-2"><svg viewBox="0 0 36 36" fill="none" class="w-8 h-8"><defs><linearGradient id="lg1" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:#a78bfa"/><stop offset="50%" style="stop-color:#818cf8"/><stop offset="100%" style="stop-color:#fbbf24"/></linearGradient></defs><path d="M18 3C18 3 7 14 7 22C7 28.1 11.9 33 18 33C24.1 33 29 28.1 29 22C29 14 18 3 18 3Z" fill="url(#lg1)" opacity="0.9"/><circle cx="18" cy="20" r="3" fill="white" opacity="0.4"/></svg><span class="text-xl font-bold gradient-text">Lumina</span></a>
        <div class="hidden md:flex items-center space-x-1">
          <a href="index.html" class="nav-link">Home</a><a href="mirror.html" class="nav-link">Mirror</a><a href="forge.html" class="nav-link">Forge</a><a href="breathe.html" class="nav-link">Breathe</a><a href="vault.html" class="nav-link">Vault</a><a href="compass.html" class="nav-link">Compass</a><a href="stillness.html" class="nav-link">Stillness</a>
        </div>
        <button onclick="toggleMobileMenu()" class="md:hidden p-2 text-slate-400 hover:text-white"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
      </div>
    </div>
  </nav>
  <div id="menuOverlay" class="fixed inset-0 bg-black/60 z-40 hidden" onclick="toggleMobileMenu()"></div>
  <div id="mobileMenu" class="mobile-nav fixed top-0 right-0 w-72 h-full bg-slate-900/95 backdrop-blur-xl z-50 pt-20 px-2">
    <button onclick="toggleMobileMenu()" class="absolute top-5 right-5 text-slate-400 hover:text-white"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
    <a href="index.html" class="block px-4 py-3 text-lg text-slate-300">Home</a><a href="mirror.html" class="block px-4 py-3 text-lg text-slate-300">The Mirror</a><a href="forge.html" class="block px-4 py-3 text-lg text-slate-300">The Forge</a><a href="breathe.html" class="block px-4 py-3 text-lg text-slate-300">Breathe</a><a href="vault.html" class="block px-4 py-3 text-lg text-slate-300">The Vault</a><a href="compass.html" class="block px-4 py-3 text-lg text-slate-300">Compass</a><a href="stillness.html" class="block px-4 py-3 text-lg text-slate-300">Stillness</a>
    <div class="border-t border-white/10 mt-4 pt-4"><a href="about.html" class="block px-4 py-3 text-slate-400">About</a><a href="contact.php" class="block px-4 py-3 text-violet-400 font-semibold">Contact</a></div>
  </div>

  <?php
  $success = false;
  $error = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name    = isset($_POST['name'])    ? trim(strip_tags($_POST['name']))    : '';
      $email   = isset($_POST['email'])   ? trim(strip_tags($_POST['email']))   : '';
      $subject = isset($_POST['subject']) ? trim(strip_tags($_POST['subject'])) : '';
      $message = isset($_POST['message']) ? trim(strip_tags($_POST['message'])) : '';
      $honey   = isset($_POST['website']) ? trim($_POST['website']) : '';

      // Honeypot check (bot trap)
      if (!empty($honey)) {
          $error = 'Spam detected.';
      } elseif (empty($name) || strlen($name) < 2) {
          $error = 'Please enter your name (at least 2 characters).';
      } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $error = 'Please enter a valid email address.';
      } elseif (empty($subject)) {
          $error = 'Please select a subject.';
      } elseif (empty($message) || strlen($message) < 10) {
          $error = 'Please write a message (at least 10 characters).';
      } else {
          // Rate limiting: max 5 submissions per IP per hour
          $dataDir = __DIR__ . '/data';
          if (!is_dir($dataDir)) { mkdir($dataDir, 0755, true); }
          $contactFile = $dataDir . '/contact_submissions.json';

          $submissions = [];
          if (file_exists($contactFile)) {
              $raw = file_get_contents($contactFile);
              $submissions = json_decode($raw, true) ?: [];
          }

          $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
          $oneHourAgo = time() - 3600;
          $recentFromIp = array_filter($submissions, function($s) use ($ip, $oneHourAgo) {
              return ($s['ip'] ?? '') === $ip && ($s['timestamp'] ?? 0) > $oneHourAgo;
          });

          if (count($recentFromIp) >= 5) {
              $error = 'Too many submissions. Please try again later.';
          } else {
              $entry = [
                  'id'        => uniqid('msg_', true),
                  'name'      => $name,
                  'email'     => $email,
                  'subject'   => $subject,
                  'message'   => $message,
                  'ip'        => $ip,
                  'timestamp' => time(),
                  'date'      => date('Y-m-d H:i:s'),
                  'read'      => false
              ];

              $submissions[] = $entry;
              $written = file_put_contents($contactFile, json_encode($submissions, JSON_PRETTY_PRINT));

              if ($written !== false) {
                  $success = true;
              } else {
                  $error = 'Unable to save your message. Please try again.';
              }
          }
      }
  }
  ?>

  <!-- HERO -->
  <section class="pt-28 pb-8 px-4">
    <div class="max-w-4xl mx-auto text-center">
      <div class="w-16 h-16 rounded-2xl bg-violet-500/10 border border-violet-500/20 flex items-center justify-center mx-auto mb-6 animate-fade-in-down">
        <svg class="w-8 h-8 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
      </div>
      <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4 animate-fade-in-up">Get in Touch</h1>
      <p class="text-slate-400 text-lg max-w-xl mx-auto animate-fade-in-up delay-200">Have a question, suggestion, or story to share? We'd love to hear from you.</p>
    </div>
  </section>

  <!-- FORM -->
  <section class="pb-16 px-4">
    <div class="max-w-xl mx-auto">
      <?php if ($success): ?>
        <div class="glass rounded-2xl p-8 text-center">
          <div class="w-16 h-16 rounded-full bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
          </div>
          <h2 class="text-xl font-bold text-white mb-2">Message Sent</h2>
          <p class="text-slate-400 mb-6">Thank you for reaching out. Your message has been received and we'll get back to you soon.</p>
          <a href="index.html" class="inline-block px-6 py-2.5 rounded-lg bg-gradient-to-r from-violet-600 to-indigo-600 text-white font-medium hover:shadow-lg transition-all text-sm">Return Home</a>
        </div>
      <?php else: ?>
        <?php if (!empty($error)): ?>
          <div class="mb-6 p-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-300 text-sm">
            <?php echo htmlspecialchars($error); ?>
          </div>
        <?php endif; ?>

        <form method="POST" action="contact.php" class="space-y-5" id="contactForm">
          <!-- Honeypot (hidden from humans) -->
          <div style="position:absolute;left:-9999px;top:-9999px;"><input type="text" name="website" tabindex="-1" autocomplete="off"></div>

          <div>
            <label class="block text-sm font-medium text-slate-300 mb-1.5">Name</label>
            <input type="text" name="name" required minlength="2" maxlength="100" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-slate-600 focus:outline-none focus:border-violet-500/50 transition-colors text-sm" placeholder="Your name">
          </div>

          <div>
            <label class="block text-sm font-medium text-slate-300 mb-1.5">Email</label>
            <input type="email" name="email" required maxlength="200" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-slate-600 focus:outline-none focus:border-violet-500/50 transition-colors text-sm" placeholder="you@example.com">
          </div>

          <div>
            <label class="block text-sm font-medium text-slate-300 mb-1.5">Subject</label>
            <select name="subject" required class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-violet-500/50 transition-colors text-sm">
              <option value="" class="bg-slate-900">Choose a topic</option>
              <option value="feedback" <?php echo (($_POST['subject'] ?? '') === 'feedback') ? 'selected' : ''; ?> class="bg-slate-900">General Feedback</option>
              <option value="suggestion" <?php echo (($_POST['subject'] ?? '') === 'suggestion') ? 'selected' : ''; ?> class="bg-slate-900">Feature Suggestion</option>
              <option value="bug" <?php echo (($_POST['subject'] ?? '') === 'bug') ? 'selected' : ''; ?> class="bg-slate-900">Bug Report</option>
              <option value="collaboration" <?php echo (($_POST['subject'] ?? '') === 'collaboration') ? 'selected' : ''; ?> class="bg-slate-900">Collaboration</option>
              <option value="story" <?php echo (($_POST['subject'] ?? '') === 'story') ? 'selected' : ''; ?> class="bg-slate-900">Share My Story</option>
              <option value="other" <?php echo (($_POST['subject'] ?? '') === 'other') ? 'selected' : ''; ?> class="bg-slate-900">Other</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-slate-300 mb-1.5">Message</label>
            <textarea name="message" required minlength="10" maxlength="5000" rows="6" class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white placeholder-slate-600 focus:outline-none focus:border-violet-500/50 transition-colors text-sm resize-none" placeholder="What's on your mind?"><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
            <p class="text-xs text-slate-600 mt-1">Minimum 10 characters</p>
          </div>

          <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-violet-600 to-indigo-600 text-white font-semibold hover:shadow-lg hover:shadow-violet-500/20 transition-all active:scale-[0.98]">
            Send Message
          </button>
        </form>

        <div class="mt-8 text-center">
          <p class="text-slate-500 text-xs">Your message is stored securely as a JSON file on the server. No third-party services involved.</p>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- FAQ -->
  <section class="pb-16 px-4">
    <div class="max-w-xl mx-auto">
      <h2 class="text-xl font-bold text-white mb-6 text-center">Common Questions</h2>
      <div class="space-y-4">
        <div class="glass rounded-xl p-5">
          <h3 class="text-white font-medium mb-2">Is Lumina free?</h3>
          <p class="text-slate-400 text-sm">Yes, completely. No ads, no premium tier, no hidden costs. Personal transformation shouldn't have a paywall.</p>
        </div>
        <div class="glass rounded-xl p-5">
          <h3 class="text-white font-medium mb-2">Where is my data stored?</h3>
          <p class="text-slate-400 text-sm">All your personal data (journal entries, habits, meditation logs, assessment results) lives in your browser's localStorage. We never see it. If you clear your browser data, it's gone — consider using the export feature in The Mirror to save your journal entries.</p>
        </div>
        <div class="glass rounded-xl p-5">
          <h3 class="text-white font-medium mb-2">Can I use Lumina on mobile?</h3>
          <p class="text-slate-400 text-sm">Absolutely. Every page is fully responsive and works on phones, tablets, and desktops. For the best meditation experience, we recommend putting your phone in Do Not Disturb mode.</p>
        </div>
        <div class="glass rounded-xl p-5">
          <h3 class="text-white font-medium mb-2">How should I start?</h3>
          <p class="text-slate-400 text-sm">Take the Life Balance Wheel assessment in The Compass first. It reveals where you are today. Then choose one practice: journaling, breathing, or meditation — just 5 minutes a day. Consistency matters more than duration. After a week, add a second practice.</p>
        </div>
        <div class="glass rounded-xl p-5">
          <h3 class="text-white font-medium mb-2">Is Lumina a replacement for therapy?</h3>
          <p class="text-slate-400 text-sm">No. Lumina is a self-improvement tool, not a clinical resource. If you're experiencing serious mental health challenges, please seek support from a licensed therapist or counselor. These practices complement professional help wonderfully but don't replace it.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="border-t border-white/5 py-10">
    <div class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-between text-sm text-slate-600">
      <div class="flex items-center space-x-2"><svg viewBox="0 0 36 36" fill="none" class="w-5 h-5"><defs><linearGradient id="fLg" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:#a78bfa"/><stop offset="100%" style="stop-color:#fbbf24"/></linearGradient></defs><path d="M18 3C18 3 7 14 7 22C7 28.1 11.9 33 18 33C24.1 33 29 28.1 29 22C29 14 18 3 18 3Z" fill="url(#fLg)" opacity="0.9"/></svg><span>&copy; 2026 Lumina</span></div>
      <p class="mt-2 sm:mt-0">Every voice matters.</p>
    </div>
  </footer>

  <script src="js/app.js"></script>
</body>
</html>
