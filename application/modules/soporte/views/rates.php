<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
    <div class="uk-container uk-card uk-card-body uk-card-default">
        <?php
        $xpInfo = [
            "title" => "Sistema de Experiancia Personalizada",
            "description" => "El sistema Experiancia Personalizada para World of Warcraft es una funcionalidad diseñada para mejorar o variar la velocidad de XP con la cual realizara su trayectoria desde nivel 1 a 80.",
            "features" => [
                [
                    "title" => ".xp",
                    "description" => "Comando con el cual te abrira las multiples funciones.",
                ],
                [
                    "title" => ".xp set (1-5)",
                    "description" => "Comando con el cual elejira el multiplicador de experiencia (ejemplo: .xp set 5, tendra el multiplicador x10).",
                ],
                [
                    "title" => ".xp enable o .xp disable",
                    "description" => "Comando se utiliza para habilitar o desabilitar el multiplicador de experiencia.",
                ],
                [
                    "title" => ".xp view",
                    "description" => "Comando para mostrar tu información de  experiencia actual.",
                ],
                [
                    "title" => ".xp default",
                    "description" => "Comando para restablecer el multiplicador de experiencia al que esta preestablecido por el servidor.",
                ]
            ],
            "benefits" => [
                [
                    "title" => ".xp",
                    "description" => "",
                    "image" => "/application/themes/default/assets/images/xp/xp.jpg"
                ],
                [
                    "title" => ".xp set (1-10)",
                    "description" => "",
                    "image" => "/application/themes/default/assets/images/xp/xp1.jpg"
                ]
            ]
        ];
        ?>

        <h1 class="uk-heading-divider" style="color: orange;"><?php echo $xpInfo['title']; ?></h1>

        <p><?php echo $xpInfo['description']; ?></p>

        <h2 style="color: orange;">Uso de los rates personalizados</h2>
        <ul>
            <?php foreach ($xpInfo['features'] as $feature): ?>
                <li><strong><?php echo $feature['title']; ?>:</strong> <?php echo $feature['description']; ?></li>
            <?php endforeach; ?>
        </ul>

        <h2 style="color: orange;">Beneficios Exclusivos</h2>
        <div class="uk-child-width-1-2@s uk-grid-match" data-uk-grid>
            <?php foreach ($xpInfo['benefits'] as $benefit): ?>
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
