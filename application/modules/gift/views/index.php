<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
    <div class="uk-container uk-card uk-card-body uk-card-default">
        <h2>Canjea tu código</h2>
        <form method="POST" action="<?= base_url('gift') ?>">
            <div class="uk-margin">
                <label for="code">Código de Canje:</label>
                <input class="uk-input" type="text" name="code" id="code" required>
            </div>
            <button class="uk-button uk-button-primary" type="submit">Canjear</button>
        </form>

        <?php if (!empty($success_message)): ?>
            <div class="uk-alert-success" uk-alert>
                <p><?= $success_message ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($error_message)): ?>
            <div class="uk-alert-danger" uk-alert>
                <p><?= $error_message ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>
