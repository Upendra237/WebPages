<?php
$pageTitle = 'Projects &mdash; Mistri Vai Engineering Club';
$pageDesc  = 'View completed and ongoing civil engineering projects by Mistri Vai Engineering Club, including the Nawadurga Devghad Bhaban and Kera Ghari Residential Building.';
include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="bg-[#0D1B2A] py-24 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.05]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:60px 60px;"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
    <div class="flex items-center gap-3 mb-5 reveal">
      <span class="w-8 h-px bg-[#C8A951]"></span>
      <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951]">Portfolio</span>
    </div>
    <h1 class="font-display text-5xl sm:text-6xl font-bold text-white max-w-2xl leading-tight reveal">
      Our Projects
    </h1>
    <p class="mt-5 text-white/50 text-lg max-w-xl reveal">
      Real structures, real communities, real impact. Every project we take on becomes part of Nepal's built fabric.
    </p>
  </div>
</section>

<!-- PROJECT 1 -->
<section id="nawadurga" class="py-24 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 grid lg:grid-cols-2 gap-16 items-start">

    <!-- Visual placeholder -->
    <div class="bg-[#0D1B2A] aspect-[4/3] flex flex-col items-center justify-center relative overflow-hidden reveal">
      <div class="absolute inset-0 opacity-[.07]"
           style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:40px 40px;"></div>
      <span class="font-display text-[120px] font-black text-white/5 leading-none select-none absolute">01</span>
      <span class="relative font-mono text-[10px] uppercase tracking-[.25em] text-[#C8A951]">Nawadurga Devghad Bhaban</span>
    </div>

    <!-- Details -->
    <div class="reveal">
      <div class="font-mono text-[10px] uppercase tracking-[.25em] text-[#C8A951] mb-4">Community Building &bull; Bhaktapur, NP</div>
      <h2 class="font-display text-4xl font-bold text-[#0D1B2A] mb-5 leading-tight">
        Nawadurga Devghad Bhaban
      </h2>
      <p class="text-[#0D1B2A]/60 text-base leading-relaxed mb-8">
        A community hall commissioned to serve the local Newari community in Bhaktapur. Our team was responsible for structural design, including column-beam framework, slab design, and staircase detailing, alongside site supervision throughout the construction phases.
      </p>
      <p class="text-[#0D1B2A]/60 text-base leading-relaxed mb-10">
        The design draws from traditional Newari spatial proportions &mdash; generous ceiling heights, central courtyard orientation, and load-bearing masonry infill within the RCC frame &mdash; to create a space that respects local heritage while meeting modern safety codes.
      </p>

      <!-- Meta grid -->
      <dl class="grid grid-cols-2 gap-5 border-t border-[#0D1B2A]/8 pt-8">
        <?php
        $meta = [
          ['Type','Community Hall'],
          ['Location','Bhaktapur, Bagmati Province'],
          ['Scope','Structural Design + Supervision'],
          ['Code','NBC 105 (Seismic) + IS 456'],
        ];
        foreach ($meta as [$k,$v]) {
          echo '<div>';
          echo '<dt class="font-mono text-[10px] uppercase tracking-widest text-[#0D1B2A]/35 mb-1">'.htmlspecialchars($k).'</dt>';
          echo '<dd class="text-[#0D1B2A] text-sm font-semibold">'.htmlspecialchars($v).'</dd>';
          echo '</div>';
        }
        ?>
      </dl>
    </div>

  </div>
</section>

<!-- PROJECT 2 -->
<section id="keraghari" class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 grid lg:grid-cols-2 gap-16 items-start">

    <!-- Details first on large -->
    <div class="lg:order-1 reveal">
      <div class="font-mono text-[10px] uppercase tracking-[.25em] text-[#C8A951] mb-4">Residential Building &bull; Dhulikhel-6, Kavre</div>
      <h2 class="font-display text-4xl font-bold text-[#0D1B2A] mb-5 leading-tight">
        Kera Ghari Residential Building
      </h2>
      <p class="text-[#0D1B2A]/60 text-base leading-relaxed mb-6">
        A private G+2 residential structure in Dhulikhel-6, Kavrepalanchok. Contract signed on 2082 Kartik 14. Mistri Vai handled the entire design package &mdash; from initial site survey and soil assessment to architectural drawings, structural calculations, plumbing layout, and final BOQ.
      </p>
      <p class="text-[#0D1B2A]/60 text-base leading-relaxed mb-10">
        The building prioritises natural light, passive ventilation, and efficient space utilisation &mdash; designed to function comfortably in Dhulikhel's high-altitude climate without reliance on mechanical systems.
      </p>

      <!-- Meta grid -->
      <dl class="grid grid-cols-2 gap-5 border-t border-[#0D1B2A]/8 pt-8">
        <?php
        $meta2 = [
          ['Type','G+2 Residential'],
          ['Location','Dhulikhel-6, Kavrepalanchok'],
          ['Contract','2082 Kartik 14'],
          ['Scope','Full Design Package + BOQ'],
        ];
        foreach ($meta2 as [$k,$v]) {
          echo '<div>';
          echo '<dt class="font-mono text-[10px] uppercase tracking-widest text-[#0D1B2A]/35 mb-1">'.htmlspecialchars($k).'</dt>';
          echo '<dd class="text-[#0D1B2A] text-sm font-semibold">'.htmlspecialchars($v).'</dd>';
          echo '</div>';
        }
        ?>
      </dl>
    </div>

    <!-- Visual placeholder -->
    <div class="lg:order-2 bg-[#172840] aspect-[4/3] flex flex-col items-center justify-center relative overflow-hidden reveal">
      <div class="absolute inset-0 opacity-[.07]"
           style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:40px 40px;"></div>
      <span class="font-display text-[120px] font-black text-white/5 leading-none select-none absolute">02</span>
      <span class="relative font-mono text-[10px] uppercase tracking-[.25em] text-[#C8A951]">Kera Ghari Residential</span>
    </div>

  </div>
</section>

<!-- APPROACH -->
<section class="py-20 bg-[#0D1B2A]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 reveal">
    <div class="border border-white/10 p-10 sm:p-14 relative">
      <div class="absolute top-0 left-0 w-16 h-px bg-[#C8A951]"></div>
      <div class="absolute top-0 left-0 w-px h-16 bg-[#C8A951]"></div>
      <span class="font-mono text-[10px] uppercase tracking-[.25em] text-[#C8A951] block mb-5">Our Approach</span>
      <p class="font-display text-2xl sm:text-3xl text-white leading-relaxed max-w-3xl">
        &ldquo;Every structure we design is someone's home, workplace, or community space. We hold that trust seriously &mdash; and we back it with precise engineering.&rdquo;
      </p>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-16 bg-[#C8A951]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-6 reveal">
    <div>
      <h2 class="font-display text-2xl sm:text-3xl font-bold text-[#0D1B2A]">Have a project in mind?</h2>
      <p class="text-[#0D1B2A]/60 text-sm mt-1">Tell us what you need and we will get back to you within a day.</p>
    </div>
    <a href="contact.php" class="inline-flex items-center gap-2 bg-[#0D1B2A] hover:bg-[#172840] text-white text-sm font-bold tracking-widest uppercase px-8 py-4 transition-colors duration-200">
      Start a Conversation &rarr;
    </a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
