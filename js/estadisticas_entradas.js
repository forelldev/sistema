am5.ready(function() {
    // Crear elemento raíz
    var root = am5.Root.new("chartdiv");

    // Configurar temas
    root.setThemes([
        am5themes_Animated.new(root)
    ]);

    // Crear el gráfico
    var chart = root.container.children.push(
        am5percent.PieChart.new(root, {
            endAngle: 270
        })
    );

    // Crear la serie
    var series = chart.series.push(
        am5percent.PieSeries.new(root, {
            valueField: "value", // Campo para los valores
            categoryField: "category", // Campo para las categorías
            endAngle: 270
        })
    );

    series.states.create("hidden", {
        endAngle: -90
    });

    // Llamada a la API para obtener los datos de roles/rangos
    let url = 'http://localhost/apirest/estadisticas_entradas.php';

    fetch(url)
        .then(response => response.json())
        .then(info => {
            // Procesar los datos obtenidos de la API
            const data = transformarDatos(info);

            // Asignar los datos al gráfico
            chart.data = data;
            series.data.setAll(data);
        })
        .catch(e => console.log("Error al obtener los datos:", e));

    // Función para transformar los datos obtenidos
    const transformarDatos = (info) => {
        // Devolver los datos en el formato esperado por amCharts
        return [
            { category: "Secretaria", value: info.secretaria },
            { category: "Despacho", value: info.despacho },
            { category: "Administrador Secundario", value: info.administrador_secundario },
            { category: "Administrador", value: info.administrador }
        ];
    };

    // Animación de aparición del gráfico
    series.appear(1000, 100);
}); // Fin de am5.ready()
