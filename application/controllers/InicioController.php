<?php

	class InicioController extends CI_Controller
	{ 
		public function __construct(){
			parent::__construct();
		}
		// cargo la vista para iniciar sesion
		public function iniciar_sesion(){
			/*$data = array();
			$data['error'] = $this->session->flashdata('error');*/
			$this->load->view('templates/headerLogin');
			$this->load->view('Inicio');
			$this->load->view('templates/footer');
		}
	}