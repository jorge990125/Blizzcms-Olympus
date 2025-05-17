<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
    <div class="uk-container uk-card uk-card-body uk-card-default">
        <?php
        $vipInfo = [
            "title" => "Sistema VIP",
            "description" => "El sistema VIP para World of Warcraft es una funcionalidad diseñada para mejorar la experiencia de juego de los usuarios que adquieran el rango VIP. Ofrece beneficios exclusivos, acceso a contenido especial y bonificaciones que enriquecen la aventura sin comprometer el balance del juego.",
            "features" => [
                [
                    "title" => "Bonificaciones de Experiencia",
                    "description" => "Incrementa la experiencia ganada al completar misiones y derrotar enemigos.",
                ],
                [
                    "title" => "Tasas de Botín Mejoradas",
                    "description" => "Aumenta las probabilidades de obtener ítems raros o épicos en mazmorras y raids.",
                ],
                [
                    "title" => "Buff de aumentos de estadisticas",
                    "description" => "Utilización de buff de aumento de estadisticas exclusivamente para jugadores VIP.",
                ],
                [
                    "title" => "Banco y Correos Exclusivos",
                    "description" => "El uso de banco y correo en cualquier momento.",
                ],
                [
                    "title" => "Soporte de reparación de equipo y restauración de HP y MP",
                    "description" => "Permite reparacion y restauracion de HP y MP del jugador en cualquier momento.",
                ]
            ],
            "benefits" => [
                [
                    "title" => "Bonificaciones de Rates",
                    "description" => "Rates generales aumentados, mayor experiencia en mobs, crafteo, oro y profesiones .",
                    "image" => "/application/themes/default/assets/images/vip/ExperienciaExtra.jpg"
                ],
                [
                    "title" => "Montura de funciones vip",
                    "description" => "Accede a monturas únicas disponibles solo para jugadores VIP.",
                    "image" => "/application/themes/default/assets/images/vip/montura.jpg"
                ],
                [
                    "title" => "Banco y Correos",
                    "description" => "El uso de banco y correo en cualquier momento.",
                    "image" => "/application/themes/default/assets/images/vip/banco.jpg"
                ],
                [
                    "title" => "Buff",
                    "description" => "Buff de aumento de estadisticas",
                    "image" => "/application/themes/default/assets/images/vip/buff.jpg"
                ]
            ]
        ];
        ?>

        <h1 class="uk-heading-divider" style="color: orange;"><?php echo $vipInfo['title']; ?></h1>

        <p><?php echo $vipInfo['description']; ?></p>

        <h2 style="color: orange;">Características del Sistema VIP</h2>
        <ul>
            <?php foreach ($vipInfo['features'] as $feature): ?>
                <li><strong><?php echo $feature['title']; ?>:</strong> <?php echo $feature['description']; ?></li>
            <?php endforeach; ?>
        </ul>

        <h2 style="color: orange;">Beneficios Exclusivos</h2>
        <div class="uk-child-width-1-2@s uk-grid-match" data-uk-grid>
            <?php foreach ($vipInfo['benefits'] as $benefit): ?>
                <div>
                    <div class="uk-card uk-card-secondary uk-card-hover uk-card-body">
                        <img src="<?php echo $benefit['image']; ?>" alt="Imagen de <?php echo $benefit['title']; ?>" class="uk-border-rounded" style="width:100%; max-height:200px; object-fit: cover;">
                        <h3 style="color: orange;"><?php echo $benefit['title']; ?></h3>
                        <p><?php echo $benefit['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
