const lazyClass = 'lazy-loading';
const lazyImages = document.querySelectorAll(`.${lazyClass}`);

const lazyObserver = new IntersectionObserver((elements) => {
    elements.forEach((element) => {
        if (element.isIntersecting) {
            const image = element.target;
            showImage(image);
            lazyObserver.unobserve(image);
        }
    })
})

lazyImages.forEach(image => {
    lazyObserver.observe(image);
})
