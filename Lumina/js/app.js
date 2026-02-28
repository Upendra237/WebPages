/* ============================================
   LUMINA — Shared Application JavaScript
   Navigation, utilities, scroll effects, toasts
   ============================================ */

// ---- Navbar Scroll Effect ----
(function initNavbar() {
  const navbar = document.getElementById('navbar');
  if (!navbar) return;
  let lastScroll = 0;
  window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    if (currentScroll > 50) {
      navbar.classList.add('bg-slate-950/90', 'shadow-lg', 'shadow-violet-500/5');
      navbar.classList.remove('bg-transparent');
    } else {
      navbar.classList.remove('bg-slate-950/90', 'shadow-lg', 'shadow-violet-500/5');
      navbar.classList.add('bg-transparent');
    }
    lastScroll = currentScroll;
  });
})();

// ---- Mobile Menu Toggle ----
function toggleMobileMenu() {
  const menu = document.getElementById('mobileMenu');
  const overlay = document.getElementById('menuOverlay');
  if (!menu) return;
  menu.classList.toggle('open');
  if (overlay) overlay.classList.toggle('hidden');
  document.body.classList.toggle('overflow-hidden');
}

// ---- Active Nav Link ----
(function markActiveNav() {
  const path = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav-link').forEach(link => {
    const href = link.getAttribute('href');
    if (href === path) {
      link.classList.add('active');
    }
  });
})();

// ---- Scroll Reveal ----
(function initReveal() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
})();

// ---- Toast Notifications ----
function showToast(message, type = 'success', duration = 3000) {
  const existing = document.querySelectorAll('.toast');
  existing.forEach(t => t.remove());

  const toast = document.createElement('div');
  toast.className = `toast toast-${type}`;
  toast.textContent = message;
  document.body.appendChild(toast);

  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateY(10px)';
    toast.style.transition = 'all 0.3s ease';
    setTimeout(() => toast.remove(), 300);
  }, duration);
}

// ---- LocalStorage Helpers ----
const Store = {
  get(key, fallback = null) {
    try {
      const data = localStorage.getItem(`lumina_${key}`);
      return data ? JSON.parse(data) : fallback;
    } catch {
      return fallback;
    }
  },
  set(key, value) {
    try {
      localStorage.setItem(`lumina_${key}`, JSON.stringify(value));
      return true;
    } catch {
      return false;
    }
  },
  remove(key) {
    localStorage.removeItem(`lumina_${key}`);
  }
};

// ---- Date Helpers ----
function formatDate(date) {
  return new Date(date).toLocaleDateString('en-US', {
    weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
  });
}
function formatDateShort(date) {
  return new Date(date).toLocaleDateString('en-US', {
    month: 'short', day: 'numeric'
  });
}
function getToday() {
  return new Date().toISOString().split('T')[0];
}
function getDayName() {
  return new Date().toLocaleDateString('en-US', { weekday: 'long' });
}
function getGreeting() {
  const hour = new Date().getHours();
  if (hour < 12) return 'Good morning';
  if (hour < 17) return 'Good afternoon';
  return 'Good evening';
}

// ---- Streak Calculator ----
function calculateStreak(dates) {
  if (!dates || dates.length === 0) return 0;
  const sorted = [...dates].sort().reverse();
  const today = getToday();
  let streak = 0;
  let checkDate = new Date(today);

  // Check if today or yesterday has an entry (grace period)
  const todayStr = today;
  const yesterday = new Date(checkDate);
  yesterday.setDate(yesterday.getDate() - 1);
  const yesterdayStr = yesterday.toISOString().split('T')[0];

  if (!sorted.includes(todayStr) && !sorted.includes(yesterdayStr)) {
    return 0;
  }

  if (!sorted.includes(todayStr)) {
    checkDate = yesterday;
  }

  while (true) {
    const dateStr = checkDate.toISOString().split('T')[0];
    if (sorted.includes(dateStr)) {
      streak++;
      checkDate.setDate(checkDate.getDate() - 1);
    } else {
      break;
    }
  }
  return streak;
}

// ---- Fetch JSON Utility ----
async function fetchJSON(path) {
  try {
    const response = await fetch(path);
    if (!response.ok) throw new Error(`HTTP ${response.status}`);
    return await response.json();
  } catch (error) {
    console.warn(`Failed to fetch ${path}:`, error);
    return null;
  }
}

// ---- Random Item ----
function randomItem(arr) {
  return arr[Math.floor(Math.random() * arr.length)];
}

// ---- Smooth Scroll to Element ----
function scrollToEl(id) {
  const el = document.getElementById(id);
  if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// ---- Number Animation ----
function animateNumber(el, target, duration = 1000) {
  const start = parseInt(el.textContent) || 0;
  const increment = (target - start) / (duration / 16);
  let current = start;
  const timer = setInterval(() => {
    current += increment;
    if ((increment > 0 && current >= target) || (increment < 0 && current <= target)) {
      el.textContent = Math.round(target);
      clearInterval(timer);
    } else {
      el.textContent = Math.round(current);
    }
  }, 16);
}

// ---- Generate Unique ID ----
function uid() {
  return Date.now().toString(36) + Math.random().toString(36).substr(2, 9);
}

// ---- Logo SVG (reusable) ----
const LUMINA_LOGO_SVG = `<svg viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8">
  <defs>
    <linearGradient id="logoGrad" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" style="stop-color:#a78bfa"/>
      <stop offset="50%" style="stop-color:#818cf8"/>
      <stop offset="100%" style="stop-color:#fbbf24"/>
    </linearGradient>
  </defs>
  <path d="M18 3C18 3 7 14 7 22C7 28.1 11.9 33 18 33C24.1 33 29 28.1 29 22C29 14 18 3 18 3Z" fill="url(#logoGrad)" opacity="0.9"/>
  <path d="M18 11C18 11 13 18 13 23C13 25.8 15.2 28 18 28C20.8 28 23 25.8 23 23C23 18 18 11 18 11Z" fill="white" opacity="0.25"/>
  <circle cx="18" cy="20" r="3" fill="white" opacity="0.4"/>
</svg>`;

// ---- Shared Header HTML Generator ----
function getNavHTML(currentPage) {
  const pages = [
    { href: 'index.html', label: 'Home' },
    { href: 'mirror.html', label: 'Mirror' },
    { href: 'forge.html', label: 'Forge' },
    { href: 'breathe.html', label: 'Breathe' },
    { href: 'vault.html', label: 'Vault' },
    { href: 'compass.html', label: 'Compass' },
    { href: 'stillness.html', label: 'Stillness' },
  ];
  const navLinks = pages.map(p =>
    `<a href="${p.href}" class="nav-link ${currentPage === p.href ? 'active' : ''}">${p.label}</a>`
  ).join('');

  const mobileLinks = pages.map(p =>
    `<a href="${p.href}" class="block px-4 py-3 text-lg ${currentPage === p.href ? 'text-violet-400 font-semibold' : 'text-slate-300 hover:text-white'} transition-colors">${p.label}</a>`
  ).join('');

  return '';  // Nav is inline in each page for full control
}
