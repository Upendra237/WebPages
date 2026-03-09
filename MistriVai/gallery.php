<?php
$pageTitle = 'Gallery &mdash; Mistri Vai Engineering Club';
$pageDesc  = 'Photo gallery of Mistri Vai Engineering Club activities, site visits, and project work across Nepal.';
include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="bg-[#0D1B2A] py-24 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.05]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:60px 60px;"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
    <div class="flex items-center gap-3 mb-5 reveal">
      <span class="w-8 h-px bg-[#C8A951]"></span>
      <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951]">Gallery</span>
    </div>
    <h1 class="font-display text-5xl sm:text-6xl font-bold text-white max-w-2xl leading-tight reveal">
      Work in Progress
    </h1>
    <p class="mt-5 text-white/50 text-lg max-w-xl reveal">
      A visual record of our site visits, design sessions, and community engagements.
    </p>
  </div>
</section>

<!-- COMING SOON  -->
<section class="py-32 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <div class="text-center mb-16 reveal">
      <span class="font-mono text-[10px] tracking-[.25em] uppercase text-[#C8A951] block mb-3">Visual Archive</span>
      <h2 class="font-display text-3xl sm:text-4xl font-bold text-[#0D1B2A]">Gallery Coming Soon</h2>
      <p class="mt-4 text-[#0D1B2A]/50 text-base max-w-md mx-auto">
        We are curating site photography and project documentation. Check back soon &mdash; or follow us on Instagram for the latest updates.
      </p>
    </div>

    <!-- Placeholder tiles -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
      <?php for ($i = 0; $i < 8; $i++): ?>
      <div class="bg-[#0D1B2A] aspect-square flex items-center justify-center relative overflow-hidden reveal group">
        <div class="absolute inset-0 opacity-[.06]"
             style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:30px 30px;"></div>
        <svg class="w-10 h-10 text-white/10 group-hover:text-[#C8A951]/30 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
        </svg>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- INSTAGRAM CTA -->
<section class="py-20 bg-[#0D1B2A]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8 text-center reveal">
    <span class="font-mono text-[10px] uppercase tracking-[.25em] text-[#C8A951] block mb-5">Follow Our Work</span>
    <h2 class="font-display text-3xl sm:text-4xl font-bold text-white mb-6">
      See Us in Action on Instagram
    </h2>
    <a href="https://www.instagram.com/mistrivai" target="_blank" rel="noopener"
       class="inline-flex items-center gap-3 bg-gradient-to-r from-[#C8A951] to-[#DFC06A] text-[#0D1B2A] text-sm font-bold tracking-widest uppercase px-10 py-4 transition-opacity hover:opacity-90">
      @mistrivai
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
      </svg>
    </a>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
