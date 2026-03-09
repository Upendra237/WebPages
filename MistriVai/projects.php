<?php
$pageTitle = 'Projects — Mistri Vai Engineering Club';
$pageDesc  = 'Explore civil engineering and architectural projects delivered by Mistri Vai Engineering Club across Nepal.';
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
        <span class="font-mono text-[9.5px] tracking-[.18em] uppercase text-[#C8A951]"><?= $l ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════  PROJECTS  ═══════════════════ -->
<section class="py-20 lg:py-28 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <!-- Project 1 -->
    <div class="bg-white border border-gray-100 mb-8 overflow-hidden hover:shadow-md transition-shadow">
      <div class="grid lg:grid-cols-5">
        <!-- Image placeholder -->
        <div class="lg:col-span-2 bg-[#0D1B2A] min-h-[240px] flex items-center justify-center">
          <div class="text-center px-8">
            <div class="w-12 h-[3px] bg-[#C8A951] mx-auto mb-4"></div>
            <p class="font-mono text-[9.5px] tracking-[.2em] uppercase text-[#C8A951]">Bhaktapur</p>
          </div>
        </div>
        <!-- Content -->
        <div class="lg:col-span-3 p-8 lg:p-10">
          <div class="flex flex-wrap items-center gap-3 mb-4">
            <span class="font-mono text-[9.5px] tracking-[.18em] uppercase text-white bg-[#C8A951] px-2.5 py-1">Community</span>
            <span class="font-mono text-[9.5px] tracking-[.18em] uppercase text-[#C8A951]">Active</span>
          </div>
          <h2 class="font-display text-2xl lg:text-3xl font-bold text-[#0D1B2A] mb-4">
            Nawadurga Devghad Bhaban
          </h2>
          <p class="text-gray-500 leading-relaxed mb-6">
            A community hall and cultural building project in Bhaktapur — designed
            for ceremony, civic gatherings, and community pride. Mistri Vai provided
            full structural design, architectural drawings, BOQ preparation, and
            on-site construction supervision.
          </p>
          <div class="grid sm:grid-cols-2 gap-4 mt-4">
            <?php
            $details1 = [
              ['Location',  'Bhaktapur, Bagmati Province'],
              ['Type',      'Community / Cultural Building'],
              ['Services',  'Design, Supervision &amp; Documentation'],
              ['Status',    'In Progress'],
            ];
            foreach ($details1 as [$k, $v]): ?>
            <div>
              <p class="font-mono text-[9px] tracking-[.2em] uppercase text-[#C8A951] mb-0.5"><?= $k ?></p>
              <p class="text-sm font-medium text-[#0D1B2A]"><?= $v ?></p>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Project 2 -->
    <div class="bg-white border border-gray-100 mb-8 overflow-hidden hover:shadow-md transition-shadow">
      <div class="grid lg:grid-cols-5">
        <!-- Image placeholder -->
        <div class="lg:col-span-2 bg-[#172840] min-h-[240px] flex items-center justify-center">
          <div class="text-center px-8">
            <div class="w-12 h-[3px] bg-[#C8A951] mx-auto mb-4"></div>
            <p class="font-mono text-[9.5px] tracking-[.2em] uppercase text-[#C8A951]">Kavre</p>
          </div>
        </div>
        <!-- Content -->
        <div class="lg:col-span-3 p-8 lg:p-10">
          <div class="flex flex-wrap items-center gap-3 mb-4">
            <span class="font-mono text-[9.5px] tracking-[.18em] uppercase text-white bg-[#C8A951] px-2.5 py-1">Residential</span>
            <span class="font-mono text-[9.5px] tracking-[.18em] uppercase text-[#C8A951]">Signed 2082 Kartik</span>
          </div>
          <h2 class="font-display text-2xl lg:text-3xl font-bold text-[#0D1B2A] mb-4">
            Kera Ghari Residential Building
          </h2>
          <p class="text-gray-500 leading-relaxed mb-6">
            A multi-storey residential building project signed in 2082 Kartik 14.
            Mistri Vai is responsible for structural design, architectural plans,
            and full construction supervision — delivering comfortable, code-compliant
            modern housing in Kavre district.
          </p>
          <div class="grid sm:grid-cols-2 gap-4 mt-4">
            <?php
            $details2 = [
              ['Location',    'Dhulikhel-6, Kavre'],
              ['Type',        'Residential Multi-storey'],
              ['Contract Date', '2082 Kartik 14 (B.S.)'],
              ['Status',      'In Progress'],
            ];
            foreach ($details2 as [$k, $v]): ?>
            <div>
              <p class="font-mono text-[9px] tracking-[.2em] uppercase text-[#C8A951] mb-0.5"><?= $k ?></p>
              <p class="text-sm font-medium text-[#0D1B2A]"><?= $v ?></p>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

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
