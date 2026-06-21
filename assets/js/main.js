// Mark active nav link based on current URL
const currentPath = window.location.pathname.replace(/\/index\.php/i, '').replace(/\/$/, '') || '/';
document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
  const href = link.getAttribute('href').replace(/\/index\.php/i, '').replace(/\/$/, '') || '/';
  if (currentPath === href || (href !== '/' && currentPath.startsWith(href))) {
    link.classList.add('active');
    link.setAttribute('aria-current', 'page');
  }
});
