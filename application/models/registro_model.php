<?php

class Registro_model extends CI_Model{
	
	function __construct(){
                parent::__construct();
                $this->load->database();
                
	}

	public function idUsuario($email){
                $datosUsrQuery = $this->db->get_where('usuarios', array('usu_email' => $email));
                $datosUsrResult = $datosUsrQuery->row();
                return $datosUsrResult->usu_id;
        }

	public function registrarUsuario($datosUsuario){
                
                if($this->db->insert('usuarios', $datosUsuario)){
                        return $this->idUsuario($datosUsuario['usu_email']);     
                }else{
                        return false;
                }
        }

        public function estaRegistrado($email){
                $verificarQuery = $this->db->get_where('usuarios', array('usu_email' => $email));
                if($verificarQuery->num_rows() > 0){       
                        return TRUE;
                }else{
                        return FALSE;
                }
	}
}