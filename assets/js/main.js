
document.addEventListener('DOMContentLoaded', function() {
  var opener = document.querySelector('#sidearea_opener');
  var closer = document.querySelector('#sy-sidearea-close');
  var sidearea = document.querySelector('#serene-sidearea');

  opener.addEventListener('click', function() {
      sidearea.classList.add('opened');
      console.log("yes");
  });

  closer.addEventListener('click', function() {
      sidearea.classList.remove('opened');
  });
});

// ON SCROLL ANIMATION
function reveal() {
    var reveals = document.querySelectorAll(".reveal");
  
    for (var i = 0; i < reveals.length; i++) {
      var windowHeight = window.innerHeight;
      var elementTop = reveals[i].getBoundingClientRect().top;
      var elementVisible = 10;
  
      if (elementTop < windowHeight - elementVisible) {
        reveals[i].classList.add("active");
      } else {
        reveals[i].classList.remove("active");
      }
    }
  }
  
  window.addEventListener("scroll", reveal);



const header = document.querySelector('#NavBar');

window.addEventListener('scroll', () => {
  if (window.scrollY > 0) {
    header.classList.add('sticky');
  } else {
    header.classList.remove('sticky');
  }
});

// script.js
let currentSlide = 0;

function changeSlide(direction) {
    const slides = document.querySelectorAll('.ahw-slide');
    const totalSlides = slides.length;

    slides[currentSlide].classList.remove('ahw-active');

    currentSlide = (currentSlide + direction + totalSlides) % totalSlides;

    slides[currentSlide].classList.add('ahw-active');

    const sliderContainer = document.querySelector('.ahw-slider-container');
    sliderContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
}

// Automatically change slides every 5 seconds
setInterval(() => {
    changeSlide(1);
}, 5000);

