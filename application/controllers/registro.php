<?php

class Registro extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Registro_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index() {
        //Chequear si el ususario esta logueado
        if (!empty($this->session->userdata['apellido']) && !empty($this->session->userdata['nombre']) && !empty($this->session->userdata['id'])) {
            //Si esta logueado que lo redireccione al menu
            redirect('/menu/', 'refresh');
        } else {
            //Sino esta logueado, redirecciona al login
            $data['titulo'] = 'Registro';
            $this->view($data);
        }
    }

    public function view($data) {

        //funcion para cargar la vista login
        $data['titulo'] = 'Registro';
        //cargar el formulario de login
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usu_nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('usu_apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('usu_email', 'Email', 'required');
        $this->form_validation->set_rules('usu_password', 'Password', 'required');
        $this->form_validation->set_rules('usu_fecha_nacimiento', 'Fecha de nacimiento', 'required');


        //cargar la vista propiamente dicha
        $this->load->view('templates/header', $data);
        $this->load->view('registro', $data);
        $this->load->view('templates/footer', $data);
    }

    public function registrar_usuario() {
        if ($this->input->post()) {

            $datos['usu_nombre'] = $this->input->post('usu_nombre');
            $datos['usu_apellido'] = $this->input->post('usu_apellido');
            $datos['usu_fecha_nacimiento'] = $this->input->post('usu_fecha_nacimiento');
            $datos['usu_email'] = $this->input->post('usu_email');
            $datos['usu_password'] = MD5($this->input->post('usu_password'));
            $datos['tip_usu_id'] = 1;
            $datos['usu_estado'] = 1;

            if(!$this->Registro_model->existeEmail($datos['usu_email'])){
                
                $registro = $this->Registro_model->registrarUsuario($datos);
                
                if ($registro) {
                    //Guarda los datos en sesion
                    $this->session->set_userdata([
                        'apellido' => $datos['usu_apellido'],
                        'nombre' => $datos['usu_nombre'],
                        'email' => $datos['usu_email'],
                        'id' => $datos['usu_id']
                    ]);
                    
                    $redirect = 'index.php/';
                }else{
                    $msj = 'Ha ocurrido un error al registrarse, por favor intente nuevamente más tarde';
                    $redirect = 'index.php/registro';
                }
            }else{
                $msj = '¡Lo sentimos! El email se encuentra registrado.';
                $redirect = 'index.php/registro';
            }
             
            $data['msj'] = $msj;
            redirect($redirect);
            
        }
    }

    public function existeEmail($email) {
        
        
    }

}
