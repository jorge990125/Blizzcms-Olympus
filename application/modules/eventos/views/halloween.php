<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
    <div class="uk-container uk-card uk-card-body uk-card-default">
        <?php
        $eventInfo = [
            "title" => "La Llegada de Halloween a World of Warcraft",
            "description" => "La Víspera de Todos los Santos es una celebración anual en el mundo de Azeroth, donde los jugadores pueden participar en actividades especiales de Halloween. Este evento incluye misiones temáticas, disfraces y enfrentamientos emocionantes contra el Jinete Decapitado. Aprovecha esta oportunidad para ganar recompensas exclusivas y explorar el mundo de Azeroth decorado para la ocasión.",
            "activities" => [
                [
                    "title" => "Cacería de Calabazas Encantadas",
                    "description" => "Recoge calabazas encantadas y otros objetos de Halloween escondidos en ciudades y aldeas. Cada calabaza contiene dulces, objetos especiales o sorpresas.",
                    "image" => "/application/themes/default/assets/images/halloween/halloween.jpg"
                ],
                [
                    "title" => "El Jinete Decapitado",
                    "description" => "Enfréntate al Jinete Decapitado en una mazmorra especial de Halloween. Este temible enemigo aparece solo durante la Víspera de Todos los Santos, ofreciendo botín raro, incluyendo su montura única.",
                    "image" => "/application/themes/default/assets/images/halloween/jinete.jpg"
                ],
                [
                    "title" => "Disfraces y Transformaciones",
                    "description" => "Equipa disfraces y transforma a tu personaje en diversas criaturas de Halloween, como fantasmas, murciélagos y otros personajes clásicos del evento.",
                    "image" => "/application/themes/default/assets/images/halloween/disfrases.jpg"
                ]
            ],
            "startDate" => "17 de octubre",
            "endDate" => "1 de noviembre"
        ];
        ?>

        <h1 class="uk-heading-divider" style="color: orange;"><?php echo $eventInfo['title']; ?></h1>

        <p><?php echo $eventInfo['description']; ?></p>

        <p>La <a href="https://www.wowhead.com/es/event=324/halloween#items;50" style="color: orange;">Víspera de Todos los Santos (Halloween)</a> es un evento anual que se celebra en Azeroth. En este evento, los jugadores pueden participar en diversas actividades, como la <a href="https://www.wowhead.com/es/event=324/halloween#items;50" style="color: orange;">Cacería de Calabazas</a>, realizar trucos o tratos y enfrentar al temible <a href="https://www.wowhead.com/es/event=324/halloween#items;50" style="color: orange;">Jinete Decapitado</a>.</p>

        <p>Durante el evento, los jugadores pueden ganar recompensas como máscaras, objetos especiales y una variedad de disfraces. También pueden obtener la <a href="https://www.wowhead.com/es/event=324/halloween#items;50" style="color: orange;">Montura del Jinete Decapitado</a> si tienen suerte en su enfrentamiento contra él. Este evento se celebra anualmente durante las últimas semanas de octubre hasta el 1 de noviembre, proporcionando una oportunidad única para participar en actividades temáticas de Halloween y ganar artículos exclusivos del evento. Los jugadores pueden encontrar diversas actividades como la Cacería de Calabazas, misiones de truco o trato, y enfrentamientos con el infame Jinete Decapitado.</p>

        <p>Además de las actividades mencionadas, los jugadores también pueden disfrutar de eventos especiales dentro del juego, como las misiones diarias y recompensas que solo están disponibles durante este evento festivo. Estas recompensas incluyen disfraces, máscaras y otros objetos especiales, que pueden ser adquiridos a través de la participación en las diferentes actividades. ¡No olvides realizar trucos o tratos para obtener algunos artículos especiales y vivir la experiencia completa de Halloween en Azeroth!</p>

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
