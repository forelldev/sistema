window.onload = function() {
    ajustarVisibilidadTrabajo();
    ajustarVisibilidadInstitucion();
};

document.getElementById("trabaja_public").addEventListener("change", ajustarVisibilidadInstitucion);
function ajustarVisibilidadInstitucion() {
    const trabajaPublicValue = document.getElementById("trabaja_public").value;
    const institucionField = document.getElementById("nombre_insti");
    const institucionLabel = document.querySelector('label[for="nombre_insti"]');

    if (trabajaPublicValue === "Si") {
        institucionField.style.display = "inline-block";
        institucionLabel.style.display = "inline-block";
        institucionField.required = true;
    } else {
        institucionField.style.display = "none";
        institucionLabel.style.display = "none";
        institucionField.required = false;
    }
}

document.getElementById("trabajo1").addEventListener("change", ajustarVisibilidadTrabajo);
function ajustarVisibilidadTrabajo() {
    const trabajoValue = document.getElementById("trabajo1").value;
    const trabajoFields = ["trabajo", "direc_trabajo", "trabaja_public"];
    const trabajoLabels = ["trabajo", "direc_trabajo", "trabaja_public"];

    trabajoFields.forEach(id => {
        const field = document.getElementById(id);
        const label = document.querySelector(`label[for="${id}"]`);
        if (trabajoValue === "No") {
            field.style.display = "none";
            field.required = false;
            label.style.display = "none";
        } else {
            field.style.display = "inline-block";
            field.required = true;
            label.style.display = "inline-block";
        }
    });
}