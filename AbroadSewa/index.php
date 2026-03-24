<?php
$page = 'home';
$meta_title = 'Study in Japan & Abroad from Nepal';
$meta_desc = 'Abroad Sewa is Nepal\'s leading Japan education consultancy. Expert visa support, JLPT coaching, university placement and scholarships. 3500+ students placed. 98% visa success.';
require_once 'includes/header.php';
$services = array_slice(load_json('services.json'), 0, 6);
$destinations = load_json('destinations.json');
$testimonials = array_slice(load_json('testimonials.json'), 0, 3);
?>

<!-- HERO -->
<section class="bg-white border-b border-border">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16 lg:py-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
    <div>
      <div class="inline-flex items-center gap-2 bg-orange-light rounded-full px-4 py-2 mb-6">
        <span class="w-2 h-2 rounded-full bg-[#E8630A]"></span>
        <span class="text-[11px] font-bold text-[#C04E08] uppercase tracking-widest">Nepal's Trusted Japan Education Consultant</span>
      </div>
      <h1 class="text-[42px] lg:text-[52px] font-extrabold text-navy leading-[1.08] tracking-tight mb-5">
        Your Future<br>Starts in <span class="text-[#E8630A]">Japan.</span>
      </h1>
      <p class="text-[15px] text-gray-500 leading-relaxed max-w-md mb-8">
        We help ambitious students navigate university placement, visa approvals, scholarships, and language training — mostly Japan, and across the world.
      </p>
      <div class="flex flex-wrap gap-3">
        <a href="/contact" class="btn-orange">Start Your Journey →</a>
        <a href="/destinations" class="btn-ghost">Explore Universities</a>
      </div>
    </div>
    <div class="bg-cream rounded-2xl p-7 border border-border">
      <p class="text-[11px] font-bold uppercase tracking-widest text-gray-400 mb-5">Our track record</p>
      <div class="grid grid-cols-2 gap-4">
        <?php foreach ([
          ['3500', '+', 'Students placed'],
          ['98', '%', 'Visa success rate'],
          ['120', '+', 'Partner universities'],
          ['14', 'yrs', 'In operation'],
        ] as [$num, $suf, $lbl]): ?>
        <div class="bg-white rounded-xl p-4 border border-border">
          <div class="text-[28px] font-extrabold text-navy tracking-tight">
            <span data-target="<?= $num ?>" data-suffix="<?= $suf ?>"><?= $num . $suf ?></span>
          </div>
          <div class="text-[11px] text-gray-400 font-medium mt-1"><?= $lbl ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- RIBBON -->
<div class="bg-navy overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <div class="flex divide-x divide-white/10 overflow-x-auto">
      <?php foreach (['JLPT Coaching', 'MEXT Scholarships', 'Embassy-Ready Docs', 'Post-Arrival Support', 'COE Assistance', 'Pre-Departure Prep'] as $item): ?>
        <div class="flex-1 text-center py-3 px-4 text-[11px] font-bold text-white/50 uppercase tracking-widest whitespace-nowrap"><?= $item ?></div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- DESTINATIONS -->
