<?php
$page = 'destinations';
require_once 'includes/header.php';
$destinations = load_json('destinations.json');

// Check if a specific destination is requested
$slug = trim(str_replace('/destinations', '', strtok($_SERVER['REQUEST_URI'], '?')), '/');
$slug = $slug === 'destinations' ? '' : str_replace('destinations/', '', $slug);
$current = null;
if ($slug) {
    foreach ($destinations as $d) {
        if ($d['id'] === $slug) { $current = $d; break; }
    }
}

if ($current):
  $meta_title = 'Study in ' . $current['name'] . ' from Nepal';
  $meta_desc = 'Study in ' . $current['name'] . ' with Abroad Sewa. ' . $current['description'];
else:
  $meta_title = 'Study Destinations — Japan, Australia, Canada, UK & Korea';
  $meta_desc = 'Abroad Sewa sends students to Japan, Australia, Canada, UK and South Korea. Explore universities, costs, intakes, and requirements for each country.';
endif;
?>

<?php if ($current): ?>
<!-- SINGLE DESTINATION -->
<section class="bg-white border-b border-border py-14">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <a href="<?= url('/destinations') ?>" class="inline-flex items-center gap-2 text-[12px] font-semibold text-gray-400 hover:text-navy mb-6 transition-colors">
      <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
      All Destinations
    </a>
    <div class="flex items-center gap-5 mb-6">
      <span class="text-[52px]"><?= $current['flag'] ?></span>
      <div>
        <span class="sec-tag"><?= htmlspecialchars($current['badge']) ?></span>
        <h1 class="sec-h">Study in <?= htmlspecialchars($current['name']) ?></h1>
        <p class="text-[14px] text-[#E8630A] font-semibold mt-1"><?= htmlspecialchars($current['tagline']) ?></p>
      </div>
    </div>
    <p class="text-[15px] text-gray-500 max-w-3xl leading-relaxed"><?= htmlspecialchars($current['description']) ?></p>
  </div>
</section>

<section class="py-16 bg-cream">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Main content -->
    <div class="lg:col-span-2 space-y-6">
      <div class="bg-white rounded-xl border border-border p-7 fade-in">
        <h2 class="text-[18px] font-extrabold text-navy mb-5">Why study in <?= htmlspecialchars($current['name']) ?>?</h2>
        <ul class="space-y-3">
          <?php foreach ($current['why'] as $w): ?>
          <li class="flex items-start gap-3 text-[13px] text-gray-600 leading-relaxed">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8630A" stroke-width="2.5" class="mt-0.5 shrink-0"><polyline points="20 6 9 17 4 12"/></svg>
            <?= htmlspecialchars($w) ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="bg-white rounded-xl border border-border p-7 fade-in">
        <h2 class="text-[18px] font-extrabold text-navy mb-5">Admission requirements</h2>
        <ul class="space-y-3">
          <?php foreach ($current['requirements'] as $r): ?>
          <li class="flex items-start gap-3 text-[13px] text-gray-600">
            <span class="w-2 h-2 rounded-full bg-[#E8630A] mt-1.5 shrink-0"></span>
            <?= htmlspecialchars($r) ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="bg-white rounded-xl border border-border p-7 fade-in">
        <h2 class="text-[18px] font-extrabold text-navy mb-5">Popular cities</h2>
        <div class="flex flex-wrap gap-2">
          <?php foreach ($current['popular_cities'] as $city): ?>
          <span class="px-3 py-1.5 bg-cream rounded-lg text-[12px] font-semibold text-navy border border-border"><?= htmlspecialchars($city) ?></span>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-4">
      <div class="bg-white rounded-xl border border-border p-6 fade-in">
        <h3 class="text-[13px] font-extrabold text-navy uppercase tracking-wide mb-4">Quick Info</h3>
        <div class="space-y-4">
          <div>
            <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wide mb-1">Partner Universities</div>
            <div class="text-[22px] font-extrabold text-[#E8630A]"><?= $current['universities'] ?></div>
          </div>
          <div class="border-t border-border pt-4">
            <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wide mb-1">Intakes</div>
            <div class="flex flex-wrap gap-2 mt-1">
              <?php foreach ($current['intakes'] as $intake): ?>
              <span class="px-2.5 py-1 bg-orange-light text-[#C04E08] text-[11px] font-bold rounded"><?= $intake ?></span>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="border-t border-border pt-4">
            <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wide mb-1">Estimated First-Year Cost</div>
            <div class="text-[13px] font-semibold text-navy"><?= htmlspecialchars($current['cost_range']) ?></div>
          </div>
        </div>
      </div>

      <div class="bg-[#1A2744] rounded-xl p-6 fade-in">
        <h3 class="text-[14px] font-extrabold text-white mb-2">Interested in <?= htmlspecialchars($current['name']) ?>?</h3>
        <p class="text-[12px] text-white/50 mb-4 leading-relaxed">Book a free counselling session and we'll guide you through the full process.</p>
        <a href="<?= url('/contact') ?>" class="btn-orange w-full justify-center">Get Free Guidance →</a>
      </div>
    </div>
  </div>
