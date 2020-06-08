<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class fasilitas_model extends CI_Model {
    private $_table = "fasilitas";

    public $id_fasilitas;
    public $nama_fasilitas;
    public $keterangan;
    public $gambar = "default.jpg";

    public function rules() {
        return [
            ['field' => 'nama_fasilitas',
            'label' => 'Nama_fasilitas',
            'rules' => 'required'],

            ['field' => 'keterangan',
            'label' => 'Keterangan',
            'rules' => 'required']
        ];
   }

   public function getAll() {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id_fasilitas) {
        return $this->db->get_where($this->_table, ["id_fasilitas" => $id_fasilitas])->row();
    }

    public function save($id_fasilitas='') {
        $post = $this->input->post();
        $this->id_fasilitas = $id_fasilitas;
        $this->nama_fasilitas = $post["nama_fasilitas"];
        $this->keterangan = $post["keterangan"];
        $this->gambar = $this->_uploadGambar();
        
        $this->db->insert($this->_table, $this);
    }

    public function update() {
    	$post = $this->input->post();
        $this->id_fasilitas = $post["id_fasilitas"];
        $this->nama_fasilitas = $post["nama_fasilitas"];
        $this->keterangan = $post["keterangan"];
        
        if (!empty($_FILES["gambar"]["name"])) 
        {
            $this->gambar = $this->_uploadGambar();
        } 
        else
        {
            $this->gambar = $post["old_image"];
        }

        $this->db->update($this->_table, $this, array('id_fasilitas' => $post['id_fasilitas']));
    }

    public function delete($id_fasilitas) {
        $this->_deleteGambar($id_fasilitas);
        return $this->db->delete($this->_table, array("id_fasilitas" => $id_fasilitas));
    }

    private function _uploadGambar() {
        $config['upload_path']          = './upload/fasilitas/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = "fasilitas".rand(9,9999);
        $config['overwrite']            = true;
        $config['max_size']             = 20000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
            // return $this->upload->file_name;
        }
        
        return "default.jpg";
    }

    private function _deleteGambar($id_fasilitas) {
        $fasilitas_gambar = $this->getById($id_fasilitas);

        if ($fasilitas_gambar->gambar != "default.jpg") {
            $filename = explode(".", $fasilitas_gambar->gambar)[0];
            return array_map('unlink', glob(FCPATH."upload/fasilitas/$filename.*"));
        }
    }
}