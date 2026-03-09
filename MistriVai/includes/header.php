<?php
$currentPage = basename($_SERVER['PHP_SELF']);
function isActive($page) {
    global $currentPage;
    return $currentPage === $page ? true : false;
}
function navLink($href, $label) {
    $page = basename($href);
    $active = basename($GLOBALS['currentPage']) === $page;
    $base = $active
        ? 'text-[#C8A951] border-b-2 border-[#C8A951] pb-0.5'
        : 'text-white/70 hover:text-white border-b-2 border-transparent pb-0.5 transition-colors duration-200';
    echo "<a href=\"$href\" class=\"text-xs font-semibold tracking-widest uppercase $base\">$label</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
  <title><?= $pageTitle ?? 'Mistri Vai Engineering Club' ?></title>
  <meta name="description" content="<?= $pageDesc ?? 'Mistri Vai Engineering Club  civil engineering, architectural design and construction consulting rooted in Nepal.' ?>"/>
  <link rel="icon" type="image/png" href="assets/logo.png"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            navy:    { DEFAULT:'#0D1B2A', mid:'#172840', light:'#1E3353' },
            gold:    { DEFAULT:'#C8A951', light:'#DFC06A', pale:'#F5EDD5' },
            offwhite:'#F6F5F1',
          },
          fontFamily: {
            display: ['"Playfair Display"','serif'],
            sans:    ['Inter','sans-serif'],
            mono:    ['"DM Mono"','monospace'],
          },
          keyframes: {
            fadeUp: { '0%':{ opacity:'0', transform:'translateY(20px)' }, '100%':{ opacity:'1', transform:'translateY(0)' } },
            slideDown: { '0%':{ opacity:'0', transform:'translateY(-8px)' }, '100%':{ opacity:'1', transform:'translateY(0)' } },
          },
          animation: {
            'fade-up':    'fadeUp .55s ease forwards',
            'slide-down': 'slideDown .25s ease forwards',
          }
        }
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400;1,700&family=Inter:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css"/>
</head>
<body class="bg-offwhite text-navy-DEFAULT font-sans antialiased">

<!--  NAV  -->
<header class="fixed top-0 left-0 right-0 z-50 bg-navy-DEFAULT/95 backdrop-blur-md border-b border-white/5" id="siteHeader">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">
    <div class="flex items-center justify-between h-[68px]">

      <!-- Logo -->
      <a href="index.php" class="flex items-center gap-3 group shrink-0">
        <div class="bg-white rounded-md shadow-md p-1 flex items-center justify-center w-11 h-11 overflow-hidden">
          <img src="assets/logo.png" alt="Mistri Vai" class="w-full h-full object-contain"/>
        </div>
        <div class="hidden sm:block leading-tight">
          <div class="text-white font-semibold text-sm tracking-wide">Mistri Vai</div>
          <div class="text-[#C8A951] font-mono text-[10px] tracking-widest uppercase">Engineering Club</div>
        </div>
      </a>

      <!-- Desktop Nav -->
      <nav class="hidden md:flex items-center gap-7">
        <?php navLink('index.php',    'Home');    ?>
        <?php navLink('about.php',    'About');   ?>
        <?php navLink('services.php', 'Services'); ?>
        <?php navLink('projects.php', 'Projects'); ?>
        <?php navLink('gallery.php',  'Gallery'); ?>
        <?php navLink('team.php',     'Team');    ?>
      </nav>

      <!-- CTA + Hamburger -->
      <div class="flex items-center gap-3">
        <a href="contact.php" class="hidden md:inline-flex items-center gap-2 bg-[#C8A951] hover:bg-[#DFC06A] text-navy-DEFAULT text-xs font-bold tracking-widest uppercase px-5 py-2.5 transition-colors duration-200">
          Contact Us
        </a>
        <button id="mobileToggle" aria-label="Menu" class="md:hidden flex flex-col gap-[5px] p-2">
          <span class="w-5 h-0.5 bg-white block transition-all duration-300" id="mb1"></span>
          <span class="w-5 h-0.5 bg-white block transition-all duration-300" id="mb2"></span>
          <span class="w-4 h-0.5 bg-white block transition-all duration-300" id="mb3"></span>
        </button>
      </div>

    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="hidden md:hidden bg-navy-mid border-t border-white/10 px-5 py-4 flex flex-col gap-1 animate-slide-down">
    <?php
    $mobileLinks = [
      ['index.php','Home'],['about.php','About'],['services.php','Services'],
      ['projects.php','Projects'],['gallery.php','Gallery'],['team.php','Team']
    ];
    foreach ($mobileLinks as [$href,$lbl]) {
      $a = basename($currentPage) === basename($href);
      $cls = $a ? 'text-[#C8A951] font-semibold' : 'text-white/70';
      echo "<a href=\"$href\" class=\"$cls text-sm tracking-wide py-3 border-b border-white/5 last:border-0\">$lbl</a>";
    }
    ?>
    <a href="contact.php" class="mt-3 bg-[#C8A951] text-navy-DEFAULT text-xs font-bold tracking-widest uppercase text-center py-3">
      Contact Us
    </a>
  </div>
</header>

<div class="h-[68px]"></div><!-- spacer -->

<script>
  // Scroll effect
  const sh = document.getElementById('siteHeader');
  window.addEventListener('scroll', () => {
    sh.classList.toggle('shadow-lg', window.scrollY > 30);
    sh.classList.toggle('bg-navy-DEFAULT', window.scrollY > 30);
  });
  // Mobile toggle
  const btn = document.getElementById('mobileToggle');
  const menu = document.getElementById('mobileMenu');
  const mb1 = document.getElementById('mb1');
  const mb2 = document.getElementById('mb2');
  const mb3 = document.getElementById('mb3');
  let open = false;
  btn.addEventListener('click', () => {
    open = !open;
    menu.classList.toggle('hidden', !open);
    mb1.style.transform = open ? 'rotate(45deg) translate(4px,4px)' : '';
    mb2.style.opacity = open ? '0' : '1';
    mb3.style.transform = open ? 'rotate(-45deg) translate(3px,-4px)' : '';
    mb3.style.width = open ? '20px' : '';
  });
  // Reveal on scroll
  const ro = new IntersectionObserver((es) => es.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } }), { threshold: 0.1 });
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.reveal').forEach(el => ro.observe(el));
  });
</script>
