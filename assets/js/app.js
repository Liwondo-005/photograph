document.addEventListener('DOMContentLoaded', () => {
  const revealItems = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  revealItems.forEach((item) => observer.observe(item));

  const filterButtons = document.querySelectorAll('.filter-btn');
  const galleryItems = document.querySelectorAll('.gallery-item');
  filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
      filterButtons.forEach((btn) => btn.classList.remove('active'));
      button.classList.add('active');
      const filter = button.dataset.filter || 'all';
      galleryItems.forEach((item) => {
        const show = filter === 'all' || item.dataset.category === filter;
        item.style.display = show ? 'block' : 'none';
      });
    });
  });

  const counters = document.querySelectorAll('[data-count]');
  counters.forEach((counter) => {
    const target = Number(counter.dataset.count || 0);
    const duration = 1200;
    const start = performance.now();
    const step = (now) => {
      const progress = Math.min((now - start) / duration, 1);
      counter.textContent = Math.floor(progress * target).toLocaleString();
      if (progress < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  });

  const loader = document.querySelector('.page-loader');
  if (loader) {
    setTimeout(() => loader.classList.add('d-none'), 600);
  }
});
