const carousel = document.querySelector('.grid.grid-flow-col'); 
const leftButton = document.getElementById('leftButton');
const rightButton = document.getElementById('rightButton');

const scrollAmount = 267; 

// Initial state: hide the left button
leftButton.style.opacity = '0';
leftButton.style.pointerEvents = 'none';

rightButton.addEventListener('click', () => {
    carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    showLeftButton();
});

leftButton.addEventListener('click', () => {
    carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    checkScrollPosition();
});

// Show the left button
function showLeftButton() {
    leftButton.style.opacity = '1';
    leftButton.style.pointerEvents = 'auto';
}

// Check scroll position to hide the left button if at the start
function checkScrollPosition() {
    if (carousel.scrollLeft <= 0) {
        leftButton.style.opacity = '0';
        leftButton.style.pointerEvents = 'none';
    }
}
