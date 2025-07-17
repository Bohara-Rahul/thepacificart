import './bootstrap';
import "trix";
import "trix/dist/trix.css";

// JavaScript for slider functionality
let currentIndex = 1; // Start from the first real slide
const slides = document.querySelectorAll(".slide");
const slider = document.querySelector(".slider");
const totalSlides = slides.length;
const prevBtn = document.querySelector(".prev");
const nextBtn = document.querySelector(".next");

// Clone the first and last slides
const firstClone = slides[0].cloneNode(true);
const lastClone = slides[totalSlides - 1].cloneNode(true);

// Add clones to the slider
slider.appendChild(firstClone);
slider.insertBefore(lastClone, slides[0]);

// Get updated slides with clones
const updatedSlides = document.querySelectorAll(".slide");
const updatedTotal = updatedSlides.length;

// Adjust slider position to start at the first real image
slider.style.transform = `translateX(-100%)`;

function showSlide(index) {
    slider.style.transition = "transform 0.5s ease-in-out";
    const translateX = -index * 100;
    slider.style.transform = `translateX(${translateX}%)`;
    currentIndex = index;

    // Check if we need to reset instantly after animation
    setTimeout(() => {
        if (currentIndex >= updatedTotal - 1) {
            slider.style.transition = "none"; // Remove animation
            slider.style.transform = `translateX(-100%)`; // Reset to first real image
            currentIndex = 1;
        } else if (currentIndex <= 0) {
            slider.style.transition = "none";
            slider.style.transform = `translateX(-${(updatedTotal - 2) * 100}%)`; // Reset to last real image
            currentIndex = updatedTotal - 2;
        }
    }, 3000); // Match the transition duration
}

function nextSlide() {
    showSlide(currentIndex + 1);
}

function prevSlide() {
    showSlide(currentIndex - 1);
}

nextBtn.addEventListener("click", nextSlide);
prevBtn.addEventListener("click", prevSlide);

// Auto-slide every 3 seconds
setInterval(nextSlide, 3000);

const navbar = document.getElementById("navbar");
    const filterBar = document.getElementById("filterBar");
    const verticalSpace = document.getElementById("vertical-space");

    let lastScroll = window.scrollY;

    window.addEventListener("scroll", () => {
      const currentScroll = window.scrollY;
      const scrollingDown = currentScroll > lastScroll && currentScroll > 50;
      const scrollingUp = currentScroll < lastScroll;

      // Handle navbar visibility
      if (scrollingDown) {
        navbar.classList.add("-translate-y-full");
      } else if (scrollingUp) {
        navbar.classList.remove("-translate-y-full");
      }

      // Handle filter bar stickiness
      if (scrollingDown && currentScroll > 64) {
        // Stick filter to top when navbar is hidden
        filterBar.classList.add("fixed", "top-0");
        filterBar.classList.remove("absolute", "top-[64px]", "mt-[20px]");
        verticalSpace.classList.add('display: none')
      } else if (scrollingUp && currentScroll <= lastScroll) {
        // Return filter to original position
        filterBar.classList.remove("fixed", "top-0");
        filterBar.classList.add("absolute", "top-[64px]");
      }

      lastScroll = currentScroll;
    });

// import EmblaCarousel from 'embla-carousel'
// import { setupTweenScale } from './EmblaCarouselTweenScale'
// import { addDotBtnsAndClickHandlers } from './EmblaCarouselDotButton'
// import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'
// import '../css/embla.css'

// const OPTIONS = { loop: true }

// const emblaNode = document.querySelector('.embla')
// const viewportNode = emblaNode.querySelector('.embla__viewport')
// const previousBtn = emblaNode.querySelector('.embla__button--prev')
// const nextIsBtn = emblaNode.querySelector('.embla__button--next')
// const dotsNode = document.querySelector('.embla__dots')

// const emblaApi = EmblaCarousel(viewportNode, OPTIONS)
// const removeTweenScale = setupTweenScale(emblaApi)

// const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
//   emblaApi,
//   previousBtn,
//   nextIsBtn
// )
// const removeDotBtnsAndClickHandlers = addDotBtnsAndClickHandlers(
//   emblaApi,
//   dotsNode
// )

// emblaApi
//   .on('destroy', removeTweenScale)
//   .on('destroy', removePrevNextBtnsClickHandlers)
//   .on('destroy', removeDotBtnsAndClickHandlers)






