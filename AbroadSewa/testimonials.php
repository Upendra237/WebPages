<?php
$page = 'testimonials';
$meta_title = 'Student Stories — 3500+ Success Stories';
$meta_desc = 'Read real testimonials from Abroad Sewa students who are now studying in Japan, Australia, Canada and the UK. 3500+ success stories and counting.';
require_once 'includes/header.php';
$all = load_json('testimonials.json');
$destinations = load_json('destinations.json');
$countries = array_unique(array_column($all, 'country'));
sort($countries);
?>

<!-- PAGE HERO -->
<section class="bg-white border-b border-border py-14">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">Student Stories</span>
    <h1 class="sec-h mb-3">Real students. Real results.</h1>
    <p class="text-[15px] text-gray-500 max-w-2xl leading-relaxed">
      Over 3,500 students have trusted Abroad Sewa with their future. Here are some of their stories — in their own words.
    </p>
  </div>
</section>

<!-- STATS BAR -->
<div class="bg-cream border-b border-border">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 grid grid-cols-2 md:grid-cols-4 divide-x divide-border">
    <?php foreach ([['3,500+','Students placed'],['98%','Visa success'],['12+','Years of service'],['120+','Partner universities']] as [$n,$l]): ?>
    <div class="py-6 text-center">
      <div class="text-[24px] font-extrabold text-[#E8630A] tracking-tight"><?= $n ?></div>
      <div class="text-[11px] text-gray-400 font-medium mt-0.5"><?= $l ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- FILTER + TESTIMONIALS -->
<section class="py-14 bg-cream">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <!-- Filter buttons -->
    <div class="flex flex-wrap gap-2 mb-10">
      <button data-filter="all" class="bg-[#E8630A] text-white px-4 py-2 rounded-lg text-[12px] font-bold uppercase tracking-wide transition-colors">
        All Countries
      </button>
      <?php foreach ($countries as $c): ?>
      <button data-filter="<?= htmlspecialchars($c) ?>" class="bg-white text-gray-500 border border-border px-4 py-2 rounded-lg text-[12px] font-bold uppercase tracking-wide hover:bg-cream transition-colors">
        <?= htmlspecialchars($c) ?>
      </button>
      <?php endforeach; ?>
    </div>

    <!-- Testimonial grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5" id="testimonials-grid">
      <?php foreach ($all as $t): ?>
      <div class="bg-white rounded-xl border border-border p-6 flex flex-col fade-in" data-country="<?= htmlspecialchars($t['country']) ?>">
        <!-- Stars -->
        <div class="flex gap-1 mb-4"><?= stars($t['rating']) ?></div>

        <!-- Quote mark -->
        <div class="text-[40px] font-extrabold text-orange-light leading-none mb-1" aria-hidden="true">"</div>

        <!-- Short quote -->
        <p class="text-[14px] font-semibold text-navy leading-relaxed mb-3"><?= htmlspecialchars($t['short']) ?></p>

        <!-- Full quote -->
        <p class="text-[12px] text-gray-500 leading-relaxed flex-1 mb-5"><?= htmlspecialchars($t['full']) ?></p>

        <!-- Footer -->
        <div class="border-t border-border pt-4 flex items-center justify-between gap-3">
          <div>
            <div class="flex items-center gap-2 mb-0.5">
              <div class="w-7 h-7 rounded-full bg-orange-light flex items-center justify-center text-[#E8630A] font-extrabold text-[10px]">
                <?= mb_strtoupper(mb_substr($t['name'], 0, 1)) ?>
              </div>
              <div class="text-[13px] font-bold text-navy"><?= htmlspecialchars($t['name']) ?></div>
            </div>
            <div class="text-[11px] text-[#E8630A] font-semibold"><?= htmlspecialchars($t['location']) ?></div>
            <div class="text-[10px] text-gray-400 mt-0.5"><?= htmlspecialchars($t['program']) ?> · <?= htmlspecialchars($t['year']) ?></div>
          </div>
          <span class="shrink-0 px-2.5 py-1 bg-cream rounded text-[10px] font-bold uppercase tracking-wide text-gray-400 border border-border">
            <?= htmlspecialchars($t['country']) ?>
          </span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Empty state (shown via JS) -->
    <div id="no-results" class="hidden text-center py-16 text-gray-400 text-[14px] font-medium">
      No testimonials found for the selected filter.
    </div>
  </div>
</section>

<!-- SHARE YOUR STORY -->
<section class="py-14 bg-white border-t border-border">
  <div class="max-w-2xl mx-auto px-6 text-center">
    <span class="sec-tag">Share Your Story</span>
    <h2 class="sec-h mb-3">Are you one of our students?</h2>
    <p class="text-[14px] text-gray-500 mb-8 leading-relaxed">
      We would love to hear about your experience! Share your journey and inspire the next generation of students.
    </p>
    <a href="/contact" class="btn-orange">Share Your Story →</a>
  </div>
</section>

<!-- CTA -->
<section class="bg-[#1A2744] py-14">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 flex flex-col md:flex-row items-center justify-between gap-8">
    <div>
      <h2 class="text-[28px] font-extrabold text-white tracking-tight mb-2">You could be our next success story.</h2>
      <p class="text-[13px] text-white/50">Book a free counselling session and start writing your journey today.</p>
    </div>
    <a href="/contact" class="btn-orange whitespace-nowrap">Start Your Journey →</a>
  </div>
</section>

<script>
// Enhanced filter with empty state
const filterBtns = document.querySelectorAll('[data-filter]');
const grid = document.getElementById('testimonials-grid');
const noResults = document.getElementById('no-results');

filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    const val = btn.dataset.filter;
    filterBtns.forEach(b => {
      b.classList.remove('bg-[#E8630A]', 'text-white');
      b.classList.add('bg-white', 'text-gray-500');
    });
    btn.classList.add('bg-[#E8630A]', 'text-white');
    btn.classList.remove('bg-white', 'text-gray-500');
    let visible = 0;
    document.querySelectorAll('[data-country]').forEach(card => {
      const show = val === 'all' || card.dataset.country === val;
      card.style.display = show ? '' : 'none';
      if (show) visible++;
    });
    noResults.classList.toggle('hidden', visible > 0);
    if (grid) grid.classList.toggle('hidden', visible === 0);
  });
});
</script>

<?php require_once 'includes/footer.php'; ?>
