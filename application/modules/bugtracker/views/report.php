<?php
if (isset($_POST['changePriory'])):
  $value = $_POST['prioryValue'];
  $this->bugtracker_model->changePriority($idlink, $value);
endif;

if (isset($_POST['changeStatus'])):
  $value = $_POST['StatusValue'];
  $this->bugtracker_model->changeStatus($idlink, $value);
endif;

if (isset($_POST['changetypes'])):
  $value = $_POST['typesValue'];
  $this->bugtracker_model->changeType($idlink, $value);
endif;

if (isset($_POST['btn_closeBugtracker'])):
  $this->bugtracker_model->closeIssue($idlink);
endif; 

if (isset($_POST['sendComment'])):
  $value = $_POST['bugtracker_reply'];
  $this->bugtracker_model->sendReplied($idlink, $value);
endif; 
?>

    <section class="uk-section uk-section-xsmall uk-padding-remove slider-section">
    </section>
    <section class="uk-section uk-section-xsmall main-section" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-medium uk-flex uk-flex-center uk-flex-middle" data-uk-grid>
          <div class="uk-width-1-4@m">
          </div>
		  <h4 class="uk-h4 uk-text-uppercase uk-text-bold uk-text-center"></h4> <!-- Centrado del título -->
          <div class="uk-width-3-4@m">
            <div class="uk-card uk-card-default uk-margin-small">
              <div class="uk-card-header">
                <div class="uk-grid uk-grid-small" data-uk-grid>
                  <div class="uk-width-expand@s">
                    <h5 class="uk-h5 uk-text-bold"><i class="fas fa-bug"></i> <?= $this->bugtracker_model->getTitleIssue($idlink); ?></h5>
                  </div>
                  <div class="uk-width-auto@s">
                    <p class="uk-text-small"><i class="far fa-clock"></i> <?= date('F j, Y, h:i a', $this->bugtracker_model->getDate($idlink)); ?></p>
                  </div>
                </div>
              </div>
              <div class="uk-card-body">
                <div class="uk-grid uk-grid-small" data-uk-grid>
                  <div class="uk-width-3-4@s">
                    <?= $this->bugtracker_model->getDescIssue($idlink); ?>
                  </div>
                  <div class="uk-width-1-4@s">
                    <ul class="uk-list uk-text-small">
                      <li><i class="far fa-user-circle"></i> <?= $this->lang->line('table_header_author'); ?>: <?= $this->wowauth->getUsernameID($this->bugtracker_model->getAuthor($idlink)); ?></li>
                      <li><i class="fas fa-list"></i> <?= $this->lang->line('placeholder_type'); ?>: <span class="uk-label"><?= $this->bugtracker_model->getType($this->bugtracker_model->getTypeID($idlink)); ?></span></li>
                      <li><i class="fas fa-exclamation-circle"></i> <?= $this->lang->line('table_header_priority'); ?>: <span class="uk-label uk-label-danger"><?= $this->bugtracker_model->getPriority($this->bugtracker_model->getPriorityID($idlink)); ?></span></li>
                      <li><i class="fas fa-tags"></i> <?= $this->lang->line('table_header_status'); ?>: <span class="uk-label uk-label-success"><?= $this->bugtracker_model->getStatus($this->bugtracker_model->getStatusID($idlink)); ?></span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <?php if($this->bugtracker_model->getBugtrackerRows($idlink)): ?>
            <hr>
            <div class="uk-card uk-card-default uk-margin-small">
              <div class="uk-card-header">
                <div class="uk-grid uk-grid-small" data-uk-grid>
                  <div class="uk-width-expand@s">
                    <h5 class="uk-h5 uk-text-bold"><i class="fas fa-bug"></i> <?= $this->lang->line('bugtracker_answered'); ?> <?= $this->wowauth->getUsernameID($this->bugtracker_model->getBugtrackerReplied($idlink, 'author')); ?></h5>
                  </div>
                </div>
              </div>
              <div class="uk-card-body">
                <div class="uk-grid uk-grid-small" data-uk-grid>
                  <div>
                    <?= $this->bugtracker_model->getBugtrackerReplied($idlink, 'description'); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <hr>
            <div>
                <form method="post" action="">
                  <div class="uk-margin uk-light">
                    <label class="uk-form-label"><?= $this->lang->line('bugtracker_replied'); ?></label>
                    <div class="uk-form-controls">
                      <div class="uk-width-1-1">
                        <textarea class="uk-textarea tinyeditor" rows="12" name="bugtracker_reply"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="uk-margin-small">
                    <button class="uk-button uk-button-default uk-width-1-1" type="submit" name="sendComment"><i class="fas fa-sync-alt"></i> <?= $this->lang->line('button_save_changes'); ?></button>
                  </div>
                </form>
              </div>
            <hr>
            <?php if($this->wowauth->getRank($this->session->userdata('wow_sess_id')) > 0): ?>
            <div class="uk-grid uk-grid-small uk-grid-divider uk-child-width-1-1 uk-child-width-1-3@m uk-margin-small" data-uk-grid>
              <div>
                <form method="post" action="">
                  <div class="uk-margin uk-light">
                    <div class="uk-form-controls">
                      <select class="uk-select uk-width-1-1" id="form-stacked-select" name="prioryValue">
                        <?php foreach($this->bugtracker_model->getPriorityGeneral()->result() as $priory): ?>
                        <option value="<?= $priory->id ?>"><?= $priory->title ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="uk-margin-small">
                    <button class="uk-button uk-button-default uk-width-1-1" type="submit" name="changePriory"><i class="fas fa-sync-alt"></i> <?= $this->lang->line('button_save_changes'); ?></button>
                  </div>
                </form>
              </div>
              <div>
                <form method="post" action="">
                  <div class="uk-margin uk-light">
                    <div class="uk-form-controls">
                      <select class="uk-select uk-width-1-1" id="form-stacked-select" name="StatusValue">
                        <?php foreach($this->bugtracker_model->getStatusGeneral()->result() as $priory): ?>
                        <option value="<?= $priory->id ?>"><?= $priory->title ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="uk-margin-small">
                    <button class="uk-button uk-button-default uk-width-1-1" type="submit" name="changeStatus"><i class="fas fa-sync-alt"></i> <?= $this->lang->line('button_save_changes'); ?></button>
                  </div>
                </form>
              </div>
              <div>
                <form method="post" action="">
                  <div class="uk-margin uk-light">
                    <div class="uk-form-controls">
                      <select class="uk-select uk-width-1-1" id="form-stacked-select" name="typesValue">
                        <?php foreach($this->bugtracker_model->getTypesGeneral()->result() as $priory): ?>
                        <option value="<?= $priory->id ?>"><?= $priory->title ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="uk-margin-small">
                    <button class="uk-button uk-button-default uk-width-1-1" type="submit" name="changetypes"><i class="fas fa-sync-alt"></i> <?= $this->lang->line('button_save_changes'); ?></button>
                  </div>
                </form>
              </div>
            </div>
            <div>
              <div class="uk-margin-small">
                <form method="post" action="">
                  <button type="submit" name="btn_closeBugtracker" class="uk-button uk-button-danger uk-width-1-1"><i class="fas fa-times-circle"></i> <?= $this->lang->line('button_close'); ?></button>
                </form>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <?= $tiny ?>