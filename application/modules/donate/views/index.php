<?php
if (isset($_POST['button_donate'])):
  $this->donate_model->getDonate($_POST['button_donate']);
endif; ?>

    <section class="uk-section uk-section-xsmall uk-padding-remove slider-section">
    </section>
    <section class="uk-section uk-section-xsmall main-section" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-medium" data-uk-grid>
          <div class="uk-width-1-4@m">
          </div>
          <div class="uk-width-2-4@m">
            <h4 class="uk-h4 uk-text-uppercase uk-text-bold"><?=$this->lang->line('tab_donate'); ?></h4>
            <?php if($this->session->flashdata('donation_status') == 'success'): ?>
            <div class="uk-alert-success" uk-alert>
              <a class="uk-alert-close" uk-close></a>
              <p><span class="uk-text-bold"><i class="far fa-check-circle"></i> <span class="uk-text-bold"><?= $this->lang->line('notification_title_success'); ?>:</span> <?= $this->lang->line('notification_donation_successful'); ?></p>
            </div>
            <?php elseif($this->session->flashdata('donation_status') == 'canceled'): ?>
            <div class="uk-alert-warning" uk-alert>
              <a class="uk-alert-close" uk-close></a>
              <p><span class="uk-text-bold"><i class="fas fa-exclamation-circle"></i> <?= $this->lang->line('notification_title_warning'); ?>:</span> <?= $this->lang->line('notification_donation_canceled'); ?></p>
            </div>
            <?php elseif($this->session->flashdata('donation_status') == 'error'): ?>
            <div class="uk-alert-danger" uk-alert>
              <a class="uk-alert-close" uk-close></a>
              <p><span class="uk-text-bold"><i class="far fa-times-circle"></i> <?= $this->lang->line('notification_title_error'); ?>:</span> <?= $this->lang->line('notification_donation_error'); ?></p>
            </div>
            <?php endif; ?>
            <div class="uk-grid-small uk-grid-match uk-child-width-1-1 uk-child-width-1-3@s uk-flex-center" uk-grid>
              <?php foreach($this->donate_model->getDonations()->result() as $donateList): ?>
              <div>
                <div class="uk-transition-toggle" tabindex="0">
                  <div class="uk-card uk-card-body uk-card-donate uk-text-center uk-transition-scale-up uk-transition-opaque">
                    <i class="fab fa-paypal fa-3x"></i>
                    <h2 class="uk-margin-small uk-text-bold"><?= $donateList->name ?><br>
                      <sup><?= $this->config->item('paypal_currency_symbol'); ?></sup><?= $donateList->price ?>
                    </h2>
                    <h5 class="uk-margin-small"><span uk-icon="icon: plus-circle"></span> <?= $this->lang->line('donate_get'); ?> <span class="uk-text-bold"><?= $donateList->points ?></span> <?= $this->lang->line('panel_dp'); ?>
                    </h5>
                    <form action="" method="post" accept-charset="utf-8">
                      <div class="uk-margin">
                        <button class="uk-button uk-button-secondary" type="submit" value="<?= $donateList->id ?>" name="button_donate"><i class="fas fa-donate"></i> <?= $this->lang->line('button_donate'); ?></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
