
<!-- ═══════════════════════════  FOOTER  ═══════════════════════════ -->
<footer class="bg-[#0D1B2A] text-white/60">

  <!-- Top border accent -->
  <div class="h-[3px] bg-gradient-to-r from-transparent via-[#C8A951] to-transparent"></div>

  <div class="max-w-7xl mx-auto px-5 lg:px-8 pt-14 pb-10">

    <!-- 4-column grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

      <!-- Brand column -->
      <div class="lg:col-span-2">
        <div class="flex items-center gap-3 mb-4">
          <div class="w-10 h-10 bg-white rounded-lg shadow overflow-hidden shrink-0 flex items-center justify-center">
            <img src="assets/logo.png" alt="Mistri Vai" class="w-9 h-9 object-contain"/>
          </div>
          <div>
            <p class="text-white font-semibold text-[13px] tracking-wide leading-none">Mistri Vai</p>
            <p class="text-[#C8A951] font-mono text-[9.5px] tracking-[.18em] uppercase mt-[3px]">Engineering Club</p>
          </div>
        </div>
        <p class="text-sm leading-relaxed max-w-sm mb-5">
          A registered engineering consultancy rooted in Nepal, delivering precise civil
          engineering, architectural design, and construction solutions.
        </p>
        <div class="flex gap-3">
          <a href="https://www.instagram.com/mistrivai" target="_blank" rel="noreferrer"
             class="w-9 h-9 border border-white/20 hover:border-[#C8A951] hover:text-[#C8A951] transition-colors rounded-sm flex items-center justify-center text-white/50"
             aria-label="Instagram">
            <!-- Instagram icon (inline SVG) -->
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
          </a>
        </div>
      </div>

      <!-- Quick links -->
      <div>
        <h4 class="text-white text-[10px] font-mono tracking-[.2em] uppercase mb-4">Pages</h4>
        <ul class="space-y-2.5 text-sm">
          <li><a href="index.php"    class="hover:text-[#C8A951] transition-colors">Home</a></li>
          <li><a href="about.php"    class="hover:text-[#C8A951] transition-colors">About</a></li>
          <li><a href="services.php" class="hover:text-[#C8A951] transition-colors">Services</a></li>
          <li><a href="projects.php" class="hover:text-[#C8A951] transition-colors">Projects</a></li>
          <li><a href="gallery.php"  class="hover:text-[#C8A951] transition-colors">Gallery</a></li>
          <li><a href="team.php"     class="hover:text-[#C8A951] transition-colors">Team</a></li>
          <li><a href="contact.php"  class="hover:text-[#C8A951] transition-colors">Contact</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div>
        <h4 class="text-white text-[10px] font-mono tracking-[.2em] uppercase mb-4">Contact</h4>
        <ul class="space-y-3 text-sm">
          <li>
            <a href="mailto:mail.mistrivai@gmail.com"
               class="hover:text-[#C8A951] transition-colors break-all">
              mail.mistrivai@gmail.com
            </a>
          </li>
          <li>
            <a href="tel:+9779860590678" class="hover:text-[#C8A951] transition-colors">
              +977-9860590678
            </a>
          </li>
          <li class="leading-snug">Liwali, Bhaktapur</li>
          <li class="leading-snug">Dhulikhel-6, Kavre</li>
        </ul>
      </div>

    </div><!-- /grid -->

  </div><!-- /max-w-7xl -->

  <!-- Bottom bar -->
  <div class="border-t border-white/[.07]">
    <div class="max-w-7xl mx-auto px-5 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-2 text-[11px]">
      <span>© <?= date('Y') ?> Mistri Vai Engineering Club. All rights reserved.</span>
      <span class="text-white/35">Regd. No. 15648/082/083 &nbsp;·&nbsp; PAN 133885297</span>
    </div>
  </div>

</footer>
</body>
</html>
