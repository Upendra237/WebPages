<?php
$page = 'services';
$meta_title = 'Our Services — Visa, JLPT, Scholarships & More';
$meta_desc = 'Abroad Sewa offers complete study abroad services: university selection, visa documentation, JLPT coaching, MEXT scholarship guidance, pre-departure and post-arrival support.';
require_once 'includes/header.php';
$services = load_json('services.json');
$faqs = load_json('faqs.json');
?>

<!-- PAGE HERO -->
<section class="bg-white border-b border-border py-14">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">Services</span>
    <h1 class="sec-h mb-3">Everything you need to get there</h1>
    <p class="text-[15px] text-gray-500 max-w-2xl leading-relaxed">
      From your first inquiry to your first day of class abroad — we handle everything so you can focus on your future.
    </p>
  </div>
</section>

<!-- SERVICES GRID -->
<section class="py-16 bg-cream">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <?php foreach ($services as $s): ?>
      <div class="bg-white rounded-xl border border-border p-7 fade-in" id="<?= $s['id'] ?>">
        <div class="flex items-start justify-between mb-5">
          <div>
            <div class="text-[11px] font-extrabold text-[#E8630A] uppercase tracking-widest mb-2"><?= $s['number'] ?> — <?= $s['category'] ?></div>
            <h2 class="text-[20px] font-extrabold text-navy"><?= htmlspecialchars($s['title']) ?></h2>
          </div>
          <div class="w-12 h-12 rounded-xl bg-orange-light flex items-center justify-center shrink-0 ml-4">
            <span class="text-[#E8630A] font-extrabold text-[16px]"><?= $s['number'] ?></span>
          </div>
        </div>
        <p class="text-[13px] text-gray-500 leading-relaxed mb-5"><?= htmlspecialchars($s['description']) ?></p>
        <div class="border-t border-border pt-5">
          <p class="text-[11px] font-bold uppercase tracking-widest text-gray-400 mb-3">What's included</p>
          <ul class="grid grid-cols-2 gap-2">
            <?php foreach ($s['features'] as $f): ?>
            <li class="flex items-center gap-2 text-[12px] text-gray-600">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#E8630A" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
              <?= htmlspecialchars($f) ?>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="py-16 bg-white border-t border-border">
  <div class="max-w-4xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">FAQ</span>
    <h2 class="sec-h mb-10">Frequently asked questions</h2>
    <div class="space-y-3">
      <?php foreach ($faqs as $faq): ?>
      <details class="faq-item bg-cream rounded-xl border border-border group">
        <summary class="flex items-center justify-between px-6 py-4 text-[14px] font-bold text-navy">
          <?= htmlspecialchars($faq['q']) ?>
          <svg class="w-5 h-5 text-[#E8630A] shrink-0 ml-4 group-open:rotate-45 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        </summary>
        <div class="px-6 pb-5 text-[13px] text-gray-500 leading-relaxed border-t border-border pt-4"><?= htmlspecialchars($faq['a']) ?></div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bg-[#1A2744] py-14">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 flex flex-col md:flex-row items-center justify-between gap-8">
    <div>
      <h2 class="text-[28px] font-extrabold text-white tracking-tight mb-2">Not sure where to start?</h2>
      <p class="text-[13px] text-white/50">Book a free session and we will guide you through everything — no obligation.</p>
    </div>
    <a href="<?= url('/contact') ?>" class="btn-orange whitespace-nowrap">Book Free Consultation →</a>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
