<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcription extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('subcription_model');

        if (!ini_get('date.timezone')) {
            date_default_timezone_set($this->config->item('timezone'));
        }

        if (!$this->wowgeneral->getMaintenance()) {
            redirect(base_url('maintenance'), 'refresh');
        }
    }

	public function index()
    {
		if (!$this->wowgeneral->getMaintenance())
		{
			redirect(base_url('maintenance'),'refresh');
		}	
		
        $data = array(
            'pagetitle' => $this->lang->line('tab_subcription'),
			);

			$this->template->build('index', $data);
    }
	
    public function vip()
    {
        $user_id = $this->session->userdata('wow_sess_id');
        $message = "";
        $vip_price = 30;
        $remaining_time = "";

        if ($user_id) {
            $donation_points = $this->subcription_model->getDonationPoints($user_id);
            $is_vip = $this->subcription_model->isVip($user_id);
            $subscription_timestamp = $this->subcription_model->getSubscriptionDate($user_id); // Traer el timestamp de expiración

            if ($is_vip && $subscription_timestamp) {
                // Calcular el tiempo restante usando el timestamp
                $current_time = time();
                $time_left = $subscription_timestamp - $current_time;

                if ($time_left > 0) {
                    $days_left = floor($time_left / (60 * 60 * 24)); // Convertir a días
                    $remaining_time = "Tu VIP expira en $days_left días.";
                } else {
                    $remaining_time = "Tu VIP ha expirado.";
                }
            }

            // Si el VIP ha expirado, y el usuario tiene puntos suficientes, permitir la renovación
            if ($this->input->post('renew_vip')) {
                log_message('debug', 'Botón de renovación de VIP presionado para el usuario ID: ' . $user_id);

                if ($donation_points < $vip_price) {
                    $message = "<span class='uk-text-danger'>No tienes suficientes puntos de donación.</span>";
                } else {
                    // Procesar la renovación
                    if ($this->subcription_model->renewVip($user_id, $vip_price)) {
                        $message = "<span class='uk-text-success'>¡Tu VIP ha sido renovado con éxito! Duración: 30 días.</span>";
                        redirect('vip', 'refresh');
                    } else {
                        $message = "<span class='uk-text-danger'>Error al procesar la renovación. Revisa los logs para más detalles.</span>";
                    }
                }
            }

            if ($this->input->post('buy_vip')) {
                log_message('debug', 'Botón de compra VIP presionado para el usuario ID: ' . $user_id);

                if ($is_vip) {
                    $message = "<span class='uk-text-warning'>Ya eres VIP.</span>";
                } elseif ($donation_points < $vip_price) {
                    $message = "<span class='uk-text-danger'>No tienes suficientes puntos de donación.</span>";
                } else {
                    if ($this->subcription_model->buyVip($user_id, $vip_price)) {
                        $message = "<span class='uk-text-success'>¡Has comprado el VIP con éxito! Duración: 30 días.</span>";
                        redirect('vip', 'refresh');
                    } else {
                        $message = "<span class='uk-text-danger'>Error al procesar la compra. Revisa los logs para más detalles.</span>";
                    }
                }
            }
        } else {
            $message = "<span class='uk-text-danger'>Debes iniciar sesión para comprar o renovar el VIP.</span>";
        }

        $data = [
            'pagetitle' => $this->lang->line('tab_vip'),
            'user_id' => $user_id,
            'donation_points' => $donation_points ?? 0,
            'is_vip' => $is_vip ?? false,
            'vip_price' => $vip_price,
            'message' => $message,
            'remaining_time' => $remaining_time
        ];

        $this->template->build('vip', $data);
    }
	
	//premiun
	public function premiun()
    {
        $user_id = $this->session->userdata('wow_sess_id');
        $message = "";
        $premiun_price = 20;
        $remaining_time = "";

        if ($user_id) {
            $donation_points = $this->subcription_model->getDonationPoints($user_id);
            $is_premiun = $this->subcription_model->ispremiun($user_id);
            $subscription_timestamp = $this->subcription_model->getPremiunDate($user_id); // Traer el timestamp de expiración

            if ($is_premiun && $subscription_timestamp) {
                // Calcular el tiempo restante usando el timestamp
                $current_time = time();
                $time_left = $subscription_timestamp - $current_time;

                if ($time_left > 0) {
                    $days_left = floor($time_left / (60 * 60 * 24)); // Convertir a días
                    $remaining_time = "Tu premiun expira en $days_left días.";
                } else {
                    $remaining_time = "Tu premiun ha expirado.";
                }
            }

            // Si el premiun ha expirado, y el usuario tiene puntos suficientes, permitir la renovación
            if ($this->input->post('renew_premiun')) {
                log_message('debug', 'Botón de renovación de premiun presionado para el usuario ID: ' . $user_id);

                if ($donation_points < $premiun_price) {
                    $message = "<span class='uk-text-danger'>No tienes suficientes puntos de donación.</span>";
                } else {
                    // Procesar la renovación
                    if ($this->subcription_model->renewpremiun($user_id, $premiun_price)) {
                        $message = "<span class='uk-text-success'>¡Tu premiun ha sido renovado con éxito! Duración: 30 días.</span>";
                        redirect('premiun', 'refresh');
                    } else {
                        $message = "<span class='uk-text-danger'>Error al procesar la renovación. Revisa los logs para más detalles.</span>";
                    }
                }
            }

            if ($this->input->post('buy_premiun')) {
                log_message('debug', 'Botón de compra premiun presionado para el usuario ID: ' . $user_id);

                if ($is_premiun) {
                    $message = "<span class='uk-text-warning'>Ya eres premiun.</span>";
                } elseif ($donation_points < $premiun_price) {
                    $message = "<span class='uk-text-danger'>No tienes suficientes puntos de donación.</span>";
                } else {
                    if ($this->subcription_model->buypremiun($user_id, $premiun_price)) {
                        $message = "<span class='uk-text-success'>¡Has comprado el premiun con éxito! Duración: 30 días.</span>";
                        redirect('premiun', 'refresh');
                    } else {
                        $message = "<span class='uk-text-danger'>Error al procesar la compra. Revisa los logs para más detalles.</span>";
                    }
                }
            }
        } else {
            $message = "<span class='uk-text-danger'>Debes iniciar sesión para comprar o renovar el premiun.</span>";
        }

        $data = [
            'pagetitle' => $this->lang->line('tab_premiun'),
            'user_id' => $user_id,
            'donation_points' => $donation_points ?? 0,
            'is_premiun' => $is_premiun ?? false,
            'premiun_price' => $premiun_price,
            'message' => $message,
            'remaining_time' => $remaining_time
        ];

        $this->template->build('premiun', $data);
    }
}
