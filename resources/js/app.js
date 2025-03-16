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






