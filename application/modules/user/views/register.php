<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-container">
       <div class="uk-grid uk-grid-medium" data-uk-grid>
       <div class="uk-width-1-6@s uk-width-1-3@m"></div>
       <div class="uk-width-2-3@s uk-width-1-3@m">
        <div class="uk-text-center uk-margin-large-top">
        <h4 class="uk-h3 uk-text-uppercase uk-text-bold uk-margin-small-bottom">
            <span><i class="fas fa-user-plus"></i> <?= lang('button_register'); ?></span>
          </h4>
        <?php echo validation_errors('<div class="uk-alert-danger" uk-alert><a class="uk-alert-close" uk-close></a><p><i class="far fa-times-circle"></i> ', '</p></div>'); ?>
        <?php if(isset($msg_notification_account_already_exist)): ?>
          <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><i class="far fa-times-circle"></i> <?= $msg_notification_account_already_exist; ?></p>
          </div>
        <?php endif; ?>
        <?php if(isset($msg_notification_used_email)): ?>
          <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><i class="far fa-times-circle"></i> <?= $msg_notification_used_email; ?></p>
          </div>
        <?php endif; ?>
        <?php if(isset($msg_notification_fail_google)): ?>
          <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><i class="far fa-times-circle"></i> <?= $msg_notification_fail_google; ?></p>
          </div>
        <?php endif; ?>
        <?php if(isset($msg_notification_activation_code)): ?>
          <div class="uk-alert-success " uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><i class="far fa-times-circle"></i> <?= $msg_notification_activation_code; ?></p>
          </div>
        <?php endif; ?>
        <?= form_open(current_url()); ?>
        <div class="uk-margin uk-light">
          <label class="uk-form-label"><?= lang('label_login_info'); ?></label>
          <div class="uk-form-controls">
            <div class="uk-inline uk-width-1-1">
              <span class="uk-form-icon"><i class="fas fa-user fa-lg"></i></span>
              <input class="uk-input" type="text" name="username" id="register_username" pattern=".{3,}" title="3 characters minimum" placeholder="<?= lang('placeholder_username'); ?>" required>
            </div>
          </div>
        </div>
        <div class="uk-margin uk-light">
          <div class="uk-form-controls">
            <div class="uk-inline uk-width-1-1">
              <span class="uk-form-icon"><i class="fas fa-envelope fa-lg"></i></span>
              <input class="uk-input" type="email" name="email" id="register_email" placeholder="<?= lang('placeholder_email'); ?>" required>
            </div>
          </div>
        </div>
        <div class="uk-margin uk-light">
          <div class="uk-form-controls">
            <div class="uk-inline uk-width-1-1">
              <span class="uk-form-icon"><i class="fas fa-unlock-alt fa-lg"></i></span>
              <input class="uk-input" type="password" name="password" id="register_password" pattern=".{5,16}" title="5 characters minimum and maximum 16" placeholder="<?= lang('placeholder_password'); ?>" required>
            </div>
          </div>
        </div>
        <div class="uk-margin uk-light">
          <div class="uk-form-controls">
            <div class="uk-inline uk-width-1-1">
              <span class="uk-form-icon"><i class="fas fa-lock fa-lg"></i></span>
              <input class="uk-input" type="password" name="confirm_password" id="register_repassword" pattern=".{5,16}" title="5 characters minimum and maximum 16" placeholder="<?= lang('placeholder_re_password'); ?>" required>
            </div>
          </div>
        </div>
		<div class="uk-margin uk-light">
			<label style="color: yellow;"><input class="uk-checkbox" type="checkbox" name="terms" required> Acepto los <a href="/terms" target="_blank" style="color: yellow;">T&eacute;rminos y Condiciones</a></label>
          </div>

          <div class="uk-grid uk-grid-small uk-grid-margin-small" data-uk-grid>
            <div class="uk-width-1-4@m">
              <div class="uk-margin-small">
                <div class="g-recaptcha" data-sitekey="<?= $recapKey; ?>"></div>
              </div>
            </div>
            <div class="uk-width-1-2@m"></div>
            <div class="uk-width-1@m">
              <button class="uk-button uk-button-default uk-width-1-1" id="button_register" type="submit"><i class="fas fa-user-plus"></i> <?= lang('button_register'); ?></button>
            </div>
          </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const termsCheckbox = document.querySelector("input[name='terms']");
    const registerButton = document.getElementById("button_register");
    termsCheckbox.addEventListener("change", function() {
      registerButton.disabled = !this.checked;
    });
  });
</script>