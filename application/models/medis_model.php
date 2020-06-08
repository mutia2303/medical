<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class medis_model extends CI_Model {

    private $_table = "medis";

    public $id_medis;
    public $username;
    public $password;
    public $nama_medis;
    public $jenis_kelamin;
    public $email;
    public $alamat_lengkap;
    public $no_hp;
    public $umur;
    public $foto ="user.png";
    public $bagian_tugas;
    public $status_medis;
    public $sip;
    public $str;
    public $stb;
    public $ijazah;
    public $ktp;
    public $status_verifikasi;
    public $status_login;

    public function rules() {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],

            ['field' => 'nama_medis',
            'label' => 'Nama_medis',
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
            'rules' => 'required'],

            ['field' => 'bagian_tugas',
            'label' => 'Bagian_tugas',
            'rules' => 'required'],

            ['field' => 'status_medis',
            'label' => 'Status_medis',
            'rules' => 'required']
        ];
    }

    public function rules_admin() {
        return [
            ['field' => 'nama_medis',
            'label' => 'Nama_medis',
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
            'rules' => 'required'],

            ['field' => 'bagian_tugas',
            'label' => 'Bagian_tugas',
            'rules' => 'required'],

            ['field' => 'status_medis',
            'label' => 'Status_medis',
            'rules' => 'required']
        ];
    }

    public function getById($id_medis) {
        return $this->db->get_where($this->_table,["id_medis" => $id_medis])->row();
    }

    public function save($id_medis='') {
        $post = $this->input->post();
        $this->id_medis = $id_medis;
        $this->username = $post["username"];
        $this->password = md5($post["password"]);
        $this->nama_medis = $post["nama_medis"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->email = $post["email"];
        $this->alamat_lengkap = $post["alamat_lengkap"];
        $this->no_hp = $post["no_hp"];
        $this->umur = $post["umur"]; 
        $this->foto = $this->_uploadFoto();
        $this->bagian_tugas = $post["bagian_tugas"];
        $this->status_medis = $post["status_medis"];
        $this->sip = $this->_uploadSIP();
        $this->str = $this->_uploadSTR();
        $this->stb = $this->_uploadSTB();
        $this->ijazah = $this->_uploadIjazah();
        $this->ktp = $this->_uploadKTP();
        $this->status_verifikasi = "Belum Terverifikasi";
        $this->status_login = "0";

        $this->db->insert($this->_table, $this);
        
    }

    public function save_admin($id_medis='') {
        $post = $this->input->post();
        $this->id_medis = $id_medis;
        $this->username = "0";
        $this->password = "0";
        $this->nama_medis = $post["nama_medis"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->email = $post["email"];
        $this->alamat_lengkap = $post["alamat_lengkap"];
        $this->no_hp = $post["no_hp"];
        $this->umur = $post["umur"]; 
        $this->foto = $this->_uploadFoto();
        $this->bagian_tugas = $post["bagian_tugas"];
        $this->status_medis = $post["status_medis"];
        $this->sip = $this->_uploadSIP();
        $this->str = $this->_uploadSTR();
        $this->stb = $this->_uploadSTB();
        $this->ijazah = $this->_uploadIjazah();
        $this->ktp = $this->_uploadKTP();
        $this->status_verifikasi = "Belum Terverifikasi";
        $this->status_login = "0";

        $this->db->insert($this->_table, $this);
        
    }

    public function delete($id_medis) {
        $this->_deleteFoto($id_medis);
        $this->_deleteSIP($id_medis);
        $this->_deleteSTR($id_medis);
        $this->_deleteSTB($id_medis);
        $this->_deleteIjazah($id_medis);
        $this->_deleteKTP($id_medis);

        return $this->db->delete($this->_table, array("id_medis" => $id_medis));
    }

    private function _uploadFoto() {
        $config['upload_path']          = './upload/medis/foto/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = "foto".rand(9,9999);
        $config['overwrite']            = true;
        $config['max_size']             = 20000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
            // return $this->upload->file_name;
        }
        
        return "user.png";
    }

    private function _uploadSIP() {
        $config['upload_path']          = './upload/medis/sip/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = "sip".rand(9,9999);
        $config['overwrite']            = true;
        $config['max_size']             = 20000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('sip')) {
            return $this->upload->data("file_name");
        }
    }

    private function _uploadSTR() {
        $config['upload_path']          = './upload/medis/str/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = "str".rand(9,9999);
        $config['overwrite']            = true;
        $config['max_size']             = 20000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('str')) {
            return $this->upload->data("file_name");
        }
    }

    private function _uploadSTB() {
        $config['upload_path']          = './upload/medis/stb/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = "stb".rand(9,9999);
        $config['overwrite']            = true;
        $config['max_size']             = 20000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('stb')) {
            return $this->upload->data("file_name");
        }
    }

    private function _uploadIjazah() {
        $config['upload_path']          = './upload/medis/ijazah/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = "ijazah".rand(9,9999);
        $config['overwrite']            = true;
        $config['max_size']             = 20000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('ijazah')) {
            return $this->upload->data("file_name");
        }
    }

    private function _uploadKTP() {
        $config['upload_path']          = './upload/medis/ktp/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = "ktp".rand(9,9999);
        $config['overwrite']            = true;
        $config['max_size']             = 20000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('ktp')) {
            return $this->upload->data("file_name");
        }
    }

    private function _deleteFoto($id_medis) {
        $medis_foto = $this->getById($id_medis);

        if ($medis_foto->foto != "user.png") {
            $filename = explode(".", $medis_foto->foto)[0];
            return array_map('unlink', glob(FCPATH."upload/medis/foto/$filename.*"));
        }
    }

    private function _deleteSIP($id_medis) {
        $medis_sip = $this->getById($id_medis);

        $filename = explode(".", $medis_sip->sip)[0];
        return array_map('unlink', glob(FCPATH."upload/medis/sip/$filename.*"));
    }

    private function _deleteSTR($id_medis) {
        $medis_str = $this->getById($id_medis);

        $filename = explode(".", $medis_str->str)[0];
        return array_map('unlink', glob(FCPATH."upload/medis/str/$filename.*"));
    }

    private function _deleteSTB($id_medis) {
        $medis_stb = $this->getById($id_medis);

        $filename = explode(".", $medis_stb->stb)[0];
        return array_map('unlink', glob(FCPATH."upload/medis/stb/$filename.*"));
    }

    private function _deleteIjazah($id_medis) {
        $medis_ijazah = $this->getById($id_medis);

        $filename = explode(".", $medis_ijazah->ijazah)[0];
        return array_map('unlink', glob(FCPATH."upload/medis/ijazah/$filename.*"));
    }

    private function _deleteKTP($id_medis) {
        $medis_ktp = $this->getById($id_medis);

        $filename = explode(".", $medis_ktp->ktp)[0];
        return array_map('unlink', glob(FCPATH."upload/medis/ktp/$filename.*"));
    }
}