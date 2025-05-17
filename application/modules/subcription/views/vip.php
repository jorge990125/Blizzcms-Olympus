<section class="uk-section uk-section-small uk-flex uk-flex-center" data-uk-height-viewport="expand: true">
    <div class="vip-card">
        <div class="vip-image" style="background-image: url('<?= base_url('assets/images/vip_banner.jpg'); ?>');"></div>

        <div class="vip-content">
            <h3 class="vip-title">Suscripción VIP</h3>
            <p class="vip-price">Precio: <strong>30 PD</strong></p>

            <?php if (!empty($message)) { echo "<div class='vip-message'>$message</div>"; } ?>

            <?php if ($is_vip): ?>
                <p class="vip-status"><strong>Tiempo restante: <?php echo $remaining_time; ?></strong></p>
                <?php if ($remaining_time == "Tu VIP ha expirado.") { ?>
                    <form method="POST">
                        <input type="hidden" name="renew_vip" value="1">
                        <button class="vip-button" type="submit">Renovar VIP</button>
                    </form>
                <?php } ?>
            <?php else: ?>
                <form method="POST">
                    <input type="hidden" name="buy_vip" value="1">
                    <button class="vip-button" type="submit">Comprar VIP</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Sección Informativa sobre la Suscripción VIP -->
<section class="uk-section uk-section-small">
    <div class="uk-container uk-text-center" style="max-width: 500px; margin: auto;">
        <h3 class="uk-text-center">Beneficios de la Suscripción VIP</h3>
        <ul class="uk-list uk-list-bullet uk-text-left uk-margin-auto" style="max-width: 350px;">
            <li>Bufos.</li>
            <li>Desbloqueo de todas las rutas de vuelo.</li>
            <li>Correo.</li>
            <li>Banco.</li>
            <li>Quitar dolencia.</li>
            <li>Restaurar mana y vida.</li>
            <li>Reparar armadura.</li>
            <li>Montura cuando el jugador muere y se convierte en fantasma.</li>
            <li>Rates de xp,profesiones, oro y honor multiplicado x2.</li>
            <li>Teleport a capitales(requiere ser nivel 80).</li>
        </ul>
    </div>
</section>

<style>
    .vip-card {
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

    .vip-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
    }

    .vip-image {
        width: 100%;
        height: 180px;
        background-size: cover;
        background-position: center;
    }

    .vip-content {
        padding: 15px;
    }

    .vip-title {
        color: #fff;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .vip-price {
        color: #ead20c;
        font-size: 16px;
    }

    .vip-status {
        color: #4CAF50;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .vip-message {
        color: #f44336;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .vip-button {
        background-color: #ffcc00;
        color: #000;
        border: none;
        padding: 10px 15px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .vip-button:hover {
        background-color: #e6b800;
    }
</style>