const carousel = document.querySelector('.slider');
const leftButton = document.getElementById('leftButton');
const rightButton = document.getElementById('rightButton');

let autoScroll;

// Calculate scroll amount based on screen size
function getScrollAmount() {
    const itemWidth = carousel.querySelector('div')?.offsetWidth || 200; // fallback width
    return itemWidth;
}

// Calculate auto-scroll interval based on screen size
function getAutoScrollInterval() {
    const baseInterval = 4000; // Base interval for a standard screen size (e.g., 1920px)
    const screenWidth = window.innerWidth;
    const standardScreenWidth = 1920; // Reference screen width
    return (baseInterval * screenWidth) / standardScreenWidth;
}

// Function to scroll the carousel to the right
function scrollRight() {
    const scrollAmount = getScrollAmount();
    carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    showLeftButton();
    checkIfEndReached();
}

// Function to scroll the carousel to the left
function scrollLeft() {
    const scrollAmount = getScrollAmount();
    carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    checkScrollPosition();
}

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

// Check if the end of the carousel is reached
function checkIfEndReached() {
    // Add a small buffer (e.g., 5px) to account for rounding errors
    const buffer = 5;
    if (carousel.scrollLeft + carousel.clientWidth + buffer >= carousel.scrollWidth) {
        // Reset to the start
        carousel.scrollTo({ left: 0, behavior: 'smooth' });
        leftButton.style.opacity = '0';
        leftButton.style.pointerEvents = 'none';
    }
}

// Automatic scrolling
function startAutoScroll() {
    const interval = getAutoScrollInterval();
    autoScroll = setInterval(scrollRight, interval);
}

// Pause auto-scroll on hover
carousel.addEventListener('mouseenter', () => {
    clearInterval(autoScroll);
});

// Resume auto-scroll when mouse leaves
carousel.addEventListener('mouseleave', () => {
    startAutoScroll();
});

// Manual scroll buttons
rightButton.addEventListener('click', () => {
    scrollRight();
    resetAutoScroll();
});

leftButton.addEventListener('click', () => {
    scrollLeft();
    resetAutoScroll();
});

// Reset the auto-scroll interval
function resetAutoScroll() {
    clearInterval(autoScroll);
    startAutoScroll();
}

// Hover-and-move functionality
let isHovering = false;
let previousX = 0;

carousel.addEventListener('mousemove', (e) => {
    if (!isHovering) return;

    const currentX = e.pageX - carousel.offsetLeft;
    const deltaX = currentX - previousX;

    if (deltaX > 0) {
        // Move right
        carousel.scrollBy({ left: 10, behavior: 'auto' });
    } else if (deltaX < 0) {
        // Move left
        carousel.scrollBy({ left: -10, behavior: 'auto' });
    }

    previousX = currentX;
    checkScrollPosition();
    checkIfEndReached();
});

carousel.addEventListener('mouseenter', () => {
    isHovering = true;
});

carousel.addEventListener('mouseleave', () => {
    isHovering = false;
});

// Initialize carousel functionality
function initCarousel() {
    leftButton.style.opacity = '0';
    leftButton.style.pointerEvents = 'none';
    startAutoScroll();
}

// Initialize on page load
initCarousel();

// Re-initialize on window resize
window.addEventListener('resize', initCarousel);
