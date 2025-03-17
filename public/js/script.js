document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.slider');
    const leftButton = document.getElementById('leftButton');
    const rightButton = document.getElementById('rightButton');

    const autoScrollInterval = 4000;
    let autoScroll;

    function getScrollAmount() {
        const itemWidth = carousel.querySelector('div').offsetWidth;
        return itemWidth;
    }

    function scrollRight() {
        const scrollAmount = getScrollAmount();
        carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        showLeftButton();
        checkIfEndReached();
    }

    function scrollLeft() {
        const scrollAmount = getScrollAmount();
        carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        checkScrollPosition();
    }

    function showLeftButton() {
        leftButton.style.opacity = '1';
        leftButton.style.pointerEvents = 'auto';
    }

    function checkScrollPosition() {
        if (carousel.scrollLeft <= 0) {
            leftButton.style.opacity = '0';
            leftButton.style.pointerEvents = 'none';
        }
    }

    function checkIfEndReached() {
        const buffer = 5;
        if (carousel.scrollLeft + carousel.clientWidth + buffer >= carousel.scrollWidth) {
            carousel.scrollTo({ left: 0, behavior: 'smooth' });
            leftButton.style.opacity = '0';
            leftButton.style.pointerEvents = 'none';
        }
    }

    function startAutoScroll() {
        autoScroll = setInterval(scrollRight, autoScrollInterval);
    }

    carousel.addEventListener('mouseenter', () => clearInterval(autoScroll));
    carousel.addEventListener('mouseleave', () => startAutoScroll());

    rightButton.addEventListener('click', () => {
        scrollRight();
        resetAutoScroll();
    });

    leftButton.addEventListener('click', () => {
        scrollLeft();
        resetAutoScroll();
    });

    function resetAutoScroll() {
        clearInterval(autoScroll);
        startAutoScroll();
    }

    let isHovering = false;
    let previousX = 0;

    carousel.addEventListener('mousemove', (e) => {
        if (!isHovering) return;
        const currentX = e.pageX - carousel.offsetLeft;
        const deltaX = currentX - previousX;
        if (deltaX > 0) carousel.scrollBy({ left: 10, behavior: 'auto' });
        else if (deltaX < 0) carousel.scrollBy({ left: -10, behavior: 'auto' });

        previousX = currentX;
        checkScrollPosition();
        checkIfEndReached();
    });

    carousel.addEventListener('mouseenter', () => isHovering = true);
    carousel.addEventListener('mouseleave', () => isHovering = false);

    function initCarousel() {
        leftButton.style.opacity = '0';
        leftButton.style.pointerEvents = 'none';
        startAutoScroll();
    }

    initCarousel();
    window.addEventListener('resize', initCarousel);
});
