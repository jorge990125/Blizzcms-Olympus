<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
    <div class="uk-container uk-card uk-card-body uk-card-default">
        <?php
        // Información del evento
        $eventInfo = [
            "title" => "Listado del Mercado Negro",
            "description" => "Explora los ítems disponibles en el Mercado Negro. Solo se mostrarán los ítems activos que están a la venta actualmente.",
        ];
        ?>

        <h1 class="uk-heading-divider uk-text-primary"><?php echo htmlspecialchars($eventInfo['title']); ?></h1>
        <p><?php echo htmlspecialchars($eventInfo['description']); ?></p>

        <?php
        // Asegurarse de que $realmData es una conexión válida
        if (!isset($realmData) || !is_object($realmData)) {
            echo "<p style='color:red;'>Error: Conexión con el reino no disponible.</p>";
            return;
        }

        // Consulta para obtener el tiempo de expiración del próximo ítem activo
        $timeSql = "SELECT MIN(expiration_time) AS next_rotation FROM black_market WHERE active = 1";
        $timeResult = $realmData->query($timeSql);
        $nextRotationTime = null;

        if ($timeResult && $timeRow = $timeResult->row_array()) {
            $nextRotationTime = strtotime($timeRow['next_rotation']);
        }

        if ($nextRotationTime) {
            $currentTime = time();
            $timeRemaining = $nextRotationTime - $currentTime;

            if ($timeRemaining > 0) {
                $hours = floor($timeRemaining / 3600);
                $minutes = floor(($timeRemaining % 3600) / 60);
                echo "<p style='color: #5f9edc;'><strong style='color: white;'>Tiempo restante para la próxima rotación:</strong> {$hours} horas y {$minutes} minutos.</p>";
            } else {
                echo "<p style='color: #5f9edc;'><strong style='color: white;'>La próxima rotación está ocurriendo ahora.</strong></p>";
            }
        } else {
            echo "<p style='color: #5f9edc;'><strong style='color: white;'>No se pudo determinar el tiempo para la próxima rotación.</strong></p>";
        }

        // Consulta para obtener los ítems activos
        $sql = "SELECT bm.item_id, it.name AS item_name, bm.icon_url, bm.price_quantity 
                FROM black_market bm
                JOIN black_market_item_name it ON bm.item_id = it.entry
                WHERE bm.active = 1";

        $result = $realmData->query($sql);

        if ($result === false) {
            $errorArray = $realmData->error();
            echo "<p style='color:red;'>Error en la consulta: " . htmlspecialchars($errorArray['message']) . "</p>";

        } elseif ($result->num_rows() > 0) {
            echo '<div class="uk-overflow-auto">';
            echo "<table class='uk-table uk-table-divider uk-table-hover'>
                    <thead>
                        <tr>
                            <th>Icono</th>
                            <th>Nombre del Ítem</th>
                            <th>Market Coins Requeridos</th>
                        </tr>
                    </thead>
                    <tbody>";

            foreach ($result->result_array() as $row) {
                $itemName = htmlspecialchars($row['item_name']);
                $priceQuantity = htmlspecialchars($row['price_quantity']);
                $iconUrl = htmlspecialchars($row['icon_url'] ?: "/assets/images/store/default_icon.jpg");

                echo "<tr>
                        <td><img src='{$iconUrl}' alt='Icono del ítem' style='width:32px; height:32px;'></td>
                        <td>{$itemName}</td>
                        <td>{$priceQuantity}</td>
                      </tr>";
            }

            echo "</tbody></table></div>";
        } else {
            echo "<p>No se encontraron ítems activos en el mercado negro.</p>";
        }
        ?>

        <div class="uk-child-width-1-2@s uk-grid-match" data-uk-grid></div>
    </div>
</section>
