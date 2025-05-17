<section class="uk-section uk-section-xsmall uk-padding-remove slider-section">
    </section>
    <section class="uk-section uk-section-xsmall main-section" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-medium uk-flex uk-flex-center uk-flex-middle" data-uk-grid>
          <div class="uk-width-1-4@m">
          </div>		  
        <h4 class="uk-h4 uk-text-uppercase uk-text-bold uk-text-center"></h4> <!-- Centrado del título -->
          <div class="uk-width-3-4@m">
            <h4 class="uk-h4 uk-text-uppercase uk-text-bold uk-text-center"><?= $this->lang->line('tab_changelogs'); ?></h4>
            <?php if($this->changelogs_model->getAll()->num_rows()): ?>
            <div class="uk-grid uk-grid-small uk-child-width-1-1" data-uk-grid>
              <?php foreach($this->changelogs_model->getChangelogs()->result() as $changelogsList): ?>
              <div>
                <div class="uk-card uk-card-default uk-margin-small">
                  <div class="uk-card-header">
                    <div class="uk-grid uk-grid-small" data-uk-grid>
                      <div class="uk-width-expand@s">
                        <h5 class="uk-h5 uk-text-bold"><i class="fas fa-file-alt"></i> <?= $changelogsList->title ?></h5>
                      </div>
                      <div class="uk-width-auto@s">
                        <p class="uk-text-small"><i class="far fa-clock"></i> <?= date('F j, Y, h:i a', $changelogsList->date); ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="uk-card-body">
                    <?= $changelogsList->description ?>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="uk-alert-warning" uk-alert>
              <p class="uk-text-center"><i class="fas fa-exclamation-triangle"></i> <?= $this->lang->line('alert_changelog_not_found'); ?></p>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
