<?php
$page = 'contact';
$meta_title = 'Contact Us — Free Consultation';
$meta_desc = 'Contact Abroad Sewa for a free study abroad consultation. Visit us in Dillibazar, Kathmandu or call us today. Japan, Australia, Canada, UK placements.';
require_once 'includes/header.php';
$site = site_data();
?>

<!-- PAGE HERO -->
<section class="bg-white border-b border-border py-14">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">Contact Us</span>
    <h1 class="sec-h mb-3">Get your free consultation</h1>
    <p class="text-[15px] text-gray-500 max-w-2xl leading-relaxed">
      Talk to one of our expert counselors — completely free, no pressure. We will assess your profile and recommend the best path forward.
    </p>
  </div>
</section>

<section class="py-16 bg-cream">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 grid grid-cols-1 lg:grid-cols-5 gap-10">

    <!-- FORM -->
    <div class="lg:col-span-3 bg-white rounded-xl border border-border p-8 fade-in">
      <h2 class="text-[20px] font-extrabold text-navy mb-1">Send us a message</h2>
      <p class="text-[13px] text-gray-400 mb-7">We respond within one business day.</p>

      <form id="contact-form" class="space-y-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <div>
            <label class="block text-[12px] font-bold text-navy uppercase tracking-wide mb-2">Full Name *</label>
            <input type="text" name="name" required placeholder="Your full name"
              class="w-full px-4 py-3 rounded-lg border border-border bg-cream text-[13px] text-navy placeholder-gray-400 focus:outline-none focus:border-[#E8630A] transition-colors">
          </div>
          <div>
            <label class="block text-[12px] font-bold text-navy uppercase tracking-wide mb-2">Phone Number *</label>
            <input type="tel" name="phone" required placeholder="+977-98XXXXXXXX"
              class="w-full px-4 py-3 rounded-lg border border-border bg-cream text-[13px] text-navy placeholder-gray-400 focus:outline-none focus:border-[#E8630A] transition-colors">
          </div>
        </div>
        <div>
          <label class="block text-[12px] font-bold text-navy uppercase tracking-wide mb-2">Email Address *</label>
          <input type="email" name="email" required placeholder="your@email.com"
            class="w-full px-4 py-3 rounded-lg border border-border bg-cream text-[13px] text-navy placeholder-gray-400 focus:outline-none focus:border-[#E8630A] transition-colors">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <div>
            <label class="block text-[12px] font-bold text-navy uppercase tracking-wide mb-2">Preferred Destination</label>
            <select name="destination" class="w-full px-4 py-3 rounded-lg border border-border bg-cream text-[13px] text-navy focus:outline-none focus:border-[#E8630A] transition-colors">
              <option value="">Select a country</option>
              <option value="Japan">🇯🇵 Japan</option>
              <option value="Australia">🇦🇺 Australia</option>
              <option value="Canada">🇨🇦 Canada</option>
              <option value="UK">🇬🇧 United Kingdom</option>
              <option value="Korea">🇰🇷 South Korea</option>
              <option value="Not sure">Not sure yet</option>
            </select>
          </div>
          <div>
            <label class="block text-[12px] font-bold text-navy uppercase tracking-wide mb-2">Service Interested In</label>
            <select name="service" class="w-full px-4 py-3 rounded-lg border border-border bg-cream text-[13px] text-navy focus:outline-none focus:border-[#E8630A] transition-colors">
              <option value="">Select a service</option>
              <option value="University Selection">University Selection</option>
              <option value="Visa & Documentation">Visa & Documentation</option>
              <option value="JLPT Coaching">JLPT Coaching</option>
              <option value="Scholarship Guidance">Scholarship Guidance</option>
              <option value="Pre-Departure Support">Pre-Departure Support</option>
              <option value="General Enquiry">General Enquiry</option>
            </select>
          </div>
        </div>
        <div>
          <label class="block text-[12px] font-bold text-navy uppercase tracking-wide mb-2">Your Message</label>
          <textarea name="message" rows="4" placeholder="Tell us about your academic background and study goals..."
            class="w-full px-4 py-3 rounded-lg border border-border bg-cream text-[13px] text-navy placeholder-gray-400 focus:outline-none focus:border-[#E8630A] transition-colors resize-none"></textarea>
        </div>
        <button type="submit"
          class="w-full bg-[#E8630A] hover:bg-[#C04E08] text-white font-bold text-[14px] py-3.5 rounded-lg transition-colors">
          Send Message →
        </button>
      </form>
    </div>

    <!-- SIDEBAR INFO -->
    <div class="lg:col-span-2 space-y-5">

      <!-- Contact details -->
      <div class="bg-white rounded-xl border border-border p-6 fade-in">
        <h3 class="text-[14px] font-extrabold text-navy mb-5">Visit or call us</h3>
        <ul class="space-y-4">
          <li class="flex gap-3">
            <div class="w-9 h-9 rounded-lg bg-orange-light flex items-center justify-center shrink-0">
              <svg width="16" height="16" fill="none" stroke="#E8630A" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div>
              <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wide mb-0.5">Address</div>
              <div class="text-[13px] text-navy font-medium"><?= htmlspecialchars($site['address']) ?></div>
            </div>
          </li>
          <li class="flex gap-3">
            <div class="w-9 h-9 rounded-lg bg-orange-light flex items-center justify-center shrink-0">
              <svg width="16" height="16" fill="none" stroke="#E8630A" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 11.5a19.79 19.79 0 01-3.07-8.67A2 2 0 012 .84h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg>
            </div>
            <div>
              <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wide mb-0.5">Phone</div>
              <div class="text-[13px] text-navy font-medium"><?= htmlspecialchars($site['phone']) ?></div>
              <div class="text-[13px] text-navy font-medium"><?= htmlspecialchars($site['mobile']) ?></div>
            </div>
          </li>
          <li class="flex gap-3">
            <div class="w-9 h-9 rounded-lg bg-orange-light flex items-center justify-center shrink-0">
              <svg width="16" height="16" fill="none" stroke="#E8630A" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </div>
            <div>
              <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wide mb-0.5">Email</div>
              <div class="text-[13px] text-navy font-medium"><?= htmlspecialchars($site['email']) ?></div>
            </div>
          </li>
        </ul>
      </div>

      <!-- Office hours -->
      <div class="bg-white rounded-xl border border-border p-6 fade-in">
        <h3 class="text-[14px] font-extrabold text-navy mb-4">Office hours</h3>
        <ul class="space-y-2.5">
          <?php foreach ([
            ['Sunday – Friday', '9:00 AM – 5:30 PM'],
            ['Saturday', '10:00 AM – 3:00 PM'],
            ['Public Holidays', 'Closed'],
          ] as [$day, $time]): ?>
          <li class="flex justify-between text-[13px]">
            <span class="text-gray-500"><?= $day ?></span>
            <span class="font-semibold text-navy"><?= $time ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Why free -->
      <div class="bg-[#1A2744] rounded-xl p-6 fade-in">
        <h3 class="text-[14px] font-extrabold text-white mb-3">Why is it free?</h3>
        <p class="text-[12px] text-white/60 leading-relaxed">
          Our initial consultation is completely free. We believe every student deserves honest guidance before committing to anything. We only charge service fees once you decide to proceed with an application.
        </p>
      </div>
    </div>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
