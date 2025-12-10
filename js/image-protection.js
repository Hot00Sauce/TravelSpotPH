// Disable right-click and long-press on all images
document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img');
    
    images.forEach(img => {
        // Prevent context menu (right-click)
        img.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            return false;
        });
        
        // Prevent drag
        img.addEventListener('dragstart', function(e) {
            e.preventDefault();
            return false;
        });
    });
});
