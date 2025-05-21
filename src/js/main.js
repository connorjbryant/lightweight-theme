// Entry point for your main theme JS

document.addEventListener('DOMContentLoaded', function () {
  if (typeof AOS !== 'undefined') {
    AOS.init({
      once: true, // animation happens only once while scrolling down
      duration: 800, // animation duration in ms
    });
  }
});