</section>

<?php else: ?>
<!-- DESTINATIONS LIST -->
<section class="bg-white border-b border-border py-14">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">Destinations</span>
    <h1 class="sec-h mb-3">Where we send students</h1>
    <p class="text-[15px] text-gray-500 max-w-2xl leading-relaxed">
      Japan is our primary expertise — with trusted pathways to Australia, Canada, UK, and South Korea.
    </p>
  </div>
</section>

<section class="py-16 bg-cream">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 space-y-5">
    <?php foreach ($destinations as $i => $dest): ?>
    <a href="<?= url('/destinations/' . $dest['id']) ?>" class="block bg-white rounded-xl border border-border p-6 hover:-translate-y-0.5 transition-transform group fade-in">
      <div class="flex items-center gap-6">
        <div class="w-16 h-16 rounded-xl flex items-center justify-center text-[40px] shrink-0" style="background:<?= $dest['hero_color'] ?>">
          <?= $dest['flag'] ?>
        </div>
        <div class="flex-1 min-w-0">
          <div class="flex items-center gap-3 mb-1">
            <h2 class="text-[18px] font-extrabold text-navy"><?= htmlspecialchars($dest['name']) ?></h2>
            <span class="text-[10px] font-bold uppercase tracking-wide px-2.5 py-1 rounded <?= $dest['badge_type'] === 'primary' ? 'bg-orange-light text-[#C04E08]' : 'bg-cream text-gray-400' ?>">
              <?= $dest['badge'] ?>
            </span>
          </div>
          <p class="text-[13px] text-gray-500 leading-relaxed"><?= htmlspecialchars($dest['description']) ?></p>
          <div class="flex flex-wrap gap-4 mt-3">
            <span class="text-[11px] font-semibold text-gray-400"><?= $dest['universities'] ?> universities</span>
            <span class="text-[11px] font-semibold text-gray-400">Intakes: <?= implode(', ', $dest['intakes']) ?></span>
          </div>
        </div>
        <svg width="20" height="20" fill="none" stroke="#E8630A" stroke-width="2" viewBox="0 0 24 24" class="shrink-0 group-hover:translate-x-1 transition-transform"><polyline points="9 18 15 12 9 6"/></svg>
      </div>
    </a>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<!-- CTA -->
<section class="bg-[#1A2744] py-14">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 flex flex-col md:flex-row items-center justify-between gap-8">
    <div>
      <h2 class="text-[28px] font-extrabold text-white tracking-tight mb-2">Not sure which country is right for you?</h2>
      <p class="text-[13px] text-white/50">Our counselors will assess your profile and recommend the best destination.</p>
    </div>
    <a href="<?= url('/contact') ?>" class="btn-orange whitespace-nowrap">Get Expert Advice →</a>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
