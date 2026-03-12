<?php
$pageTitle = 'Projects — Mistri Vai Engineering';
$pageDesc  = 'Explore civil engineering and architectural projects delivered by Mistri Vai Engineering across Nepal.';
include 'includes/header.php';
?>

<!-- ═══════════════════  PAGE HERO  ═══════════════════ -->
<section class="bg-[#0D1B2A] py-20 lg:py-28 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.04]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:48px 48px"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
    <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-3">Our Work</p>
    <h1 class="font-display text-5xl lg:text-6xl font-bold text-white leading-tight max-w-2xl">
      Projects That<br/>Speak for Themselves
    </h1>
  </div>
</section>


<!-- ═══════════════════  STATS  ═══════════════════ -->
<section class="bg-white border-b border-gray-100">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid grid-cols-3 divide-x divide-gray-100">
      <?php
      $stats = [
        ['2+',  'Projects'],
        ['2',   'Districts Served'],
        ['100%','Completed On Scope'],
      ];
      foreach ($stats as [$n, $l]): ?>
      <div class="flex flex-col items-center py-10 gap-1">
        <span class="font-display text-4xl font-bold text-[#0D1B2A]"><?= $n ?></span>
        <span class="font-mono text-[11px] font-medium tracking-[.15em] uppercase text-[#C8A951]"><?= $l ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════  PROJECTS  ═══════════════════ -->
<section class="py-20 lg:py-28 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <?php
    $projects = json_decode(file_get_contents(__DIR__ . '/data/projects.json'), true) ?? [];
    foreach ($projects as $p):
      $title    = htmlspecialchars($p['title']);
      $desc     = htmlspecialchars($p['description']);
      $cat      = htmlspecialchars($p['category']);
      $status   = htmlspecialchars($p['status']);
      $loc      = htmlspecialchars($p['location']);
      $type     = htmlspecialchars($p['type']);
      $services = htmlspecialchars($p['services']);
      $bg       = $p['accent'];
      $district = htmlspecialchars($p['district_label']);
      $extraKey = isset($p['contract_date']) ? 'Contract Date' : 'Services';
      $extraVal = isset($p['contract_date']) ? htmlspecialchars($p['contract_date']) : $services;
    ?>
    <div class="bg-white border border-gray-100 mb-8 overflow-hidden hover:shadow-md transition-shadow">
      <div class="grid lg:grid-cols-5">
        <?php $imgFile = !empty($p['image']) ? $p['image'] : null; $hasImg = $imgFile && file_exists(__DIR__ . '/' . $imgFile); ?>
        <div class="lg:col-span-2 min-h-[280px] overflow-hidden relative" style="background-color:<?= $bg ?>">
          <?php if ($hasImg): ?>
          <img src="<?= htmlspecialchars($imgFile) ?>" alt="<?= $title ?>"
               class="w-full h-full object-cover absolute inset-0"/>
          <div class="absolute inset-0 bg-[#0D1B2A]/40"></div>
          <div class="absolute bottom-4 left-6">
            <p class="font-mono text-[9px] tracking-[.2em] uppercase text-[#C8A951]"><?= $district ?></p>
          </div>
          <?php else: ?>
          <div class="h-full min-h-[280px] flex items-center justify-center">
            <div class="text-center px-8">
              <div class="w-12 h-[3px] bg-[#C8A951] mx-auto mb-4"></div>
              <p class="font-mono text-[9.5px] tracking-[.2em] uppercase text-[#C8A951]"><?= $district ?></p>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <div class="lg:col-span-3 p-8 lg:p-10">
          <div class="flex flex-wrap items-center gap-3 mb-4">
            <span class="font-mono text-[9.5px] tracking-[.18em] uppercase text-white bg-[#C8A951] px-2.5 py-1"><?= $cat ?></span>
            <span class="font-mono text-[11px] font-medium tracking-[.15em] uppercase text-[#C8A951]"><?= $status ?></span>
          </div>
          <h2 class="font-display text-2xl lg:text-3xl font-bold text-[#0D1B2A] mb-4"><?= $title ?></h2>
          <p class="text-gray-500 leading-relaxed mb-6"><?= $desc ?></p>
          <div class="grid sm:grid-cols-2 gap-4 mt-4">
            <?php
            $details = [
              ['Location', $loc],
              ['Type',     $type],
              [$extraKey,  $extraVal],
              ['Status',   'In Progress'],
            ];
            foreach ($details as [$k, $v]): ?>
            <div>
              <p class="font-mono text-[10px] font-medium tracking-[.18em] uppercase text-[#C8A951] mb-0.5"><?= $k ?></p>
              <p class="text-sm font-medium text-[#0D1B2A]"><?= $v ?></p>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

  </div>
</section>


<!-- ═══════════════════  CTA  ═══════════════════ -->
<section class="bg-[#0D1B2A] py-14">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-6">
    <div>
      <h2 class="font-display text-2xl font-bold text-white">Have a project in mind?</h2>
      <p class="text-white/50 text-sm mt-1">Tell us about it — we'd love to be involved.</p>
    </div>
    <a href="contact.php"
       class="shrink-0 bg-[#C8A951] hover:bg-[#DFC06A] text-[#0D1B2A] font-bold text-xs tracking-[.16em] uppercase px-8 py-4 rounded-sm transition-colors">
      Start a Conversation
    </a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
