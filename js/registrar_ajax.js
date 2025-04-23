$(document).ready(function () {
    $('#submitBtn').click(function () {
        // Validar que las contraseñas coincidan
        const password = $('#contraseña').val();
        const passwordRepeat = $('#contraseña_repe').val();

        if (password !== passwordRepeat) {
            $('#message').text('Las contraseñas no coinciden. Por favor, verifica e intenta nuevamente.');
            return; // Detener el envío
        }

        // Recoger los datos del formulario
        const formData = $('#form').serialize();

        // Enviar los datos mediante AJAX
        $.ajax({
            url: './control/register.php', // Archivo PHP donde se procesa la consulta
            type: 'POST',
            data: formData,
            success: function (response) {
                if (response.includes('success')) {
                    window.location.href = "felicidades_newuser.php"; 
                    $('#form')[0].reset(); // Limpiar el formulario
                } else {
                    $('#message').css('color', 'red').text(response); // Mostrar mensaje de error
                }
            },
            error: function () {
                $('#message').text('Error al registrar el usuario. Intente nuevamente.');
            }
        });
    });
});