<?php
$pageTitle = 'Services &mdash; Mistri Vai Engineering Club';
$pageDesc  = 'Structural design, architectural drawing, construction consulting, surveying, water & sanitation, and cost estimation services from Mistri Vai.';
include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="bg-[#0D1B2A] py-24 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.05]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:60px 60px;"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
    <div class="flex items-center gap-3 mb-5 reveal">
      <span class="w-8 h-px bg-[#C8A951]"></span>
      <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951]">Services</span>
    </div>
    <h1 class="font-display text-5xl sm:text-6xl font-bold text-white max-w-2xl leading-tight reveal">
      What We Offer
    </h1>
    <p class="mt-5 text-white/50 text-lg max-w-xl reveal">
      End-to-end civil and architectural services &mdash; from concept survey to final documentation &mdash; delivered with academic rigour and field experience.
    </p>
  </div>
</section>

<!-- SERVICES GRID -->
<section class="py-24 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <?php
    $services = [
      [
        'num'  => '01',
        'icon' => '🏗️',
        'title'=> 'Structural Design',
        'desc' => 'We provide complete structural design for RCC framed buildings &mdash; residential, commercial, and community structures. Services include column layout, beam sizing, slab design, staircase design, and foundation design in compliance with IS Codes and Nepal National Building Code (NBC).',
        'deliverables' => ['Structural drawings (AutoCAD)', 'Column schedule', 'Beam & slab design report', 'Foundation design'],
      ],
      [
        'num'  => '02',
        'icon' => '🏠',
        'title'=> 'Architectural Drawing',
        'desc' => 'From rough sketches to polished AutoCAD drawings, we translate your vision into precise floor plans, elevations, sections, and 3D perspectives. All drawings are produced in accordance with local municipality requirements.',
        'deliverables' => ['Floor plans (all floors)', 'Front, rear & side elevations', 'Sections', '3D perspective view'],
      ],
      [
        'num'  => '03',
        'icon' => '📐',
        'title'=> 'Construction Consulting',
        'desc' => 'On-site consultation throughout the construction process &mdash; from foundation excavation check to column casting supervision, masonry quality review, and final finishing inspection.',
        'deliverables' => ['Site visit reports', 'Quality checklists', 'Material recommendations', 'Issue resolution notes'],
      ],
      [
        'num'  => '04',
        'icon' => '🔭',
        'title'=> 'Surveying & Mapping',
        'desc' => 'Land measurement, plot demarcation, and topographic surveying using total station and auto level instruments. We produce accurate site maps and contour plans ready for design use.',
        'deliverables' => ['Site survey map (CAD)', 'Contour plan', 'Plot area calculation', 'Benchmark report'],
      ],
      [
        'num'  => '05',
        'icon' => '💧',
        'title'=> 'Water Supply & Sanitation',
        'desc' => 'Water supply layout design, tank sizing, plumbing isometric drawings, and sanitation/drainage system design in compliance with Nepal Plumbing Code and DWSS guidelines.',
        'deliverables' => ['Plumbing layout drawings', 'Drainage layout', 'Tank size calculation', 'Septic tank design'],
      ],
      [
        'num'  => '06',
        'icon' => '🧱',
        'title'=> 'Cost Estimation & BOQ',
        'desc' => 'Detailed Bill of Quantities with item-wise analysis of rates, material quantities, and labour costs. We use current DoR (Department of Roads) rate schedules to ensure accurate estimates.',
        'deliverables' => ['Detailed BOQ', 'Rate analysis sheets', 'Material quantity statement', 'Summary estimate'],
      ],
    ];

    foreach ($services as $s) {
      echo '<div id="service-'.$s['num'].'" class="mb-14 grid lg:grid-cols-5 gap-8 border-b border-[#0D1B2A]/8 pb-14 last:border-0 last:pb-0 reveal">';

      // Number + icon
      echo '<div class="lg:col-span-1 flex lg:flex-col items-center lg:items-start gap-5">';
      echo '<div class="font-mono text-5xl font-bold text-[#0D1B2A]/8 leading-none">'.$s['num'].'</div>';
      echo '<div class="text-4xl">'.$s['icon'].'</div>';
      echo '</div>';

      // Content
      echo '<div class="lg:col-span-2">';
      echo '<h2 class="font-display text-3xl font-bold text-[#0D1B2A] mb-4">'.$s['title'].'</h2>';
      echo '<p class="text-[#0D1B2A]/60 text-base leading-relaxed">'.$s['desc'].'</p>';
      echo '</div>';

      // Deliverables
      echo '<div class="lg:col-span-2 bg-white border border-[#0D1B2A]/8 p-7">';
      echo '<h3 class="font-mono text-[10px] uppercase tracking-[.2em] text-[#C8A951] mb-5">Deliverables</h3>';
      echo '<ul class="space-y-2.5">';
      foreach ($s['deliverables'] as $d) {
        echo '<li class="flex items-center gap-3 text-sm text-[#0D1B2A]/70">';
        echo '<span class="w-1.5 h-1.5 bg-[#C8A951] rounded-full shrink-0"></span>';
        echo htmlspecialchars($d);
        echo '</li>';
      }
      echo '</ul>';
      echo '</div>';

      echo '</div>';
    }
    ?>

  </div>
</section>

<!-- PROCESS -->
<section class="py-24 bg-[#0D1B2A] relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.04]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:60px 60px;"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">

    <div class="text-center mb-16 reveal">
      <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951] block mb-3">How It Works</span>
      <h2 class="font-display text-4xl sm:text-5xl font-bold text-white">Our Process</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php
      $steps = [
        ['Inquiry', 'Reach out via phone or email with your project brief.'],
        ['Site Visit', 'We visit the site, take measurements, and assess requirements.'],
        ['Proposal', 'You receive a detailed scope and transparent cost estimate.'],
        ['Execution', 'We design, document, consult &mdash; and hand over complete files.'],
      ];
      foreach ($steps as $i => [$title, $desc]) {
        echo '<div class="border border-white/10 p-7 hover:border-[#C8A951]/40 transition-colors duration-300 reveal">';
        echo '<div class="font-mono text-[10px] uppercase tracking-[.2em] text-[#C8A951]/60 mb-4">Step 0'.($i+1).'</div>';
        echo '<h3 class="font-display text-xl font-bold text-white mb-3">'.htmlspecialchars($title).'</h3>';
        echo '<p class="text-white/40 text-sm leading-relaxed">'.$desc.'</p>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-16 bg-[#C8A951]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-6 reveal">
    <div>
      <h2 class="font-display text-2xl sm:text-3xl font-bold text-[#0D1B2A]">Ready to start your project?</h2>
      <p class="text-[#0D1B2A]/60 text-sm mt-1">We respond to all inquiries within 24 hours.</p>
    </div>
    <a href="contact.php" class="inline-flex items-center gap-2 bg-[#0D1B2A] hover:bg-[#172840] text-white text-sm font-bold tracking-widest uppercase px-8 py-4 transition-colors duration-200">
      Get a Free Quote &rarr;
    </a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
