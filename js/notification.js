const numeroFilas = document.getElementById('numeroFilas');
const noti = document.getElementById('noti-main');
const barra = document.getElementById('barra-main');

noti.addEventListener('click', (event) => {
    // Alternar visibilidad del elemento
    if (barra.classList.contains("barra-main-active")) {
        barra.classList.replace("barra-main-active", "barra-main");
        noti.innerHTML = "🔕"; // Cambiar el ícono de regreso
    } else {
        barra.classList.replace("barra-main", "barra-main-active");

        // Realizar el fetch solo si activas el elemento
        fetch('../administrador/main.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ action: 'mark_as_read' }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Notificaciones marcadas como vistas correctamente.');
                noti.innerHTML = "🔕"; // Cambiar el ícono
            } else {
                console.error('Error al actualizar las notificaciones.');
            }
        })
        .catch(error => console.error('Error al ejecutar la consulta:', error));
    }
});
// Ocultar el elemento al hacer clic en cualquier parte fuera de él
document.addEventListener('click', (event) => {
    if (event.target !== noti && event.target !== barra) {
        if (barra.classList.contains("barra-main-active")) { 
            barra.classList.replace("barra-main-active", "barra-main"); // Desactivar barra
            noti.innerHTML = "🔕"; // Cambiar el ícono solo si estaba activa
        }
    }
});

