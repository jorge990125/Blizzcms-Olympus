<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gift extends MX_Controller {

    public function __construct()
    {
        parent::__construct();

        // Verifica si el usuario está logeado
        if (!$this->wowauth->isLogged()) {
            redirect(base_url('login'), 'refresh');
        }

        // Verifica si el servidor está en mantenimiento
        if (!$this->wowgeneral->getMaintenance()) {
            redirect(base_url('maintenance'), 'refresh');
        }
    }

    public function index()
    {
        // Inicializa variables para mensajes de error y éxito
        $data = array(
            'pagetitle' => 'Canje de Código',
            'error_message' => '',
            'success_message' => ''
        );

        // Verifica si el formulario fue enviado
        if ($this->input->post('code')) {
            $code = $this->input->post('code', TRUE);
            $user_id = $this->session->userdata('wow_sess_id'); // ID del usuario logeado

            // Verifica que el código no esté vacío y que el usuario esté logeado
            if (!$code || !$user_id) {
                $data['error_message'] = 'Código o usuario no válido.';
            } else {
                // Carga el modelo y realiza el canje del código
                $this->load->model('gift_model');
                $success = $this->gift_model->redeem_code($code, $user_id);

                if ($success) {
                    // Si el canje es exitoso
                    $data['success_message'] = 'Código canjeado con éxito.';
                } else {
                    // Si hubo un error (código inválido o ya canjeado)
                    $data['error_message'] = 'Código inválido o ya canjeado.';
                }
            }
        }

        // Carga la vista con los mensajes
        $this->template->build('index', $data);
    }
}
