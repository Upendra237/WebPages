<?php
$pageTitle = 'Our Team &mdash; Mistri Vai Engineering Club';
$pageDesc  = 'Meet the student civil engineers behind Mistri Vai Engineering Club.';
include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="bg-[#0D1B2A] py-24 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.05]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:60px 60px;"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
    <div class="flex items-center gap-3 mb-5 reveal">
      <span class="w-8 h-px bg-[#C8A951]"></span>
      <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951]">Team</span>
    </div>
    <h1 class="font-display text-5xl sm:text-6xl font-bold text-white max-w-2xl leading-tight reveal">
      Meet the Team
    </h1>
    <p class="mt-5 text-white/50 text-lg max-w-xl reveal">
      15+ passionate civil engineering students united by one goal &mdash; to build Nepal better.
    </p>
  </div>
</section>

<!-- LEADERSHIP -->
<section class="py-24 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <div class="mb-14 reveal">
      <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951] block mb-3">Leadership</span>
      <h2 class="font-display text-4xl font-bold text-[#0D1B2A]">Executive Committee</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php
      $leaders = [
        ['President',       'Nischit Shrestha',    'Structural design lead, project coordination, and club operations.'],
        ['Vice President',  'To Be Updated',       ''],
        ['Secretary',       'To Be Updated',       ''],
        ['Treasurer',       'To Be Updated',       ''],
        ['Technical Head',  'To Be Updated',       ''],
        ['Creative Head',   'To Be Updated',       ''],
      ];
      foreach ($leaders as [$role, $name, $bio]) {
        $hasInfo = $name !== 'To Be Updated';
        echo '<div class="bg-white border border-[#0D1B2A]/8 p-7 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 reveal">';
        echo '<div class="w-16 h-16 bg-[#0D1B2A] mb-5 flex items-center justify-center">'; 
        echo '<span class="font-display text-2xl font-bold text-[#C8A951]">'.htmlspecialchars(mb_substr($name, 0, 1)).'</span>';
        echo '</div>';
        echo '<div class="font-mono text-[10px] uppercase tracking-[.2em] text-[#C8A951] mb-2">'.htmlspecialchars($role).'</div>';
        if ($hasInfo) {
          echo '<h3 class="font-display text-xl font-bold text-[#0D1B2A] mb-2">'.htmlspecialchars($name).'</h3>';
          if ($bio) echo '<p class="text-[#0D1B2A]/50 text-sm leading-relaxed">'.htmlspecialchars($bio).'</p>';
        } else {
          echo '<p class="text-[#0D1B2A]/30 text-sm italic">Details coming soon</p>';
        }
        echo '</div>';
      }
      ?>
    </div>
  </div>
</section>

<!-- ALL MEMBERS -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <div class="mb-14 reveal">
      <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951] block mb-3">Members</span>
      <h2 class="font-display text-4xl font-bold text-[#0D1B2A]">Our Members</h2>
      <p class="mt-3 text-[#0D1B2A]/50 text-base max-w-lg">
        Full member profiles are being updated. Reach out to learn more about our team.
      </p>
    </div>

    <!-- Count honourable mention -->
    <div class="border border-[#0D1B2A]/8 p-10 flex flex-col sm:flex-row items-center gap-10 reveal">
      <div class="text-center sm:text-left shrink-0">
        <div class="font-display text-7xl font-bold text-[#C8A951]">15+</div>
        <div class="font-mono text-xs uppercase tracking-widest text-[#0D1B2A]/40 mt-2">Active Members</div>
      </div>
      <div class="w-px bg-[#0D1B2A]/8 self-stretch hidden sm:block"></div>
      <p class="text-[#0D1B2A]/60 text-base leading-relaxed">
        Mistri Vai has grown from a small group of passionate students into a 15+ member club. Our members come from different colleges and backgrounds, united by their focus on civil engineering and a genuine desire to contribute to Nepal's development. Full team details will be published here soon.
      </p>
    </div>
  </div>
</section>

<!-- JOIN US -->
<section class="py-24 bg-[#0D1B2A] relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.04]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:60px 60px;"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8 text-center reveal">
    <span class="font-mono text-[10px] uppercase tracking-[.25em] text-[#C8A951] block mb-4">Join Us</span>
    <h2 class="font-display text-4xl sm:text-5xl font-bold text-white mb-5">Want to be Part of the Team?</h2>
    <p class="text-white/45 text-lg max-w-lg mx-auto mb-10">
      We welcome motivated civil engineering students who want to gain real-world experience while contributing to Nepal.
    </p>
    <a href="contact.php" class="inline-flex items-center gap-2 bg-[#C8A951] hover:bg-[#DFC06A] text-[#0D1B2A] text-sm font-bold tracking-widest uppercase px-10 py-4 transition-colors duration-200">
      Get in Touch &rarr;
    </a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
