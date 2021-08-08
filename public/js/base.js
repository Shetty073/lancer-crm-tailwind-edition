
document.querySelectorAll('.dropdown').forEach(btn => {
    btn.addEventListener('click', () => {
        let ul = btn.querySelector('ul');
        ul.classList.toggle('hidden');
    });
});
