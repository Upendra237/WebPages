<?php
$page = 'privacy';
$meta_title = 'Privacy Policy';
$meta_desc = 'Read the Abroad Sewa privacy policy — how we collect, use, and protect your personal information.';
require_once 'includes/header.php';
?>
<section class="bg-white border-b border-border py-14">
  <div class="max-w-3xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">Legal</span>
    <h1 class="sec-h mb-2">Privacy Policy</h1>
    <p class="text-[12px] text-gray-400">Last updated: January 2025</p>
  </div>
</section>
<section class="py-14 bg-cream">
  <div class="max-w-3xl mx-auto px-6 lg:px-10 space-y-8">
    <?php
    $sections = [
      ['Information We Collect', 'We collect personal information you provide when submitting enquiry forms, including your name, email address, phone number, and academic background. We also collect basic usage data such as pages visited and browser type.'],
      ['How We Use Your Information', 'Your information is used solely to provide counselling services, respond to your enquiries, and keep you informed about study abroad opportunities. We do not sell, rent, or share your personal data with third parties without your consent.'],
      ['Data Storage & Security', 'All data is stored securely on our servers. We implement industry-standard security measures to protect against unauthorized access, alteration, or disclosure of your information.'],
      ['Cookies', 'Our website uses minimal cookies to improve user experience. You can disable cookies in your browser settings. Disabling cookies will not affect the core functionality of the website.'],
      ['Your Rights', 'You have the right to request access to, correction of, or deletion of your personal data held by us. To make such a request, contact us at info@abroadsewa.com.np.'],
      ['Contact', 'For any privacy-related questions, please contact us at: info@abroadsewa.com.np or visit our office at Dillibazar, Kathmandu, Nepal.'],
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
