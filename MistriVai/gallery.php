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
      Our Gallery
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
    $imagesJson = json_encode($images);
    ?>

    <?php if (empty($images)): ?>
      <p class="text-center text-gray-400 font-mono text-sm tracking-widest uppercase py-20">
        Photos coming soon &mdash; follow us on
        <a href="https://www.instagram.com/mistri_vai_079/" target="_blank" rel="noreferrer"
           class="text-[#C8A951] hover:underline">@mistri_vai_079</a>.
      </p>
    <?php else: ?>

    <!-- Masonry grid (populated by JS for lazy loading) -->
    <div id="masonryGrid" class="columns-2 sm:columns-3 lg:columns-4 gap-3"></div>
    <!-- Sentinel triggers next batch when scrolled into view -->
    <div id="loadSentinel" class="h-8 mt-2"></div>

    <?php endif; ?>

  </div>
</section>

<!-- ═══ LIGHTBOX ═══ -->
<div id="lightbox" class="fixed inset-0 z-[999] bg-black/95 hidden" aria-modal="true" role="dialog">
  <button onclick="closeLightbox()" aria-label="Close"
          class="absolute top-4 right-5 text-white/60 hover:text-white text-4xl font-light leading-none z-10 transition-colors">&times;</button>

  <!-- Main image -->
  <div class="absolute inset-0 bottom-[88px] flex items-center justify-center px-14">
    <button onclick="lightboxNav(-1)" aria-label="Previous"
            class="absolute left-2 sm:left-4 p-3 text-white/60 hover:text-white transition-colors">
      <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <img id="lbMain" src="" alt="" class="max-h-full max-w-full object-contain select-none rounded-sm shadow-2xl"/>
    <button onclick="lightboxNav(1)" aria-label="Next"
            class="absolute right-2 sm:right-4 p-3 text-white/60 hover:text-white transition-colors">
      <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
    </button>
  </div>

  <!-- Thumbnail strip -->
  <div id="lbThumbs"
       class="absolute bottom-0 left-0 right-0 h-[88px] flex items-center gap-1.5 px-4 overflow-x-auto bg-black/50 shrink-0"></div>
</div>

<script>
(function(){
  const images = <?= $imagesJson ?? '[]' ?>;
  if (!images.length) return;

  const base  = 'assets/gallery/';
  const FIRST = 15, MORE = 10;
  let loaded = 0, lbIdx = 0;

  const grid     = document.getElementById('masonryGrid');
  const sentinel = document.getElementById('loadSentinel');
  const lb       = document.getElementById('lightbox');
  const lbMain   = document.getElementById('lbMain');
  const lbThumbs = document.getElementById('lbThumbs');

  /* --- build one card --- */
  function makeCard(img, idx) {
    const div = document.createElement('div');
    div.className = 'break-inside-avoid mb-3 overflow-hidden group cursor-zoom-in rounded-sm';
    const im = document.createElement('img');
    im.src = base + img;
    im.alt = '';
    im.loading = 'lazy';
    im.className = 'w-full h-auto block transition-transform duration-500 group-hover:scale-[1.04]';
    im.addEventListener('click', () => openLightbox(idx));
    div.appendChild(im);
    return div;
  }

  function loadBatch(n) {
    const end  = Math.min(loaded + n, images.length);
    const frag = document.createDocumentFragment();
    for (let i = loaded; i < end; i++) frag.appendChild(makeCard(images[i], i));
    grid.appendChild(frag);
    loaded = end;
  }

  loadBatch(FIRST);

  /* --- infinite scroll --- */
  const io = new IntersectionObserver(entries => {
    if (entries[0].isIntersecting && loaded < images.length) loadBatch(MORE);
  }, { rootMargin: '400px' });
  if (sentinel) io.observe(sentinel);

  /* --- lightbox --- */
  function renderLb() {
    lbMain.src = base + images[lbIdx];
    lbThumbs.innerHTML = '';
    images.forEach((img, i) => {
      const th = document.createElement('img');
      th.src        = base + img;
      th.loading    = 'lazy';
      th.alt        = '';
      th.className  = 'h-14 w-auto shrink-0 cursor-pointer object-cover rounded-sm transition-all duration-150 ' +
        (i === lbIdx ? 'opacity-100 ring-2 ring-[#C8A951]' : 'opacity-35 hover:opacity-75');
      th.addEventListener('click', () => { lbIdx = i; renderLb(); });
      lbThumbs.appendChild(th);
    });
    lbThumbs.children[lbIdx]?.scrollIntoView({ inline: 'center', behavior: 'smooth', block: 'nearest' });
  }

  function openLightbox(idx) {
    lbIdx = idx;
    lb.classList.remove('hidden');
    lb.style.display = 'flex';
    lb.style.flexDirection = 'column';
    document.body.style.overflow = 'hidden';
    renderLb();
  }

  function closeLightbox() {
    lb.style.display = '';
    lb.classList.add('hidden');
    document.body.style.overflow = '';
  }

  window.lightboxNav  = (dir) => { lbIdx = (lbIdx + dir + images.length) % images.length; renderLb(); };
  window.openLightbox  = openLightbox;
  window.closeLightbox = closeLightbox;

  document.addEventListener('keydown', e => {
    if (lb.classList.contains('hidden')) return;
    if (e.key === 'ArrowLeft')  lightboxNav(-1);
    if (e.key === 'ArrowRight') lightboxNav(1);
    if (e.key === 'Escape')     closeLightbox();
  });
  lb.addEventListener('click', e => { if (e.target === lb) closeLightbox(); });
})();
</script>

<?php include 'includes/footer.php'; ?>
