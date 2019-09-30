<?php

class Registro_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function idUsuario($email) {
        $datosUsrQuery = $this->db->get_where('usuarios', array('usu_email' => $email));
        $datosUsrResult = $datosUsrQuery->row();
        return $datosUsrResult->usu_id;
    }

    public function registrarUsuario($datosUsuario) {

        if ($this->db->insert('usuarios', $datosUsuario)) {
            return $this->idUsuario($datosUsuario['usu_email']);
        } else {
            return false;
        }
    }

    public function existeEmail($email) {
        
        $existeEmailQuery = $this->db->get_where('usuarios', array('usu_email' => $email));
        
        $existeEmail = $existeEmailQuery->row();
        
        if (count((array)$existeEmail) > 0) {
            return true;
        } else {
            return false;
        }
    }

}
