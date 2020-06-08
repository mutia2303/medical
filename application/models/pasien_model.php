<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class pasien_model extends CI_Model {

	private $_table = "pasien";

	public $id_pasien;
	public $username;
	public $password;
	public $nama_pasien;
	public $jenis_kelamin;
	public $email;
	public $alamat_lengkap;
	public $no_hp;
	public $umur;
	public $foto ="user.png";

	public function rules() {
		return [
		    ['field' => 'username',
		    'label' => 'Username',
		    'rules' => 'required'],

		    ['field' => 'password',
		    'label' => 'Password',
		    'rules' => 'required'],

		    ['field' => 'nama_pasien',
		    'label' => 'Nama_pasien',
		    'rules' => 'required'],

		    ['field' => 'jenis_kelamin',
		    'label' => 'Jenis_kelamin',
		    'rules' => 'required'],

		    ['field' => 'email',
		    'label' => 'Email',
		    'rules' => 'required'],

		    ['field' => 'alamat_lengkap',
		    'label' => 'Alamat_lengkap',
		    'rules' => 'required'],

		    ['field' => 'no_hp',
		    'label' => 'No_hp',
		    'rules' => 'required'],

		    ['field' => 'umur',
		    'label' => 'Umur',
		    'rules' => 'required']
		];
	}

    public function rules_admin() {
        return [
            ['field' => 'nama_pasien',
            'label' => 'Nama_pasien',
            'rules' => 'required'],

            ['field' => 'jenis_kelamin',
            'label' => 'Jenis_kelamin',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'alamat_lengkap',
            'label' => 'Alamat_lengkap',
            'rules' => 'required'],

            ['field' => 'no_hp',
            'label' => 'No_hp',
            'rules' => 'required'],

            ['field' => 'umur',
            'label' => 'Umur',
            'rules' => 'required']
        ];
    }
 
    public function getById($id_pasien) {
        return $this->db->get_where($this->_table, ["id_pasien" => $id_pasien])->row();
    }

    public function save($id_pasien='') {
        $post = $this->input->post();
        $this->id_pasien = $id_pasien;
        $this->username = $post["username"];
        $this->password = md5($post["password"]);
        $this->nama_pasien = $post["nama_pasien"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->email = $post["email"];
        $this->alamat_lengkap = $post["alamat_lengkap"];
        $this->no_hp = $post["no_hp"];
        $this->umur = $post["umur"];
        $this->foto = $this->_uploadGambar();
        $this->status_login = "0";

        $this->db->insert($this->_table, $this);
    }

    public function save_admin($id_pasien='') {
        $post = $this->input->post();
        $this->id_pasien = $id_pasien;
        $this->username = "0";
        $this->password = "0";
        $this->nama_pasien = $post["nama_pasien"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->email = $post["email"];
        $this->alamat_lengkap = $post["alamat_lengkap"];
        $this->no_hp = $post["no_hp"];
        $this->umur = $post["umur"];
        $this->foto = $this->_uploadGambar();
        $this->status_login = "0";

        $this->db->insert($this->_table, $this);
    }

    public function update() {
    	$post = $this->input->post();
        $this->id_pasien = $id_pasien;
        $this->username = $post["username"];
        $this->password = md5($post["password"]);
        $this->nama_pasien = $post["nama_pasien"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->email = $post["email"];
        $this->alamat_lengkap = $post["alamat_lengkap"];
        $this->no_hp = $post["no_hp"];
        $this->umur = $post["umur"];

        if (!empty($_FILES["foto"]["name"])) 
        {
            $this->foto = $this->_uploadGambar();
        } 
        else
        {
            $this->foto = $post["old_image"];
        }

        $this->db->update($this->_table, $this, array('id_pasien' => $post['id_pasien']));
    }

    public function delete($id_pasien) {
        $this->_deleteGambar($id_pasien);
        return $this->db->delete($this->_table, array("id_pasien" => $id_pasien));
    }

    private function _uploadGambar() {
        $config['upload_path']          = './upload/pasien/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = "foto".rand(9,9999);
        $config['overwrite']			= true;
        $config['max_size']             = 20000; // 1MB
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }
        
        return "user.png";
    }

    private function _deleteGambar($id_pasien) {
        $pasien_foto = $this->getById($id_pasien);

        if ($pasien_foto->foto != "user.png") {
            $filename = explode(".", $pasien_foto->foto)[0];
            return array_map('unlink', glob(FCPATH."upload/pasien/$filename.*"));
        }
    }
}