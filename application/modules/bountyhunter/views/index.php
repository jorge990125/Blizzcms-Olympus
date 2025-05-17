<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
    <div class="uk-container uk-card uk-card-body uk-card-default">
        <?php
        // Información del evento
        $eventInfo = [
            "title" => "Listado del Caza Recompensas del Reino",
            "description" => "El sistema de Caza Recompensas en World of Warcraft te permite participar en emocionantes desafíos donde los jugadores pueden completar contratos y recibir recompensas exclusivas. Esta mecánica añade un elemento competitivo y estratégico al juego, ya que no solo debes enfrentarte a tus objetivos, sino también competir contra otros cazadores.",
            "informacion-1" => "En el sistema de Caza Recompensas, los jugadores tienen la oportunidad de aceptar contratos especiales para localizar y eliminar objetivos específicos. Al completar estas misiones, puedes ganar recompensas como oro, honor o tokens exclusivos que se pueden intercambiar por equipo poderoso o artículos cosméticos.",
            "informacion-2" => "Los cazadores con más éxito se ganarán un lugar en el listado de mejores Caza Recompensas, donde sus logros serán destacados para todos los jugadores. Este sistema fomenta tanto la competitividad como la colaboración, ya que puedes formar grupos para completar los contratos más difíciles.",
        ];
        ?>

        <h1 class="uk-heading-divider uk-text-primary"><?php echo htmlspecialchars($eventInfo['title']); ?></h1>
        <p><?php echo htmlspecialchars($eventInfo['description']); ?></p>
        <p><?php echo htmlspecialchars($eventInfo['informacion-1']); ?></p>
        <p><?php echo htmlspecialchars($eventInfo['informacion-2']); ?></p>

        <?php
        // Obtener conexión al reino
        $CI =& get_instance();

        if (!isset($realmData) || !is_object($realmData)) {
            echo "<p style='color:red;'>Error: Conexión con el reino no disponible.</p>";
            return;
        }

        // Iconos de clase y raza
        $classIcons = [
            1 => "/assets/images/class/warrior.png",
            2 => "/assets/images/class/paladin.png",
            3 => "/assets/images/class/hunter.png",
            4 => "/assets/images/class/rogue.png",
            5 => "/assets/images/class/priest.png",
            6 => "/assets/images/class/dk.png",
            7 => "/assets/images/class/shaman.png",
            8 => "/assets/images/class/mage.png",
            9 => "/assets/images/class/warlock.png",
            10 => "/assets/images/class/monk.png",
            11 => "/assets/images/class/druid.png",
            12 => "/assets/images/class/demonhunter.png",
        ];

        $raceIcons = [
            1 => "/assets/images/races/human.jpg",
            2 => "/assets/images/races/orc.jpg",
            3 => "/assets/images/races/dwarf.jpg",
            4 => "/assets/images/races/night_elf.jpg",
            5 => "/assets/images/races/undead.jpg",
            6 => "/assets/images/races/tauren.jpg",
            7 => "/assets/images/races/gnome.jpg",
            8 => "/assets/images/races/troll.jpg",
            9 => "/assets/images/races/goblin.jpg",
            10 => "/assets/images/races/blood_elf.jpg",
            11 => "/assets/images/races/draenei.jpg",
            22 => "/assets/images/races/worgen.jpg",
            24 => "/assets/images/races/pandaren.jpg",
        ];

        $priceNames = [
            1 => 'Oro',
            2 => 'Oro',
            3 => 'Oro',
            4 => 'Oro',
        ];

        // Consulta
        $sql = "SELECT b.guid, c.name AS playerName, c.class, c.race, b.price, b.visual
                FROM bounties b
                LEFT JOIN characters c ON b.guid = c.guid
                ORDER BY b.visual DESC";

        $result = $realmData->query($sql);

        if ($result === false) {
            $errorArray = $realmData->error();
            echo "<p style='color:red;'>Error en la consulta: " . htmlspecialchars($errorArray['message']) . "</p>";

        } elseif ($result->num_rows() > 0) {
            echo '<div class="uk-overflow-auto">';
            echo "<table class='uk-table uk-table-divider uk-table-hover'>
                    <thead>
                        <tr>
                            <th>Nombre del Jugador</th>
                            <th>Clase</th>
                            <th>Raza</th>
                            <th>Tipo de Moneda</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>";

            foreach ($result->result_array() as $row) {
                $playerName = htmlspecialchars($row['playerName'] ?: 'Desconocido');
                $classIcon = $classIcons[$row['class']] ?? '/assets/images/class/default.png';
                $raceIcon = $raceIcons[$row['race']] ?? '/assets/images/races/default.png';
                $currencyName = $priceNames[$row['price']] ?? 'Desconocido';

                echo "<tr>
                        <td>{$playerName}</td>
                        <td><img src='{$classIcon}' alt='Clase' style='width:24px; height:24px;'></td>
                        <td><img src='{$raceIcon}' alt='Raza' style='width:24px; height:24px;'></td>
                        <td>{$currencyName}</td>
                        <td>" . htmlspecialchars($row['visual']) . "</td>
                      </tr>";
            }

            echo "</tbody></table></div>";
        } else {
            echo "<p>No se encontraron datos en la tabla.</p>";
        }
        ?>
        <div class="uk-child-width-1-2@s uk-grid-match" data-uk-grid></div>
    </div>
</section>
