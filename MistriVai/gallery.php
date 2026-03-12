<?php
$pageTitle = 'Gallery — Mistri Vai Engineering';
$pageDesc  = 'Photo gallery of Mistri Vai Engineering project sites, field work, and team activities across Nepal.';
include 'includes/header.php';
?>

<!-- ═══════════════════  PAGE HERO  ═══════════════════ -->
<section class="bg-[#0D1B2A] py-20 lg:py-28 relative overflow-hidden">
  <div class="absolute inset-0 opacity-[.04]"
       style="background-image:linear-gradient(#C8A951 1px,transparent 1px),linear-gradient(90deg,#C8A951 1px,transparent 1px);background-size:48px 48px"></div>
  <div class="relative max-w-7xl mx-auto px-5 lg:px-8">
    <p class="font-mono text-[#C8A951] text-[10px] tracking-[.28em] uppercase mb-3">Gallery</p>
    <h1 class="font-display text-5xl lg:text-6xl font-bold text-white leading-tight">
      Our Work in Pictures
    </h1>
  </div>
</section>


<!-- ═══════════════════  GALLERY GRID  ═══════════════════ -->
<section class="py-16 lg:py-24 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <?php
    $exts   = ['jpg','jpeg','png','gif','webp','avif','svg'];
    $all    = glob(__DIR__ . '/assets/gallery/*') ?: [];
    $images = array_values(array_filter($all, function($f) use ($exts) {
        return in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), $exts);
    }));
    $images = array_map('basename', $images);
    ?>

    <?php if (empty($images)): ?>
      <p class="text-center text-gray-400 font-mono text-sm tracking-widest uppercase py-20">
        Photos coming soon &mdash; follow us on
        <a href="https://www.instagram.com/mistri_vai_079/" target="_blank" rel="noreferrer"
           class="text-[#C8A951] hover:underline">Instagram</a>.
      </p>
    <?php else: ?>

    <!-- Masonry grid via CSS columns -->
    <div class="columns-2 sm:columns-3 lg:columns-4 gap-3">
      <?php foreach ($images as $img): ?>
      <div class="break-inside-avoid mb-3 overflow-hidden rounded-sm group">
        <img
          src="assets/gallery/<?= htmlspecialchars($img) ?>"
          alt=""
          class="w-full h-auto block transition-transform duration-500 group-hover:scale-[1.04] cursor-zoom-in"
          loading="lazy"
        />
      </div>
      <?php endforeach; ?>
    </div>

    <?php endif; ?>

  </div>
</section>

<?php include 'includes/footer.php'; ?>
