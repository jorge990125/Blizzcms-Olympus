<section class="uk-section uk-section-xsmall uk-padding-remove slider-section">
</section>
<section class="uk-section uk-section-xsmall main-section" data-uk-height-viewport="expand: true">
  <div class="uk-container">
    <h4 class="uk-h4 uk-text-uppercase uk-text-bold"><i class="fas fa-user-friends"></i> <?= $pagetitle; ?></h4>
	<h4 class="uk-h4 uk-text-uppercase uk-text-bold"><p>Informacion</h4>
            <li><strong>Para reclutar a un amigo, simplemente agregue su ID de cuenta en el formulario y reclutelo. Lo mismo ocurre con la contratacion.</li>
            <li>Recuerda, para que los cambios surtan efecto, ambos deben cerrar el juego por completo y volver a iniciar sesion. </li>
            <li>Reclutar un amigo obtendra los beneficios de aumento de experiencia mientras esten en grupo,invocar a tu amigo, 1 vez cada 60 minutos y otorgarle 1 nivel, por cada nivel obtenido, hasta el nivel 80.</li>
            <li>Tendra una duracion de 90 dias, y obtendra recompenzas al cabo de 30 dias.</li>
			<li>Recompenzas: Monturas Cohete de Paseo X-53</li>
    <div class="uk-alert-primary" uk-alert>
      <p>Su ID de cuenta es: <?= $id ?></p>
    </div>
    <div class="uk-alert-success" uk-alert>
      <p>Su cuenta ha reclutado el id: <?= $recruiter; ?></p>
    </div>
    <?= form_open('', 'id="recruitForm" onsubmit="recruitForm(event)"'); ?>
    <div class="uk-form-controls">
      <div class="uk-inline uk-width-1-1">
        <input class="uk-input" type="number" id="recruit_id" placeholder="ID of the account you want to recruit" required>
        <input type="hidden" class="uk-input" id="account_id" value="<?= $id ?>">
      </div>
    </div>
    <div class="uk-width-1-2@m"></div>
    <div class="uk-margin">
      <div class="uk-form-controls">
        <div class="uk-width-1-4@m">
          <button class="uk-button uk-button-default uk-width-1-1" type="submit"><i class="fas fa-user-plus"></i> Recruit a friend</button>
        </div>
      </div>
    </div>
    <?= form_close(); ?>
  </div>
</section>
<script>
  if (Number('<?= $recruiter; ?>') > 0) {
    $.amaran({
      'theme': 'awesome error',
      'content': {
        title: '<?= $this->lang->line('notification_title_error'); ?>',
        message: "<?= $this->lang->line('notification_already_recruited'); ?>",
        info: '',
        icon: 'fas fa-times-circle'
      },
      'delay': 5000,
      'position': 'top right',
      'inEffect': 'slideRight',
      'outEffect': 'slideRight'
    })
    document.getElementById("recruitForm").style.display = "none";
  }

  function recruitForm(e) {
    e.preventDefault();

    var recruit = $('#recruit_id').val();
    var account = $('#account_id').val();

    if (recruit == '') {
      $.amaran({
        'theme': 'awesome warning',
        'content': {
          title: '<?= $this->lang->line('notification_title_warning'); ?>',
          message: "<?= $this->lang->line('notification_id_not_empty'); ?>",
          info: '',
          icon: 'fas fa-times-circle'
        },
        'delay': 5000,
        'position': 'top right',
        'inEffect': 'slideRight',
        'outEffect': 'slideRight'
      })
      return false;
    }

    if (recruit == account) {
      $.amaran({
        'theme': 'awesome warning',
        'content': {
          title: '<?= $this->lang->line('notification_title_warning'); ?>',
          message: "<?= $this->lang->line('notification_not_yourself'); ?>",
          info: '',
          icon: 'fas fa-times-circle'
        },
        'delay': 5000,
        'position': 'top right',
        'inEffect': 'slideRight',
        'outEffect': 'slideRight'
      })
      return false;
    }

    $.ajax({
      url: "<?= base_url($lang . '/recruit/add'); ?>",
      method: "POST",
      data: {
        recruit,
        account
      },
      dataType: "text",

      beforeSend: function() {
        $.amaran({
          'theme': 'awesome info',
          'content': {
            title: '<?= $this->lang->line('notification_title_info'); ?>',
            message: "<?= $this->lang->line('notification_checking'); ?>",
            info: '',
            icon: 'fas fa-sing-in-alt'
          },
          'delay': 5000,
          'position': 'top right',
          'inEffect': 'slideRight',
          'outEffect': 'slideRight'
        })
      },

      success: function(response) {
        if (!response) {
          alert(response);
        }

        if (response == 'accountIDNotFound') {
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= $this->lang->line('notification_title_error'); ?>',
              message: "<?= $this->lang->line('notification_decline_order'); ?>",
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 5000,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          })
          $('#recruitForm')[0].reset();
          return false;
        }

        if (response == 'alreadyRecruited') {
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= $this->lang->line('notification_title_error'); ?>',
              message: "<?= $this->lang->line('notification_already_recruited'); ?>",
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 5000,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          })
          document.getElementById("recruitForm").style.display = "none";
          return false;
        }

        if (response == 'accountIDFound') {
          $.amaran({
            'theme': 'awesome ok',
            'content': {
              title: '<?= $this->lang->line('notification_title_success'); ?>',
              message: "<?= $this->lang->line('notification_accepted_order'); ?>",
              info: '',
              icon: 'fas fa-check-circle'
            },
            'delay': 5000,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          });
          $('#recruitForm')[0].reset();
          location.reload();
        }
      }
    });
  }
</script>