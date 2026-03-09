<?php
$pageTitle = 'Team — Mistri Vai Engineering Club';
$pageDesc  = 'Meet the engineering team behind Mistri Vai — qualified civil engineering professionals from Nepal.';
include 'includes/header.php';
?>

<!-- ═══════════════════  PAGE HERO  ═══════════════════ -->
<section class="bg-[#0D1B2A] py-20 lg:py-28 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.04]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:48px 48px"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
    <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-3">The Team</p>
    <h1 class="font-display text-5xl lg:text-6xl font-bold text-white leading-tight max-w-2xl">
      Qualified Engineers.<br/>Shared Purpose.
    </h1>
  </div>
</section>


<!-- ═══════════════════  INTRO  ═══════════════════ -->
<section class="py-14 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <p class="max-w-2xl text-gray-500 leading-relaxed text-lg">
      Mistri Vai is led by a team of five qualified civil engineering professionals — 
      each bringing expertise across structural design, architectural planning, 
      construction management, and technology.
    </p>
  </div>
</section>


<!-- ═══════════════════  TEAM GRID  ═══════════════════ -->
<section class="pb-20 lg:pb-28 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      $team = [
        [
          'Nischit Gajyaju',
          'Founder &amp; President',
          'Leads the club\'s vision, operations, and client relationships. Oversees project delivery and maintains quality standards across all engagements.',
          '#0D1B2A',
          'NG',
        ],
        [
          'Nishan Makaju',
          'Chief Engineering Consultant &amp; MD',
          'Heads all technical engineering work — structural analysis, design review, and construction supervision protocols.',
          '#172840',
          'NM',
        ],
        [
          'Subichhya Khagi',
          'General Manager',
          'Manages internal operations, documentation, client onboarding, and team coordination across active projects.',
          '#1E3353',
          'SK',
        ],
        [
          'Ayush Singh',
          'Chief Architect',
          'Responsible for all architectural design work — space planning, elevations, 3D visualisations, and aesthetic direction.',
          '#0D1B2A',
          'AS',
        ],
        [
          'Milan Suncheuri',
          'Chief Technology Officer',
          'Manages CAD workflows, digital documentation systems, and technology tools that support the engineering team.',
          '#172840',
          'MS',
        ],
      ];
      foreach ($team as [$name, $role, $bio, $bg, $initials]): ?>
      <div class="bg-white border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group">
        <!-- Avatar area -->
        <div class="h-36 flex items-center justify-center" style="background-color:<?= $bg ?>">
          <div class="w-16 h-16 rounded-full border-2 border-[#C8A951]/50 flex items-center justify-center">
            <span class="font-display text-xl font-bold text-[#C8A951]"><?= $initials ?></span>
          </div>
        </div>
        <!-- Content -->
        <div class="p-6">
          <h3 class="font-display text-lg font-semibold text-[#0D1B2A] group-hover:text-[#C8A951] transition-colors">
            <?= $name ?>
          </h3>
          <p class="font-mono text-[9.5px] tracking-[.18em] uppercase text-[#C8A951] mt-1 mb-3">
            <?= $role ?>
          </p>
          <p class="text-sm text-gray-500 leading-relaxed"><?= $bio ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════  CULTURE STRIP  ═══════════════════ -->
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid sm:grid-cols-3 gap-6 text-center">
      <?php
      $culture = [
        ['5', 'Core Team Members'],
        ['2', 'Districts Served'],
        ['2082', 'Established (B.S.)'],
      ];
      foreach ($culture as [$n, $l]): ?>
      <div class="border border-gray-100 py-10">
        <p class="font-display text-4xl font-bold text-[#0D1B2A]"><?= $n ?></p>
        <p class="font-mono text-[9.5px] tracking-[.18em] uppercase text-[#C8A951] mt-2"><?= $l ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════  CTA  ═══════════════════ -->
<section class="bg-[#C8A951] py-14">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-6">
    <div>
      <h2 class="font-display text-2xl font-bold text-[#0D1B2A]">Work with our team.</h2>
      <p class="text-[#0D1B2A]/60 text-sm mt-1">Reach out and discuss your project today.</p>
    </div>
    <a href="contact.php"
       class="shrink-0 bg-[#0D1B2A] hover:bg-[#172840] text-white font-bold text-xs tracking-[.16em] uppercase px-8 py-4 rounded-sm transition-colors">
      Contact Us
    </a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
