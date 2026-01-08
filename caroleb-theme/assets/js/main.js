/**
 * WP-B2 Theme JavaScript
 *
 * @package
 * @since 1.0.0
 */

(function () {
	'use strict';

	/**
	 * Mobile menu toggle
	 */
	function initMobileMenu() {
		const menuToggle = document.querySelector('.menu-toggle');
		const navigation = document.querySelector('.main-navigation');

		if (!menuToggle || !navigation) {
			return;
		}

		const menuContainer = navigation.querySelector(
			'.primary-menu-container'
		);

		if (!menuContainer) {
			return;
		}

		menuToggle.addEventListener('click', function () {
			const expanded =
				menuToggle.getAttribute('aria-expanded') === 'true';
			menuToggle.setAttribute('aria-expanded', !expanded);
			menuContainer.style.display = expanded ? 'none' : 'block';
		});
	}

	/**
	 * Initialize on DOM ready
	 */
	function init() {
		initMobileMenu();
	}

	// Run initialization when DOM is ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();


document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll(".scroll-animate");

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("is-visible");
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  elements.forEach(el => observer.observe(el));
});


document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll(".scroll-animate2");

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("is-visible2");
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  elements.forEach(el => observer.observe(el));
});


document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll(".scroll");

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("is-visible3");
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  elements.forEach(el => observer.observe(el));
});