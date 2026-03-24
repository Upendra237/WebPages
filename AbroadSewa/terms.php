<?php
$page = 'terms';
$meta_title = 'Terms of Use';
$meta_desc = 'Read the Abroad Sewa terms of use for our website and consultancy services.';
require_once 'includes/header.php';
?>
<section class="bg-white border-b border-border py-14">
  <div class="max-w-3xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">Legal</span>
    <h1 class="sec-h mb-2">Terms of Use</h1>
    <p class="text-[12px] text-gray-400">Last updated: January 2025</p>
  </div>
</section>
<section class="py-14 bg-cream">
  <div class="max-w-3xl mx-auto px-6 lg:px-10 space-y-8">
    <?php
    $sections = [
      ['Acceptance of Terms', 'By accessing and using this website, you accept and agree to be bound by these Terms of Use. If you do not agree to these terms, please do not use this website.'],
      ['Services', 'Abroad Sewa provides education consultancy services including university selection, visa guidance, language coaching, and related support. All service fees and terms are communicated transparently before any commitment is made.'],
      ['Accuracy of Information', 'We strive to keep all information on this website accurate and up to date. However, university requirements, visa regulations, and costs can change. Always confirm critical details with our counselors before making decisions.'],
      ['User Conduct', 'You agree not to misuse this website, submit false information in forms, or attempt to interfere with website functionality. Any such activity may result in restriction from our services.'],
      ['Intellectual Property', 'All content on this website, including text, graphics, logos, and design, is the property of Abroad Sewa and may not be reproduced without written permission.'],
      ['Limitation of Liability', 'Abroad Sewa is not liable for visa refusals, university rejections, or any outcomes beyond our control. We provide guidance and preparation — final decisions rest with embassies and institutions.'],
      ['Changes to Terms', 'We reserve the right to update these terms at any time. Continued use of the website after changes constitutes acceptance of the revised terms.'],
      ['Contact', 'For questions about these terms, contact us at info@abroadsewa.com.np.'],
    ];
    foreach ($sections as [$title, $text]):
    ?>
    <div class="bg-white rounded-xl border border-border p-7">
      <h2 class="text-[16px] font-extrabold text-navy mb-3"><?= $title ?></h2>
      <p class="text-[13px] text-gray-500 leading-relaxed"><?= $text ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>
<?php require_once 'includes/footer.php'; ?>
