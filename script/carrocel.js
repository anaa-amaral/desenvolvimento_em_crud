
const esquerda = document.querySelector('.setaEsquerda');
const direita = document.querySelector('.setaDireita');
const carousel = document.querySelector('.carousel');

const scrollAmount = 250;

esquerda.addEventListener('click', () => {
    carousel.scrollBy({
        left: -scrollAmount,
        behavior: 'smooth'
    });
});

direita.addEventListener('click', () => {
    carousel.scrollBy({
        left: scrollAmount,
        behavior: 'smooth'
    });
});