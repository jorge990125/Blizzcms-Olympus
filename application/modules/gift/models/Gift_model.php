<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gift_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Verifica si el código es válido
    public function verify_code($code)
    {
        // Busca el código en la tabla gift_codes
        $this->db->select('id, points');
        $this->db->from('gift_codes');
        $this->db->where('code', $code);
        $this->db->where('used_by', NULL);  // Asegura que no se haya usado
        $query = $this->db->get();

        // Si el código es válido y no ha sido usado
        if ($query->num_rows() > 0) {
            return $query->row(); // Devuelve la fila con los datos del código
        } else {
            return false; // Código inválido o ya usado
        }
    }

    // Actualiza los puntos de donación del usuario y marca el código como usado
    public function redeem_code($code, $user_id)
    {
        // Obtiene la información del código
        $gift = $this->verify_code($code);

        if ($gift) {
            // Inicia la transacción para evitar errores
            $this->db->trans_start();

            // Actualiza el código como usado y asignado al usuario
            $this->db->update('gift_codes', [
                'used_by' => $user_id,
                'used_at' => date('Y-m-d H:i:s')
            ], ['id' => $gift->id]);

            // Actualiza los puntos de donación en la tabla 'users'
            $this->db->set('dp', 'dp + ' . (int) $gift->points, FALSE); // Asegúrate de que la consulta sea correcta
            $this->db->where('id', $user_id);
            $this->db->update('users');

            // Completa la transacción
            $this->db->trans_complete();

            // Verifica si la transacción fue exitosa
            if ($this->db->trans_status() === FALSE) {
                return false; // Algo salió mal en la transacción
            }

            return true; // Código canjeado exitosamente
        }

        return false; // Código inválido o ya canjeado
    }
}
