<?php
/* Form handling */
$sent  = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name        = htmlspecialchars(trim($_POST['name']        ?? ''));
    $email       = htmlspecialchars(trim($_POST['email']       ?? ''));
    $phone       = htmlspecialchars(trim($_POST['phone']       ?? ''));
    $service     = htmlspecialchars(trim($_POST['service']     ?? ''));
    $area_type   = htmlspecialchars(trim($_POST['area_type']   ?? ''));
    $description = htmlspecialchars(trim($_POST['description'] ?? ''));
    $message     = htmlspecialchars(trim($_POST['message']     ?? ''));

    if ($name && $email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to      = 'nischitshrestha18@gmail.com';
        $subject = 'New Enquiry from MistriVai - ' . $name;
        $body    = "New project enquiry from the Mistri Vai website.\n\n"
                 . "Name:        $name\n"
                 . "Email:       $email\n"
                 . "Phone:       $phone\n"
                 . "Service:     $service\n"
                 . "Area Type:   $area_type\n"
                 . "Description: $description\n\n"
                 . "Message:\n$message\n";

        $headers  = "From: mail.mistrivai@gmail.com\r\n"
                  . "Reply-To: $email\r\n"
                  . "X-Mailer: PHP/" . phpversion() . "\r\n"
                  . "Content-Type: text/plain; charset=UTF-8\r\n";

        $sent = mail($to, $subject, $body, $headers);
        if (!$sent) $error = 'Mail could not be sent. Please email us directly at mail.mistrivai@gmail.com';
    } else {
        $error = 'Please fill in your name and a valid email address.';
    }
}

$pageTitle = 'Contact - Mistri Vai Engineering Co.';
$pageDesc  = 'Get in touch with Mistri Vai Engineering Co. for civil engineering, architectural design, or construction queries.';
include 'includes/header.php';
?>

<section class="bg-[#0D1B2A] py-20 lg:py-28 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.04]" style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:48px 48px"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
    <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-3">Get In Touch</p>
    <h1 class="font-display text-5xl lg:text-6xl font-bold text-white leading-tight max-w-2xl">
      Let's Build<br/>Something Together
    </h1>
    <p class="text-white/50 mt-4 max-w-lg text-base leading-relaxed">Have a project, question, or just want to say hello? We'd love to hear from you.</p>
  </div>
</section>

