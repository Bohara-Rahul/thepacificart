import './bootstrap';

const header = document.getElementById('header');
const heroSection = ddocument.getElementById('hero-section');

// Callback function
const callback = (entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      header.style.background = 'red';
      // entry.heroSection.classList.add("observed"); // Add class when in view
      console.log("Element is in view!");
    } 
  });
};

  // Observer options
  const options = {
    root: null, // Default is the viewport
    threshold: 0.5 // 50% of the element must be visible to trigger
  };

  // Create the observer
  const observer = new IntersectionObserver(callback, options);

  // Observe the target element
  observer.observe(heroSection);

