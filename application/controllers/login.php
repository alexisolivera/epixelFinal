<?php


class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
		$this->load->helper('url_helper');
		$this->load->library('session');
    }

	public function index()
	{
		//Chequear si el ususario esta logueado
		if (!empty($this->session->userdata['apellido']) && !empty($this->session->userdata['nombre']) && !empty($this->session->userdata['id'])) {
			//Si esta logueado que lo redireccione al menu
			redirect('/menu/', 'refresh');
		} else {
			//Sino esta logueado, redirecciona al login
			$data['titulo'] = 'Login';
			$this->view($data);
		}
	}

	public function view($data) {

		//funcion para cargar la vista login
		$data['titulo'] = 'Login';
		//cargar el formulario de login
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usu_email', 'Email', 'required');
		$this->form_validation->set_rules('usu_password', 'Password', 'required');

		//cargar la vista propiamente dicha
		$this->load->view('templates/header', $data);
		$this->load->view('login', $data);
		$this->load->view('templates/footer', $data);
	}

	public function processLoginInput() {

		//cargar el formulario de login
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usu_email', 'Email', 'required');
		$this->form_validation->set_rules('usu_password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$data['titulo'] = 'Login';
			$this->view($data);
		} else {
			$email = $_POST['usu_email'];
			$password = md5($_POST['usu_password']);
			//Busca que el usuario tenga una cuenta
			$resultado = $this->Login_model->checkLogin($email, $password);
			
			if(!empty($resultado))
			{
                //Se guardan los datos en la sesion
				$this->guardaDatosEnSesion($resultado, $email);
				$this->view($data);
			} 
			else 
			{ 
				$data['loginError'] = 'No se encontró usuario. Compruebe mail y contraseña';
				$this->view($data);
			}
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('/login/', 'refresh');
	}

	

    public function guardaDatosEnSesion(){
        //Guarda los datos en sesion
        $this->session->set_userdata([
            'apellido' => $resultado['usu_apellido'],
            'nombre' => $resultado['usu_nombre'],
            'email' => $resultado['usu_email'],
            'id' => $resultado['usu_id']
        ]);


    }

}