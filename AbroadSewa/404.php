<?php
$page = '404';
$meta_title = 'Page Not Found';
$meta_desc = 'The page you are looking for does not exist.';
require_once 'includes/header.php';
?>
<section class="min-h-[60vh] flex items-center justify-center py-20 bg-cream">
  <div class="text-center px-6">
    <div class="text-[80px] font-extrabold text-border leading-none mb-4">404</div>
    <h1 class="text-[28px] font-extrabold text-navy mb-3">Page not found</h1>
    <p class="text-[14px] text-gray-400 mb-8 max-w-sm mx-auto">The page you are looking for doesn't exist or may have been moved.</p>
    <div class="flex flex-wrap justify-center gap-3">
      <a href="<?= url('/') ?>" class="btn-navy">Go to Homepage</a>
      <a href="<?= url('/contact') ?>" class="btn-ghost">Contact Us</a>
    </div>
  </div>
</section>
<?php require_once 'includes/footer.php'; ?>
