<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
    <div class="uk-container uk-card uk-card-body uk-card-default">
        <?php
        $vipInfo = [
            "title" => "Tienda Ingame",
            "description" => "La Tienda del Ingame , también conocida como Tienda , es una extensión de la Tienda Battle.net y se utiliza para comprar artículos y servicios. La tienda inicialmente solo se usó en las regiones asiáticas al principio, pero se envió a todo el mundo en el parche 5.4.2 . En nuestro servidor podra acceder mediante los ajustes del juego.",
            "features" => [
                [
                    "title" => "Compra de objectos",
                    "description" => "Aqui podra comprar objetos designados por la administración mediante oro u alguna otra moneda que se designe como los Token",
                ]
            ],
            "benefits" => [
                [
                    "title" => "Acceso a la tienda",
                    "description" => "Se podra mostrar la tienda presionando la tecla ESC o presionando el menu de opciones en la barra de hechisos",
                    "image" => "/application/themes/default/assets/images/tienda/menu.png"
                ],
                [
                    "title" => "Tienda",
                    "description" => "Vista previa de como se visualizara.",
                    "image" => "/application/themes/default/assets/images/tienda/Preview.png"
                ]
            ]
        ];
        ?>

        <h1 class="uk-heading-divider" style="color: orange;"><?php echo $vipInfo['title']; ?></h1>

        <p><?php echo $vipInfo['description']; ?></p>

        <h2 style="color: orange;">Funciones</h2>
        <ul>
            <?php foreach ($vipInfo['features'] as $feature): ?>
                <li><strong><?php echo $feature['title']; ?>:</strong> <?php echo $feature['description']; ?></li>
            <?php endforeach; ?>
        </ul>

        <h2 style="color: orange;">Ilustración</h2>
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
