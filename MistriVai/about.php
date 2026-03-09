<?php
$pageTitle = 'About — Mistri Vai Engineering Club';
$pageDesc  = 'Learn about Mistri Vai Engineering Club — our mission, story, team milestones, and registered consultancy information.';
include 'includes/header.php';
?>

<!-- ═══════════════════  PAGE HERO  ═══════════════════ -->
<section class="bg-[#0D1B2A] py-20 lg:py-28 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.04]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:48px 48px"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
    <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-3">About Us</p>
    <h1 class="font-display text-5xl lg:text-6xl font-bold text-white leading-tight max-w-2xl">
      Engineering Club<br/>with a Purpose
    </h1>
  </div>
</section>


<!-- ═══════════════════  MISSION  ═══════════════════ -->
<section class="py-20 lg:py-28 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-16 items-start">

      <div>
        <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-3">Our Mission</p>
        <h2 class="font-display text-4xl font-bold text-[#0D1B2A] leading-tight mb-6">
          Precision-built for Nepal's future.
        </h2>
        <p class="text-gray-500 leading-relaxed mb-5">
          Mistri Vai Engineering Club was founded by a group of civil engineering graduates
          determined to bridge the gap between qualified technical knowledge and Nepal's
          growing construction needs — especially in communities often overlooked by
          larger consultancies.
        </p>
        <p class="text-gray-500 leading-relaxed">
          Our approach combines formal engineering rigour with on-the-ground empathy.
          Every structure we design or supervise reflects our commitment to safety,
          sustainability, and the pride of the people who will live and work in them.
        </p>
      </div>

      <!-- Values -->
      <div class="grid grid-cols-2 gap-4">
        <?php
        $values = [
          ['Safety First',      'No shortcuts. Every design meets or exceeds Nepal's building code standards.'],
          ['Community-Centred', 'We serve local clients, understand local terrain, and build for local lives.'],
          ['Young Professionals','Led by qualified engineers who combine fresh education with genuine care.'],
          ['Fully Registered',  'Regd. No. 15648/082/083 | PAN 133885297 — transparent and accountable.'],
        ];
        foreach ($values as [$h, $t]): ?>
        <div class="bg-white border border-gray-100 p-6">
          <div class="w-6 h-[2px] bg-[#C8A951] mb-3"></div>
          <h4 class="font-semibold text-[#0D1B2A] text-sm mb-2"><?= $h ?></h4>
          <p class="text-gray-500 text-xs leading-relaxed"><?= $t ?></p>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>


<!-- ═══════════════════  TIMELINE  ═══════════════════ -->
<section class="py-20 lg:py-28 bg-white">
  <div class="max-w-4xl mx-auto px-5 lg:px-8">
    <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-3">Our Journey</p>
    <h2 class="font-display text-4xl font-bold text-[#0D1B2A] mb-12">From idea to institution.</h2>

    <!-- Timeline list -->
    <ol class="relative border-l border-[#C8A951]/30 space-y-10">
      <?php
      $timeline = [
        ['2081 Fagun',    'Concept &amp; Formation',       'Founding members meet and begin planning the engineering club concept.'],
        ['2081 Chaitra',  'Core Team Assembly',            'The five founding members formalise roles and responsibilities.'],
        ['2082 Baisakh',  'First Site Survey',             'Preliminary site survey conducted for the Nawadurga Devghad Bhaban project in Bhaktapur.'],
        ['2082 Jestha',   'Design Phase Begins',          'Structural and architectural design work commences on the community project.'],
        ['2082 Ashadh',   'Design Completion',            'All working drawings, BOQ, and structural calculations finalised for submission.'],
        ['2082 Shrawan',  'Construction Supervision Start','On-site supervision begins; quality control protocols established.'],
        ['2082 Bhadra',   'Second Project Signed',        'Kera Ghari Residential Building contract signed — expanding the project portfolio.'],
        ['2082 Ashwin',   'Team Expansion',               'Additional engineering consultants and support staff onboarded.'],
        ['2082 Kartik 14','Kera Ghari Contract',          'Formal agreement signed for the Kera Ghari multi-storey residential building project.'],
        ['2082 Mangsir',  'Registration Process',         'Application for official club and consultancy registration submitted to authorities.'],
        ['2082 Poush',    'Documentation Complete',       'All legal, financial, and technical documentation prepared and verified.'],
        ['2082 Fagun 8',  'Official Registration',        'Mistri Vai Engineering Club officially registered — Regd. No. 15648/082/083, PAN 133885297.'],
      ];
      foreach ($timeline as [$date, $heading, $desc]): ?>
      <li class="ml-6">
        <span class="absolute -left-[5px] flex h-2.5 w-2.5 rounded-full bg-[#C8A951]"></span>
        <p class="font-mono text-[9.5px] tracking-[.18em] uppercase text-[#C8A951] mb-1"><?= $date ?></p>
        <h3 class="font-semibold text-[#0D1B2A] text-base mb-1"><?= $heading ?></h3>
        <p class="text-sm text-gray-500 leading-relaxed"><?= $desc ?></p>
      </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>


<!-- ═══════════════════  REGISTRATION INFO  ═══════════════════ -->
<section class="bg-[#0D1B2A] py-14">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid sm:grid-cols-3 gap-6 text-center">
      <?php
      $reg = [
        ['Registered Club',     'Regd. No. 15648/082/083'],
        ['PAN Number',          '133885297'],
        ['Registered Since',    '2082 Fagun 8 (B.S.)'],
      ];
      foreach ($reg as [$label, $value]): ?>
      <div class="border border-white/10 px-6 py-8">
        <p class="font-mono text-[9.5px] tracking-[.2em] uppercase text-[#C8A951] mb-2"><?= $label ?></p>
        <p class="font-display text-xl font-semibold text-white"><?= $value ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════  CTA  ═══════════════════ -->
<section class="bg-[#C8A951] py-14">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-6">
    <div>
      <h2 class="font-display text-2xl font-bold text-[#0D1B2A]">Meet the team behind the work.</h2>
      <p class="text-[#0D1B2A]/60 text-sm mt-1">Five qualified engineers, one shared mission.</p>
    </div>
    <a href="team.php"
       class="shrink-0 bg-[#0D1B2A] hover:bg-[#172840] text-white font-bold text-xs tracking-[.16em] uppercase px-8 py-4 rounded-sm transition-colors">
      View Team
    </a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
