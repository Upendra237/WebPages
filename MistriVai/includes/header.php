<?php
// Current page detection for active nav state
$currentPage = basename($_SERVER['PHP_SELF'], '.php');

function navItem(string $page, string $label, string $href = ''): string {
    global $currentPage;
    $href  = $href ?: $page . '.php';
    $slug  = basename($page, '.php');
    $active = $currentPage === $slug;
    $base  = 'relative text-[11px] font-semibold tracking-[.14em] uppercase transition-colors duration-200 py-1';
    $color = $active ? 'text-[#C8A951]' : 'text-white/75 hover:text-white';
    $bar   = $active
        ? '<span class="absolute -bottom-[2px] left-0 right-0 h-[2px] bg-[#C8A951] rounded-full"></span>'
        : '';
    return "<a href=\"$href\" class=\"$base $color\">$label$bar</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
  <title><?= $pageTitle ?? 'Mistri Vai Engineering' ?></title>
  <meta name="description" content="<?= $pageDesc ?? 'Mistri Vai Engineering — civil engineering, architectural design and construction consulting rooted in Nepal.' ?>"/>
  <link rel="icon" type="image/png" href="assets/logo.png"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            navy:    '#0D1B2A',
            'navy-mid':   '#172840',
            'navy-light': '#1E3353',
            gold:    '#C8A951',
            'gold-light':  '#DFC06A',
            'gold-pale':   '#F5EDD5',
            offwhite:'#F6F5F1',
          },
          fontFamily: {
            display: ['"Playfair Display"','serif'],
            sans:    ['Inter','sans-serif'],
            mono:    ['"DM Mono"','monospace'],
          },
          keyframes: {
            fadeUp:     { '0%':{opacity:'0',transform:'translateY(22px)'},'100%':{opacity:'1',transform:'translateY(0)'} },
            slideDown:  { '0%':{opacity:'0',transform:'translateY(-6px)'},'100%':{opacity:'1',transform:'translateY(0)'} },
          },
          animation: {
            'fade-up':   'fadeUp .55s ease both',
            'slide-down':'slideDown .22s ease both',
          }
        }
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400&family=Inter:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
  <?php if(isset($extraCss)): echo $extraCss; endif; ?>
</head>
<body class="bg-offwhite text-navy font-sans antialiased overflow-x-hidden">

<!--   HEADER   -->
<header class="fixed top-0 inset-x-0 z-50 transition-all duration-300" id="siteHeader">
  <div class="bg-navy/95 backdrop-blur-md border-b border-white/[.07]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-[66px]">

        <!--  Brand / Logo  -->
        <a href="index.php" class="flex items-center gap-3 group shrink-0">
          <!-- Logo mark: white pill container so any logo colour pops -->
          <div class="flex items-center justify-center w-10 h-10 bg-white rounded-lg shadow overflow-hidden shrink-0">
            <img
              src="assets/logo.png"
              alt="Mistri Vai"
              class="w-9 h-9 object-contain block"
              loading="eager"
            />
          </div>
          <div class="leading-none">
            <!-- Mobile: two bold branded lines -->
            <div class="sm:hidden">
              <p class="text-white font-bold text-[15px] tracking-wide leading-none">Mistri Vai</p>
              <p class="text-[#C8A951] font-mono text-[9px] font-semibold tracking-[.2em] uppercase mt-[3px]">Engineering</p>
            </div>
            <!-- sm+: same two-line layout -->
            <div class="hidden sm:block">
              <p class="text-white font-semibold text-[13px] tracking-wide leading-none">Mistri Vai</p>
              <p class="text-[#C8A951] font-mono text-[9.5px] tracking-[.18em] uppercase mt-[3px]">Engineering</p>
            </div>
          </div>
        </a>

        <!--  Desktop links  -->
        <nav class="hidden md:flex items-center gap-6">
          <?= navItem('index',    'Home')    ?>
          <?= navItem('about',    'About')   ?>
          <?= navItem('services', 'Services') ?>
          <?= navItem('projects', 'Projects') ?>
          <?= navItem('gallery',  'Gallery') ?>
          <?= navItem('team',     'Team')    ?>
        </nav>

        <!--  CTA + Hamburger  -->
        <div class="flex items-center gap-3">
          <a href="contact.php"
             class="hidden md:inline-flex items-center gap-1.5 bg-[#C8A951] hover:bg-[#DFC06A] text-navy text-[11px] font-bold tracking-[.14em] uppercase px-5 py-2.5 rounded-sm transition-colors duration-200">
            Contact Us
          </a>
          <button id="mobileToggle" aria-label="Toggle menu"
                  class="md:hidden flex flex-col justify-center gap-[5px] w-9 h-9 p-1.5">
            <span class="w-full h-[2px] bg-white rounded block transition-all duration-300 origin-center" id="mb1"></span>
            <span class="w-full h-[2px] bg-white rounded block transition-all duration-300"               id="mb2"></span>
            <span class="w-4/5 h-[2px] bg-white rounded block transition-all duration-300 origin-center"  id="mb3"></span>
          </button>
        </div>

      </div>
    </div>
  </div>

  <!--  Mobile Drawer  -->
  <div id="mobileMenu"
       class="hidden md:hidden bg-navy-mid border-t border-white/[.08] animate-slide-down">
    <nav class="flex flex-col px-5 py-4 gap-0.5">
      <?php
      $mobileLinks = [
        ['index','Home'],['about','About'],['services','Services'],
        ['projects','Projects'],['gallery','Gallery'],['team','Team']
      ];
      foreach ($mobileLinks as [$page, $lbl]):
        $a = $currentPage === $page;
        $c = $a ? 'text-[#C8A951] font-semibold' : 'text-white/75';
      ?>
      <a href="<?= $page ?>.php"
         class="<?= $c ?> text-sm tracking-wide py-3 border-b border-white/[.06] last:border-0">
        <?= $lbl ?>
      </a>
      <?php endforeach; ?>
      <a href="contact.php"
         class="mt-3 bg-[#C8A951] text-navy text-[11px] font-bold tracking-[.14em] uppercase text-center py-3 rounded-sm">
        Contact Us
      </a>
    </nav>
  </div>
</header>

<!-- Spacer so content doesn't hide under fixed header —
     bg-[#0D1B2A] prevents offwhite flash before dark-hero pages -->
<div class="h-[66px] bg-[#0D1B2A]"></div>

<script>
(function(){
  const header = document.getElementById('siteHeader');
  const bg     = header.querySelector('[class*="bg-navy"]');
  window.addEventListener('scroll', () => {
    const scrolled = window.scrollY > 30;
    header.style.filter = scrolled ? 'drop-shadow(0 4px 16px rgba(0,0,0,.35))' : '';
  }, {passive:true});

  const btn  = document.getElementById('mobileToggle');
  const menu = document.getElementById('mobileMenu');
  const mb1  = document.getElementById('mb1');
  const mb2  = document.getElementById('mb2');
  const mb3  = document.getElementById('mb3');
  let open = false;
  btn.addEventListener('click', () => {
    open = !open;
    menu.classList.toggle('hidden', !open);
    mb1.style.transform = open ? 'rotate(45deg) translate(0,7px)'  : '';
    mb2.style.opacity   = open ? '0' : '1';
    mb3.style.transform = open ? 'rotate(-45deg) translate(0,-7px)' : '';
    mb3.style.width     = open ? '100%' : '';
  });
})();
</script>