<section class="py-16 bg-cream">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">Destinations</span>
    <h2 class="sec-h mb-2">Where we send students</h2>
    <p class="text-[13px] text-gray-400 font-medium mb-8">Primarily Japan — with trusted pathways to other top study destinations</p>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
      <?php foreach ($destinations as $dest): ?>
      <a href="/destinations/<?= $dest['id'] ?>" class="card hover:-translate-y-1 transition-transform overflow-hidden group fade-in">
        <div class="h-20 flex items-center justify-center text-[36px]" style="background:<?= $dest['hero_color'] ?>">
          <?= $dest['flag'] ?>
        </div>
        <div class="p-4">
          <div class="text-[14px] font-bold text-navy mb-0.5"><?= htmlspecialchars($dest['name']) ?></div>
          <div class="text-[11px] text-gray-400 font-medium"><?= $dest['universities'] ?> universities</div>
          <span class="inline-block mt-2 text-[10px] font-bold uppercase tracking-wide px-2.5 py-1 rounded <?= $dest['badge_type'] === 'primary' ? 'bg-orange-light text-[#C04E08]' : 'bg-cream text-gray-400' ?>">
            <?= $dest['badge'] ?>
          </span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="py-16 bg-white border-y border-border">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">Process</span>
    <h2 class="sec-h mb-2">Your journey in 4 steps</h2>
    <p class="text-[13px] text-gray-400 font-medium mb-10">Simple, guided, and stress-free from day one</p>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-0 border border-border rounded-xl overflow-hidden">
      <?php foreach ([
        ['1','Free Counselling','Meet our advisors and map your study goals and budget.'],
        ['2','University Match','We shortlist universities that perfectly fit your profile.'],
        ['3','Visa & Docs','We prepare every document for a smooth visa approval.'],
        ['4','Fly & Settle','We support you even after you land in your new country.'],
      ] as $i => [$n, $t, $d]): ?>
      <div class="p-7 <?= $i < 3 ? 'border-b md:border-b-0 md:border-r border-border' : '' ?> fade-in">
        <div class="w-11 h-11 rounded-full bg-orange-light flex items-center justify-center text-[15px] font-extrabold text-[#E8630A] mb-5"><?= $n ?></div>
        <div class="text-[14px] font-bold text-navy mb-2"><?= $t ?></div>
        <div class="text-[12px] text-gray-400 leading-relaxed"><?= $d ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section class="py-16 bg-cream">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">Services</span>
    <h2 class="sec-h mb-2">Everything you need to get there</h2>
    <p class="text-[13px] text-gray-400 font-medium mb-10">End-to-end support from first inquiry to first day of class</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <?php foreach ($services as $s): ?>
      <div class="bg-cream border border-border rounded-xl p-6 hover:bg-white transition-colors fade-in">
        <div class="text-[11px] font-extrabold text-[#E8630A] uppercase tracking-widest mb-3"><?= $s['number'] ?> — <?= $s['category'] ?></div>
        <div class="text-[15px] font-bold text-navy mb-2"><?= htmlspecialchars($s['title']) ?></div>
        <div class="text-[12px] text-gray-500 leading-relaxed"><?= htmlspecialchars($s['short']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="mt-8 text-center">
      <a href="/services" class="btn-navy">View All Services →</a>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="py-16 bg-white border-y border-border">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">Student Stories</span>
    <h2 class="sec-h mb-2">Heard from our students</h2>
    <p class="text-[13px] text-gray-400 font-medium mb-10">Real results from real people we have helped</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
      <?php foreach ($testimonials as $t): ?>
      <div class="card p-6 fade-in">
        <div class="flex gap-1 mb-4"><?= stars($t['rating']) ?></div>
        <p class="text-[13px] text-gray-600 leading-relaxed mb-5">"<?= htmlspecialchars($t['short']) ?>"</p>
        <div class="border-t border-border pt-4">
          <div class="text-[12px] font-bold text-navy"><?= htmlspecialchars($t['name']) ?></div>
          <div class="text-[11px] text-[#E8630A] font-semibold mt-0.5"><?= htmlspecialchars($t['location']) ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="mt-8 text-center">
      <a href="/testimonials" class="btn-ghost">Read All Stories →</a>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bg-[#1A2744] py-16">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 flex flex-col md:flex-row items-center justify-between gap-8">
    <div>
      <h2 class="text-[30px] font-extrabold text-white tracking-tight mb-2">Ready to study in Japan?</h2>
      <p class="text-[13px] text-white/50">Book a free counselling session — no obligation, no pressure.</p>
    </div>
    <a href="/contact" class="btn-orange whitespace-nowrap">Book a Free Session →</a>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
