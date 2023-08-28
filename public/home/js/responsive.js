
let navBar = document.getElementById('nav-container');
let iconContainer = document.getElementById('icon-container');
iconContainer.addEventListener('click', (event) => {
    event.stopPropagation();
    iconContainer.classList.toggle("change");
    navBar.classList.toggle('show-menu');
});

document.addEventListener('click', function(event) {
if (!navBar.contains(event.target)) {
    navBar.classList.remove('show-menu');
    iconContainer.classList.remove("change");
}
});