/* global dthData */
(function () {
  'use strict';

  var cfg = window.dthData || {};
  var i18n = cfg.i18n || {};
  var reduceMotion = matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---- Accessibility: font size ---- */
  document.querySelectorAll('[data-fs]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.documentElement.style.setProperty('--fs', btn.dataset.fs);
      document.querySelectorAll('[data-fs]').forEach(function (x) { x.classList.remove('active'); });
      btn.classList.add('active');
      try { localStorage.setItem('dth-fs', btn.dataset.fs); } catch (e) { /* storage unavailable */ }
    });
  });

  /* ---- Accessibility: contrast ---- */
  document.querySelectorAll('[data-theme]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.body.classList.remove('hc-white', 'hc-yellow');
      if (btn.dataset.theme) { document.body.classList.add(btn.dataset.theme); }
      document.querySelectorAll('[data-theme]').forEach(function (x) { x.classList.remove('active'); });
      btn.classList.add('active');
      try { localStorage.setItem('dth-theme', btn.dataset.theme); } catch (e) { /* storage unavailable */ }
    });
  });

  /* Restore the visitor's saved accessibility preferences. */
  try {
    var savedFs = localStorage.getItem('dth-fs');
    if (savedFs) {
      var fsBtn = document.querySelector('[data-fs="' + savedFs + '"]');
      if (fsBtn) { fsBtn.click(); }
    }
    var savedTheme = localStorage.getItem('dth-theme');
    if (savedTheme !== null) {
      var themeBtn = document.querySelector('[data-theme="' + savedTheme + '"]');
      if (themeBtn) { themeBtn.click(); }
    }
  } catch (e) { /* storage unavailable */ }

  /* ---- Header shadow ---- */
  var hdr = document.querySelector('header.site');
  if (hdr) {
    addEventListener('scroll', function () { hdr.classList.toggle('scrolled', scrollY > 10); }, { passive: true });
  }

  /* ---- Mobile menu ---- */
  var burger = document.getElementById('burger');
  var menu = document.getElementById('menu');
  if (burger && menu) {
    burger.addEventListener('click', function () {
      burger.setAttribute('aria-expanded', menu.classList.toggle('open'));
    });
  }
  document.querySelectorAll('.has-sub > a').forEach(function (a) {
    a.addEventListener('click', function (e) {
      if (matchMedia('(max-width:760px)').matches) {
        e.preventDefault();
        a.setAttribute('aria-expanded', a.parentElement.classList.toggle('open'));
      }
    });
  });

  /* ---- Hero slider ---- */
  (function () {
    var slides = [].slice.call(document.querySelectorAll('.hero .slide'));
    var dots = document.getElementById('dots');
    if (slides.length < 1 || !dots) { return; }

    var current = 0;
    var timer = null;

    slides.forEach(function (slide, idx) {
      var dot = document.createElement('button');
      dot.setAttribute('role', 'tab');
      dot.setAttribute('aria-label', (i18n.slide || 'Slide') + ' ' + (idx + 1));
      if (idx === 0) { dot.classList.add('on'); }
      dot.addEventListener('click', function () { go(idx); restart(); });
      dots.appendChild(dot);
    });

    function go(n) {
      slides[current].classList.remove('on');
      dots.children[current].classList.remove('on');
      current = (n + slides.length) % slides.length;
      slides[current].classList.add('on');
      dots.children[current].classList.add('on');
    }
    function start() {
      if (reduceMotion || slides.length < 2) { return; }
      timer = setInterval(function () { go(current + 1); }, (cfg.slideSeconds || 5) * 1000);
    }
    function stop() { clearInterval(timer); }
    function restart() { stop(); start(); }

    var next = document.getElementById('next');
    var prev = document.getElementById('prev');
    if (next) { next.addEventListener('click', function () { go(current + 1); restart(); }); }
    if (prev) { prev.addEventListener('click', function () { go(current - 1); restart(); }); }

    var hero = document.querySelector('.hero');
    if (hero) {
      hero.addEventListener('mouseenter', stop);
      hero.addEventListener('mouseleave', start);
    }
    start();
  }());

  /* ---- Generic tab panels (news + media hubs) ---- */
  document.querySelectorAll('[data-tabwrap]').forEach(function (wrap) {
    var tabs = wrap.querySelectorAll('.tabbar .tab');
    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        tabs.forEach(function (x) { x.classList.remove('active'); x.setAttribute('aria-selected', 'false'); });
        tab.classList.add('active');
        tab.setAttribute('aria-selected', 'true');
        wrap.querySelectorAll('.tabpanel').forEach(function (p) { p.classList.remove('active'); });
        var panel = wrap.querySelector('#' + tab.dataset.target);
        if (panel) { panel.classList.add('active'); }
      });
    });
  });

  /* ---- Rights tabs ---- */
  document.querySelectorAll('[data-rights-tabs]').forEach(function (wrap) {
    var tabs = [].slice.call(wrap.querySelectorAll('.rights-tab'));
    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        tabs.forEach(function (t) { t.classList.remove('active'); t.setAttribute('aria-selected', 'false'); });
        wrap.querySelectorAll('.rights-panel').forEach(function (p) { p.classList.remove('active'); });
        tab.classList.add('active');
        tab.setAttribute('aria-selected', 'true');
        var panel = wrap.querySelector('#' + tab.dataset.target);
        if (panel) { panel.classList.add('active'); }
      });
    });
  });

  /* ---- Archive filter: category chips + search box ---- */
  (function () {
    var grid = document.getElementById('hubGrid');
    if (!grid) { return; }

    var cards = [].slice.call(grid.querySelectorAll('.hub-card'));
    var chips = [].slice.call(document.querySelectorAll('#catBar .tab'));
    var search = document.getElementById('hubSearch');
    var empty = document.getElementById('hubEmpty');
    var count = document.getElementById('hubCount');
    var activeCat = 'all';

    function apply() {
      var term = (search && search.value ? search.value : '').trim().toLowerCase();
      var shown = 0;

      cards.forEach(function (card) {
        var cats = (card.dataset.cat || '').split(/\s+/);
        var catOk = activeCat === 'all' || cats.indexOf(activeCat) !== -1;
        var textOk = !term || card.textContent.toLowerCase().indexOf(term) !== -1;
        var visible = catOk && textOk;
        card.style.display = visible ? '' : 'none';
        if (visible) { shown++; }
      });

      if (empty) { empty.style.display = shown ? 'none' : ''; }
      if (count) { count.textContent = shown; }
    }

    chips.forEach(function (chip) {
      chip.addEventListener('click', function () {
        chips.forEach(function (c) { c.classList.remove('active'); });
        chip.classList.add('active');
        activeCat = chip.dataset.cat || 'all';
        apply();
      });
    });

    if (search) { search.addEventListener('input', apply); }

    var preset = new URLSearchParams(location.search).get('cat');
    if (preset) {
      var target = chips.filter(function (c) { return c.dataset.cat === preset; })[0];
      if (target) { target.click(); }
    }
  }());

  /* ---- Floating contact ---- */
  var fab = document.getElementById('fab');
  var fabMain = document.getElementById('fabMain');
  if (fab && fabMain) {
    fabMain.addEventListener('click', function () {
      fabMain.setAttribute('aria-expanded', fab.classList.toggle('open'));
    });
    document.addEventListener('click', function (e) {
      if (fab.classList.contains('open') && !fab.contains(e.target)) {
        fab.classList.remove('open');
        fabMain.setAttribute('aria-expanded', 'false');
      }
    });
  }

  /* ---- Message dialog ---- */
  (function () {
    var back = document.getElementById('msgBack');
    var form = document.getElementById('msgForm');
    var done = document.getElementById('msgDone');
    var send = document.getElementById('sendMsg');
    var openBtn = document.getElementById('openMsg');
    var closeBtn = document.getElementById('closeMsg');
    if (!back || !form || !done || !send) { return; }

    function open() {
      back.classList.add('show');
      form.style.display = '';
      done.style.display = 'none';
      setTimeout(function () {
        var name = document.getElementById('mName');
        if (name) { name.focus(); }
      }, 60);
    }
    function close() { back.classList.remove('show'); }

    if (openBtn) {
      openBtn.addEventListener('click', function () {
        if (fab) { fab.classList.remove('open'); }
        if (fabMain) { fabMain.setAttribute('aria-expanded', 'false'); }
        open();
      });
    }
    if (closeBtn) { closeBtn.addEventListener('click', close); }
    back.addEventListener('click', function (e) { if (e.target === back) { close(); } });
    addEventListener('keydown', function (e) { if (e.key === 'Escape') { close(); } });

    send.addEventListener('click', function () {
      var name = document.getElementById('mName').value.trim();
      var contact = document.getElementById('mContact').value.trim();
      var message = document.getElementById('mMsg').value.trim();

      if (!name || !message) {
        alert(i18n.required || 'Please fill in your name and message.');
        return;
      }
      if (!cfg.ajaxUrl) {
        form.style.display = 'none';
        done.style.display = 'block';
        return;
      }

      send.disabled = true;
      var body = new URLSearchParams({
        action: 'dth_contact',
        nonce: cfg.nonce || '',
        name: name,
        contact: contact,
        message: message
      });

      fetch(cfg.ajaxUrl, { method: 'POST', credentials: 'same-origin', body: body })
        .then(function (r) { return r.json(); })
        .then(function (res) {
          if (!res || !res.success) { throw new Error('failed'); }
          form.style.display = 'none';
          done.style.display = 'block';
        })
        .catch(function () {
          alert(i18n.sendFailed || 'Sending failed. Please try again.');
        })
        .finally(function () { send.disabled = false; });
    });
  }());

  /* ---- Back to top ---- */
  (function () {
    var btn = document.getElementById('toTop');
    if (!btn) { return; }
    function onScroll() {
      var on = scrollY + innerHeight >= document.documentElement.scrollHeight - 320 && scrollY > 200;
      btn.classList.toggle('show', on);
      document.body.classList.toggle('totop-on', on);
    }
    addEventListener('scroll', onScroll, { passive: true });
    onScroll();
    btn.addEventListener('click', function () { scrollTo({ top: 0, behavior: 'smooth' }); });
  }());

  /* ---- Scroll reveal ---- */
  (function () {
    if (reduceMotion) { return; }
    var sel = '.kicker,.news-head,.card,.partner,.qa-item,.qa-tile,.member-card,.board-card,.obj-list li,'
      + '.ms-cat,.ms p,.vision-quote,.about-stat,.hotline,.rights-shell,.prose p,.obj-intro,.tabbar,'
      + '.fb-embed,.table-wrap,.board-poster,.hub-card,.hub-side-item,.timeline li,.page-hero .logo-badge,'
      + '.page-hero .lead,.foot';
    var els = [].slice.call(document.querySelectorAll(sel)).filter(function (el) { return !el.closest('.rv'); });
    if (!els.length) { return; }

    var groups = new Map();
    els.forEach(function (el) {
      el.classList.add('rv');
      var parent = el.parentElement;
      var idx = groups.get(parent) || 0;
      el.style.setProperty('--rvd', Math.min(idx * 70, 420) + 'ms');
      groups.set(parent, idx + 1);
    });

    var pending = els.slice();
    var throttled = false;

    function reveal(el) {
      el.classList.add('in');
      setTimeout(function () {
        el.classList.remove('rv', 'in');
        el.style.removeProperty('--rvd');
      }, 950 + parseInt(el.style.getPropertyValue('--rvd') || 0, 10));
    }
    function check() {
      var vh = innerHeight;
      pending = pending.filter(function (el) {
        if (el.getBoundingClientRect().top < vh * 0.94) { reveal(el); return false; }
        return true;
      });
      if (!pending.length) {
        removeEventListener('scroll', onScroll);
        removeEventListener('resize', onScroll);
      }
    }
    function onScroll() {
      if (throttled) { return; }
      throttled = true;
      setTimeout(function () { throttled = false; check(); }, 90);
    }
    addEventListener('scroll', onScroll, { passive: true });
    addEventListener('resize', onScroll, { passive: true });
    check();
  }());
}());