<section class="py-20 lg:py-28 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid lg:grid-cols-3 gap-12">

      <div class="lg:col-span-1 space-y-8">
        <div>
          <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-5">Contact Info</p>
          <ul class="space-y-5">
            <li class="flex gap-4">
              <span class="shrink-0 w-10 h-10 bg-[#0D1B2A] text-[#C8A951] flex items-center justify-center rounded-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              </span>
              <div>
                <p class="font-mono text-[9px] tracking-[.2em] uppercase text-gray-400 mb-0.5">Email</p>
                <a href="mailto:mail.mistrivai@gmail.com" class="text-sm text-[#0D1B2A] font-medium hover:text-[#C8A951] transition-colors break-all">mail.mistrivai@gmail.com</a>
              </div>
            </li>
            <li class="flex gap-4">
              <span class="shrink-0 w-10 h-10 bg-[#0D1B2A] text-[#C8A951] flex items-center justify-center rounded-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
              </span>
              <div>
                <p class="font-mono text-[9px] tracking-[.2em] uppercase text-gray-400 mb-0.5">Phone</p>
                <a href="tel:+9779860590678" class="text-sm text-[#0D1B2A] font-medium hover:text-[#C8A951] transition-colors">+977-9860590678</a>
              </div>
            </li>
            <li class="flex gap-4">
              <span class="shrink-0 w-10 h-10 bg-[#0D1B2A] text-[#C8A951] flex items-center justify-center rounded-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              </span>
              <div>
                <p class="font-mono text-[9px] tracking-[.2em] uppercase text-gray-400 mb-0.5">Locations</p>
                <p class="text-sm text-[#0D1B2A] font-medium">Liwali, Bhaktapur</p>
                <p class="text-sm text-[#0D1B2A] font-medium">Dhulikhel-6, Kavre</p>
              </div>
            </li>
          </ul>
        </div>

        <div>
          <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-3">Follow Us</p>
          <a href="https://www.instagram.com/mistrivai" target="_blank" rel="noreferrer" class="inline-flex items-center gap-2 text-sm text-[#0D1B2A] hover:text-[#C8A951] font-medium transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            @mistrivai
          </a>
        </div>

        <div class="bg-[#0D1B2A] p-5 rounded-sm">
          <p class="font-mono text-[9px] tracking-[.2em] uppercase text-[#C8A951] mb-3">Registration</p>
          <p class="text-white/70 text-sm">Regd. No. <span class="text-white font-semibold">15648/082/083</span></p>
          <p class="text-white/70 text-sm mt-1">PAN <span class="text-white font-semibold">133885297</span></p>
        </div>
      </div>

      <div class="lg:col-span-2">
        <?php if ($sent): ?>
        <div class="bg-white border border-gray-100 p-10 text-center">
          <div class="w-12 h-[3px] bg-[#C8A951] mx-auto mb-5"></div>
          <h2 class="font-display text-2xl font-bold text-[#0D1B2A] mb-3">Message Received!</h2>
          <p class="text-gray-500 mb-6">Thank you for reaching out. We'll get back to you within 1-2 working days.</p>
          <a href="contact.php" class="inline-block bg-[#C8A951] hover:bg-[#DFC06A] text-[#0D1B2A] font-bold text-xs tracking-[.16em] uppercase px-6 py-3 rounded-sm transition-colors">Send Another Message</a>
        </div>
        <?php else: ?>
        <div class="bg-white border border-gray-100 p-8 lg:p-10">
          <h2 class="font-display text-2xl font-bold text-[#0D1B2A] mb-1">Send Us a Message</h2>
          <p class="text-sm text-gray-500 mb-8">We'll respond within 1-2 working days.</p>

          <?php if ($error): ?>
          <div class="mb-6 border-l-4 border-red-400 bg-red-50 px-4 py-3 text-sm text-red-700"><?= $error ?></div>
          <?php endif; ?>

          <form method="POST" action="contact.php" class="space-y-5">
            <div class="grid sm:grid-cols-2 gap-5">
              <div>
                <label for="name" class="block font-mono text-[9.5px] tracking-[.18em] uppercase text-gray-500 mb-1.5">Full Name <span class="text-[#C8A951]">*</span></label>
                <input id="name" name="name" type="text" required placeholder="Hari Shrestha" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                       class="w-full border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#C8A951] focus:ring-1 focus:ring-[#C8A951] transition-colors"/>
              </div>
              <div>
                <label for="email" class="block font-mono text-[9.5px] tracking-[.18em] uppercase text-gray-500 mb-1.5">Email Address <span class="text-[#C8A951]">*</span></label>
                <input id="email" name="email" type="email" required placeholder="you@example.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                       class="w-full border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#C8A951] focus:ring-1 focus:ring-[#C8A951] transition-colors"/>
              </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
              <div>
                <label for="phone" class="block font-mono text-[9.5px] tracking-[.18em] uppercase text-gray-500 mb-1.5">Phone Number</label>
                <input id="phone" name="phone" type="tel" placeholder="+977-98XXXXXXXX" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>"
                       class="w-full border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#C8A951] focus:ring-1 focus:ring-[#C8A951] transition-colors"/>
              </div>
              <div>
                <label for="service" class="block font-mono text-[9.5px] tracking-[.18em] uppercase text-gray-500 mb-1.5">Service Needed</label>
                <select id="service" name="service" class="w-full border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#C8A951] focus:ring-1 focus:ring-[#C8A951] transition-colors bg-white">
                  <option value="">Select a service</option>
                  <option value="Civil and Structural Design"<?= ($_POST['service']??'')==='Civil and Structural Design'?' selected':'' ?>>Civil &amp; Structural Design</option>
                  <option value="Architectural Design"<?= ($_POST['service']??'')==='Architectural Design'?' selected':'' ?>>Architectural Design</option>
                  <option value="Construction Supervision"<?= ($_POST['service']??'')==='Construction Supervision'?' selected':'' ?>>Construction Supervision</option>
                  <option value="Soil and Site Analysis"<?= ($_POST['service']??'')==='Soil and Site Analysis'?' selected':'' ?>>Soil &amp; Site Analysis</option>
                  <option value="Cost Estimation and BOQ"<?= ($_POST['service']??'')==='Cost Estimation and BOQ'?' selected':'' ?>>Cost Estimation &amp; BOQ</option>
                  <option value="Documentation and Approvals"<?= ($_POST['service']??'')==='Documentation and Approvals'?' selected':'' ?>>Documentation &amp; Approvals</option>
                  <option value="Other"<?= ($_POST['service']??'')==='Other'?' selected':'' ?>>Other</option>
                </select>
              </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
              <div>
                <label for="area_type" class="block font-mono text-[9.5px] tracking-[.18em] uppercase text-gray-500 mb-1.5">Project Type</label>
                <select id="area_type" name="area_type" class="w-full border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#C8A951] focus:ring-1 focus:ring-[#C8A951] transition-colors bg-white">
                  <option value="">Select type</option>
                  <option value="Residential"<?= ($_POST['area_type']??'')==='Residential'?' selected':'' ?>>Residential</option>
                  <option value="Commercial"<?= ($_POST['area_type']??'')==='Commercial'?' selected':'' ?>>Commercial</option>
                  <option value="Community"<?= ($_POST['area_type']??'')==='Community'?' selected':'' ?>>Community / Civic</option>
                  <option value="Industrial"<?= ($_POST['area_type']??'')==='Industrial'?' selected':'' ?>>Industrial</option>
                  <option value="Infrastructure"<?= ($_POST['area_type']??'')==='Infrastructure'?' selected':'' ?>>Infrastructure</option>
                  <option value="Other"<?= ($_POST['area_type']??'')==='Other'?' selected':'' ?>>Other</option>
                </select>
              </div>
              <div>
                <label for="description" class="block font-mono text-[9.5px] tracking-[.18em] uppercase text-gray-500 mb-1.5">Brief Description</label>
                <input id="description" name="description" type="text" placeholder="e.g. 3-storey house, Bhaktapur" value="<?= htmlspecialchars($_POST['description'] ?? '') ?>"
                       class="w-full border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#C8A951] focus:ring-1 focus:ring-[#C8A951] transition-colors"/>
              </div>
            </div>
            <div>
              <label for="message" class="block font-mono text-[9.5px] tracking-[.18em] uppercase text-gray-500 mb-1.5">Message</label>
              <textarea id="message" name="message" rows="5" placeholder="Tell us more about your project, timeline, or any specific requirements."
                        class="w-full border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#C8A951] focus:ring-1 focus:ring-[#C8A951] transition-colors resize-none"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
            </div>
            <div class="flex items-center gap-5 pt-2">
              <button type="submit" class="bg-[#C8A951] hover:bg-[#DFC06A] text-[#0D1B2A] font-bold text-xs tracking-[.16em] uppercase px-8 py-4 rounded-sm transition-colors">Send Message</button>
              <p class="text-xs text-gray-400">We respond within 1-2 working days.</p>
            </div>
          </form>
        </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
