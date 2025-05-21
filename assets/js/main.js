// Lightweight Theme Main JS
// Modern best practices: use ES6+, no jQuery required

document.addEventListener('DOMContentLoaded', () => {
	// Example: Smooth scroll for anchor links
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function(e) {
			const target = document.querySelector(this.getAttribute('href'));
			if(target) {
				e.preventDefault();
				target.scrollIntoView({ behavior: 'smooth' });
			}
		});
	});

	// Example: Toggle nav menu (expand as needed)
	const navToggle = document.getElementById('nav-toggle');
	if(navToggle) {
		navToggle.addEventListener('click', () => {
			document.body.classList.toggle('nav-open');
		});
	}
});
