<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_pasien extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('pasien_model');

        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url'));
	}

	public function index() {
		$this->load->view('logreg/register_pasien');
	}

	public function login() {	
        $this->load->view('logreg/login');
	}

	public function insert_pasien() {
	    $pasien = $this->pasien_model;
	    $validation = $this->form_validation;
	    $validation->set_rules($pasien->rules());

	    if ($validation->run()) {
		    $pasien->save();
		    echo "<script>
	            alert('Register pasien berhasil');
	            
	            </script>";
	    }

	    $this->load->view("logreg/login");

	}
}