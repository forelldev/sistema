document.getElementById("fecha_nacimiento").addEventListener("change", function() {
    const fechaNacimiento = new Date(this.value);
    const hoy = new Date();
    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
    const mes = hoy.getMonth() - fechaNacimiento.getMonth();

    if (fechaNacimiento > hoy) {
        document.querySelector('input[name="edad"]').value = "Fecha inválida";
        return;
    }

    if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
        edad--;
    }

    document.querySelector('input[name="edad"]').value = edad >= 0 ? edad : "Fecha inválida";
});
