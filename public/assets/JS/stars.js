document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star');

    stars.forEach(star => {
        star.addEventListener('mouseover', onStarHover);
        star.addEventListener('mouseout', onStarOut);
        star.addEventListener('click', onStarClick);
    });

    function onStarHover(event) {
        const star = event.currentTarget;
        const value = star.getAttribute('data-value');
        highlightStars(value);
    }

    function onStarOut() {
        resetStars();
    }

    function onStarClick(event) {
        const star = event.currentTarget;
        const value = star.getAttribute('data-value');
        selectStars(value);
    }

    function highlightStars(value) {
        stars.forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('highlight');
            } else {
                star.classList.remove('highlight');
            }
        });
    }

    function resetStars() {
        stars.forEach(star => {
            star.classList.remove('highlight');
        });
    }

    function selectStars(value) {
        stars.forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }
});
