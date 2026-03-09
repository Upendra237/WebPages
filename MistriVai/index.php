<?php
$pageTitle = 'Mistri Vai Engineering Club — Civil Engineering & Architecture, Nepal';
$pageDesc  = 'Registered civil engineering, architectural design and construction consultancy rooted in Nepal. Precision-built from Bhaktapur & Kavre.';
include 'includes/header.php';
?>

<!-- ═══════════════════  HERO  ═══════════════════ -->
<section class="relative min-h-[88vh] flex items-center bg-[#0D1B2A] overflow-hidden">

  <!-- decorative grid overlay -->
  <div class="absolute inset-0 opacity-[.04]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:48px 48px"></div>

  <!-- gold radial glow -->
  <div class="absolute top-1/3 right-1/4 w-[600px] h-[600px] rounded-full
              bg-[#C8A951] opacity-[.05] blur-[120px] pointer-events-none"></div>

  <div class="relative max-w-7xl mx-auto px-5 lg:px-8 py-24 lg:py-32">
    <div class="max-w-3xl">
      <!-- eyebrow -->
      <p class="font-mono text-[#C8A951] text-[10px] tracking-[.3em] uppercase mb-5 animate-fade-up">
        Civil Engineering &amp; Architecture
      </p>

      <!-- headline -->
      <h1 class="font-display text-5xl sm:text-6xl lg:text-7xl font-bold text-white leading-[1.08] mb-6 animate-fade-up [animation-delay:.08s]">
        Built on<br/>
        <span class="text-[#C8A951]">Precision.</span><br/>
        Driven by<br/>Purpose.
      </h1>

      <!-- sub -->
      <p class="text-white/55 text-lg max-w-xl leading-relaxed mb-10 animate-fade-up [animation-delay:.16s]">
        Mistri Vai is a registered engineering consultancy delivering civil engineering,
        architectural design, and construction solutions across Nepal — with rigour and care.
      </p>

      <!-- CTAs -->
      <div class="flex flex-wrap gap-4 animate-fade-up [animation-delay:.24s]">
        <a href="projects.php"
           class="bg-[#C8A951] hover:bg-[#DFC06A] text-[#0D1B2A] font-bold text-xs tracking-[.16em] uppercase px-7 py-4 rounded-sm transition-colors">
          View Projects
        </a>
        <a href="contact.php"
           class="border border-white/20 hover:border-[#C8A951] hover:text-[#C8A951] text-white/70 font-semibold text-xs tracking-[.16em] uppercase px-7 py-4 rounded-sm transition-colors">
          Get in Touch
        </a>
      </div>
    </div>
  </div>

  <!-- bottom fade -->
  <div class="absolute bottom-0 inset-x-0 h-20 bg-gradient-to-t from-[#F6F5F1] to-transparent pointer-events-none"></div>
</section>


<!-- ═══════════════════  STATS STRIP  ═══════════════════ -->
<section class="bg-white border-y border-gray-100">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid grid-cols-3 divide-x divide-gray-100">
      <?php
      $stats = [
        ['2+',    'Projects Delivered'],
        ['2082',  'Founded (B.S.)'],
        ['99%',   'Client Satisfaction'],
      ];
      foreach ($stats as [$num, $lbl]): ?>
      <div class="flex flex-col items-center py-10 gap-1">
        <span class="font-display text-4xl font-bold text-[#0D1B2A]"><?= $num ?></span>
        <span class="font-mono text-[9.5px] tracking-[.18em] uppercase text-[#C8A951]"><?= $lbl ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════  WHAT WE DO  ═══════════════════ -->
<section class="py-20 lg:py-28 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <!-- header -->
    <div class="max-w-xl mb-14">
      <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-3">What We Do</p>
      <h2 class="font-display text-4xl lg:text-5xl font-bold text-[#0D1B2A] leading-tight">
        End-to-End Engineering Services
      </h2>
    </div>

    <!-- service cards grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      $services = [
        ['Civil &amp; Structural Design', 'Comprehensive structural analysis and design for buildings, retaining walls, and infrastructure using modern codes.'],
        ['Architectural Design', 'Thoughtful space planning, façade design, and working drawings blending function with aesthetic sensitivity.'],
        ['Construction Supervision', 'On-site quality control, schedule monitoring, and technical oversight to ensure build fidelity.'],
        ['Soil &amp; Site Analysis', 'Geotechnical investigation, soil testing, and site feasibility reports for safe foundation design.'],
        ['Cost Estimation &amp; BOQ', 'Detailed bill of quantities and cost plans enabling transparent budgeting from concept to completion.'],
        ['Documentation &amp; Approvals', 'Municipal submission drawings, legal compliance documents, and project permit support.'],
      ];
      foreach ($services as [$title, $desc]): ?>
      <div class="bg-white border border-gray-100 p-7 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200 group">
        <!-- gold rule -->
        <div class="w-8 h-[2px] bg-[#C8A951] mb-5"></div>
        <h3 class="font-display text-lg font-semibold text-[#0D1B2A] mb-3 group-hover:text-[#C8A951] transition-colors">
          <?= $title ?>
        </h3>
        <p class="text-sm text-gray-500 leading-relaxed"><?= $desc ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="mt-10 text-center">
      <a href="services.php"
         class="inline-flex items-center gap-2 text-[#0D1B2A] font-semibold text-sm border-b border-[#C8A951] pb-0.5 hover:text-[#C8A951] transition-colors">
        See all services
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18"/></svg>
      </a>
    </div>
  </div>
</section>


<!-- ═══════════════════  FEATURED PROJECT  ═══════════════════ -->
<section class="bg-[#0D1B2A] py-20 lg:py-28">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <div class="max-w-xl mb-14">
      <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-3">Latest Work</p>
      <h2 class="font-display text-4xl lg:text-5xl font-bold text-white leading-tight">
        Projects We're Proud Of
      </h2>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
      <!-- Project 1 -->
      <div class="border border-white/10 hover:border-[#C8A951]/40 p-8 transition-colors group">
        <span class="font-mono text-[9.5px] tracking-[.2em] uppercase text-[#C8A951] block mb-4">Community Building</span>
        <h3 class="font-display text-xl font-semibold text-white mb-3 group-hover:text-[#C8A951] transition-colors">
          Nawadurga Devghad Bhaban
        </h3>
        <p class="text-white/50 text-sm leading-relaxed mb-6">
          A community hall and cultural space in Bhaktapur — designed for
          durability, ceremony, and civic pride.
        </p>
        <a href="projects.php" class="text-[#C8A951] text-xs font-mono tracking-[.15em] uppercase hover:underline">
          Learn more →
        </a>
      </div>
      <!-- Project 2 -->
      <div class="border border-white/10 hover:border-[#C8A951]/40 p-8 transition-colors group">
        <span class="font-mono text-[9.5px] tracking-[.2em] uppercase text-[#C8A951] block mb-4">Residential</span>
        <h3 class="font-display text-xl font-semibold text-white mb-3 group-hover:text-[#C8A951] transition-colors">
          Kera Ghari Residential Building
        </h3>
        <p class="text-white/50 text-sm leading-relaxed mb-6">
          A multi-storey residential project signed in 2082 Kartik — combining
          structural efficiency with comfortable modern living.
        </p>
        <a href="projects.php" class="text-[#C8A951] text-xs font-mono tracking-[.15em] uppercase hover:underline">
          Learn more →
        </a>
      </div>
    </div>

    <div class="mt-10">
      <a href="projects.php"
         class="inline-flex items-center gap-2 text-[#C8A951] font-semibold text-sm border-b border-[#C8A951]/40 pb-0.5 hover:border-[#C8A951] transition-colors">
        View all projects
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18"/></svg>
      </a>
    </div>
  </div>
</section>


<!-- ═══════════════════  WHY US  ═══════════════════ -->
<section class="py-20 lg:py-28 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-16 items-center">

      <!-- Text -->
      <div>
        <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-3">Why Mistri Vai</p>
        <h2 class="font-display text-4xl lg:text-5xl font-bold text-[#0D1B2A] leading-tight mb-6">
          Technical Rigour.<br/>Local Understanding.
        </h2>
        <p class="text-gray-500 leading-relaxed mb-8">
          We combine formal engineering training with deep knowledge of Nepal's terrain,
          building codes, and community contexts — ensuring every project is safe,
          code-compliant, and built to last.
        </p>
        <a href="about.php"
           class="inline-flex items-center gap-2 bg-[#0D1B2A] hover:bg-[#172840] text-white font-bold text-xs tracking-[.16em] uppercase px-7 py-4 rounded-sm transition-colors">
          About the Club
        </a>
      </div>

      <!-- Pillars -->
      <div class="grid grid-cols-2 gap-4">
        <?php
        $pillars = [
          ['Registered', 'Regd. No. 15648/082/083 — fully licensed consultancy.'],
          ['Nepal-rooted', 'Offices in Bhaktapur &amp; Kavre, serving communities directly.'],
          ['Young &amp; Driven', 'Led by qualified engineers with fresh perspective and rigour.'],
          ['Transparent', 'Clear communication, honest estimates, no hidden surprises.'],
        ];
        foreach ($pillars as [$heading, $text]): ?>
        <div class="bg-white border border-gray-100 p-6">
          <div class="w-6 h-[2px] bg-[#C8A951] mb-3"></div>
          <h4 class="font-semibold text-[#0D1B2A] text-sm mb-2"><?= $heading ?></h4>
          <p class="text-gray-500 text-xs leading-relaxed"><?= $text ?></p>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>


<!-- ═══════════════════  CTA BANNER  ═══════════════════ -->
<section class="bg-[#C8A951]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 py-14 flex flex-col sm:flex-row items-center justify-between gap-6">
    <div>
      <h2 class="font-display text-2xl lg:text-3xl font-bold text-[#0D1B2A]">
        Ready to start your project?
      </h2>
      <p class="text-[#0D1B2A]/60 text-sm mt-1">
        Get a free consultation from our engineering team today.
      </p>
    </div>
    <a href="contact.php"
       class="shrink-0 bg-[#0D1B2A] hover:bg-[#172840] text-white font-bold text-xs tracking-[.16em] uppercase px-8 py-4 rounded-sm transition-colors">
      Contact Us Now
    </a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
