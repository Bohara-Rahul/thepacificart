import './bootstrap';

const navContainer = document.getElementById('nav-container');
const navBar = document.getElementById('nav-bar');
const leftLogoNav = document.getElementById('left-logo-nav')

window.addEventListener('scroll', function () {
  const scrollHeight = window.pageYOffset;
  const navContainerHeight = navContainer.getBoundingClientRect().height;

  if(scrollHeight > navContainerHeight) {
    navContainer.classList.remove('show');
    navContainer.classList.add('hide');
    leftLogoNav.classList.remove('hide');
    leftLogoNav.classList.add('show');
    leftLogoNav.classList.add('fixed');
    leftLogoNav.style.boxShadow = "2px";
    // navBar.style.color = "#13292a";
  } else { 
    leftLogoNav.classList.remove('show');  
    leftLogoNav.classList.remove('fixed'); 
    leftLogoNav.classList.add('hide');
    navContainer.classList.remove('hide');
    navContainer.classList.add('show');
  }
});

 // JavaScript for slider functionality
 const imagesContainer = document.querySelector('.slider .images');
 const images = document.querySelectorAll('.slider img');
 let currentIndex = 0;

 function showNextImage() {
   // Calculate the new translateX value
   currentIndex = (currentIndex + 1) % images.length;
   const offset = -currentIndex * 100;

   // Apply the transform to slide images
   imagesContainer.style.transform = `translateX(${offset}%)`;
 }

 // Change images every 2 seconds
 setInterval(showNextImage, 3000);

 // Arts Detail Page Related JS
 const mainPhotoContainer = document.querySelector('#main-photo-container')
 const allPhotos = document.querySelectorAll('.photos');

 allPhotos.addEventListener('click', () => {
  console.log('Photo clicked');
  mainPhotoContainer.innerHTML = `<img src="{{}}" alt="title" />`; 
 })


