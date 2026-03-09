<?php
$pageTitle = 'About Us &mdash; Mistri Vai Engineering Club';
$pageDesc  = 'Learn about Mistri Vai Engineering Club: our story, mission, values, and team of passionate civil engineering students from Nepal.';
include 'includes/header.php';
?>

<!-- ═══════════════ PAGE HERO ═══════════════ -->
<section class="bg-[#0D1B2A] py-24 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.05]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:60px 60px;"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
    <div class="flex items-center gap-3 mb-5 reveal">
      <span class="w-8 h-px bg-[#C8A951]"></span>
      <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951]">About</span>
    </div>
    <h1 class="font-display text-5xl sm:text-6xl font-bold text-white max-w-2xl leading-tight reveal">
      Who We Are
    </h1>
  </div>
</section>

<!-- ═══════════════ OUR STORY ═══════════════ -->
<section class="py-24 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 grid lg:grid-cols-2 gap-16 items-center">

    <div class="reveal">
      <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951] block mb-5">Our Story</span>
      <h2 class="font-display text-4xl sm:text-5xl font-bold text-[#0D1B2A] mb-6 leading-tight">
        Born from Blueprints<br/>and Bright Minds
      </h2>
      <div class="space-y-4 text-[#0D1B2A]/60 text-base leading-relaxed">
        <p>Mistri Vai Engineering Club was founded in 2081 BS by a group of civil engineering students who believed that real learning happens on the ground &mdash; not just in classrooms.</p>
        <p>The name <em class="text-[#0D1B2A] font-semibold not-italic">Mistri Vai</em> is a nod to the Nepali term for a skilled craftsperson. We carry that spirit into every project: hands-on, knowledgeable, and honest about what we build.</p>
        <p>From our first community project in Bhaktapur to residential designs in Kavre, we have grown from a handful of passionate students into a registered club delivering real-world engineering solutions.</p>
      </div>
    </div>

    <!-- Info card -->
    <div class="bg-[#0D1B2A] p-10 relative reveal">
      <div class="absolute top-0 left-0 w-24 h-px bg-[#C8A951]"></div>
      <div class="absolute top-0 left-0 w-px h-24 bg-[#C8A951]"></div>
      <div class="absolute bottom-0 right-0 w-24 h-px bg-[#C8A951]"></div>
      <div class="absolute bottom-0 right-0 w-px h-24 bg-[#C8A951]"></div>
      <h3 class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951] mb-8">Club Details</h3>
      <dl class="space-y-5">
        <?php
        $details = [
          ['Registered Name', 'Mistri Vai Engineering Club'],
          ['Registration No.', '15648/082/083'],
          ['PAN', '133885297'],
          ['Founded', '2081/2082 BS'],
          ['Head Office', 'Liwali, Bhaktapur'],
          ['Branch Office', 'Dhulikhel-6, Kavrepalanchok'],
          ['Email', 'mail.mistrivai@gmail.com'],
          ['Phone', '+977-9860590678'],
        ];
        foreach ($details as [$label, $val]) {
          echo '<div class="flex gap-6 items-baseline">';
          echo '<dt class="font-mono text-[10px] uppercase tracking-widest text-white/30 w-36 shrink-0">'.htmlspecialchars($label).'</dt>';
          echo '<dd class="text-white/80 text-sm">'.htmlspecialchars($val).'</dd>';
          echo '</div>';
        }
        ?>
      </dl>
    </div>

  </div>
</section>

<!-- ═══════════════ MISSION & VALUES ═══════════════ -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <div class="text-center max-w-xl mx-auto mb-16 reveal">
      <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951] block mb-3">Mission &amp; Values</span>
      <h2 class="font-display text-4xl sm:text-5xl font-bold text-[#0D1B2A] leading-tight">
        What Drives Us
      </h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php
      $values = [
        ['🎯', 'Mission', 'To bridge the gap between academic civil engineering education and practical field application by delivering real projects to real people.'],
        ['🔬', 'Learning First', 'Every project is a classroom. We document, review and improve after every engagement to make our club collectively smarter.'],
        ['🤝', 'Community Impact', 'We prioritize projects that benefit communities &mdash; schools, community halls, public infrastructure &mdash; alongside private clients.'],
        ['📏', 'Technical Rigor', 'We follow Nepal National Building Code (NBC) standards for every structural and civil design, no shortcuts.'],
        ['💬', 'Transparency', 'Clear quotes, honest timelines. We tell clients exactly what to expect and we deliver on those commitments.'],
        ['🌱', 'Sustainability', 'From material selection to drainage planning, we consider the long-term impact on the surrounding environment.'],
      ];
      foreach ($values as [$icon, $title, $desc]) {
        echo '<div class="p-7 border border-[#0D1B2A]/8 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 reveal">';
        echo '<div class="text-3xl mb-5">'.$icon.'</div>';
        echo '<h3 class="font-display text-xl font-bold text-[#0D1B2A] mb-3">'.htmlspecialchars($title).'</h3>';
        echo '<p class="text-[#0D1B2A]/55 text-sm leading-relaxed">'.$desc.'</p>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
</section>

<!-- ═══════════════ RECOGNITION ═══════════════ -->
<section class="py-20 bg-[#0D1B2A]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 text-center reveal">
    <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951] block mb-5">Recognition</span>
    <p class="font-display text-2xl sm:text-3xl font-bold text-white mb-8 max-w-2xl mx-auto leading-relaxed">
      &ldquo;Officially registered under Nepal government record, Regd. No. 15648/082/083&rdquo;
    </p>
    <div class="flex flex-wrap justify-center gap-8">
      <div class="text-center">
        <div class="font-display text-4xl font-bold text-[#C8A951]">2+</div>
        <div class="text-white/35 text-xs font-mono uppercase tracking-widest mt-1">Projects</div>
      </div>
      <div class="w-px bg-white/10 self-stretch"></div>
      <div class="text-center">
        <div class="font-display text-4xl font-bold text-[#C8A951]">2081</div>
        <div class="text-white/35 text-xs font-mono uppercase tracking-widest mt-1">Est. (BS)</div>
      </div>
      <div class="w-px bg-white/10 self-stretch"></div>
      <div class="text-center">
        <div class="font-display text-4xl font-bold text-[#C8A951]">15+</div>
        <div class="text-white/35 text-xs font-mono uppercase tracking-widest mt-1">Members</div>
      </div>
      <div class="w-px bg-white/10 self-stretch"></div>
      <div class="text-center">
        <div class="font-display text-4xl font-bold text-[#C8A951]">99%</div>
        <div class="text-white/35 text-xs font-mono uppercase tracking-widest mt-1">Satisfaction</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-16 bg-[#C8A951]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-6 reveal">
    <h2 class="font-display text-2xl sm:text-3xl font-bold text-[#0D1B2A]">Want to work with us?</h2>
    <a href="contact.php" class="inline-flex items-center gap-2 bg-[#0D1B2A] hover:bg-[#172840] text-white text-sm font-bold tracking-widest uppercase px-8 py-4 transition-colors duration-200">
      Get in Touch &rarr;
    </a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
