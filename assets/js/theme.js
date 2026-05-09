(function () {
  'use strict';

  var isMac = /Mac|iPod|iPhone|iPad/.test(navigator.platform);
  var modKey = isMac ? '⌘' : 'Ctrl';

  // ── Dark / Light toggle ──

  function initThemeToggle() {
    if (typeof zsTheme === 'undefined' || zsTheme.showToggle !== '1') return;

    var saved = localStorage.getItem('zs-color-scheme');
    if (saved === 'dark') document.documentElement.classList.add('zs-dark');

    var btn = document.querySelector('.zs-theme-toggle');
    if (!btn) return;

    function updateIcon() {
      var isDark = document.documentElement.classList.contains('zs-dark');
      btn.setAttribute('aria-label', isDark ? 'Switch to light mode' : 'Switch to dark mode');
      btn.innerHTML = isDark
        ? '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>'
        : '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>';
    }
    updateIcon();

    btn.addEventListener('click', function () {
      document.documentElement.classList.toggle('zs-dark');
      var isDark = document.documentElement.classList.contains('zs-dark');
      localStorage.setItem('zs-color-scheme', isDark ? 'dark' : 'light');
      updateIcon();
    });
  }

  // ── Search modal ──

  function initSearchModal() {
    if (typeof zsTheme === 'undefined' || zsTheme.showSearch !== '1') return;

    var modal = document.querySelector('.zs-search-modal');
    var trigger = document.querySelector('.zs-search-trigger');
    if (!modal || !trigger) return;

    var input = modal.querySelector('.zs-search-modal-input');

    function openModal() {
      modal.classList.add('zs-search-open');
      document.body.style.overflow = 'hidden';
      if (input) setTimeout(function () { input.focus(); }, 100);
    }

    function closeModal() {
      modal.classList.remove('zs-search-open');
      document.body.style.overflow = '';
    }

    trigger.addEventListener('click', openModal);

    modal.addEventListener('click', function (e) {
      if (e.target === modal) closeModal();
    });

    document.addEventListener('keydown', function (e) {
      if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
        e.preventDefault();
        if (modal.classList.contains('zs-search-open')) {
          closeModal();
        } else {
          openModal();
        }
      }
      if (e.key === 'Escape' && modal.classList.contains('zs-search-open')) {
        closeModal();
      }
    });
  }

  // ── Inner page label ──

  function initInnerPageLabel() {
    if (typeof zsTheme === 'undefined') return;
    var labelEl = document.querySelector('.zs-inner-page-label');
    var logoGroup = document.querySelector('.zs-logo-group');
    if (!labelEl || !logoGroup) return;

    if (zsTheme.isHome) {
      labelEl.style.display = 'none';
      logoGroup.style.display = '';
    } else if (zsTheme.innerPageLabel) {
      labelEl.href = zsTheme.homeUrl || '/';
      var logoImg = logoGroup.querySelector('.wp-block-site-logo img');
      var html = '';
      if (logoImg) {
        html += '<img src="' + logoImg.src + '" alt="" style="width:24px;height:24px;border-radius:4px;vertical-align:middle;">';
        html += ' ';
      }
      html += '<span>' + zsTheme.innerPageLabel + '</span>';
      labelEl.innerHTML = html;
      labelEl.style.display = '';
      logoGroup.style.display = 'none';
    }
  }

  // ── Real-time clock ──

  function initClock() {
    if (typeof zsTheme === 'undefined' || zsTheme.showClock !== '1') return;

    var els = document.querySelectorAll('.zs-clock');
    if (!els.length) return;

    function pad(n) { return n < 10 ? '0' + n : n; }

    function updateClock() {
      var now = new Date();
      var str = now.getFullYear() + '年'
        + (now.getMonth() + 1) + '月'
        + now.getDate() + '日 '
        + pad(now.getHours()) + ':'
        + pad(now.getMinutes()) + ':'
        + pad(now.getSeconds());
      for (var i = 0; i < els.length; i++) {
        els[i].textContent = str;
      }
    }

    updateClock();
    setInterval(updateClock, 1000);
  }

  // ── Running time counter ──

  function initRunningTime() {
    if (typeof zsTheme === 'undefined' || zsTheme.showRunningTime !== '1') return;

    var els = document.querySelectorAll('.zs-running-time');
    if (!els.length) return;

    function update() {
      var now = Math.floor(Date.now() / 1000);
      for (var i = 0; i < els.length; i++) {
        var start = parseInt(els[i].getAttribute('data-start'), 10);
        if (!start) continue;
        var diff = now - start;
        if (diff < 0) diff = 0;
        var days = Math.floor(diff / 86400);
        var hours = Math.floor((diff % 86400) / 3600);
        var mins = Math.floor((diff % 3600) / 60);
        var secs = diff % 60;
        els[i].textContent = days + '天' + hours + '时' + mins + '分' + secs + '秒';
      }
    }

    update();
    setInterval(update, 1000);
  }

  // ── Restore dark mode before paint ──
  (function () {
    var saved = localStorage.getItem('zs-color-scheme');
    if (saved === 'dark') document.documentElement.classList.add('zs-dark');
  })();

  function initSearchShortcutHint() {
    var el = document.querySelector('.zs-search-shortcut');
    if (el) el.textContent = modKey + '+K';
  }

  // ── Hide elements when settings say off ──

  function initVisibility() {
    if (typeof zsTheme === 'undefined') return;
    if (zsTheme.showToggle !== '1') {
      var tog = document.querySelector('.zs-theme-toggle');
      if (tog) tog.style.display = 'none';
    }
    if (zsTheme.showSearch !== '1') {
      var trig = document.querySelector('.zs-search-trigger');
      if (trig) trig.style.display = 'none';
      var modal = document.querySelector('.zs-search-modal');
      if (modal) modal.style.display = 'none';
    }
  }

  // ── Init all on DOM ready ──
  document.addEventListener('DOMContentLoaded', function () {
    initSearchShortcutHint();
    initVisibility();
    initThemeToggle();
    initSearchModal();
    initInnerPageLabel();
    initClock();
    initRunningTime();

    setTimeout(function () {
      document.documentElement.classList.add('zs-theme-ready');
    }, 100);
  });
})();
