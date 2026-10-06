/**
 * Vivaaz Gems & Jewellery - Calm, Fast, Smooth Animation Engine
 * Implements brief requirement (Part 3):
 * - Gentle movement: soft fade-in while scrolling, smooth side cart, slim header on scroll.
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Scroll Reveal Animations (IntersectionObserver)
  const revealElements = document.querySelectorAll('.reveal-on-scroll');
  
  if ('IntersectionObserver' in window) {
    const revealObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, {
      root: null,
      threshold: 0.12,
      rootMargin: '0px 0px -40px 0px'
    });

    revealElements.forEach(el => revealObserver.observe(el));
  } else {
    // Fallback for older browsers
    revealElements.forEach(el => el.classList.add('is-visible'));
  }

  // 2. Sticky Header Slimming on Scroll (Part 3 & 4 Rule)
  const header = document.querySelector('.main-header');
  if (header) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 60) {
        header.classList.add('is-sticky');
      } else {
        header.classList.remove('is-sticky');
      }
    }, { passive: true });
  }

  // 3. Smooth Accordion Expand & Collapse
  const accordions = document.querySelectorAll('.accordion-item');
  accordions.forEach(item => {
    item.addEventListener('click', () => {
      const content = item.nextElementSibling;
      const icon = item.querySelector('span');
      if (content && content.classList.contains('accordion-content')) {
        content.classList.toggle('open');
        if (icon) {
          icon.innerText = content.classList.contains('open') ? '−' : '+';
        }
      }
    });
  });
});
