document.addEventListener('DOMContentLoaded', () => {
    const hoverImages = document.querySelectorAll('.hover-image');

    hoverImages.forEach(image => {
        const originalSrc = image.src;
        const hoverSrc = image.getAttribute('data-hover');

        image.addEventListener('mouseenter', () => {
            image.src = hoverSrc;
        });

        image.addEventListener('mouseleave', () => {
            image.src = originalSrc;
        });
    });
});
