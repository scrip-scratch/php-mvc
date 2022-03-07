document.addEventListener('DOMContentLoaded', function() {
    let preloader = document.getElementById('page-preloader');

    if (!preloader.classList.contains('done')) {
        preloader.classList.add('done');
    }
})