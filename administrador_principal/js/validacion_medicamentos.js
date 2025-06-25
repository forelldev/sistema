const noti = document.getElementById("noti-main");
const barra = document.getElementById("barra-main");
        // Realizar la solicitud de datos cuando se activa la barra
        fetch("./control/validacion_medicamentos.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error HTTP ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                barra.innerHTML = ""; // Limpiar la lista previa

                if (data.data.length > 0) {
                    // Solo agregar elementos si hay resultados
                    data.data.forEach(noti => {
                        const item = document.createElement("li");
                        item.classList.add("li");

                        const link = document.createElement("a");
                        link.href = `medicamentos.php?id_doc=${noti.id_doc}`;
                        link.textContent = noti.descripcion;

                        item.appendChild(link);
                        barra.appendChild(item);
                    });

                    noti.innerHTML = "🔔"; // Hay notificaciones
                } else {
                    noti.innerHTML = "🔕"; // No hay notificaciones
                }
            } else {
                console.error("Error en la respuesta:", data.message);
            }
        })
        .catch(error => console.error("Error al obtener las notificaciones:", error));

noti.addEventListener("click", () => {
    // Alternar la barra y el ícono
    barra.classList.toggle("barra-main-active");
});

