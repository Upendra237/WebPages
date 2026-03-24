<?php $site = site_data(); ?>
<!-- FOOTER -->
<footer class="bg-[#111C30] text-white">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 py-14 grid grid-cols-1 md:grid-cols-4 gap-10">
    <!-- Brand -->
    <div class="md:col-span-1">
      <div class="text-[20px] font-extrabold tracking-tight mb-3">Abroad<span class="text-[#E8630A]">Sewa</span></div>
      <p class="text-[13px] text-gray-400 leading-relaxed mb-5"><?= htmlspecialchars($site['tagline']) ?>. Helping Nepali students reach their dreams since <?= $site['established'] ?>.</p>
      <div class="flex gap-3">
        <a href="<?= $site['social']['facebook'] ?>" class="w-9 h-9 rounded-lg bg-white/10 flex items-center justify-center hover:bg-[#E8630A] transition-colors" aria-label="Facebook">
          <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
        </a>
        <a href="<?= $site['social']['instagram'] ?>" class="w-9 h-9 rounded-lg bg-white/10 flex items-center justify-center hover:bg-[#E8630A] transition-colors" aria-label="Instagram">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
        </a>
        <a href="<?= $site['social']['youtube'] ?>" class="w-9 h-9 rounded-lg bg-white/10 flex items-center justify-center hover:bg-[#E8630A] transition-colors" aria-label="YouTube">
          <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 00-1.95 1.96A29 29 0 001 12a29 29 0 00.46 5.58A2.78 2.78 0 003.41 19.54C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.96A29 29 0 0023 12a29 29 0 00-.46-5.58zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/></svg>
        </a>
      </div>
    </div>
    <!-- Quick links -->
    <div>
      <h4 class="text-[12px] font-bold uppercase tracking-widest text-gray-500 mb-4">Quick Links</h4>
      <ul class="space-y-2.5">
        <?php foreach ([
          [url('/'),             'Home'],
          [url('/about'),        'About Us'],
          [url('/services'),     'Services'],
          [url('/destinations'), 'Destinations'],
          [url('/testimonials'), 'Student Stories'],
          [url('/contact'),      'Contact'],
        ] as [$href, $label]): ?>
          <li><a href="<?= $href ?>" class="text-[13px] text-gray-400 hover:text-white transition-colors"><?= $label ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <!-- Destinations -->
    <div>
      <h4 class="text-[12px] font-bold uppercase tracking-widest text-gray-500 mb-4">Destinations</h4>
      <ul class="space-y-2.5">
        <?php foreach ([
          ['japan',     '🇯🇵 Japan'],
          ['australia', '🇦🇺 Australia'],
          ['canada',    '🇨🇦 Canada'],
          ['uk',        '🇬🇧 United Kingdom'],
          ['korea',     '🇰🇷 South Korea'],
        ] as [$id, $label]): ?>
          <li><a href="<?= url('/destinations/' . $id) ?>" class="text-[13px] text-gray-400 hover:text-white transition-colors"><?= $label ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <!-- Contact -->
    <div>
      <h4 class="text-[12px] font-bold uppercase tracking-widest text-gray-500 mb-4">Contact Us</h4>
      <ul class="space-y-3">
        <li class="flex gap-3 text-[13px] text-gray-400">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="mt-0.5 shrink-0"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
          <?= htmlspecialchars($site['address']) ?>
        </li>
        <li class="flex gap-3 text-[13px] text-gray-400">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="shrink-0"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 11.5a19.79 19.79 0 01-3.07-8.67A2 2 0 012 .84h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg>
          <span><?= htmlspecialchars($site['phone']) ?><br><?= htmlspecialchars($site['mobile']) ?></span>
        </li>
        <li class="flex gap-3 text-[13px] text-gray-400">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="shrink-0"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          <?= htmlspecialchars($site['email']) ?>
        </li>
      </ul>
    </div>
  </div>
  <div class="border-t border-white/10">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-5 flex flex-col md:flex-row items-center justify-between gap-3">
      <p class="text-[12px] text-gray-600">&copy; <?= date('Y') ?> <?= htmlspecialchars($site['name']) ?>. All rights reserved.</p>
      <div class="flex gap-5">
        <a href="<?= url('/privacy') ?>" class="text-[12px] text-gray-600 hover:text-white">Privacy Policy</a>
        <a href="<?= url('/terms') ?>" class="text-[12px] text-gray-600 hover:text-white">Terms of Use</a>
      </div>
    </div>
  </div>
</footer>
<script src="<?= url('/assets/js/main.js') ?>"></script>
</body>
</html>
