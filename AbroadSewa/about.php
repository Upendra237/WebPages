<?php
$page = 'about';
$meta_title = 'About Us — Our Story & Team';
$meta_desc = 'Learn about Abroad Sewa — Nepal\'s leading Japan education consultancy established in 2010. Meet our team of expert counselors and learn our mission.';
require_once 'includes/header.php';
$team = load_json('team.json');
?>

<!-- PAGE HERO -->
<section class="bg-white border-b border-border py-14">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">About Us</span>
    <h1 class="sec-h mb-3">Our Story</h1>
    <p class="text-[15px] text-gray-500 max-w-2xl leading-relaxed">
      Founded in 2010, Abroad Sewa has grown from a small Kathmandu office into Nepal's most trusted Japan education consultancy — with over 3,500 students placed across the globe.
    </p>
  </div>
</section>

<!-- STORY -->
<section class="py-16 bg-cream">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">
    <div class="fade-in">
      <span class="sec-tag">Who We Are</span>
      <h2 class="sec-h mb-5">Helping Nepali students<br>reach the world since 2010</h2>
      <p class="text-[14px] text-gray-500 leading-relaxed mb-4">
        Abroad Sewa was established with a single mission: to make quality international education accessible to every deserving Nepali student. Japan was our first and primary focus — a country that offers excellent education, part-time work opportunities, and a pathway to a globally competitive career.
      </p>
      <p class="text-[14px] text-gray-500 leading-relaxed mb-4">
        Over 14 years, we have built partnerships with 120+ universities and language schools across Japan, Australia, Canada, the UK, and South Korea. Our counselors are not just advisors — many of them have personally studied or lived abroad and bring genuine first-hand experience to every consultation.
      </p>
      <p class="text-[14px] text-gray-500 leading-relaxed">
        We take pride in our 98% visa success rate — a result of meticulous documentation, honest counseling, and genuine care for every student's future.
      </p>
    </div>
    <div class="grid grid-cols-2 gap-4 fade-in">
      <?php foreach ([
        ['3,500+', 'Students successfully placed abroad'],
        ['98%', 'Visa approval rate — among Nepal\'s highest'],
        ['120+', 'Partner universities and language schools'],
        ['14 Years', 'Of trusted service to Nepali students'],
      ] as [$num, $lbl]): ?>
      <div class="bg-white rounded-xl p-5 border border-border text-center">
        <div class="text-[28px] font-extrabold text-[#E8630A] tracking-tight mb-1"><?= $num ?></div>
        <div class="text-[12px] text-gray-500 leading-snug"><?= $lbl ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- MISSION & VALUES -->
<section class="py-16 bg-white border-y border-border">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">Mission & Values</span>
    <h2 class="sec-h mb-10">What drives us</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <?php foreach ([
        ['Mission','To make world-class international education accessible, affordable, and achievable for every Nepali student — regardless of background.'],
        ['Vision','To be the most trusted and transparent education consultancy in Nepal, recognized for genuine guidance and outstanding student outcomes.'],
        ['Values','Honesty in every interaction. Genuine care for every student. Transparency in every fee and process. Excellence in every document we prepare.'],
      ] as [$title, $text]): ?>
      <div class="bg-cream rounded-xl p-7 border border-border fade-in">
        <div class="w-10 h-10 rounded-full bg-orange-light flex items-center justify-center mb-4">
          <span class="text-[#E8630A] font-extrabold text-[14px]"><?= $title[0] ?></span>
        </div>
        <h3 class="text-[15px] font-bold text-navy mb-3"><?= $title ?></h3>
        <p class="text-[13px] text-gray-500 leading-relaxed"><?= $text ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- WHY CHOOSE US -->
<section class="py-16 bg-cream">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">Why Choose Us</span>
    <h2 class="sec-h mb-10">What makes Abroad Sewa different</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
      <?php foreach ([
        ['98% Visa Success Rate', 'Our meticulous documentation and thorough embassy preparation gives you the best possible chance of approval every time.'],
        ['Japan Specialists', 'Japan is not a side service for us — it is our core focus. We know the Japanese university system, language requirements, and visa process inside out.'],
        ['No Hidden Fees', 'We believe in full transparency. Every fee is disclosed upfront. There are no surprises at any stage of your journey.'],
        ['In-house Language Classes', 'We offer JLPT coaching from N5 to N2 directly at our Kathmandu office — no need to go elsewhere for language preparation.'],
        ['Alumni Network in Japan', 'Our growing alumni network in Japan helps new students settle in, find part-time work, and navigate daily life with local guidance.'],
        ['Post-Arrival Support', 'Our support does not end at the airport. We continue to assist with city hall registration, bank accounts, and daily life for months after arrival.'],
      ] as $i => [$t, $d]): ?>
      <div class="flex gap-4 bg-white rounded-xl p-5 border border-border fade-in">
        <div class="w-8 h-8 shrink-0 rounded-full bg-orange-light flex items-center justify-center text-[#E8630A] font-extrabold text-[12px] mt-0.5"><?= sprintf('%02d', $i+1) ?></div>
        <div>
          <div class="text-[14px] font-bold text-navy mb-1"><?= $t ?></div>
          <div class="text-[12px] text-gray-500 leading-relaxed"><?= $d ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- TEAM -->
<section class="py-16 bg-white border-t border-border">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <span class="sec-tag">Our Team</span>
    <h2 class="sec-h mb-10">The people behind your journey</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
      <?php foreach ($team as $member): ?>
      <div class="card p-6 text-center fade-in">
        <div class="w-16 h-16 rounded-full bg-orange-light flex items-center justify-center text-[#E8630A] font-extrabold text-[18px] mx-auto mb-4">
          <?= htmlspecialchars($member['initials']) ?>
        </div>
        <div class="text-[14px] font-bold text-navy mb-0.5"><?= htmlspecialchars($member['name']) ?></div>
        <div class="text-[11px] text-[#E8630A] font-semibold uppercase tracking-wide mb-3"><?= htmlspecialchars($member['role']) ?></div>
        <p class="text-[12px] text-gray-500 leading-relaxed"><?= htmlspecialchars($member['bio']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bg-[#1A2744] py-14">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 flex flex-col md:flex-row items-center justify-between gap-8">
    <div>
      <h2 class="text-[28px] font-extrabold text-white tracking-tight mb-2">Ready to start your journey?</h2>
      <p class="text-[13px] text-white/50">Talk to one of our expert counselors today — it's completely free.</p>
    </div>
    <a href="/contact" class="btn-orange whitespace-nowrap">Book Free Consultation →</a>
  </div>
</section>

<?php require_once 'includes/footer.php'; ?>
