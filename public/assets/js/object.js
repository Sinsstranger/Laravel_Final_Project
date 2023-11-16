const form = document.getElementById('new-reservation');
form.noValidate = true;

form.addEventListener('submit', function(event) {
    if (!event.target.checkValidity()) {
        event.preventDefault();
        alert('Пожалуйста, заполните все пункты формы бронирования'); // error message
    }
}, false);
