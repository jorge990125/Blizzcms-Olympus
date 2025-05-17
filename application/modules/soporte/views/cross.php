<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
    <div class="uk-container uk-card uk-card-body uk-card-default">
        <?php
        $vipInfo = [
            "title" => "Crossfaction PvP-PvE",
            "description" => "El Crossfaction (juego entre facciones cruzadas) en World of Warcraft es una funcionalidad que permite a personajes de distintas facciones, es decir, la Horda y la Alianza, interactuar, colaborar o competir en ciertos aspectos del juego que anteriormente estaban restringidos a cada facción. Este sistema modifica la tradicional separación entre ambas facciones y fomenta la interacción entre jugadores, independientemente de su elección de facción.",
            "features" => [
                [
                    "title" => "Grupos y bandas",
                    "description" => "Los jugadores pueden formar grupos o bandas con personajes de ambas facciones para participar en actividades como mazmorras, bandas (raids) y misiones específicas. Normalmente, se aplica en contenido instanciado, como bgs, raids y mazmorras tradicionales.",
                ],
                [
                    "title" => "Comunicación",
                    "description" => "Aunque históricamente la comunicación entre facciones estaba restringida, en grupos de crossfaction es posible comunicarse abiertamente mediante canales como chat de banda o grupo.",
                ],
                [
                    "title" => "Hermandades",
                    "description" => "En algunos servidores o configuraciones (oficiales o privadas), las hermandades pueden admitir miembros de ambas facciones, permitiendo una integración más amplia.",
                ],
                [
                    "title" => "JcJ (PvP)",
                    "description" => "En modos de juego JcJ, las facciones generalmente siguen enfrentándose entre sí. Sin embargo, el crossfaction no suele aplicarse en entornos puramente competitivos.",
                ],
                [
                    "title" => "Restricciones",
                    "description" => "Algunas interacciones aún están limitadas por la facción, como el acceso a ciertas zonas específicas de cada facción o la interacción en contenido de mundo abierto.",
                ]
            ],
            "benefits" => [
                [
                    "title" => "",
                    "description" => "",
                    "image" => "/application/themes/default/assets/images/cross/01.png"
                ],
                [
                    "title" => "",
                    "description" => "",
                    "image" => "/application/themes/default/assets/images/cross/02.png"
                ],
                [
                    "title" => "",
                    "description" => "",
                    "image" => "/application/themes/default/assets/images/cross/03.png"
                ],
                [
                    "title" => "",
                    "description" => "",
                    "image" => "/application/themes/default/assets/images/cross/04.png"
                ]
            ]
        ];
        ?>

        <h1 class="uk-heading-divider" style="color: orange;"><?php echo $vipInfo['title']; ?></h1>

        <p><?php echo $vipInfo['description']; ?></p>

        <h2 style="color: orange;">Características principales del Crossfaction</h2>
        <ul>
            <?php foreach ($vipInfo['features'] as $feature): ?>
                <li><strong><?php echo $feature['title']; ?>:</strong> <?php echo $feature['description']; ?></li>
            <?php endforeach; ?>
        </ul>

        <h2 style="color: orange;">Arte Conceptual</h2>
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
