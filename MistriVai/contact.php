<?php
$pageTitle = 'Contact Us &mdash; Mistri Vai Engineering Club';
$pageDesc  = 'Contact Mistri Vai Engineering Club for civil engineering services, quotes, or general enquiries.';

// Process form
$success = false;
$error   = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim(strip_tags($_POST['name']    ?? ''));
    $email   = trim(strip_tags($_POST['email']   ?? ''));
    $phone   = trim(strip_tags($_POST['phone']   ?? ''));
    $service = trim(strip_tags($_POST['service'] ?? ''));
    $message = trim(strip_tags($_POST['message'] ?? ''));

    if (!$name || !$email || !$message) {
        $error = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        $to      = 'nischitshrestha18@gmail.com';
        $subject = "New Enquiry from $name — Mistri Vai Website";
        $body    = "Name: $name\nEmail: $email\nPhone: $phone\nService: $service\n\nMessage:\n$message";
        $headers = "From: noreply@mistrivai.com\r\nReply-To: $email\r\nX-Mailer: PHP/" . phpversion();

        if (mail($to, $subject, $body, $headers)) {
            $success = true;
        } else {
            $error = 'Message could not be sent. Please try emailing us directly at mail.mistrivai@gmail.com.';
        }
    }
}
include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="bg-[#0D1B2A] py-24 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.05]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:60px 60px;"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
    <div class="flex items-center gap-3 mb-5 reveal">
      <span class="w-8 h-px bg-[#C8A951]"></span>
      <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951]">Contact</span>
    </div>
    <h1 class="font-display text-5xl sm:text-6xl font-bold text-white max-w-2xl leading-tight reveal">
      Get In Touch
    </h1>
    <p class="mt-5 text-white/50 text-lg max-w-xl reveal">
      Have a project? A question? We are glad to hear from you. We reply within 24 hours.
    </p>
  </div>
</section>

