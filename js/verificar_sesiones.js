function verificarSesion() {
    fetch('../control general/session_validar.php')
        .then(response => {
            // console.log("Estado de la respuesta:", response.status); // Verifica el estado HTTP
            return response.json();
    })
        .then(data => {
            // console.log("Respuesta recibida:", data); // Muestra el JSON devuelto
            if (data.redirect) {
                alert("Tu sesión ha expirado. Redirigiendo...");
                window.location.href = "../index.php"; // Redirige si corresponde
        }
    })
    .catch(error => console.error('Error en la verificación:', data.error));

}
// Llamar a la función cada 10 segundos
setInterval(verificarSesion, 10000);