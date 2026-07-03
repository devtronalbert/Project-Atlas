document.addEventListener('DOMContentLoaded', function () {
  const toggle = document.querySelector('.atlas-menu-toggle');
  const menu = document.querySelector('#atlas-menu');

  if (!toggle || !menu) return;

  toggle.addEventListener('click', function () {
    const isOpen = menu.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
  });
});
