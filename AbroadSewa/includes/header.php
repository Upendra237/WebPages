<?php
require_once __DIR__ . '/functions.php';
$site = site_data();
$page = current_page();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php meta_tags($meta_title ?? $site['name'], $meta_desc ?? $site['description']); ?>
<meta name="robots" content="index, follow">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        cream: '#F4F1EC',
        navy: '#1A2744',
        orange: { DEFAULT: '#E8630A', light: '#FEF0E6', dark: '#C04E08' },
        border: '#E8E4DC',
      },
      fontFamily: { sans: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'] },
      letterSpacing: { tighter: '-0.04em', tight: '-0.03em' },
    }
  }
}
</script>
<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="font-sans bg-cream text-navy antialiased">

<!-- NAV -->
<header class="bg-white border-b border-border sticky top-0 z-50">
  <nav class="max-w-7xl mx-auto px-6 lg:px-10 flex items-center justify-between h-16">
    <a href="/" class="text-[18px] font-extrabold tracking-tight text-navy">
      Abroad<span class="text-[#E8630A]">Sewa</span>
    </a>
    <!-- Desktop nav -->
    <ul class="hidden md:flex items-center gap-6">
      <?php
      $nav = [
        'home' => ['/', 'Home'],
        'about' => ['/about', 'About Us'],
        'services' => ['/services', 'Services'],
        'destinations' => ['/destinations', 'Destinations'],
        'testimonials' => ['/testimonials', 'Stories'],
        'contact' => ['/contact', 'Contact'],
      ];
      foreach ($nav as $key => [$href, $label]): ?>
        <li><a href="<?= $href ?>" class="text-[13px] font-medium <?= $page === $key ? 'text-[#E8630A]' : 'text-gray-500 hover:text-navy' ?> transition-colors"><?= $label ?></a></li>
      <?php endforeach; ?>
    </ul>
    <a href="/contact" class="hidden md:inline-flex items-center bg-navy text-white text-[13px] font-bold px-5 py-2.5 rounded-lg hover:bg-[#E8630A] transition-colors">
      Free Consultation
    </a>
    <!-- Mobile menu button -->
    <button id="menu-btn" class="md:hidden p-2 rounded-lg hover:bg-cream" aria-label="Menu">
      <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
    </button>
  </nav>
  <!-- Mobile menu -->
  <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-border px-6 pb-4">
    <?php foreach ($nav as $key => [$href, $label]): ?>
      <a href="<?= $href ?>" class="block py-3 text-[14px] font-medium border-b border-border last:border-0 <?= $page === $key ? 'text-[#E8630A]' : 'text-gray-600' ?>"><?= $label ?></a>
    <?php endforeach; ?>
    <a href="/contact" class="mt-3 block text-center bg-navy text-white text-[13px] font-bold px-5 py-3 rounded-lg">Free Consultation</a>
  </div>
</header>
