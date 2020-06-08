<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model { 	

    public function _uploadFoto() {
        $config['upload_path']          = './upload/admin/';
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

	public function GetMedis($where="") {
		return $this->db->query('select * from medis '.$where);
	}

	public function GetDokter() {
		$this->db->select('*');
		$this->db->from('medis');
		$this->db->where('status_medis = "Dokter"');

		$query = $this->db->get();
		return $query->result();
	}

	public function GetPasien() {
		return $this->db->query('select * from pasien');
	}

	public function GetObat() {
		return $this->db->query('select * from obat where id_obat not in (0)');
	}

	public function GetLayanan() {
		return $this->db->query('select * from layanan where id_layanan not in (0)');
	}

	public function GetBanner() {
		return $this->db->query('select * from banner');
	}

	public function GetPerusahaan() {
		return $this->db->query('select * from perusahaan');
	}

	public function GetTransaksi() {
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pasien', 'pasien.id_pasien = transaksi.id_pasien');
		$this->db->join('medis', 'medis.id_medis = transaksi.id_medis');
		$this->db->join('obat', 'obat.id_obat = transaksi.id_obat_1', 
			'obat.id_obat = transaksi.id_obat_2',
		    'obat.id_obat = transaksi.id_obat_3',
		    'obat.id_obat = transaksi.id_obat_4',
		    'obat.id_obat = transaksi.id_obat_5');
		// $this->db->join('obat', 'obat.id_obat = transaksi.id_obat_2');
		// $this->db->join('obat', 'obat.id_obat = transaksi.id_obat_3');
		// $this->db->join('obat', 'obat.id_obat = transaksi.id_obat_4');
  //       $this->db->join('obat', 'obat.id_obat = transaksi.id_obat_5');
		$this->db->join('layanan', 'layanan.id_layanan = transaksi.id_layanan_1', 
			'layanan.id_layanan = transaksi.id_layanan_2');
		// $this->db->join('layanan', 'layanan.id_layanan = transaksi.id_layanan_2');

		$query = $this->db->get();
		return $query->result();
	}

	public function GetTransaksiId() {
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('transaksi.id_transaksi = "$id_transaksi"');
		$this->db->join('pasien', 'pasien.id_pasien = transaksi.id_pasien');
		$this->db->join('medis', 'medis.id_medis = transaksi.id_medis');
		$this->db->join('obat', 'obat.id_obat = transaksi.id_obat_1', 
			'obat.id_obat = transaksi.id_obat_2',
		    'obat.id_obat = transaksi.id_obat_3',
		    'obat.id_obat = transaksi.id_obat_4',
		    'obat.id_obat = transaksi.id_obat_5');
		// $this->db->join('obat', 'obat.id_obat = transaksi.id_obat_2');
		// $this->db->join('obat', 'obat.id_obat = transaksi.id_obat_3');
		// $this->db->join('obat', 'obat.id_obat = transaksi.id_obat_4');
  //       $this->db->join('obat', 'obat.id_obat = transaksi.id_obat_5');
		$this->db->join('layanan', 'layanan.id_layanan = transaksi.id_layanan_1', 
			'layanan.id_layanan = transaksi.id_layanan_2');
		$this->db->where('transaksi.id_transaksi');
		// $this->db->join('layanan', 'layanan.id_layanan = transaksi.id_layanan_2');

		$query = $this->db->get();
		return $query->result();
	}

	public function cari_transaksi($status_transaksi) {

        if ($status_transaksi==''){
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->join('pasien', 'pasien.id_pasien = transaksi.id_pasien');
			$this->db->join('medis', 'medis.id_medis = transaksi.id_medis');
			$this->db->join('obat', 'obat.id_obat = transaksi.id_obat_1', 
				'obat.id_obat = transaksi.id_obat_2',
			    'obat.id_obat = transaksi.id_obat_3',
			    'obat.id_obat = transaksi.id_obat_4',
			    'obat.id_obat = transaksi.id_obat_5');
			$this->db->join('layanan', 'layanan.id_layanan = transaksi.id_layanan_1', 
				'layanan.id_layanan = transaksi.id_layanan_2');
			// $this->db->where('transaksi.status_transaksi', $status_transaksi);
		}
		else {
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->join('pasien', 'pasien.id_pasien = transaksi.id_pasien');
			$this->db->join('medis', 'medis.id_medis = transaksi.id_medis');
			$this->db->join('obat', 'obat.id_obat = transaksi.id_obat_1', 
				'obat.id_obat = transaksi.id_obat_2',
			    'obat.id_obat = transaksi.id_obat_3',
			    'obat.id_obat = transaksi.id_obat_4',
			    'obat.id_obat = transaksi.id_obat_5');
			$this->db->join('layanan', 'layanan.id_layanan = transaksi.id_layanan_1', 
				'layanan.id_layanan = transaksi.id_layanan_2');
			$this->db->where('transaksi.status_transaksi', $status_transaksi);
		}

		$query = $this->db->get();
		return $query->result();
	}

	public function pasien() {
        $query = $this->db->query('SELECT * FROM pasien ORDER BY nama_pasien ASC');
		return $query->result();
	}

	public function medis() {
        $query = $this->db->query('SELECT * FROM medis ORDER BY nama_medis ASC');
		return $query->result();
	}

	public function obat() {
        $query = $this->db->query('SELECT * FROM obat where id_obat not in (0) ORDER BY nama_obat ASC');
		return $query->result();
	}

	public function layanan() {
        $query = $this->db->query('SELECT * FROM layanan where id_layanan not in (0) ORDER BY nama_layanan ASC');
		return $query->result();
	}

	public function AddData($tableName,$data) {
		$res = $this->db->insert($tableName,$data);
		return $res;
	}

	public function UpdateData($tableName,$data,$where) {
		$res = $this->db->update($tableName,$data,$where);
		return $res;
	}

	public function DeleteData($tableName,$where) {
		$res = $this->db->delete($tableName,$where);
		return $res;
	}
}
