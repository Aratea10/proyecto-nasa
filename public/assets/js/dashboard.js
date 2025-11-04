const dateInput = document.getElementById('dateSelector');
let isOpen = false;

dateInput.addEventListener('mousedown', function(e) {
    e.preventDefault();
    if (isOpen) {
        this.blur();
        isOpen = false;
    } else {
        this.showPicker();
        isOpen = true;
    }
});

dateInput.addEventListener('change', function() {
    isOpen = false;
});

document.addEventListener('click', function(e) {
    if (e.target !== dateInput) {
        isOpen = false;
    }
});

document.querySelectorAll('.stellar-button').forEach(button => {
    button.addEventListener('click', function() {
        this.classList.add('flash');
        setTimeout(() => {
            this.classList.remove('flash');
        }, 500);
    });
});

function createShootingStar() {
    const star = document.createElement('div');
    star.className = 'shooting-star';
    star.style.left = `${Math.random() * 100}%`;
    star.style.top = `${Math.random() * 50}%`;
    document.body.appendChild(star);

    setTimeout(() => {
        star.remove();
    }, 3000);
}
setInterval(createShootingStar, 5000);

function createStars(count) {
    for (let i = 0; i < count; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        star.style.left = `${Math.random() * 100}%`;
        star.style.top = `${Math.random() * 100}%`;
        star.style.animationDelay = `${Math.random() * 1}s`;
        document.body.appendChild(star);
    }
}

createStars(50);