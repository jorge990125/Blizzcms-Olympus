<section class="uk-section uk-section-small main-section" data-uk-height-viewport="expand: true">
  <div class="uk-container">
<div class="uk-grid uk-grid-large uk-flex-center" data-uk-grid>
  <div class="uk-width-1-3@m uk-text-center">
    <div class="uk-card uk-card-secondary uk-padding uk-border-rounded">
      <?php if ($this->wowgeneral->getUserInfoGeneral($this->session->userdata('wow_sess_id'))->num_rows()): ?>
        <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/' . $this->wowauth->getNameAvatar($this->wowauth->getImageProfile($this->session->userdata('wow_sess_id')))); ?>" width="120" height="120" alt="Avatar" style="border: 3px solid #fff;">
      <?php else: ?>
        <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/default.png'); ?>" width="120" height="120" alt="Avatar" style="border: 4px solid #fff;">
      <?php endif; ?>
      <div class="uk-text-bold uk-margin-small-top uk-h4">
        <?= $this->session->userdata('blizz_sess_username'); ?>
      </div>
	  </div>
      <div class="uk-margin-top uk-flex uk-flex-inline">
        <a href="<?= base_url('download'); ?>" class="uk-button uk-button-danger uk-button-small uk-border-rounded"><i class="fas fa-download"></i> <?=$this->lang->line('tab_download'); ?></a>
        <a href="<?= base_url('subcription'); ?>" class="uk-button uk-button-danger uk-button-small uk-border-rounded"><i class="fa fa-star"></i> <?=$this->lang->line('tab_subcription'); ?></a>
        <a href="<?= base_url('donate'); ?>" class="uk-button uk-button-danger uk-button-small uk-border-rounded"><i class="far fa-credit-card"></i> <?=$this->lang->line('navbar_donate_panel'); ?></a>
      </div>
    </div> 
    
      <!-- Detalles de la cuenta como la lista de personajes -->
      <div class="uk-width-2-3@m">
	  <div class="uk-card uk-card-secondary uk-padding uk-border-rounded">
        <div class="uk-margin-top uk-border-rounded">
          <div class="uk-card-header">
            <h5 class="uk-h5 uk-text-uppercase uk-text-bold">
              <i class="fas fa-info-circle"></i> <?= $this->lang->line('panel_account_details'); ?>
            </h5>
            <a href="<?= base_url('settings'); ?>" class="uk-button uk-button-danger uk-button-small">
              <i class="fas fa-user-edit"></i> <?= $this->lang->line('button_account_settings'); ?>
            </a>
          </div>
          <div class="uk-card-body">
            <div class="uk-overflow-auto uk-width-1-1 uk-margin-small">
              <table class="uk-table uk-table-divider uk-table-small">
                <thead>
                  <tr>
                    <th><i class="far fa-user-circle"></i> Rango</th>
                    <th><i class="fas fa-users"></i> Usuario</th>
                    <th><i class="far fa-clock"></i> Miembro</th>
                    <th><i class="far fas fa-gamepad"></i> Expansion</th>
                    <th><i class="far fa-credit-card"></i> PD</th>
                    <th><i class="fas fa-vote-yea"></i> VP</th>
                  </tr>
				  </div>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <span class="uk-button uk-button-default uk-button-small"-<?= $this->wowauth->getRank($this->session->userdata('mod_access_level')) ? 'danger' : 'default'; ?>">
                        <?= $this->wowauth->getRank($this->session->userdata('mod_access_level')) ? 'Staff' : 'Player'; ?>
                      </span>
                    </td>
                    <td><span class="uk-button uk-button-default uk-button-small"><?= $this->wowauth->getUsernameID($this->session->userdata('wow_sess_id')); ?></span></td>
                    <td><span class="uk-button uk-label-warning uk-button-small"><?= $this->wowauth->getJoinDateID($this->session->userdata('wow_sess_id')); ?></span></td>
                    <td><span class="uk-button uk-label-warning uk-button-small"><?= $this->wowgeneral->getExpansionName(); ?></span></td>
                    <td><span class="uk-button uk-button-danger uk-button-small"><?= $this->wowgeneral->getCharDPTotal($this->session->userdata('wow_sess_id')); ?></span></td>
                    <td><span class="uk-button uk-button-danger uk-button-small"><?= $this->wowgeneral->getCharVPTotal($this->session->userdata('wow_sess_id')); ?></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
	  </div>
      
      <!-- Lista de personajes sigue igual -->
<div class="uk-width-1-1@m">
  <div class="uk-card uk-card-secondary uk-card-hover uk-margin-top uk-border-rounded">
    <div class="uk-card-header">
      <h5 class="uk-h5 uk-text-uppercase uk-text-bold">
        <i class="fas fa-users"></i> Lista de Personajes
      </h5>
    </div>
    <div class="uk-card-body">
      <div class="uk-grid uk-child-width-1-1 uk-margin-small" data-uk-grid>
        <?php foreach ($this->wowrealm->getRealms()->result() as $charsMultiRealm):
          $multiRealm = $this->wowrealm->realmConnection($charsMultiRealm->username, $charsMultiRealm->password, $charsMultiRealm->hostname, $charsMultiRealm->char_database);
        ?>
        <div>
          <h5 class="uk-h5 uk-text-bold"><i class="fas fa-server"></i> <?= $this->wowrealm->getRealmName($charsMultiRealm->realmID); ?></h5>
          <div class="uk-overflow-auto uk-width-1-1 uk-margin-small">
            <table class="uk-table uk-table-divider uk-table-small">
              <thead>
                <tr>
                  <th class="uk-table-expand"><i class="fas fa-user"></i> <?= $this->lang->line('table_header_name'); ?></th>
                  <th class="uk-table-expand"><i class="fas fa-info-circle"></i> <?= $this->lang->line('table_header_race'); ?>/<?= $this->lang->line('table_header_class'); ?></th>
                  <th class="uk-width-small"><i class="fas fa-level-up-alt"></i> <?= $this->lang->line('table_header_level'); ?></th>
                  <th class="uk-table-expand"><i class="fas fa-clock"></i> <?= $this->lang->line('table_header_time_played'); ?></th>
                  <th class="uk-table-expand"><i class="fas fa-coins"></i> <?= $this->lang->line('table_header_money'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($this->wowrealm->getGeneralCharactersSpecifyAcc($multiRealm , $this->session->userdata('wow_sess_id'))->result() as $chars): ?>
                <tr>
                  <td><?= $chars->name ?></td>
                  <td>
                    <img class="uk-border-rounded" src="<?= base_url('assets/images/races/'.$this->wowgeneral->getRaceIcon($chars->race)); ?>" width="20" height="20" title="<?= $this->wowgeneral->getRaceName($chars->race); ?>" alt="">
                    <img class="uk-border-rounded" src="<?= base_url('assets/images/class/'.$this->wowgeneral->getClassIcon($chars->class)); ?>" width="20" height="20" title="<?= $this->wowgeneral->getClassName($chars->class); ?>" alt="">
                  </td>
                  <td><?= $chars->level ?></td>
                  <td><?= $this->wowgeneral->timeConversor($chars->totaltime); ?></td>
                  <td><?= $this->wowgeneral->moneyConversor($chars->money)['gold']; ?>g <?= $this->wowgeneral->moneyConversor($chars->money)['silver']; ?>s <?= $this->wowgeneral->moneyConversor($chars->money)['copper']; ?>c</td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
</section>
