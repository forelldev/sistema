document.addEventListener('DOMContentLoaded', function() {
    const passwordField = document.getElementById('password');
    const toggleButton = document.getElementById('toggle-password');
    if (passwordField && toggleButton) {
        toggleButton.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Botón clickeado');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            toggleButton.innerHTML = type === 'password' ? '<i class="fa fa-eye"></i>' : '<i class="fa fa-eye-slash"></i>';
        });
    }
});