document.getElementById("filtro-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Evitar el envío inmediato del formulario

    const filtro = document.getElementById("fecha").value;

    // Enviar el formulario al servidor
    const formData = new FormData(this);
    fetch("estadisticas_entradas.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(html => {
        // Reemplazar el contenido del cuerpo con la respuesta del servidor
        document.body.innerHTML = html;
    })
    .catch(error => console.error("Error:", error));
});