const numeroFilas = document.getElementById('numeroFilas');
const noti = document.getElementById('noti');
const barra = document.getElementById('barra');
numF = numeroFilas.value;

if (numF > 0) {
    const contadorNotis = document.createElement('p');
    contadorNotis.id = 'numerodeFilas';
    contadorNotis.textContent = `${numF}`;
    noti.insertAdjacentElement('afterend', contadorNotis);
}

barra.style.display = 'none';

noti.addEventListener('click', () => {
    if (barra.style.display === 'none') {
        barra.style.display = 'block';

        const contadorNotis = document.getElementById('numerodeFilas');
        if (contadorNotis) {
            // Enviar solicitud POST solo cuando el usuario hace clic en "Notificaciones"
            fetch('../administrador/main.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',  // Enviar como JSON
                },
                body: JSON.stringify({
                    action: 'mark_as_read',  // Acción para marcar las notificaciones como vistas
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Notificaciones marcadas como vistas correctamente.');
                } else {
                    console.error('Error al actualizar las notificaciones.');
                }
            })
            .catch(error => {
                console.error('Error al ejecutar la consulta:', error);
            });

            // Eliminar el contador de notificaciones
            contadorNotis.remove();
        }
    } else {
        barra.style.display = 'none';
    }
});