<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class artikel_model extends CI_Model {
    private $_table = "artikel";

    public $id_artikel;
    public $penulis;
    public $judul;
    public $isi_artikel;
    public $gambar = "default.jpg";

    public function rules() {
        return [
            ['field' => 'penulis',
            'label' => 'Penulis',
            'rules' => 'required'],

            ['field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required'],
            
            ['field' => 'isi_artikel',
            'label' => 'Isi_artikel',
            'rules' => 'required']
        ];
   }

   public function getAll() {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id_artikel) {
        return $this->db->get_where($this->_table, ["id_artikel" => $id_artikel])->row();
    }

    public function save($id_artikel='') {
        $post = $this->input->post();
        $this->id_artikel = $id_artikel;
        $this->penulis = $post["penulis"];
        $this->judul = $post["judul"];
        $this->isi_artikel = $post["isi_artikel"];
        $this->gambar = $this->_uploadGambar();
        
        $this->db->insert($this->_table, $this);
    }

    public function update() {
    	$post = $this->input->post();
        $this->id_artikel = $post["id_artikel"];
        $this->penulis = $post["penulis"];
        $this->judul = $post["judul"];
        $this->isi_artikel = $post["isi_artikel"];

        if (!empty($_FILES["gambar"]["name"])) 
        {
            $this->gambar = $this->_uploadGambar();
        } 
        else
        {
            $this->gambar = $post["old_image"];
        }

        $this->db->update($this->_table, $this, array('id_artikel' => $post['id_artikel']));
    }

    public function delete($id_artikel) {
        $this->_deleteGambar($id_artikel);
        return $this->db->delete($this->_table, array("id_artikel" => $id_artikel));
    }

    private function _uploadGambar() {
        $config['upload_path']          = './upload/artikel/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = "artikel".rand(9,9999);
        $config['overwrite']            = true;
        $config['max_size']             = 20000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
            // return $this->upload->file_name;
        }
        
        return "default.jpg";
    }

    private function _deleteGambar($id_artikel) {
        $artikel_gambar = $this->getById($id_artikel);

        if ($artikel_gambar->gambar != "default.jpg") {
            $filename = explode(".", $artikel_gambar->gambar)[0];
            return array_map('unlink', glob(FCPATH."upload/artikel/$filename.*"));
        }
    }
}