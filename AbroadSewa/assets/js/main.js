// Mobile menu toggle
const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');
if (menuBtn && mobileMenu) {
  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
}

// Fade-in on scroll
const fadeEls = document.querySelectorAll('.fade-in');
if (fadeEls.length) {
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); } });
  }, { threshold: 0.1 });
  fadeEls.forEach(el => obs.observe(el));
}

// Toast notification
function showToast(msg) {
  let t = document.getElementById('toast');
  if (!t) {
    t = document.createElement('div');
    t.id = 'toast';
    document.body.appendChild(t);
  }
  t.textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3500);
}

// Contact form
const contactForm = document.getElementById('contact-form');
if (contactForm) {
  contactForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = contactForm.querySelector('button[type=submit]');
    const orig = btn.textContent;
    btn.textContent = 'Sending...';
    btn.disabled = true;
    const data = Object.fromEntries(new FormData(contactForm));
    try {
      const res = await fetch('/contact-submit', { method: 'POST', headers: {'Content-Type':'application/json'}, body: JSON.stringify(data) });
      const json = await res.json();
      if (json.success) {
        showToast('Message sent! We will contact you shortly.');
        contactForm.reset();
      } else {
        showToast('Something went wrong. Please try again.');
      }
    } catch {
      showToast('Something went wrong. Please try again.');
    }
    btn.textContent = orig;
    btn.disabled = false;
  });
}

// Testimonial filter
const filterBtns = document.querySelectorAll('[data-filter]');
filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    const val = btn.dataset.filter;
    filterBtns.forEach(b => b.classList.remove('bg-[#E8630A]', 'text-white', 'bg-orange', 'active-filter'));
    btn.classList.add('bg-[#E8630A]', 'text-white');
    document.querySelectorAll('[data-country]').forEach(card => {
      if (val === 'all' || card.dataset.country === val) {
        card.style.display = '';
      } else {
        card.style.display = 'none';
      }
    });
  });
});

// Smooth counter animation for stats
function animateCounter(el) {
  const target = parseInt(el.dataset.target);
  const suffix = el.dataset.suffix || '';
  if (isNaN(target)) return;
  let current = 0;
  const step = Math.ceil(target / 60);
  const timer = setInterval(() => {
    current = Math.min(current + step, target);
    el.textContent = current.toLocaleString() + suffix;
    if (current >= target) clearInterval(timer);
  }, 25);
}

const counterEls = document.querySelectorAll('[data-target]');
if (counterEls.length) {
  const obs2 = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { animateCounter(e.target); obs2.unobserve(e.target); } });
  }, { threshold: 0.5 });
  counterEls.forEach(el => obs2.observe(el));
}
