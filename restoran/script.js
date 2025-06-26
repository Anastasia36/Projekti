let currentIndex = 0;

function openLightbox(element) {
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightboxImage');
    const images = document.querySelectorAll('.gallery-single img');

    currentIndex = Array.from(images).indexOf(element);
    lightboxImage.src = element.src;
    lightbox.style.display = 'flex';

    document.addEventListener('keydown', handleKeyNavigation);
}

function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
    document.removeEventListener('keydown', handleKeyNavigation);
}

function prevImage(event) {
    if (event) event.stopPropagation();
    const images = document.querySelectorAll('.gallery-single img');
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    document.getElementById('lightboxImage').src = images[currentIndex].src;
}

function nextImage(event) {
    if (event) event.stopPropagation();
    const images = document.querySelectorAll('.gallery-single img');
    currentIndex = (currentIndex + 1) % images.length;
    document.getElementById('lightboxImage').src = images[currentIndex].src;
}

function handleKeyNavigation(event) {
    switch (event.key) {
        case 'ArrowLeft':
            prevImage();
            break;
        case 'ArrowRight':
            nextImage();
            break;
        case 'Escape':
            closeLightbox();
            break;
    }
}

document.querySelectorAll('.gallery-single img').forEach(img => {
    img.addEventListener('click', function () {
        openLightbox(this);
    });
});



document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Sprečava ponovno učitavanje stranice
    $('#confirmationModal').modal('show'); // Prikaz modala
    this.reset(); // Resetiranje forme
  });



