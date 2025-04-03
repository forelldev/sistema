am5.ready(function() {
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
    let url = 'http://localhost/apirest/estadisticas_solicitudes.php';

    fetch(url)
        .then(response => response.json())
        .then(info => {
            // Procesar los datos obtenidos de la API
            const data = transformarDatos(info);

            // Procesar los datos obtenidos de la API
            chart.data = data;
             // Asignar los datos al gráfico
             series.data.setAll(data);
        })
        .catch(e => console.log("Error al obtener los datos:", e));

    // Función para transformar los datos obtenidos
    const transformarDatos = (info) => {
        // Calcular valores basados en los estados
        const en_proceso = info.filter(element =>
            element.estado === "En espera del documento físico para ser procesado 0/3" ||
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
            { category: "En Proceso", value: en_proceso },
            { category: "Finalizados", value: finalizado },
            { category: "Inválidos", value: invalido }
        ];
    };

    // Animación de aparición del gráfico
    series.appear(1000, 100);
}); // end am5.ready()