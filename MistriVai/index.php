<?php
$pageTitle = 'Mistri Vai Engineering Club &mdash; Nepal';
$pageDesc  = 'Mistri Vai is a student-led civil engineering club from Nepal offering structural design, construction consulting, and surveying services.';
include 'includes/header.php';
?>

<!-- ═══════════════ HERO ═══════════════ -->
<section class="relative min-h-[92vh] flex items-center overflow-hidden bg-[#0D1B2A]">

  <!-- Blueprint grid overlay -->
  <div class="absolute inset-0 opacity-[.06]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:60px 60px;"></div>

  <!-- Content -->
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8 py-28 sm:py-36">
    <div class="max-w-3xl">
      <!-- Label -->
      <div class="flex items-center gap-3 mb-7 reveal">
        <span class="w-8 h-px bg-[#C8A951]"></span>
        <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951]">Civil Engineering Club &bull; Nepal</span>
      </div>

      <!-- Headline -->
      <h1 class="font-display text-5xl sm:text-6xl lg:text-7xl font-bold text-white leading-[1.08] mb-6 reveal">
        Building Nepal,<br/>
        <span class="text-[#C8A951]">One Blueprint</span><br/>
        at a Time.
      </h1>

      <p class="text-white/55 text-lg sm:text-xl leading-relaxed max-w-xl mb-10 reveal">
        A registered student-led engineering club founded on expertise, integrity, and a deep commitment to Nepal's built environment.
      </p>

      <!-- CTAs -->
      <div class="flex flex-wrap gap-4 reveal">
        <a href="projects.php" class="inline-flex items-center gap-2 bg-[#C8A951] hover:bg-[#DFC06A] text-[#0D1B2A] text-sm font-bold tracking-widest uppercase px-8 py-4 transition-colors duration-200">
          View Projects
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
        <a href="contact.php" class="inline-flex items-center gap-2 border border-white/20 hover:border-[#C8A951] text-white/70 hover:text-white text-sm font-semibold tracking-widest uppercase px-8 py-4 transition-colors duration-200">
          Get a Quote
        </a>
      </div>
    </div>
  </div>

  <!-- Decorative angle -->
  <div class="hidden lg:block absolute right-0 top-0 bottom-0 w-1/3 border-l border-white/5 bg-gradient-to-b from-[#172840] to-transparent opacity-60"></div>

  <!-- Stats ribbon -->
  <div class="absolute bottom-0 left-0 right-0 border-t border-white/10 bg-[#0a1520]/70 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-5 lg:px-8">
      <div class="grid grid-cols-2 sm:grid-cols-4 divide-x divide-white/10">
        <?php
        $stats = [
          ['2+', 'Projects Completed'],
          ['2081', 'Founded (BS)'],
          ['99%', 'Client Satisfaction'],
          ['15+', 'Club Members'],
        ];
        foreach ($stats as [$num, $label]) {
          echo '<div class="py-5 px-4 text-center sm:text-left">';
          echo '<div class="font-display text-2xl font-bold text-[#C8A951]">'.htmlspecialchars($num).'</div>';
          echo '<div class="text-white/35 text-xs font-mono tracking-wider uppercase mt-0.5">'.htmlspecialchars($label).'</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════ SERVICES OVERVIEW ═══════════════ -->
<section class="py-24 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-14 reveal">
      <div>
        <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951] block mb-3">What We Do</span>
        <h2 class="font-display text-4xl sm:text-5xl font-bold text-[#0D1B2A] leading-tight">Our Core Services</h2>
      </div>
      <a href="services.php" class="text-sm font-semibold text-[#C8A951] hover:text-[#0D1B2A] uppercase tracking-widest flex items-center gap-2 shrink-0 transition-colors duration-200">
        All Services <span>&rarr;</span>
      </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      $services = [
        ['icon'=>'🏗️','title'=>'Structural Design','desc'=>'Column, beam and slab design with accurate load calculations and safety standards for residential and commercial structures.'],
        ['icon'=>'🏠','title'=>'Architectural Drawing','desc'=>'Floor plans, sections and 3D perspectives drafted with AutoCAD — matching your vision and local bylaws.'],
        ['icon'=>'📐','title'=>'Construction Consulting','desc'=>'On-site supervision, material selection and quality checks from foundation to finishing.'],
        ['icon'=>'🔭','title'=>'Surveying & Mapping','desc'=>'Land measurement, site contour surveys and plot demarcation for accurate project planning.'],
        ['icon'=>'💧','title'=>'Water & Sanitation','desc'=>'Plumbing layout, drainage system design and water supply planning compliant with Nepal standards.'],
        ['icon'=>'🧱','title'=>'Estimation & BOQ','desc'=>'Detailed bill of quantities and cost estimation to keep your project on budget from day one.'],
      ];
      foreach ($services as $s) {
        echo '<div class="bg-white border border-[#0D1B2A]/8 p-7 group hover:-translate-y-1 hover:shadow-xl transition-all duration-300 reveal">';
        echo '<div class="text-3xl mb-5">'.$s['icon'].'</div>';
        echo '<h3 class="font-display text-lg font-bold text-[#0D1B2A] mb-2">'.$s['title'].'</h3>';
        echo '<p class="text-[#0D1B2A]/55 text-sm leading-relaxed">'.$s['desc'].'</p>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
</section>

<!-- ═══════════════ FEATURED PROJECTS ═══════════════ -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-14 reveal">
      <div>
        <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951] block mb-3">Built By Us</span>
        <h2 class="font-display text-4xl sm:text-5xl font-bold text-[#0D1B2A] leading-tight">Featured Projects</h2>
      </div>
      <a href="projects.php" class="text-sm font-semibold text-[#C8A951] hover:text-[#0D1B2A] uppercase tracking-widest flex items-center gap-2 shrink-0 transition-colors duration-200">
        All Projects <span>&rarr;</span>
      </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

      <!-- Project 1 -->
      <article class="group border border-[#0D1B2A]/8 overflow-hidden hover:shadow-2xl transition-shadow duration-300 reveal">
        <div class="aspect-[16/9] bg-[#0D1B2A] flex items-center justify-center relative overflow-hidden">
          <div class="absolute inset-0 opacity-[.08]"
               style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:40px 40px;"></div>
          <span class="relative font-display text-white/10 text-8xl font-bold select-none">01</span>
        </div>
        <div class="p-7 bg-white">
          <div class="font-mono text-[10px] tracking-widest uppercase text-[#C8A951] mb-3">Community Building &bull; Bhaktapur</div>
          <h3 class="font-display text-2xl font-bold text-[#0D1B2A] mb-3 group-hover:text-[#C8A951] transition-colors duration-200">
            Nawadurga Devghad Bhaban
          </h3>
          <p class="text-[#0D1B2A]/55 text-sm leading-relaxed mb-5">
            Structural design and construction supervision for a community hall in Bhaktapur, integrating traditional Newari spatial proportions with reinforced concrete construction.
          </p>
          <a href="projects.php#nawadurga" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#0D1B2A] hover:text-[#C8A951] transition-colors duration-200">
            View Details <span>&rarr;</span>
          </a>
        </div>
      </article>

      <!-- Project 2 -->
      <article class="group border border-[#0D1B2A]/8 overflow-hidden hover:shadow-2xl transition-shadow duration-300 reveal">
        <div class="aspect-[16/9] bg-[#172840] flex items-center justify-center relative overflow-hidden">
          <div class="absolute inset-0 opacity-[.08]"
               style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:40px 40px;"></div>
          <span class="relative font-display text-white/10 text-8xl font-bold select-none">02</span>
        </div>
        <div class="p-7 bg-white">
          <div class="font-mono text-[10px] tracking-widest uppercase text-[#C8A951] mb-3">Residential &bull; Kavre &bull; 2082 Kartik 14</div>
          <h3 class="font-display text-2xl font-bold text-[#0D1B2A] mb-3 group-hover:text-[#C8A951] transition-colors duration-200">
            Kera Ghari Residential Building
          </h3>
          <p class="text-[#0D1B2A]/55 text-sm leading-relaxed mb-5">
            Full civil and architectural design for a private residential structure in Dhulikhel-6, Kavre &mdash; from site survey and foundation design through final documentation.
          </p>
          <a href="projects.php#keraghari" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-[#0D1B2A] hover:text-[#C8A951] transition-colors duration-200">
            View Details <span>&rarr;</span>
          </a>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- ═══════════════ WHY US ═══════════════ -->
<section class="py-24 bg-[#0D1B2A] relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.04]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:60px 60px;"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">

    <div class="text-center max-w-2xl mx-auto mb-16 reveal">
      <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951] block mb-3">Why Choose Us</span>
      <h2 class="font-display text-4xl sm:text-5xl font-bold text-white leading-tight">
        Grounded in Knowledge.<br/>Driven by Purpose.
      </h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php
      $pillars = [
        ['Local Expertise', 'Deep knowledge of Nepal\'s building codes, seismic requirements, and local construction practices.'],
        ['Student-Led Energy', 'Fresh perspectives, latest academic methods, and genuine enthusiasm for every project.'],
        ['Registered Club', 'Officially registered under Regd. No. 15648/082/083 — your trust is our responsibility.'],
        ['Affordable Quality', 'Professional-grade deliverables at rates suited for communities, individuals and small firms.'],
      ];
      foreach ($pillars as $i => [$title, $desc]) {
        echo '<div class="border border-white/10 p-7 hover:border-[#C8A951]/50 transition-colors duration-300 reveal">';
        echo '<div class="font-mono text-[10px] tracking-widest uppercase text-[#C8A951]/60 mb-4">0'.($i+1).'</div>';
        echo '<h3 class="font-display text-lg font-bold text-white mb-3">'.htmlspecialchars($title).'</h3>';
        echo '<p class="text-white/40 text-sm leading-relaxed">'.htmlspecialchars($desc).'</p>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
</section>

<!-- ═══════════════ CTA BAND ═══════════════ -->
<section class="py-20 bg-[#C8A951]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-8">
    <div class="reveal">
      <h2 class="font-display text-3xl sm:text-4xl font-bold text-[#0D1B2A] leading-tight mb-2">
        Ready to Start Your Project?
      </h2>
      <p class="text-[#0D1B2A]/55 text-sm">Reach out and we will respond within 24 hours.</p>
    </div>
    <a href="contact.php" class="shrink-0 inline-flex items-center gap-2 bg-[#0D1B2A] hover:bg-[#172840] text-white text-sm font-bold tracking-widest uppercase px-10 py-4 transition-colors duration-200 reveal">
      Contact Us <span>&rarr;</span>
    </a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
