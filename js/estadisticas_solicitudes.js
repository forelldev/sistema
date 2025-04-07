am5.ready(function() {
    const loadingIndicator = document.getElementById("loading");
    const contentContainer = document.getElementById("content");
    // Create root element
    var root = am5.Root.new("chartdiv");

    // Set themes
    root.setThemes([
        am5themes_Animated.new(root)
    ]);

    // Create chart
    var chart = root.container.children.push(
        am5percent.PieChart.new(root, {
            endAngle: 270
        })
    );

    // Create series
    var series = chart.series.push(
        am5percent.PieSeries.new(root, {
            valueField: "value", // Campo que representa los valores
            categoryField: "category", // Campo que representa las categorías
            endAngle: 270
        })
    );

    series.states.create("hidden", {
        endAngle: -90
    });

    // Llamada a la API para obtener los datos
    let url = '../apirest/estadisticas_solicitudes.php';

    fetch(url)
        .then(response => response.json())
        .then(info => {
            // Procesar los datos obtenidos de la API
            const data = transformarDatos(info);

            // Procesar los datos obtenidos de la API
            chart.data = data;
             // Asignar los datos al gráfico
             series.data.setAll(data);
                     // Renderizar la tabla con los datos
            renderTable(data);
            // Ocultar indicador de carga y mostrar el contenido
            loadingIndicator.style.display = "none";
            contentContainer.style.display = "block";
        })
        .catch(e => console.log("Error al obtener los datos:", e));

    // Función para transformar los datos obtenidos
    const transformarDatos = (info) => {
        // Calcular valores basados en los estados
        const en_espera = info.filter(element=> element.estado === "En espera del documento físico para ser procesado 0/3").length

        const en_proceso = info.filter(element =>
            element.estado === "En Proceso 1/3" ||
            element.estado === "En Proceso 2/3"
        ).length;

        const finalizado = info.filter(element =>
            element.estado === "Proceso Finalizado 3/3"
        ).length;

        const invalido = info.filter(element =>
            element.estado === "Documento inválido"
        ).length;

        // Devolver los datos en el formato esperado por amCharts
        return [
            { category: "En Espera", value: en_espera},
            { category: "En Proceso", value: en_proceso },
            { category: "Finalizados", value: finalizado },
            { category: "Inválidos", value: invalido }
        ];
    };

    // Animación de aparición del gráfico
    series.appear(1000, 100);

    // Función para renderizar la tabla
    const renderTable = (data) => {
        // Selecciona el elemento donde irá la tabla
        const container = document.getElementById("table");

        // Crea la estructura de la tabla
        let table = `<table border="1" class="table-systemhelp" style="width: 100%; text-align: left;">
            <thead>
                <tr>
                    <th>Categoría</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>`;
        
        // Agrega filas dinámicas basadas en los datos
        data.forEach(item => {
            table += `<tr>
                <td>${item.category}</td>
                <td>${item.value}</td>
            </tr>`;
        });

        table += `</tbody></table>`;

        // Inserta la tabla en el contenedor
        container.innerHTML = table;
    };
});  // end am5.ready() 


