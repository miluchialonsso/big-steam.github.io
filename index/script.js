
let slideIndex = 0;
const carouselContainer = document.querySelector('.carousel-container');
const slides = document.querySelectorAll('.carousel img');
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');

function moveSlide(n) {
  slideIndex += n;
  if (slideIndex < 0) {
    slideIndex = slides.length - 1;
  } else if (slideIndex >= slides.length) {
    slideIndex = 0;
  }
  updateSlide();
}

function updateSlide() {
  carouselContainer.style.transform = `translateX(${-slideIndex * 100}%)`;
}

function autoSlide() {
  setInterval(() => {
    moveSlide(1);
  }, 3000); // Cambia la imagen cada 3 segundos
}

autoSlide();
