<?php
$pageTitle = 'Mistri Vai Engineering — Civil Engineering & Architecture, Nepal';
$pageDesc  = 'Registered civil engineering, architectural design and construction consultancy rooted in Nepal. Precision-built from Bhaktapur & Kavre.';
$extraCss  = '<style>@media(min-width:1024px){.hero-title{font-size:clamp(2.6rem,3.8vw,4.5rem)!important;line-height:1.08}}</style>';
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

  <div class="relative max-w-7xl mx-auto px-5 lg:px-8 py-16 lg:py-24 w-full">
    <div class="grid lg:grid-cols-2 items-center gap-16">

      <!-- Left: text -->
      <div>
        <p class="font-mono text-[#C8A951] text-[10px] tracking-[.3em] uppercase mb-5 animate-fade-up">
          Civil Engineering &amp; Architecture
        </p>
        <h1 class="hero-title font-display text-5xl sm:text-6xl font-bold text-white leading-[1.08] mb-6 animate-fade-up [animation-delay:.08s]">
          Built on Precision,<br/>
          <span class="text-[#C8A951]">Driven by Purpose.</span><br/>
          Crafted for Nepal.
        </h1>
        <p class="text-white/70 text-lg max-w-xl leading-relaxed mb-10 animate-fade-up [animation-delay:.16s]">
          Mistri Vai is a registered engineering consultancy delivering civil engineering,
          architectural design, and construction solutions across Nepal — with rigour and care.
        </p>
        <div class="flex flex-wrap gap-4 animate-fade-up [animation-delay:.24s]">
          <a href="projects.php"
             class="bg-[#C8A951] hover:bg-[#DFC06A] text-[#0D1B2A] font-bold text-xs tracking-[.16em] uppercase px-7 py-4 rounded-sm transition-colors">
            View Projects
          </a>
          <a href="contact.php"
             class="bg-[#172840] hover:bg-[#1E3353] text-white font-bold text-xs tracking-[.16em] uppercase px-7 py-4 rounded-sm transition-colors border border-white/15">
            Get in Touch
          </a>
        </div>
      </div>

      <!-- Right: logo display -->
      <div class="hidden lg:flex items-center justify-center animate-fade-up [animation-delay:.32s]">
        <div class="relative">
          <!-- Architectural corner brackets -->
          <div class="absolute -top-5 -left-5 w-8 h-8 border-t-2 border-l-2 border-[#C8A951]/40"></div>
          <div class="absolute -top-5 -right-5 w-8 h-8 border-t-2 border-r-2 border-[#C8A951]/40"></div>
          <div class="absolute -bottom-5 -left-5 w-8 h-8 border-b-2 border-l-2 border-[#C8A951]/40"></div>
          <div class="absolute -bottom-5 -right-5 w-8 h-8 border-b-2 border-r-2 border-[#C8A951]/40"></div>
          <!-- Subtle outer frame -->
          <div class="absolute -inset-10 border border-[#C8A951]/[.08] rounded-2xl"></div>
          <div class="flex items-center justify-center w-72 h-72 bg-white rounded-2xl shadow-2xl overflow-hidden">
            <img src="assets/logo.png" alt="Mistri Vai" class="w-64 h-64 object-contain block" loading="eager"/>
          </div>
          <div class="absolute -bottom-4 -right-4 bg-[#C8A951] text-[#0D1B2A] font-mono text-[9px] tracking-[.15em] uppercase px-3 py-2 rounded-sm shadow-lg">
            Est. 2082 B.S.
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ═══════════════════  STATS STRIP  ═══════════════════ -->
<section class="bg-white border-t-4 border-[#C8A951] border-b border-b-gray-100" id="statsSection">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="grid grid-cols-3 divide-x divide-gray-100">
      <div class="flex flex-col items-center py-10 gap-1.5 px-2">
        <span class="font-display text-4xl font-bold text-[#0D1B2A] stat-num" data-count="2" data-suffix="+">2+</span>
        <span class="font-mono text-[10px] font-semibold tracking-[.15em] uppercase text-[#C8A951] text-center leading-tight">Projects Delivered</span>
      </div>
      <div class="flex flex-col items-center py-10 gap-1.5 px-2">
        <span class="font-display text-4xl font-bold text-[#0D1B2A] stat-num" data-count="2082" data-suffix="">2082</span>
        <span class="font-mono text-[10px] font-semibold tracking-[.15em] uppercase text-[#C8A951] text-center leading-tight">Founded (B.S.)</span>
      </div>
      <div class="flex flex-col items-center py-10 gap-1.5 px-2">
        <span class="font-display text-4xl font-bold text-[#0D1B2A] stat-num" data-count="99" data-suffix="%">99%</span>
        <span class="font-mono text-[10px] font-semibold tracking-[.15em] uppercase text-[#C8A951] text-center leading-tight">Client Satisfaction</span>
      </div>
    </div>
  </div>
</section>
<script>
(function(){
  const nums = document.querySelectorAll('.stat-num');
  if (!nums.length) return;
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (!e.isIntersecting || e.target.dataset.done) return;
      e.target.dataset.done = '1';
      const target = parseInt(e.target.dataset.count, 10);
      const suffix = e.target.dataset.suffix || '';
      const dur = 1400;
      const t0 = performance.now();
      function tick(now) {
        const p = Math.min((now - t0) / dur, 1);
        const ease = 1 - Math.pow(1 - p, 3);
        e.target.textContent = Math.floor(ease * target) + suffix;
        if (p < 1) requestAnimationFrame(tick);
        else e.target.textContent = target + suffix;
      }
      requestAnimationFrame(tick);
    });
  }, { threshold: 0.6 });
  nums.forEach(n => io.observe(n));
})();
</script>


<!-- ═══════════════════  WHAT WE DO  ═══════════════════ -->
<section class="py-20 lg:py-28 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <!-- header -->
    <div class="max-w-xl mb-14">
      <p class="font-mono text-[#C8A951] text-[11px] font-semibold tracking-[.25em] uppercase mb-3">What We Do</p>
      <h2 class="font-display text-4xl lg:text-5xl font-bold text-[#0D1B2A] leading-tight">
        End-to-End Engineering Services
      </h2>
    </div>

    <!-- service cards grid — loaded from data/services.json -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      $services = json_decode(file_get_contents(__DIR__ . '/data/services.json'), true) ?? [];
      foreach ($services as $svc):
        $title = htmlspecialchars($svc['title']);
        $desc  = htmlspecialchars($svc['description']); ?>
      <div class="bg-white border border-gray-100 p-7 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200 group">
        <!-- gold rule -->
        <div class="w-8 h-[2px] bg-[#C8A951] mb-5"></div>
        <h3 class="font-display text-lg font-semibold text-[#0D1B2A] mb-3 group-hover:text-[#C8A951] transition-colors"><?= $title ?></h3>
        <p class="text-sm text-gray-600 leading-relaxed"><?= $desc ?></p>
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
        <p class="text-white/65 text-sm leading-relaxed mb-6">
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
        <p class="text-white/65 text-sm leading-relaxed mb-6">
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
        <p class="font-mono text-[#C8A951] text-[11px] font-semibold tracking-[.25em] uppercase mb-3">Why Mistri Vai</p>
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
          About Us
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
<!-- CTA is now in footer.php for all pages -->

<?php include 'includes/footer.php'; ?>
