<?php
$pageTitle = 'Services — Mistri Vai Engineering';
$pageDesc  = 'Civil engineering, architectural design, structural analysis, construction supervision and more — delivered by Mistri Vai Engineering, Nepal.';
include 'includes/header.php';
?>

<!-- ═══════════════════  PAGE HERO  ═══════════════════ -->
<section class="bg-[#0D1B2A] py-20 lg:py-28 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.04]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:48px 48px"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
    <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-3">Our Services</p>
    <h1 class="font-display text-5xl lg:text-6xl font-bold text-white leading-tight max-w-2xl">
      Engineering Solutions<br/>Tailored for You
    </h1>
  </div>
</section>


<!-- ═══════════════════  INTRO  ═══════════════════ -->
<section class="py-16 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <p class="max-w-2xl text-gray-500 leading-relaxed text-lg">
      From the first site survey to the final inspection, Mistri Vai provides end-to-end
      engineering services — backed by qualified professionals and grounded in Nepal's
      local codes, terrain, and community contexts.
    </p>
  </div>
</section>


<!-- ═══════════════════  SERVICES GRID  ═══════════════════ -->
<section class="pb-24 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      $services = json_decode(file_get_contents(__DIR__ . '/data/services.json'), true) ?? [];
      foreach ($services as $svc):
        $title   = htmlspecialchars($svc['title']);
        $desc    = htmlspecialchars($svc['description']);
        $bullets = $svc['bullets'] ?? [];
      ?>
      <div class="bg-white border border-gray-100 p-7 hover:shadow-md transition-shadow duration-200 flex flex-col">
        <div class="w-8 h-[2px] bg-[#C8A951] mb-5"></div>
        <h3 class="font-display text-xl font-semibold text-[#0D1B2A] mb-3"><?= $title ?></h3>
        <p class="text-sm text-gray-500 leading-relaxed mb-5"><?= $desc ?></p>
        <ul class="mt-auto space-y-2">
          <?php foreach ($bullets as $b): ?>
          <li class="flex items-center gap-2 text-xs text-gray-400">
            <span class="w-1 h-1 rounded-full bg-[#C8A951] shrink-0"></span>
            <?= $b ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════  PROCESS  ═══════════════════ -->
<section class="py-20 lg:py-28 bg-white">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-3">How We Work</p>
    <h2 class="font-display text-4xl font-bold text-[#0D1B2A] mb-12 max-w-xl">
      A clear, transparent process from day one.
    </h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php
      $steps = [
        ['01', 'Consultation',   'We meet or call to understand your project scope, timeline, budget, and goals.'],
        ['02', 'Site Assessment', 'Our engineers visit the site, review conditions, and prepare an assessment report.'],
        ['03', 'Design &amp; Docs', 'Complete structural and architectural drawings, BOQ, and permit documents delivered.'],
        ['04', 'Delivery',        'Construction supervision or handover of complete document set, with full support.'],
      ];
      foreach ($steps as [$num, $title, $text]): ?>
      <div class="border border-gray-100 p-6 relative">
        <span class="font-mono text-5xl font-bold text-gray-100 select-none absolute top-4 right-5"><?= $num ?></span>
        <div class="w-6 h-[2px] bg-[#C8A951] mb-4"></div>
        <h4 class="font-semibold text-[#0D1B2A] mb-2"><?= $title ?></h4>
        <p class="text-sm text-gray-500 leading-relaxed"><?= $text ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════  CTA  ═══════════════════ -->
<section class="bg-[#C8A951] py-14">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-6">
    <div>
      <h2 class="font-display text-2xl font-bold text-[#0D1B2A]">Start your project with Mistri Vai.</h2>
      <p class="text-[#0D1B2A]/60 text-sm mt-1">Free initial consultation — no obligation.</p>
    </div>
    <a href="contact.php"
       class="shrink-0 bg-[#0D1B2A] hover:bg-[#172840] text-white font-bold text-xs tracking-[.16em] uppercase px-8 py-4 rounded-sm transition-colors">
      Get in Touch
    </a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
