// Basic interactivity for switching tabs or managing active states
document.querySelectorAll('.sidebar nav ul li').forEach((item) => {
    item.addEventListener('click', () => {
        document.querySelector('.sidebar nav ul li.active').classList.remove('active');
        item.classList.add('active');
    });
});
