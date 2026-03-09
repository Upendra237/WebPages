<!-- ═══════════════ FOOTER ═══════════════ -->
<footer class="bg-[#0D1B2A] text-white pt-16 pb-0 border-t border-white/5">
  <div class="max-w-7xl mx-auto px-5 lg:px-8">

    <!-- Main grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-white/10">

      <!-- Brand -->
      <div class="lg:col-span-2">
        <a href="index.php" class="flex items-center gap-3 mb-5 w-fit">
          <div class="bg-white rounded-md p-1 w-10 h-10 flex items-center justify-center overflow-hidden shrink-0">
            <img src="assets/logo.png" alt="Mistri Vai" class="w-full h-full object-contain"/>
          </div>
          <div class="leading-tight">
            <div class="text-white font-semibold text-sm tracking-wide">Mistri Vai</div>
            <div class="text-[#C8A951] font-mono text-[10px] tracking-widest uppercase">Engineering Club</div>
          </div>
        </a>
        <p class="text-white/45 text-sm leading-relaxed max-w-xs mb-5">
          A registered student-led civil engineering club from Nepal — learning, designing, and building together.
        </p>
        <!-- Reg info -->
        <div class="flex flex-wrap gap-x-4 gap-y-1">
          <span class="font-mono text-[10px] text-white/25 tracking-widest uppercase">Regd. No. 15648/082/083</span>
          <span class="font-mono text-[10px] text-white/25 tracking-widest uppercase">PAN 133885297</span>
        </div>
        <!-- Social -->
        <div class="flex gap-2 mt-5">
          <a href="https://www.instagram.com/mistrivai" target="_blank" rel="noopener"
             class="w-8 h-8 border border-white/15 flex items-center justify-center text-white/40 hover:border-[#C8A951] hover:text-[#C8A951] transition-colors duration-200 text-xs font-mono">
            IG
          </a>
          <a href="https://mistrivai.odoo.com/" target="_blank" rel="noopener"
             class="px-3 h-8 border border-white/15 flex items-center justify-center text-white/40 hover:border-[#C8A951] hover:text-[#C8A951] transition-colors duration-200 text-[10px] font-mono tracking-wider">
            WEB
          </a>
        </div>
      </div>

      <!-- Navigation -->
      <div>
        <div class="font-mono text-[10px] tracking-[.2em] uppercase text-[#C8A951] mb-5">Pages</div>
        <ul class="space-y-2.5">
          <?php
          $nav = [['index.php','Home'],['about.php','About'],['services.php','Services'],['projects.php','Projects'],['gallery.php','Gallery'],['team.php','Team'],['contact.php','Contact Us']];
          foreach ($nav as [$href,$lbl]) {
            echo "<li><a href=\"$href\" class=\"text-white/50 text-sm hover:text-[#C8A951] transition-colors duration-200\">$lbl</a></li>";
          }
          ?>
        </ul>
      </div>

      <!-- Contact -->
      <div>
        <div class="font-mono text-[10px] tracking-[.2em] uppercase text-[#C8A951] mb-5">Get In Touch</div>
        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <svg class="w-4 h-4 text-[#C8A951] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <a href="mailto:mail.mistrivai@gmail.com" class="text-white/50 text-sm hover:text-[#C8A951] transition-colors duration-200 break-all">
              mail.mistrivai@gmail.com
            </a>
          </li>
          <li class="flex items-start gap-3">
            <svg class="w-4 h-4 text-[#C8A951] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            <a href="tel:+9779860590678" class="text-white/50 text-sm hover:text-[#C8A951] transition-colors duration-200">
              +977-9860590678
            </a>
          </li>
          <li class="flex items-start gap-3">
            <svg class="w-4 h-4 text-[#C8A951] shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <div class="text-white/50 text-sm leading-relaxed">
              Liwali, Bhaktapur<br/>
              <span class="text-white/30 text-xs">Branch: Dhulikhel-6, Kavre</span>
            </div>
          </li>
        </ul>
      </div>

    </div>

    <!-- Bottom bar -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-3 py-5 text-[11px] font-mono text-white/25 tracking-wider">
      <span>&copy; <?= date('Y') ?> Mistri Vai Engineering Club. All rights reserved.</span>
      <span>Dhulikhel, Kavrepalanchok, Nepal</span>
    </div>

  </div>
</footer>
</body>
</html>
