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
    navBar.style.color = "#13292a";
  } else { 
    leftLogoNav.classList.remove('show');  
    leftLogoNav.classList.remove('fixed'); 
    leftLogoNav.classList.add('hide');
    navContainer.classList.remove('hide');
    navContainer.classList.add('show');
  }
});

