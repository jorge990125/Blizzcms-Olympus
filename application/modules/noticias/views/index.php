<section class="uk-section uk-section-small" data-uk-height-viewport="expand: true" style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">
  <div class="uk-container">
    <div class="uk-grid uk-grid-medium uk-margin-small uk-flex-left" data-uk-grid>
      <h4 class="uk-h3 uk-text-bold uk-text-center">
        <i class="fas fa-newspaper fa-sm"></i> <?= $this->lang->line('tab_news'); ?>
      </h4>
    </div>
    <div class="uk-card-body">
      <ul class="uk-list uk-list-divider uk-text-small">
        <?php foreach($this->news_model->getExtendedNewsList()->result() as $list): ?>
        <li style="text-align:left;">
          <a href="<?= base_url('news/'.$list->id) ?>" style="font-size:16px; text-decoration: none;">
            <img src="<?= base_url('assets/images/news/'.$list->image) ?>" alt="<?= $list->title ?>" style="width:600px; height:350px; margin-bottom:10px; display:block;">
            <div style="text-align: center; font-size:18px;">
              <i class="far fa-newspaper"></i> <?= $list->title ?>
            </div>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>
