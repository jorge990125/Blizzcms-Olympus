<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas del Servidor de WoW</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 40px auto;
            height: 400px;
        }

        .stats-container {
            margin-top: 40px;
        }

        .stat-item {
            font-size: 18px;
            margin: 10px 0;
        }

        .general-stats {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        canvas {
            display: block;
            max-height: 400px;
        }

        .spacer {
            height: 50px;
        }

        .icon {
            vertical-align: middle;
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Estadísticas del Servidor</h1>

    <?php
    // Obtener instancia de CodeIgniter
    $CI =& get_instance();
    $CI->load->model('realm_model');

    if (!isset($realmData) || !is_object($realmData)) {
        echo "<p style='color:red;'>Error: Conexión con el reino no disponible.</p>";
        return;
    }

    // Mapas de nombres de razas y clases
    $raceNames = [
        1 => 'Humano', 2 => 'Orco', 3 => 'Enano', 4 => 'Elfo de la Noche',
        5 => 'No-Muerto', 6 => 'Tauren', 7 => 'Gnomo', 8 => 'Troll',
        9 => 'Goblin', 10 => 'Elfo de Sangre', 11 => 'Draenei',
        22 => 'Huargen', 25 => 'Pandaren (Alianza)', 26 => 'Pandaren (Horda)'
    ];

    $classNames = [
        1 => 'Guerrero', 2 => 'Paladín', 3 => 'Cazador', 4 => 'Pícaro',
        5 => 'Sacerdote', 6 => 'Caballero de la Muerte', 7 => 'Chamán',
        8 => 'Mago', 9 => 'Brujo', 10 => 'Monje', 11 => 'Druida',
        12 => 'Cazador de Demonios'
    ];

    // Razas por facción
    $allianceRaces = [1, 3, 4, 7, 11, 22, 25];
    $hordeRaces = [2, 5, 6, 8, 9, 10, 26];

    // Obtener estadísticas desde la base de datos del reino
    try {
        // Jugadores por raza
        $raceQuery = $realmData->query("SELECT race, COUNT(*) as count FROM characters GROUP BY race");
        $raceData = $raceQuery->result_array();
        $raceLabels = [];
        $raceCounts = [];

        foreach ($raceData as $row) {
            $raceLabels[] = $raceNames[$row['race']] ?? 'Desconocido';
            $raceCounts[] = $row['count'];
        }

        // Jugadores por clase
        $classQuery = $realmData->query("SELECT class, COUNT(*) as count FROM characters GROUP BY class");
        $classData = $classQuery->result_array();
        $classLabels = [];
        $classCounts = [];

        foreach ($classData as $row) {
            $classLabels[] = $classNames[$row['class']] ?? 'Desconocido';
            $classCounts[] = $row['count'];
        }

        // Jugadores en línea por facción
        $onlineQuery = $realmData->query("SELECT race FROM characters WHERE online = 1");
        $onlineData = $onlineQuery->result_array();
        $allianceOnline = $hordeOnline = 0;

        foreach ($onlineData as $row) {
            if (in_array($row['race'], $allianceRaces)) $allianceOnline++;
            elseif (in_array($row['race'], $hordeRaces)) $hordeOnline++;
        }
        $totalOnline = $allianceOnline + $hordeOnline;

        // Estadísticas generales por facción
        $generalQuery = $realmData->query("SELECT race FROM characters");
        $generalData = $generalQuery->result_array();
        $allianceTotal = $hordeTotal = 0;

        foreach ($generalData as $row) {
            if (in_array($row['race'], $allianceRaces)) $allianceTotal++;
            elseif (in_array($row['race'], $hordeRaces)) $hordeTotal++;
        }
        $totalCharacters = $allianceTotal + $hordeTotal;

    } catch (Exception $e) {
        echo "<p style='color:red;'>Error en la consulta: " . htmlspecialchars($e->getMessage()) . "</p>";
        return;
    }
    ?>

    <!-- Información de jugadores en línea -->
    <div class="stats-container">
        <h2>Jugadores en Línea</h2>
        <div class="stat-item"><img src="/assets/images/status-alliance.png" alt="Alianza" class="icon">Alianza: <strong><?php echo $allianceOnline; ?> Jugadores</strong></div>
        <div class="stat-item"><img src="/assets/images/status-horde.png" alt="Horda" class="icon">Horda: <strong><?php echo $hordeOnline; ?> Jugadores</strong></div>
        <div class="stat-item">Total: <strong><?php echo $totalOnline; ?> Jugadores</strong></div>
    </div>

    <!-- Gráfico de Jugadores por Raza -->
    <div class="chart-container">
        <h2>Jugadores por Raza</h2>
        <canvas id="raceChart"></canvas>
    </div>

    <div class="spacer"></div>

    <!-- Gráfico de Jugadores por Clase -->
    <div class="chart-container">
        <h2>Jugadores por Clase</h2>
        <canvas id="classChart"></canvas>
    </div>

    <div class="spacer"></div>

    <!-- Estadísticas Generales -->
    <div class="general-stats">
        <h2>Estadísticas Generales</h2>
        <div class="stat-item">Personajes de Alianza: <strong><?php echo $allianceTotal; ?></strong></div>
        <div class="stat-item">Personajes de Horda: <strong><?php echo $hordeTotal; ?></strong></div>
        <div class="stat-item">Total de Personajes: <strong><?php echo $totalCharacters; ?></strong></div>
    </div>

    <script>
        const raceLabels = <?php echo json_encode($raceLabels); ?>;
        const raceCounts = <?php echo json_encode($raceCounts); ?>;
        const classLabels = <?php echo json_encode($classLabels); ?>;
        const classCounts = <?php echo json_encode($classCounts); ?>;

        new Chart(document.getElementById('raceChart'), {
            type: 'bar',
            data: {
                labels: raceLabels,
                datasets: [{
                    label: 'Jugadores por Raza',
                    data: raceCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: true },
                    datalabels: {
                        color: 'white',
                        anchor: '',
                        align: 'top',
                        font: { size: 12 }
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { ticks: { font: { size: 10 } } },
                    y: { beginAtZero: true, ticks: { display: false } }
                }
            },
            plugins: [ChartDataLabels]
        });

        new Chart(document.getElementById('classChart'), {
            type: 'bar',
            data: {
                labels: classLabels,
                datasets: [{
                    label: 'Jugadores por Clase',
                    data: classCounts,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: true },
                    datalabels: {
                        color: 'white',
                        anchor: '',
                        align: 'top',
                        font: { size: 12 }
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { ticks: { font: { size: 10 } } },
                    y: { beginAtZero: true, ticks: { display: false } }
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>
</body>
</html>
