<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
    <div class="uk-container uk-card uk-card-body uk-card-default">
        <?php
        $eventInfo = [
            "title" => "Puntos por Logros del Reino",
        ];
        ?>
        <h1 class="uk-heading-divider uk-text-primary"><?php echo htmlspecialchars($eventInfo['title']); ?></h1>

        <?php
        // Obtener la conexión del reino activo
        if (!isset($realmData) || !is_object($realmData)) {
            echo "<p style='color:red;'>Error: Conexión con el reino no disponible.</p>";
            return;
        }

        // Consulta 1: Obtener logros por personaje
        $sql_achievements = "SELECT ca.guid, ca.achievement FROM character_achievement ca";
        $result_achievements = $realmData->query($sql_achievements);

        if (!$result_achievements) {
            $errorArray = $realmData->error();
            echo "<p style='color:red;'>Error en la consulta de logros: " . htmlspecialchars($errorArray['message']) . "</p>";
            return;
        }

        $character_achievements = [];
        foreach ($result_achievements->result_array() as $row) {
            $character_achievements[] = $row;
        }

        // Consulta 2: Obtener puntos por logro desde la tabla 'achievement' (base de datos world)
        $sql_points = "SELECT id AS achievement, points FROM achievement";
        $result_points = $realmData->query($sql_points); // misma conexión si es una sola base

        if (!$result_points) {
            $errorArray = $realmData->error();
            echo "<p style='color:red;'>Error en la consulta de puntos: " . htmlspecialchars($errorArray['message']) . "</p>";
            return;
        }

        $achievement_points = [];
        foreach ($result_points->result_array() as $row) {
            $achievement_points[$row['achievement']] = $row['points'];
        }

        // Calcular puntos totales por personaje
        $character_points = [];
        foreach ($character_achievements as $achievement) {
            $guid = $achievement['guid'];
            $achievement_id = $achievement['achievement'];

            if (isset($achievement_points[$achievement_id])) {
                if (!isset($character_points[$guid])) {
                    $character_points[$guid] = 0;
                }
                $character_points[$guid] += $achievement_points[$achievement_id];
            }
        }

        // Consulta 3: Obtener nombres, clases y razas de los personajes
        $sql_characters = "SELECT guid, name, class, race FROM characters";
        $result_characters = $realmData->query($sql_characters);

        if (!$result_characters) {
            $errorArray = $realmData->error();
            echo "<p style='color:red;'>Error en la consulta de personajes: " . htmlspecialchars($errorArray['message']) . "</p>";
            return;
        }

        $characters_info = [];
        foreach ($result_characters->result_array() as $row) {
            $characters_info[$row['guid']] = $row;
        }

        // Funciones para iconos
        function getClassIcon($class) {
            $classIcons = [
                1 => "warrior.png", 2 => "paladin.png", 3 => "hunter.png", 4 => "rogue.png",
                5 => "priest.png", 6 => "dk.png", 7 => "shaman.png", 8 => "mage.png",
                9 => "warlock.png", 10 => "monk.png", 11 => "druid.png", 12 => "demonhunter.png"
            ];
            return "/assets/images/class/" . ($classIcons[$class] ?? "default.png");
        }

        function getRaceIcon($race) {
            $raceIcons = [
                1 => "human.jpg", 2 => "orc.jpg", 3 => "dwarf.jpg", 4 => "night_elf.jpg",
                5 => "undead.jpg", 6 => "tauren.jpg", 7 => "gnome.jpg", 8 => "troll.jpg",
                9 => "goblin.jpg", 10 => "blood_elf.jpg", 11 => "draenei.jpg", 22 => "worgen.jpg", 24 => "pandaren.jpg"
            ];
            return "/assets/images/races/" . ($raceIcons[$race] ?? "default.png");
        }
        ?>

        <div class="uk-overflow-auto">
            <table class="uk-table uk-table-divider uk-table-small">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Clase</th>
                        <th>Raza</th>
                        <th>Puntos de Logro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    arsort($character_points);
                    $position = 1;

                    foreach ($character_points as $guid => $total_points) {
                        if ($total_points > 0 && isset($characters_info[$guid])) {
                            $char = $characters_info[$guid];
                            $name = htmlspecialchars($char['name']);
                            $classIcon = getClassIcon($char['class']);
                            $raceIcon = getRaceIcon($char['race']);

                            echo "<tr>
                                <td>{$position}</td>
                                <td>{$name}</td>
                                <td><img src='{$classIcon}' alt='Clase' width='25'></td>
                                <td><img src='{$raceIcon}' alt='Raza' width='25'></td>
                                <td>{$total_points}</td>
                              </tr>";

                            $position++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
