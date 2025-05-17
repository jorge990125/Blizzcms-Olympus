<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Torneo - Estilo Valve</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e1e1e;
            color: #ffffff;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            margin: 20px 0;
            font-size: 2em;
        }

        .tournament-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        .round {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 40px;
            position: relative;
        }

        .match {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
            padding: 10px;
            background-color: #2e2e2e;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
            width: 200px;
        }

        .team {
            flex: 1;
            text-align: center;
        }

        .team.winner {
            font-weight: bold;
            color: #ffd700;
        }

        .champion {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            padding: 15px;
            background-color: #3e3e3e;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.8);
            width: 220px;
        }

        .champion .title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Torneo PvP-1vs1</h1>
    <div class="tournament-container">
        <!-- Octavos de final -->
        <div class="round">
            <h2>Octavos de Final</h2>
            <div class="match">
                <div class="team">Equipo A</div>
                <div class="line"></div>
                <div class="team">Equipo B</div>
            </div>
            <div class="match">
                <div class="team">Equipo C</div>
                <div class="line"></div>
                <div class="team">Equipo D</div>
            </div>
            <div class="match">
                <div class="team">Equipo E</div>
                <div class="line"></div>
                <div class="team">Equipo F</div>
            </div>
            <div class="match">
                <div class="team">Equipo G</div>
                <div class="line"></div>
                <div class="team">Equipo H</div>
            </div>
        </div>

        <!-- Cuartos de final -->
        <div class="round">
            <h2>Cuartos de Final</h2>
            <div class="match">
                <div class="team">Ganador 1</div>
                <div class="line"></div>
                <div class="team">Ganador 2</div>
            </div>
            <div class="match">
                <div class="team">Ganador 3</div>
                <div class="line"></div>
                <div class="team">Ganador 4</div>
            </div>
        </div>

        <!-- Semifinal -->
        <div class="round">
            <h2>Semifinal</h2>
            <div class="match">
                <div class="team">Ganador Cuartos 1</div>
                <div class="line"></div>
                <div class="team">Ganador Cuartos 2</div>
            </div>
        </div>

        <!-- Final -->
        <div class="round">
            <h2>Final</h2>
            <div class="match">
                <div class="team winner">Ganador Finalista</div>
                <div class="line"></div>
                <div class="team">Subcampeón</div>
            </div>
        </div>

        <!-- Campeón -->
        <div class="champion">
            <div class="title">¡Campeón!</div>
            <div class="team winner">Equipo Campeón</div>
        </div>
    </div>
</body>
</html>
