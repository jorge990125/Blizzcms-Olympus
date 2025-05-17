<section class="uk-section uk-section-small uk-flex uk-flex-center" data-uk-height-viewport="expand: true">
    <div class="premiun-card">
        <div class="premiun-image" style="background-image: url('<?= base_url('assets/images/vip_banner.jpg'); ?>');"></div>

        <div class="premiun-content">
            <h3 class="premiun-title">Suscripción Premiun</h3>
            <p class="premiun-price">Precio: <strong>20 PD</strong></p>

            <?php if (!empty($message)) { echo "<div class='premiun-message'>$message</div>"; } ?>

            <?php if ($is_premiun): ?>
                <p class="premiun-status"><strong>Tiempo restante: <?php echo $remaining_time; ?></strong></p>
                <?php if ($remaining_time == "Tu Premiun ha expirado.") { ?>
                    <form method="POST">
                        <input type="hidden" name="renew_premiun" value="1">
                        <button class="premiun-button" type="submit">Renovar Premiun</button>
                    </form>
                <?php } ?>
            <?php else: ?>
                <form method="POST">
                    <input type="hidden" name="buy_premiun" value="1">
                    <button class="premiun-button" type="submit">Comprar Premiun</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
    .premiun-card {
        flex: 1 1 calc(20% - 20px); /* Ajusta el tamaño */
        max-width: 300px;
        min-width: 250px;
        background: #1a1a1a;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
        text-align: center;
        padding-bottom: 15px;
    }

    .premiun-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
    }

    .premiun-image {
        width: 100%;
        height: 180px;
        background-size: cover;
        background-position: center;
    }

    .premiun-content {
        padding: 15px;
    }

    .premiun-title {
        color: #fff;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .premiun-price {
        color: #ead20c;
        font-size: 16px;
    }

    .premiun-status {
        color: #4CAF50;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .premiun-message {
        color: #f44336;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .premiun-button {
        background-color: #ffcc00;
        color: #000;
        border: none;
        padding: 10px 15px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .premiun-button:hover {
        background-color: #e6b800;
    }
</style>



<!-- Sección Informativa sobre la Suscripción premiun -->
<section class="uk-section uk-section-small">
    <div class="uk-container uk-text-center" style="max-width: 500px; margin: auto;">
        <h3 class="uk-text-center">Beneficios de la Suscripción premiun</h3>
        <ul class="uk-list uk-list-bullet uk-text-left uk-margin-auto" style="max-width: 350px;">
            <li>Acceso a zonas exclusivas dentro del juego.</li>
            <li>Bonificaciones en experiencia y recompensas.</li>
            <li>Descuentos especiales en la tienda del juego.</li>
            <li>Soporte prioritario para asistencia en el juego.</li>
            <li>Habilidad para obtener monturas y objetos exclusivos.</li>
        </ul>
    </div>
</section>
