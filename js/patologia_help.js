document.getElementById("pers_patologia").addEventListener("input", function() {
    const numeroFamiliares = parseInt(this.value, 10) || 0;
    const container = document.getElementById("additional-patologias");
    container.innerHTML = "";

    if (numeroFamiliares >= 1) {
        for (let i = 1; i <= numeroFamiliares; i++) {
            const div = document.createElement("div");
            div.className = "input-group";

            const label = document.createElement("label");
            label.textContent = `Patología de la persona ${i}:`;
            label.setAttribute("for", `pers_patologia-persona-${i}`);

            const select = document.createElement("select");
            select.className = "patologias";
            select.id = `pers_patologia-persona-${i}`;
            select.name = `patologia[]`;
            select.required = true;

            ["Hereditarias", "Congénitas", "Atención primaria", "Discapacidad", "Visual", "Auditiva", "Motora", "Intelectual", "Otras"].forEach(opcionTexto => {
                const opcion = document.createElement("option");
                opcion.value = opcionTexto;
                opcion.textContent = opcionTexto;
                select.appendChild(opcion);
            });

            div.appendChild(label);
            div.appendChild(select);
            container.appendChild(div);
        }
    }
});