<!-- CONTACT LAYOUT -->
<section class="py-24 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 grid lg:grid-cols-5 gap-16">

    <!-- Info column -->
    <div class="lg:col-span-2 reveal">
      <h2 class="font-display text-2xl font-bold text-[#0D1B2A] mb-8">Contact Information</h2>

      <ul class="space-y-7">
        <li class="flex items-start gap-5">
          <div class="w-10 h-10 bg-[#0D1B2A] flex items-center justify-center shrink-0">
            <svg class="w-4 h-4 text-[#C8A951]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
          </div>
          <div>
            <div class="font-mono text-[10px] uppercase tracking-widest text-[#0D1B2A]/40 mb-1">Phone</div>
            <a href="tel:+9779860590678" class="text-[#0D1B2A] font-semibold hover:text-[#C8A951] transition-colors duration-200">
              +977-9860590678
            </a>
          </div>
        </li>

        <li class="flex items-start gap-5">
          <div class="w-10 h-10 bg-[#0D1B2A] flex items-center justify-center shrink-0">
            <svg class="w-4 h-4 text-[#C8A951]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
          </div>
          <div>
            <div class="font-mono text-[10px] uppercase tracking-widest text-[#0D1B2A]/40 mb-1">Email</div>
            <a href="mailto:mail.mistrivai@gmail.com" class="text-[#0D1B2A] font-semibold hover:text-[#C8A951] transition-colors duration-200">
              mail.mistrivai@gmail.com
            </a>
          </div>
        </li>

        <li class="flex items-start gap-5">
          <div class="w-10 h-10 bg-[#0D1B2A] flex items-center justify-center shrink-0">
            <svg class="w-4 h-4 text-[#C8A951]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <div>
            <div class="font-mono text-[10px] uppercase tracking-widest text-[#0D1B2A]/40 mb-1">Head Office</div>
            <p class="text-[#0D1B2A] font-semibold leading-relaxed">
              Liwali, Bhaktapur<br/>
              <span class="font-normal text-sm text-[#0D1B2A]/60">Bagmati Province, Nepal</span>
            </p>
          </div>
        </li>

        <li class="flex items-start gap-5">
          <div class="w-10 h-10 bg-[#0D1B2A] flex items-center justify-center shrink-0">
            <svg class="w-4 h-4 text-[#C8A951]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <div>
            <div class="font-mono text-[10px] uppercase tracking-widest text-[#0D1B2A]/40 mb-1">Branch Office</div>
            <p class="text-[#0D1B2A] font-semibold leading-relaxed">
              Dhulikhel-6, Kavrepalanchok<br/>
              <span class="font-normal text-sm text-[#0D1B2A]/60">Bagmati Province, Nepal</span>
            </p>
          </div>
        </li>
      </ul>

      <div class="mt-10 pt-8 border-t border-[#0D1B2A]/8">
        <div class="font-mono text-[10px] uppercase tracking-widest text-[#0D1B2A]/30 mb-4">Registration</div>
        <p class="text-[#0D1B2A]/50 text-sm">Regd. No. 15648/082/083 &nbsp;&bull;&nbsp; PAN 133885297</p>
      </div>
    </div>

    <!-- Form column -->
    <div class="lg:col-span-3 reveal">

      <?php if ($success): ?>
      <div class="bg-[#0D1B2A] border border-[#C8A951]/30 p-8 mb-8">
        <div class="text-[#C8A951] font-mono text-[10px] uppercase tracking-widest mb-3">Message Sent</div>
        <p class="text-white/80 text-base">Thank you! We have received your message and will get back to you within 24 hours.</p>
      </div>
      <?php endif; ?>

      <?php if ($error): ?>
      <div class="bg-red-900/20 border border-red-500/30 p-5 mb-8">
        <p class="text-red-400 text-sm"><?= htmlspecialchars($error) ?></p>
      </div>
      <?php endif; ?>

      <form method="POST" action="contact.php" class="space-y-6">

        <div class="grid sm:grid-cols-2 gap-6">
          <div>
            <label class="block font-mono text-[10px] uppercase tracking-[.2em] text-[#0D1B2A]/50 mb-2" for="name">
              Full Name <span class="text-[#C8A951]">*</span>
            </label>
            <input type="text" id="name" name="name" required
                   value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                   class="w-full bg-white border border-[#0D1B2A]/15 px-4 py-3 text-sm text-[#0D1B2A] placeholder:text-[#0D1B2A]/30 focus:outline-none focus:border-[#C8A951] transition-colors duration-200"
                   placeholder="Aarav Shrestha"/>
          </div>
          <div>
            <label class="block font-mono text-[10px] uppercase tracking-[.2em] text-[#0D1B2A]/50 mb-2" for="email">
              Email Address <span class="text-[#C8A951]">*</span>
            </label>
            <input type="email" id="email" name="email" required
                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                   class="w-full bg-white border border-[#0D1B2A]/15 px-4 py-3 text-sm text-[#0D1B2A] placeholder:text-[#0D1B2A]/30 focus:outline-none focus:border-[#C8A951] transition-colors duration-200"
                   placeholder="you@example.com"/>
          </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-6">
          <div>
            <label class="block font-mono text-[10px] uppercase tracking-[.2em] text-[#0D1B2A]/50 mb-2" for="phone">
              Phone Number
            </label>
            <input type="tel" id="phone" name="phone"
                   value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>"
                   class="w-full bg-white border border-[#0D1B2A]/15 px-4 py-3 text-sm text-[#0D1B2A] placeholder:text-[#0D1B2A]/30 focus:outline-none focus:border-[#C8A951] transition-colors duration-200"
                   placeholder="+977-XXXXXXXXXX"/>
          </div>
          <div>
            <label class="block font-mono text-[10px] uppercase tracking-[.2em] text-[#0D1B2A]/50 mb-2" for="service">
              Service Required
            </label>
            <select id="service" name="service"
                    class="w-full bg-white border border-[#0D1B2A]/15 px-4 py-3 text-sm text-[#0D1B2A] focus:outline-none focus:border-[#C8A951] transition-colors duration-200 appearance-none">
              <option value="">Select a service&hellip;</option>
              <?php
              $opts = ['Structural Design','Architectural Drawing','Construction Consulting','Surveying & Mapping','Water Supply & Sanitation','Cost Estimation & BOQ','General Enquiry'];
              foreach ($opts as $opt) {
                $sel = (($_POST['service'] ?? '') === $opt) ? ' selected' : '';
                echo '<option value="'.htmlspecialchars($opt).'"'.$sel.'>'.htmlspecialchars($opt).'</option>';
              }
              ?>
            </select>
          </div>
        </div>

        <div>
          <label class="block font-mono text-[10px] uppercase tracking-[.2em] text-[#0D1B2A]/50 mb-2" for="message">
            Your Message <span class="text-[#C8A951]">*</span>
          </label>
          <textarea id="message" name="message" rows="6" required
                    class="w-full bg-white border border-[#0D1B2A]/15 px-4 py-3 text-sm text-[#0D1B2A] placeholder:text-[#0D1B2A]/30 focus:outline-none focus:border-[#C8A951] transition-colors duration-200 resize-none"
                    placeholder="Tell us about your project, location, size, and what kind of help you need&hellip;"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
        </div>

        <button type="submit"
                class="w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-[#0D1B2A] hover:bg-[#172840] text-white text-sm font-bold tracking-widest uppercase px-12 py-4 transition-colors duration-200">
          Send Message
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </button>
      </form>
    </div>

  </div>
</section>

<?php include 'includes/footer.php'; ?>
