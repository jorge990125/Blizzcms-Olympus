<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
    <div class="uk-container uk-card uk-card-body uk-card-default">
        <?php
        $eventInfo = [
            "title" => "La Feria de Luna Negra en World of Warcraft",
            "description" => "La Feria de Luna Negra es un evento anual en World of Warcraft que ofrece emocionantes actividades, recompensas únicas y entretenimiento para jugadores de todos los niveles. Durante el Parche 4.3 de Cataclysm, la feria llega con nuevas sorpresas, misiones y objetos especiales. ¡No pierdas la oportunidad de participar y obtener artículos exclusivos del evento!",
            "informacion-1" => "La Feria de Luna Negra se desplaza por diferentes ciudades de Azeroth, proporcionando a los jugadores la oportunidad de ganar nuevas recompensas, como monturas, mascotas y otros objetos únicos. En el Parche 4.3, las sorpresas son aún mayores con nuevos juegos, misiones y eventos especiales que solo se pueden disfrutar durante el paso de la feria.",
            "informacion-2" => "En este parche, la Feria de Luna Negra también introduce nuevas recompensas como la Montura de Luna Negra, la nueva ruleta de la suerte, y varios premios en función del desempeño en las actividades del evento. Los jugadores pueden acceder a la feria desde las principales capitales de Azeroth y participar en actividades como los juegos de azar, las misiones diarias y los combates de la feria.",
            "activities" => [
                [
                    "title" => "La Ruleta de Luna Negra",
                    "description" => "Participa en la ruleta de la suerte de la Feria de Luna Negra y gana premios como monedas, objetos raros y tal vez, la Montura de Luna Negra.",
                    "image" => "/application/themes/default/assets/images/darkmmoon/ruleta.jpg"
                ],
                [
                    "title" => "Misiones de la Feria",
                    "description" => "Realiza misiones para ganar valiosas recompensas, como tokens de Luna Negra, que pueden canjearse por objetos especiales.",
                    "image" => "/application/themes/default/assets/images/darkmmoon/misiones.jpg"
                ],
                [
                    "title" => "Juegos de Feria",
                    "description" => "Diviértete jugando en los juegos de feria, como las dianas o carreras de saqueadores, para ganar premios adicionales.",
                    "image" => "/application/themes/default/assets/images/darkmmoon/juegos.jpg"
                ]
            ],
            "startDate" => "10 de diciembre",
            "endDate" => "17 de diciembre"
        ];
        ?>

        <h1 class="uk-heading-divider" style="color: orange;"><?php echo $eventInfo['title']; ?></h1>

        <p><?php echo $eventInfo['description']; ?></p>
        <p><?php echo $eventInfo['informacion-1']; ?></p>
        <p><?php echo $eventInfo['informacion-2']; ?></p>

        <p>La <a href="https://www.wowhead.com/es/event=256/luna-negra" style="color: orange;">Feria de Luna Negra</a> es un evento especial en World of Warcraft que ha estado presente desde el lanzamiento del juego. En el Parche 4.3 de Cataclysm, la feria introduce nuevas actividades y recompensas que emocionarán a los jugadores. Los jugadores pueden ganar <a href="https://www.wowhead.com/es/item=32473" style="color: orange;">tokens de Luna Negra</a> y utilizarlos para obtener artículos exclusivos, como monturas y mascotas.</p>

        <p>Durante el evento, se pueden disfrutar de actividades como la <a href="https://www.wowhead.com/es/spell=87772" style="color: orange;">ruleta de Luna Negra</a>, que ofrece premios aleatorios, o participar en las misiones especiales de la feria para ganar <a href="https://www.wowhead.com/es/item=23894" style="color: orange;">objetos únicos</a> que solo están disponibles durante el evento. Además, la Feria también presenta nuevas recompensas como la <a href="https://www.wowhead.com/es/item=32473" style="color: orange;">Montura de Luna Negra</a>, una de las más codiciadas entre los jugadores.</p>

        <p>La <a href="https://www.wowhead.com/es/event=256/luna-negra" style="color: orange;">Feria de Luna Negra</a> llega con una variedad de juegos y actividades, como la famosa ruleta y concursos de azar, que permiten ganar recompensas adicionales. Este evento es una de las tradiciones más esperadas por los jugadores, y es el momento perfecto para disfrutar de un cambio en la rutina mientras exploras Azeroth.</p>

        <p><strong>Fechas del evento:</strong> <?php echo $eventInfo['startDate']; ?> - <?php echo $eventInfo['endDate']; ?></p>

        <div class="uk-child-width-1-2@s uk-grid-match" data-uk-grid>
            <?php foreach ($eventInfo['activities'] as $activity): ?>
                <div>
                    <div class="uk-card uk-card-secondary uk-card-hover uk-card-body">
                        <img src="<?php echo $activity['image']; ?>" alt="Imagen de <?php echo $activity['title']; ?>" class="uk-border-rounded" style="width:100%; max-height:200px; object-fit: cover;">
                        <h3 style="color: orange;"><?php echo $activity['title']; ?></h3>
                        <p><?php echo $activity['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
