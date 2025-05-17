<section class="uk-section uk-section-small uk-flex uk-flex-center" data-uk-height-viewport="expand: true">
    <div class="flex-container">
        <!-- Tarjeta VIP -->
        <a href="<?= base_url('/vip'); ?>" class="vip-card">
            <div class="vip-image" style="background-image: url('<?= base_url('assets/images/vip_banner.jpg'); ?>');"></div>
            <div class="vip-content">
                <h3 class="vip-title">Suscripción VIP</h3>
                <p class="vip-price">Precio: <strong>30 PD</strong></p>
            </div>
        </a>

        <!-- Tarjeta Premium -->
        <a href="<?= base_url('/premiun'); ?>" class="premiun-card">
            <div class="premiun-image" style="background-image: url('<?= base_url('assets/images/vip_banner.jpg'); ?>');"></div>
            <div class="premiun-content">
                <h3 class="premiun-title">Suscripción Premiun</h3>
                <p class="premiun-price">Precio: <strong>20 PD</strong></p>
            </div>
        </a>
    </div>
</section>

<!-- Sección Informativa sobre la Suscripción premiun -->
<section class="uk-section uk-section-small">
    <div class="uk-container uk-text-center" style="max-width: 500px; margin: auto;">
        <h3 class="uk-text-center">Suscripciones Disponibles</h3>
        <ul class="uk-list uk-list-bullet uk-text-left uk-margin-auto" style="max-width: 350px;">
            <li>Los jugadores podran comprar las sucripciones disponibles.</li>
            <li>Cada suscripción tiene caracterisiticas únicas.</li>
			<li>Las suscripciones tienen un plazo de duración de 30 dias.</li>
        </ul>
    </div>
</section>

<style>
    .flex-container {
        display: flex;
        justify-content: center; /* Centra las tarjetas */
        gap: 60px; /* Espacio entre tarjetas */
        max-width: 1200px; /* Control del ancho total */
        margin: 0 auto;
    }

    .vip-card, .premiun-card {
        max-width: 520px; /* Reducir el tamaño máximo */
        min-width: 250px;
        background: #1a1a1a;
        border-radius: 10px;
        overflow: hidden;
        text-align: center;
        display: flex;
        flex-direction: column;
        text-decoration: none; /* Elimina el subrayado del enlace */
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .vip-card:hover, .premiun-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2);
    }

    .vip-image, .premiun-image {
        width: 100%;
        height: 220px; /* Reducida para evitar que sea muy larga */
        background-size: cover;
        background-position: center;
    }

    .vip-content, .premiun-content {
        padding: 10px;
    }

    .vip-title, .premiun-title {
        font-size: 16px;
        color: #fff;
        margin-bottom: 5px;
    }

    .vip-price, .premiun-price {
        font-size: 14px;
        color: #ead20c;
        margin-bottom: 0; /* Elimina el espacio adicional */
    }
</style>