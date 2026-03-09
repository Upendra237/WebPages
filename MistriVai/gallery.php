<?php
$pageTitle = 'Gallery — Mistri Vai Engineering Club';
$pageDesc  = 'Photo gallery of Mistri Vai Engineering Club project sites, design work, and team activities across Nepal.';
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
<section class="py-20 lg:py-28 bg-[#F6F5F1]">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <!-- Filter tabs (static labels, JS-driven if needed) -->
    <div class="flex flex-wrap gap-2 mb-10">
      <?php
      $tabs = ['All', 'Site Work', 'Design &amp; Drawings', 'Team'];
      foreach ($tabs as $i => $tab): ?>
      <button
        class="gallery-tab font-mono text-[9.5px] tracking-[.18em] uppercase px-4 py-2 border transition-colors
               <?= $i === 0
                   ? 'border-[#C8A951] text-[#0D1B2A] bg-[#C8A951]'
                   : 'border-gray-300 text-gray-500 hover:border-[#0D1B2A] hover:text-[#0D1B2A] bg-white' ?>"
        data-filter="<?= strtolower(strip_tags($tab)) ?>">
        <?= $tab ?>
      </button>
      <?php endforeach; ?>
    </div>

    <!-- Placeholder grid (replace bg divs with <img> tags when photos are ready) -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3" id="galleryGrid">
      <?php
      $cells = json_decode(file_get_contents(__DIR__ . '/data/gallery.json'), true) ?? [];
      foreach ($cells as $cell):
        $bg       = $cell['bg'];
        $category = $cell['label'];
        $caption  = htmlspecialchars($cell['caption']);
      ?>
      <div class="group relative aspect-square overflow-hidden cursor-pointer"
           data-category="<?= strtolower(strip_tags($category)) ?>">
        <!-- Replace this div with <img src="..." /> when photos are available -->
        <div class="w-full h-full flex flex-col items-center justify-center"
             style="background-color:<?= $bg ?>;">
          <div class="w-8 h-[2px] bg-[#C8A951] mb-2"></div>
          <p class="font-mono text-[8px] tracking-[.15em] uppercase text-[#C8A951] text-center px-2"><?= $category ?></p>
        </div>
        <!-- Hover overlay -->
        <div class="absolute inset-0 bg-[#0D1B2A]/80 opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
          <p class="text-white text-xs leading-snug"><?= $caption ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <p class="mt-8 text-center text-sm text-gray-400">
      More photos coming soon. Follow us on
      <a href="https://www.instagram.com/mistrivai" target="_blank" rel="noreferrer"
         class="text-[#C8A951] hover:underline">@mistrivai</a>
      on Instagram.
    </p>

  </div>
</section>

<script>
(function(){
  const tabs  = document.querySelectorAll('.gallery-tab');
  const cards = document.querySelectorAll('#galleryGrid > div');
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const filter = tab.dataset.filter;
      // Style tabs
      tabs.forEach(t => {
        t.classList.remove('border-[#C8A951]','text-[#0D1B2A]','bg-[#C8A951]');
        t.classList.add('border-gray-300','text-gray-500','bg-white');
      });
      tab.classList.add('border-[#C8A951]','text-[#0D1B2A]','bg-[#C8A951]');
      tab.classList.remove('border-gray-300','text-gray-500','bg-white');
      // Filter cards
      cards.forEach(card => {
        const cat = card.dataset.category || '';
        const show = filter === 'all' || cat.includes(filter);
        card.style.display = show ? '' : 'none';
      });
    });
  });
})();
</script>

<?php include 'includes/footer.php'; ?>
