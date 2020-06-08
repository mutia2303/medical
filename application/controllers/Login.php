<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct() {
		parent::__construct();
    }

    public function index() {	

		$this->load->view('logreg/login.php');
	}

	public function login() {
		$username = $this->input->post("username");
		$password = md5($this->input->post("password"));

		$admin = $this->db->get_where('admin', array('username' => $username, 'password' => $password))->row_array();

        $pasien = $this->db->get_where('pasien', array('username' => $username, 'password' => $password))->row_array();

        $medis = $this->db->get_where('medis', array('username' => $username, 'password' => $password))->row_array();

        if ($admin) {
        	$this->db->update("admin",
                array(
                    'status_login' => '1'
                )
            );

            $this->session->set_flashdata('login','<script>window.alert("Login sukses");</script>');
            $this->session->set_userdata('data', $admin);  

            $this->session->set_userdata('id_admin', $admin['id_admin']);
            $this->session->set_userdata('status_login', $admin['status_login']);
			$this->session->set_userdata('username', $admin['username']);
            $this->session->set_userdata('email', $admin['email']);
            $this->session->set_userdata('password', $admin['password']);
            
            redirect(base_url("admin/Home/index"));
        }
        else if ($pasien) {
        	$this->db->update("pasien",
                array(
                    'status_login' => '1'
                )
            );

            $this->session->set_flashdata('login','<script>window.alert("Login sukses");</script>');
            $this->session->set_userdata('data', $pasien);  

            $this->session->set_userdata('id_pasien', $pasien['id_pasien']);
            $this->session->set_userdata('status_login', $pasien['status_login']);
			$this->session->set_userdata('username', $pasien['username']);
            $this->session->set_userdata('email', $pasien['email']);
            $this->session->set_userdata('password', $pasien['password']);
            
            redirect(base_url("pasien/Home/index"));
        }
        else if ($medis['status_medis'] == 'Dokter' || $medis['status_medis'] == 'Bidan' || $medis['status_medis'] == 'Perawat') {
        	$this->db->update("medis", 
				array(
	                'status_login' => '1'
	            )
	        );
            
            $this->session->set_flashdata('login','<script>window.alert("Login sukses");</script>');
            //Session seluruh data
			$this->session->set_userdata('medis', $medis);
			//session satu data
			$this->session->set_userdata('id_medis', $medis['id_medis']);
			$this->session->set_userdata('status_login', $medis['status_login']);
			$this->session->set_userdata('status_medis', $medis['status_medis']);
			$this->session->set_userdata('username', $medis['username']);
            $this->session->set_userdata('password', $medis['password']);
			
			redirect(base_url("medis/Home/index"));
        }
        else 
		{
            $this->session->set_flashdata('other','<div style="color: red;">Maaf gagal login</div>');
			redirect(base_url("Login/index"));
        }
	}

	public function logout() {
		$id_admin = $this->session->userdata['id_admin'];
        $id_medis = $this->session->userdata['id_medis'];
        $id_pasien = $this->session->userdata['id_pasien'];

		$admin = $this->db->get_where('admin', array('id_admin' => $id_admin))->row_array();

        $pasien = $this->db->get_where('pasien', array('id_pasien' => $id_pasien))->row_array();

        $medis = $this->db->get_where('medis', array('id_medis' => $id_medis))->row_array();

        if ($admin) {
        	$this->db->update("admin",
                array(
                    'status_login' => '0'
                )
            );

            $this->session->set_flashdata('logout','<script>window.alert("Logout sukses");</script>');

			$this->session->unset_userdata('id_admin');
            $this->session->unset_userdata('admin');
            session_destroy();

            header('location:'.base_url().'Login/index');
        } 
        else if ($pasien) {
        	$this->db->update("pasien",
                array(
                    'status_login' => '0'
                )
            );

            $this->session->set_flashdata('logout','<script>window.alert("Logout sukses");</script>');

			$this->session->unset_userdata('id_pasien');
            $this->session->unset_userdata('pasien');
            session_destroy();

            header('location:'.base_url().'Login/index');
        }
        else if ($medis['status_medis'] == 'Dokter' || $medis['status_medis'] == 'Bidan' || $medis['status_medis'] == 'Perawat') {
        	$this->db->update("medis",
                array(
                    'status_login' => '0'
                )
            );

            $this->session->set_flashdata('logout','<script>window.alert("Logout sukses");</script>');

			$this->session->unset_userdata('id_medis');
            $this->session->unset_userdata('medis');
            session_destroy();

            header('location:'.base_url().'Login/index');
        }
        else {
        	echo "<script>window.alert('Gagal Logout');
                </script>";
            // redirect('index');
        }

	}
}