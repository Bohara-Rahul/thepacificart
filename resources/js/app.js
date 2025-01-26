import './bootstrap';

const header = document.getElementById('header');

// When the user scrolls down 50px from the top of the document
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    header.style.backgroundColor = "white";
    header.style.borderBottom = "2px";
  } else {
    header.style.backgroundImage = 'linear-gradient(to right, #78767677, #ffffff)';
  }
}
