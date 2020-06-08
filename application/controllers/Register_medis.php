<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_medis extends CI_Controller {

  function __construct() {
    parent::__construct();

    $this->load->model('medis_model');

    $this->load->library('form_validation');

    $this->load->helper(array('form', 'url', 'file'));
  }

  public function index() {
    $this->load->view('logreg/register_medis');
  }

  public function login() {
  	$this->load->view('logreg/login');
  }

  public function insert_medis() {
  	$medis = $this->medis_model;
  	$validation = $this->form_validation;
  	$validation->set_rules($medis->rules());

  	if ($validation->run()) {
  		$medis->save();
  		echo "<script>
  		alert('Register medis berhasil');
			</script>";
  	}

  	$this->load->view("logreg/login");
  }
}