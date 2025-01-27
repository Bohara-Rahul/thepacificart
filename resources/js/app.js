import './bootstrap';

const navContainer = document.getElementById('nav-container');
const navBar = document.getElementById('nav-bar');

window.addEventListener('scroll', function () {
  const scrollHeight = window.pageYOffset;
  const navContainerHeight = navContainer.getBoundingClientRect().height;

  if(scrollHeight > navContainerHeight) {
    navContainer.classList.add('fixed');
    navBar.style.color = "#13292a";
  } else {    
    navContainer.classList.remove('fixed');
  }
});

