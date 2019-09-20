
<?php
class Login_model extends CI_Model 
{
        public function __construct()
        {
                $this->load->database();
        }

        public function checkLogin($email, $password)
        {
                $query = $this->db->get_where('usuarios', array('usu_email' => $email, 'usu_password' => $password));
                return $query->row_array();
        }

}