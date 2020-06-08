<?php

class Home extends CI_Controller {

    public function __construct() {
    	parent::__construct();

        $this->load->model("admin_model");
        $this->load->model("medis_model");
        $this->load->model("pasien_model");
        $this->load->model("fasilitas_model");
        $this->load->model("artikel_model");

    	$this->load->library('pdf');
        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $data['jumlah_pasien'] = $this->db->query("select count(*) as jumlah from pasien");

        $data['jumlah_dokter'] = $this->db->query("select count(*) as jumlah from medis where status_medis ='Dokter'");

        $data['jumlah_perawat'] = $this->db->query("select count(*) as jumlah from medis where status_medis ='Perawat'");

        $data['jumlah_bidan'] = $this->db->query("select count(*) as jumlah from medis where status_medis ='Bidan'");

         $data['jumlah_obat'] = $this->db->query("select count(*) as jumlah from obat where id_obat not in (0)");

        $data['jumlah_layanan'] = $this->db->query("select count(*) as jumlah from layanan where id_layanan not in (0)");

        $data['jumlah_transaksi'] = $this->db->query("select count(*) as jumlah from transaksi");

    	$this->load->view('admin/index', $data);
    }


    public function tambah_medis() {
        $this->load->view('admin/medis/tambah');
    }

    public function proses_tambah_medis() {
        $medis = $this->medis_model;
        $validation = $this->form_validation;
        $validation->set_rules($medis->rules_admin());

        if ($validation->run()) {
            $medis->save_admin();
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Tambah Data Medis berhasil.
                </div>'); 
        } 
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Tambah Data Medis tidak berhasil.
                </div>'); 
        }

        $this->load->view('admin/medis/tambah');
    }

    //DOKTER
    public function dokter() {
    	$where = 'where status_medis = "Dokter"';
        $data['data_dokter'] = $this->admin_model->GetMedis($where);

    	$this->load->view('admin/medis/dokter/tabel', $data);
    }

    public function detail_dokter($id_medis) {
        $data['detail_dokter'] = $this->db->query("select * from medis where id_medis = $id_medis");
        $this->load->view('admin/medis/dokter/detail',$data);
    }

    public function verifikasi_dokter() {
        $id_medis = $_POST['id_medis'];
        $status_verifikasi = $_POST['status_verifikasi'];

        $data = array('id_medis' => $id_medis, 'status_verifikasi' => $status_verifikasi);
        $where = array('id_medis' => $id_medis);

        $res = $this->admin_model->UpdateData('medis', $data, $where);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/dokter');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Verifikasi Medis berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Verifikasi Medis tidak berhasil.
                </div>'); 
        }
    }

    public function edit_dokter($id_medis) { 
        $data['data_dokter'] = $this->db->query("select * from medis where id_medis = $id_medis");
        $this->load->view('admin/medis/dokter/edit',$data);
        
    }

    public function proses_edit_dokter() {
        $id_medis = $_POST['id_medis'];
        $nama_medis = $_POST['nama_medis'];
        $email = $_POST['email'];
        $alamat_lengkap = $_POST['alamat_lengkap'];
        $no_hp = $_POST['no_hp'];
        $umur = $_POST['umur'];

        $data = array('id_medis' => $id_medis, 'nama_medis' => $nama_medis, 'email' => $email, 'alamat_lengkap' => $alamat_lengkap, 'no_hp' => $no_hp, 'umur' => $umur);
        $where = array('id_medis' => $id_medis);
        $res = $this->admin_model->UpdateData('medis', $data, $where);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/dokter');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Edit Data Medis berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Edit Data Medis tidak berhasil.
                </div>'); 
        }
    }

    public function hapus_dokter($id_medis=null) {
        if (!isset($id_medis)) show_404(); 

        if ($this->medis_model->delete($id_medis)) {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data berhasil.
                </div>');
            redirect(site_url('admin/Home/dokter'));
        } 
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data tidak berhasil.
                </div>');
        }
    }

    public function excel_dokter() {
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya    
        $excel = new PHPExcel();    
        // Settingan awal fil excel
        $excel->getProperties()
                    ->setCreator('Arkamaya')     
                    ->setLastModifiedBy('Arkamaya')
                    ->setTitle("Data Medis Dokter")
                    ->setSubject("Dokter") 
                    ->setDescription("Laporan Data Medis Dokter")
                    ->setKeywords("Data Dokter");

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER), 
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
        );

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER), 
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DATA MEDIS PERAWAT"); // Set kolom A1 dengan tulisan "" 
        $excel->getActiveSheet()->mergeCells('A1:P1'); // Set Merge Cell pada kolom A1 sampai Q1    
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1    
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18); // Set font size 15 untuk kolom A1    
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $excel->setActiveSheetIndex(0)->setCellValue('A2', "ARKAMAYA MEDICAL");
        $excel->getActiveSheet()->mergeCells('A2:P2');   
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);   
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(18);  
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

        // Buat header tabel nya pada baris ke 5
        $excel->setActiveSheetIndex(0)->setCellValue('A5', "NO");
        $excel->setActiveSheetIndex(0)->setCellValue('B5', "USERNAME"); 
        $excel->setActiveSheetIndex(0)->setCellValue('C5', "NAMA"); 
        $excel->setActiveSheetIndex(0)->setCellValue('D5', "JENIS KELAMIN"); 
        $excel->setActiveSheetIndex(0)->setCellValue('E5', "EMAIL"); 
        $excel->setActiveSheetIndex(0)->setCellValue('F5', "ALAMAT LENGKAP");
        $excel->setActiveSheetIndex(0)->setCellValue('G5', "NO HP");
        $excel->setActiveSheetIndex(0)->setCellValue('H5', "UMUR");
        $excel->setActiveSheetIndex(0)->setCellValue('I5', "FOTO");
        $excel->setActiveSheetIndex(0)->setCellValue('J5', "BAGIAN TUGAS");
        $excel->setActiveSheetIndex(0)->setCellValue('K5', "SIP");
        $excel->setActiveSheetIndex(0)->setCellValue('L5', "STR");
        $excel->setActiveSheetIndex(0)->setCellValue('M5', "STB");
        $excel->setActiveSheetIndex(0)->setCellValue('N5', "IJAZAH");
        $excel->setActiveSheetIndex(0)->setCellValue('O5', "KTP");
        $excel->setActiveSheetIndex(0)->setCellValue('P5', "STATUS VERIFIKASI");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('N5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('O5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('P5')->applyFromArray($style_col);

        // Panggil function view yang adauntuk menampilkan semua data  
        $where = 'where status_medis = "Dokter"';
        $data_dokter = $this->admin_model->GetMedis($where)->result();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 6
        foreach($data_dokter as $data) { // Lakukan looping pada variabel      
            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->username);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_medis);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jenis_kelamin);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->email);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->alamat_lengkap);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->no_hp);
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->umur. " tahun");
            $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->foto);
            $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->bagian_tugas);
            $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->sip);
            $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->str);
            $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->stb);
            $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->ijazah);
            $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->ktp);
            $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->status_verifikasi);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
            $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom    
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(18);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(40);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(18);
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(23);

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Dokter");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');    header('Content-Disposition: attachment; filename="Data Dokter.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    function pdf_dokter() {
        $pdf = new FPDF('L', 'mm','folio');

        // membuat halaman baru
        $pdf->AddPage();

        $pdf->SetFont('Times','B',18);
        $pdf->Cell(330,7,'LAPORAN DATA MEDIS DOKTER',0,1,'C');
        $pdf->Cell(330,7,'ARKAMAYA MEDICAL',0,1,'C');

        $pdf->SetLineWidth(1.2);
        $pdf->Line(10,27.10,320.5,27.10);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(20,15,'',0,1);

        $pdf->SetLineWidth(0);
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'NO',1,0,'C');
        $pdf->Cell(35,6,'USERNAME',1,0,'C');
        $pdf->Cell(35,6,'NAMA',1,0,'C');
        $pdf->Cell(33,6,'JENIS KELAMIN',1,0,'C');
        $pdf->Cell(40,6,'EMAIL',1,0,'C');
        $pdf->Cell(50,6,'ALAMAT',1,0,'C');
        $pdf->Cell(25,6,'NO HP',1,0,'C');
        $pdf->Cell(17,6,'UMUR',1,0,'C');
        $pdf->Cell(32,6,'BAGIAN TUGAS',1,0,'C');
        $pdf->Cell(38,6,'STATUS VERIFIKASI',1,1,'C');

        $pdf->SetFont('Times','',10);

        $no=1;

        $where = 'where status_medis = "Dokter"';
        $data_dokter = $this->admin_model->GetMedis($where)->result();

        foreach ($data_dokter as $row) {
            $cellWidth=50;//lebar sel
            $cellHeight=6; //tinggi sel satu baris normal
            
            //periksa apakah teksnya melibihi kolom?
            if($pdf->GetStringWidth($row->alamat_lengkap) < $cellWidth) {
                //jika tidak, maka tidak melakukan apa-apa
                $line=1;
            } 
            else {
                //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
                //dengan memisahkan teks agar sesuai dengan lebar sel
                //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel

                $textLength=strlen($row->alamat_lengkap);    //total panjang teks
                $errMargin=5;       //margin kesalahan lebar sel, untuk jaga-jaga
                $startChar=0;       //posisi awal karakter untuk setiap baris
                $maxChar=0;         //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
                $textArray=array(); //untuk menampung data untuk setiap baris
                $tmpString="";      //untuk menampung teks untuk setiap baris (sementara)

                while($startChar < $textLength) { //perulangan sampai akhir teks
                    //perulangan sampai karakter maksimum tercapai
                    while ($pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) && ($startChar+$maxChar) < $textLength ) {
                        $maxChar++;
                        $tmpString=substr($row->alamat_lengkap,$startChar,$maxChar);
                    }
                    //pindahkan ke baris berikutnya
                    $startChar=$startChar+$maxChar;
                    //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                    array_push($textArray,$tmpString);
                    //reset variabel penampung
                    $maxChar=0;
                    $tmpString='';
                        
                }
                //dapatkan jumlah baris
                $line=count($textArray);
            }

            // $pdf->SetFillColor(255,255,255);
            $pdf->Cell(8,($line * $cellHeight),$no,1,0,'C'); //sesuaikan ketinggian dengan jumlah garis
            $pdf->Cell(35,($line * $cellHeight),$row->username,1,0);
            $pdf->Cell(35,($line * $cellHeight),$row->nama_medis,1,0);
            $pdf->Cell(33,($line * $cellHeight),$row->jenis_kelamin,1,0);
            $pdf->Cell(40,($line * $cellHeight),$row->email,1,0);

            //memanfaatkan MultiCell sebagai ganti Cell
            //atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
            //ingat posisi x dan y sebelum menulis MultiCell
            $xPos=$pdf->GetX();
            $yPos=$pdf->GetY();

            $pdf->MultiCell(50,$cellHeight,$row->alamat_lengkap,1); 

            //kembalikan posisi untuk sel berikutnya di samping MultiCell 
            //dan offset x dengan lebar MultiCell
            $pdf->SetXY($xPos + $cellWidth , $yPos);

            $pdf->Cell(25,($line * $cellHeight),$row->no_hp,1,0);
            $pdf->Cell(17,($line * $cellHeight),$row->umur. " tahun",1,0);
            $pdf->Cell(32,($line * $cellHeight),$row->bagian_tugas,1,0);
            $pdf->Cell(38,($line * $cellHeight),$row->status_verifikasi,1,1);

            $no++;
        }

        $pdf->Output();
    }

    //PERAWAT
    public function perawat() {
        $where = 'where status_medis = "Perawat"';
        $data['data_perawat'] = $this->admin_model->GetMedis($where);

        $this->load->view('admin/medis/perawat/tabel', $data);
    }

    public function detail_perawat($id_medis) {
        $data['detail_perawat'] = $this->db->query("select * from medis where id_medis = $id_medis");
        $this->load->view('admin/medis/perawat/detail',$data);
    }

    public function verifikasi_perawat() {
        $id_medis = $_POST['id_medis'];
        $status_verifikasi = $_POST['status_verifikasi'];

        $data = array('id_medis' => $id_medis, 'status_verifikasi' => $status_verifikasi);
        $where = array('id_medis' => $id_medis);

        $res = $this->admin_model->UpdateData('medis', $data, $where);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/perawat');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Verifikasi Medis berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Verifikasi Medis tidak berhasil.
                </div>'); 
        }
    }

    public function edit_perawat($id_medis) { 
        $data['data_perawat'] = $this->db->query("select * from medis where id_medis = $id_medis");
        $this->load->view('admin/medis/perawat/edit',$data);
        
    }

    public function proses_edit_perawat() {
        $id_medis = $_POST['id_medis'];
        $nama_medis = $_POST['nama_medis'];
        $email = $_POST['email'];
        $alamat_lengkap = $_POST['alamat_lengkap'];
        $no_hp = $_POST['no_hp'];
        $umur = $_POST['umur'];

        $data = array('id_medis' => $id_medis, 'nama_medis' => $nama_medis, 'email' => $email, 'alamat_lengkap' => $alamat_lengkap, 'no_hp' => $no_hp, 'umur' => $umur);
        $where = array('id_medis' => $id_medis);
        $res = $this->admin_model->UpdateData('medis', $data, $where);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/perawat');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Edit Data Medis berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Edit Data Medis tidak berhasil.
                </div>'); 
        }
    }

    public function hapus_perawat($id_medis=null) {
        if (!isset($id_medis)) show_404(); 

        if ($this->medis_model->delete($id_medis)) {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data berhasil.
                </div>');
            redirect(site_url('admin/Home/perawat'));
        } 
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data tidak berhasil.
                </div>');
        }
    }

    public function excel_perawat() {
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excel = new PHPExcel();    

        $excel->getProperties()
                    ->setCreator('Arkamaya')     
                    ->setLastModifiedBy('Arkamaya')
                    ->setTitle("Data Medis Perawat")
                    ->setSubject("Perawat") 
                    ->setDescription("Laporan Data Medis Perawat")
                    ->setKeywords("Data Perawat");

        $style_col = array(
            'font' => array('bold' => true),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER), 
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
        );

        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER), 
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DATA MEDIS PERAWAT");  
        $excel->getActiveSheet()->mergeCells('A1:P1');    
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);   
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);  
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

        $excel->setActiveSheetIndex(0)->setCellValue('A2', "ARKAMAYA MEDICAL");
        $excel->getActiveSheet()->mergeCells('A2:P2');   
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);   
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(18);  
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

        $excel->setActiveSheetIndex(0)->setCellValue('A5', "NO");
        $excel->setActiveSheetIndex(0)->setCellValue('B5', "USERNAME"); 
        $excel->setActiveSheetIndex(0)->setCellValue('C5', "NAMA"); 
        $excel->setActiveSheetIndex(0)->setCellValue('D5', "JENIS KELAMIN"); 
        $excel->setActiveSheetIndex(0)->setCellValue('E5', "EMAIL"); 
        $excel->setActiveSheetIndex(0)->setCellValue('F5', "ALAMAT LENGKAP");
        $excel->setActiveSheetIndex(0)->setCellValue('G5', "NO HP");
        $excel->setActiveSheetIndex(0)->setCellValue('H5', "UMUR");
        $excel->setActiveSheetIndex(0)->setCellValue('I5', "FOTO");
        $excel->setActiveSheetIndex(0)->setCellValue('J5', "BAGIAN TUGAS");
        $excel->setActiveSheetIndex(0)->setCellValue('K5', "SIP");
        $excel->setActiveSheetIndex(0)->setCellValue('L5', "STR");
        $excel->setActiveSheetIndex(0)->setCellValue('M5', "STB");
        $excel->setActiveSheetIndex(0)->setCellValue('N5', "IJAZAH");
        $excel->setActiveSheetIndex(0)->setCellValue('O5', "KTP");
        $excel->setActiveSheetIndex(0)->setCellValue('P5', "STATUS VERIFIKASI");

        $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('N5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('O5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('P5')->applyFromArray($style_col);

        $where = 'where status_medis = "Perawat"';
        $data_perawat = $this->admin_model->GetMedis($where)->result();

        $no = 1; 
        $numrow = 6; 
        foreach($data_perawat as $data) {    
            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->username);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_medis);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jenis_kelamin);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->email);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->alamat_lengkap);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->no_hp);
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->umur. " tahun");
            $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->foto);
            $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->bagian_tugas);
            $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->sip);
            $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->str);
            $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->stb);
            $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->ijazah);
            $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->ktp);
            $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->status_verifikasi);

            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
            $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);

            $no++; 
            $numrow++; 
        }

        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(18);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(40);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(18);
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(23);

        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        $excel->getActiveSheet(0)->setTitle("Laporan Data Perawat");
        $excel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');    header('Content-Disposition: attachment; filename="Data Perawat.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    function pdf_perawat() {
        $pdf = new FPDF('L', 'mm','folio');

        $pdf->AddPage();

        $pdf->SetFont('Times','B',18);
        $pdf->Cell(330,7,'LAPORAN DATA MEDIS PERAWAT',0,1,'C');
        $pdf->Cell(330,7,'ARKAMAYA MEDICAL',0,1,'C');

        $pdf->SetLineWidth(1.2);
        $pdf->Line(10,27.10,320.5,27.10);

        $pdf->Cell(20,15,'',0,1);

        $pdf->SetLineWidth(0);
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'NO',1,0,'C');
        $pdf->Cell(35,6,'USERNAME',1,0,'C');
        $pdf->Cell(35,6,'NAMA',1,0,'C');
        $pdf->Cell(33,6,'JENIS KELAMIN',1,0,'C');
        $pdf->Cell(40,6,'EMAIL',1,0,'C');
        $pdf->Cell(50,6,'ALAMAT',1,0,'C');
        $pdf->Cell(25,6,'NO HP',1,0,'C');
        $pdf->Cell(17,6,'UMUR',1,0,'C');
        $pdf->Cell(32,6,'BAGIAN TUGAS',1,0,'C');
        $pdf->Cell(38,6,'STATUS VERIFIKASI',1,1,'C');

        $pdf->SetFont('Times','',10);

        $no=1;

        $where = 'where status_medis = "Perawat"';
        $data_perawat = $this->admin_model->GetMedis($where)->result();

        foreach ($data_perawat as $row) {
            $cellWidth=50;
            $cellHeight=6;
            
            if($pdf->GetStringWidth($row->alamat_lengkap) < $cellWidth) {
                $line=1;
            } 
            else {
                $textLength=strlen($row->alamat_lengkap);    
                $errMargin=5;
                $startChar=0;
                $maxChar=0;
                $textArray=array();
                $tmpString="";

                while($startChar < $textLength) { 

                    while ($pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) && ($startChar+$maxChar) < $textLength ) {
                        $maxChar++;
                        $tmpString=substr($row->alamat_lengkap,$startChar,$maxChar);
                    }

                    $startChar=$startChar+$maxChar;

                    array_push($textArray,$tmpString);

                    $maxChar=0;
                    $tmpString='';
                        
                }

                $line=count($textArray);
            }

            $pdf->Cell(8,($line * $cellHeight),$no,1,0,'C'); 
            $pdf->Cell(35,($line * $cellHeight),$row->username,1,0);
            $pdf->Cell(35,($line * $cellHeight),$row->nama_medis,1,0);
            $pdf->Cell(33,($line * $cellHeight),$row->jenis_kelamin,1,0);
            $pdf->Cell(40,($line * $cellHeight),$row->email,1,0);

            $xPos=$pdf->GetX();
            $yPos=$pdf->GetY();

            $pdf->MultiCell(50,$cellHeight,$row->alamat_lengkap,1); 

            $pdf->SetXY($xPos + $cellWidth , $yPos);

            $pdf->Cell(25,($line * $cellHeight),$row->no_hp,1,0);
            $pdf->Cell(17,($line * $cellHeight),$row->umur. " tahun",1,0);
            $pdf->Cell(32,($line * $cellHeight),$row->bagian_tugas,1,0);
            $pdf->Cell(38,($line * $cellHeight),$row->status_verifikasi,1,1);

            $no++;
        }

        $pdf->Output();
    }

    //BIDAN
    public function bidan() {
        $where = 'where status_medis = "Bidan"';
        $data['data_bidan'] = $this->admin_model->GetMedis($where);

        $this->load->view('admin/medis/bidan/tabel', $data);
    }

    public function detail_bidan($id_medis) {
        $data['detail_bidan'] = $this->db->query("select * from medis where id_medis = $id_medis");
        $this->load->view('admin/medis/bidan/detail',$data);
    }

    public function verifikasi_bidan() {
        $id_medis = $_POST['id_medis'];
        $status_verifikasi = $_POST['status_verifikasi'];

        $data = array('id_medis' => $id_medis, 'status_verifikasi' => $status_verifikasi);
        $where = array('id_medis' => $id_medis);

        $res = $this->admin_model->UpdateData('medis', $data, $where);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/bidan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Verifikasi Medis berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Verifikasi Medis tidak berhasil.
                </div>'); 
        }
    }

    public function edit_bidan($id_medis) { 
        $data['data_bidan'] = $this->db->query("select * from medis where id_medis = $id_medis");
        $this->load->view('admin/medis/bidan/edit',$data);
        
    }

    public function proses_edit_bidan() {
        $id_medis = $_POST['id_medis'];
        $nama_medis = $_POST['nama_medis'];
        $email = $_POST['email'];
        $alamat_lengkap = $_POST['alamat_lengkap'];
        $no_hp = $_POST['no_hp'];
        $umur = $_POST['umur'];

        $data = array('id_medis' => $id_medis, 'nama_medis' => $nama_medis, 'email' => $email, 'alamat_lengkap' => $alamat_lengkap, 'no_hp' => $no_hp, 'umur' => $umur);
        $where = array('id_medis' => $id_medis);
        $res = $this->admin_model->UpdateData('medis', $data, $where);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/bidan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Edit Data Medis berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Edit Data Medis tidak berhasil.
                </div>'); 
        }
    }

    public function hapus_bidan($id_medis=null) {
        if (!isset($id_medis)) show_404(); 

        if ($this->medis_model->delete($id_medis)) {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data Medis berhasil.
                </div>');
            redirect(site_url('admin/Home/bidan'));
        } 
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data Medis tidak berhasil.
                </div>');
        }
    }

    public function excel_bidan() {
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excel = new PHPExcel();    

        $excel->getProperties()
                    ->setCreator('Arkamaya')     
                    ->setLastModifiedBy('Arkamaya')
                    ->setTitle("Data Medis Bidan")
                    ->setSubject("Bidan") 
                    ->setDescription("Laporan Data Medis Bidan")
                    ->setKeywords("Data Bidan");

        $style_col = array(
            'font' => array('bold' => true),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER), 
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
        );

        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER), 
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DATA MEDIS BIDAN");
        $excel->getActiveSheet()->mergeCells('A1:P1');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $excel->setActiveSheetIndex(0)->setCellValue('A2', "ARKAMAYA MEDICAL");
        $excel->getActiveSheet()->mergeCells('A2:P2');   
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);   
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(18);  
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

        $excel->setActiveSheetIndex(0)->setCellValue('A5', "NO");
        $excel->setActiveSheetIndex(0)->setCellValue('B5', "USERNAME"); 
        $excel->setActiveSheetIndex(0)->setCellValue('C5', "NAMA"); 
        $excel->setActiveSheetIndex(0)->setCellValue('D5', "JENIS KELAMIN"); 
        $excel->setActiveSheetIndex(0)->setCellValue('E5', "EMAIL"); 
        $excel->setActiveSheetIndex(0)->setCellValue('F5', "ALAMAT LENGKAP");
        $excel->setActiveSheetIndex(0)->setCellValue('G5', "NO HP");
        $excel->setActiveSheetIndex(0)->setCellValue('H5', "UMUR");
        $excel->setActiveSheetIndex(0)->setCellValue('I5', "FOTO");
        $excel->setActiveSheetIndex(0)->setCellValue('J5', "BAGIAN TUGAS");
        $excel->setActiveSheetIndex(0)->setCellValue('K5', "SIP");
        $excel->setActiveSheetIndex(0)->setCellValue('L5', "STR");
        $excel->setActiveSheetIndex(0)->setCellValue('M5', "STB");
        $excel->setActiveSheetIndex(0)->setCellValue('N5', "IJAZAH");
        $excel->setActiveSheetIndex(0)->setCellValue('O5', "KTP");
        $excel->setActiveSheetIndex(0)->setCellValue('P5', "STATUS VERIFIKASI");

        $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('N5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('O5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('P5')->applyFromArray($style_col);

        $where = 'where status_medis = "Bidan"';
        $data_bidan = $this->admin_model->GetMedis($where)->result();

        $no = 1; 
        $numrow = 6;
        foreach($data_bidan as $data) {     
            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->username);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_medis);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jenis_kelamin);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->email);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->alamat_lengkap);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->no_hp);
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->umur. " tahun");
            $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->foto);
            $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->bagian_tugas);
            $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->sip);
            $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->str);
            $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->stb);
            $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->ijazah);
            $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->ktp);
            $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->status_verifikasi);

            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
            $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);

            $no++;
            $numrow++;
        }

        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(18);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(40);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(18);
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(23);

        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        $excel->getActiveSheet(0)->setTitle("Laporan Data Bidan");
        $excel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');    header('Content-Disposition: attachment; filename="Data Bidan.xlsx"');
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    function pdf_bidan() {
        $pdf = new FPDF('L', 'mm','folio');

        $pdf->AddPage();

        $pdf->SetFont('Times','B',18);
        $pdf->Cell(330,7,'LAPORAN DATA MEDIS BIDAN',0,1,'C');
        $pdf->Cell(330,7,'ARKAMAYA MEDICAL',0,1,'C');

        $pdf->SetLineWidth(1.2);
        $pdf->Line(10,27.10,320.5,27.10);

        $pdf->Cell(20,15,'',0,1);

        $pdf->SetLineWidth(0);
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'NO',1,0,'C');
        $pdf->Cell(35,6,'USERNAME',1,0,'C');
        $pdf->Cell(35,6,'NAMA',1,0,'C');
        $pdf->Cell(33,6,'JENIS KELAMIN',1,0,'C');
        $pdf->Cell(40,6,'EMAIL',1,0,'C');
        $pdf->Cell(50,6,'ALAMAT',1,0,'C');
        $pdf->Cell(25,6,'NO HP',1,0,'C');
        $pdf->Cell(17,6,'UMUR',1,0,'C');
        $pdf->Cell(32,6,'BAGIAN TUGAS',1,0,'C');
        $pdf->Cell(38,6,'STATUS VERIFIKASI',1,1,'C');

        $pdf->SetFont('Times','',10);

        $no=1;

        $where = 'where status_medis = "Bidan"';
        $data_bidan = $this->admin_model->GetMedis($where)->result();

        foreach ($data_bidan as $row) {
            $cellWidth=50;
            $cellHeight=6;
            
            if($pdf->GetStringWidth($row->alamat_lengkap) < $cellWidth) {
                $line=1;
            } 
            else {
                $textLength=strlen($row->alamat_lengkap);    
                $errMargin=5;
                $startChar=0;
                $maxChar=0;
                $textArray=array();
                $tmpString="";

                while($startChar < $textLength) { 

                    while ($pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) && ($startChar+$maxChar) < $textLength ) {
                        $maxChar++;
                        $tmpString=substr($row->alamat_lengkap,$startChar,$maxChar);
                    }

                    $startChar=$startChar+$maxChar;

                    array_push($textArray,$tmpString);

                    $maxChar=0;
                    $tmpString='';
                        
                }

                $line=count($textArray);
            }

            $pdf->Cell(8,($line * $cellHeight),$no,1,0,'C'); 
            $pdf->Cell(35,($line * $cellHeight),$row->username,1,0);
            $pdf->Cell(35,($line * $cellHeight),$row->nama_medis,1,0);
            $pdf->Cell(33,($line * $cellHeight),$row->jenis_kelamin,1,0);
            $pdf->Cell(40,($line * $cellHeight),$row->email,1,0);

            $xPos=$pdf->GetX();
            $yPos=$pdf->GetY();

            $pdf->MultiCell(50,$cellHeight,$row->alamat_lengkap,1); 

            $pdf->SetXY($xPos + $cellWidth , $yPos);

            $pdf->Cell(25,($line * $cellHeight),$row->no_hp,1,0);
            $pdf->Cell(17,($line * $cellHeight),$row->umur. " tahun",1,0);
            $pdf->Cell(32,($line * $cellHeight),$row->bagian_tugas,1,0);
            $pdf->Cell(38,($line * $cellHeight),$row->status_verifikasi,1,1);

            $no++;
        }

        $pdf->Output();
    }

    //PASIEN
    public function pasien() {
        $data['data_pasien'] = $this->admin_model->GetPasien();

        $this->load->view('admin/pasien/tabel', $data);
    }

    public function detail_pasien($id_pasien) {
        $data['detail_pasien'] = $this->db->query("select * from pasien where id_pasien = $id_pasien");
        $this->load->view('admin/pasien/detail',$data);
    }

    public function tambah_pasien() {
        $this->load->view('admin/pasien/tambah');
    }

    public function proses_tambah_pasien() {
        $pasien = $this->pasien_model;
        $validation = $this->form_validation;
        $validation->set_rules($pasien->rules_admin());

        if ($validation->run()) {
            $pasien->save_admin();
            header('location:'.base_url().'admin/Home/pasien');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Tambah Data Pasien berhasil.
                </div>'); 
        } 
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Tambah Data Pasien tidak berhasil.
                </div>'); 
        }

        // $this->load->view('admin/pasien/tambah');
    }

    public function edit_pasien($id_pasien) { 
        $data['data_pasien'] = $this->db->query("select * from pasien where id_pasien = $id_pasien");
        $this->load->view('admin/pasien/edit', $data);
        
    }

    public function proses_edit_pasien() {
        $id_pasien = $_POST['id_pasien'];
        $nama_pasien = $_POST['nama_pasien'];
        $email = $_POST['email'];
        $alamat_lengkap = $_POST['alamat_lengkap'];
        $no_hp = $_POST['no_hp'];
        $umur = $_POST['umur'];

        $data = array('id_pasien' => $id_pasien, 'nama_pasien' => $nama_pasien, 'email' => $email, 'alamat_lengkap' => $alamat_lengkap, 'no_hp' => $no_hp, 'umur' => $umur);
        $where = array('id_pasien' => $id_pasien);
        $res = $this->admin_model->UpdateData('pasien', $data, $where);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/pasien');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Edit Data Pasien berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Edit Data Pasien tidak berhasil.
                </div>'); 
        }
    }

    public function hapus_pasien($id_pasien=null) {
        if (!isset($id_pasien)) show_404(); 

        if ($this->pasien_model->delete($id_pasien)) {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data Pasien berhasil.
                </div>');
            redirect(site_url('admin/Home/pasien'));
        } 
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data Pasien tidak berhasil.
                </div>');
        }
    }

    public function excel_pasien() {
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excel = new PHPExcel();    

        $excel->getProperties()
                    ->setCreator('Arkamaya')     
                    ->setLastModifiedBy('Arkamaya')
                    ->setTitle("Data Pasien")
                    ->setSubject("Pasien") 
                    ->setDescription("Laporan Data Pasien")
                    ->setKeywords("Data Pasien");

        $style_col = array(
            'font' => array('bold' => true),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER), 
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
        );

        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER), 
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DATA PASIEN"); 
        $excel->getActiveSheet()->mergeCells('A1:I1');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $excel->setActiveSheetIndex(0)->setCellValue('A2', "ARKAMAYA MEDICAL");
        $excel->getActiveSheet()->mergeCells('A2:I2');   
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);   
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(18);  
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

        $excel->setActiveSheetIndex(0)->setCellValue('A5', "NO");
        $excel->setActiveSheetIndex(0)->setCellValue('B5', "USERNAME"); 
        $excel->setActiveSheetIndex(0)->setCellValue('C5', "NAMA"); 
        $excel->setActiveSheetIndex(0)->setCellValue('D5', "JENIS KELAMIN"); 
        $excel->setActiveSheetIndex(0)->setCellValue('E5', "EMAIL"); 
        $excel->setActiveSheetIndex(0)->setCellValue('F5', "ALAMAT LENGKAP");
        $excel->setActiveSheetIndex(0)->setCellValue('G5', "NO HP");
        $excel->setActiveSheetIndex(0)->setCellValue('H5', "UMUR");
        $excel->setActiveSheetIndex(0)->setCellValue('I5', "FOTO");

        $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col)->getAlignment()->setWrapText(true);
        $excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);

        $data_pasien = $this->admin_model->GetPasien()->result();

        $no = 1; 
        $numrow = 6; 
        foreach($data_pasien as $data) { 
            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->username);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_pasien);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jenis_kelamin);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->email);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->alamat_lengkap);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->no_hp);
            $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->umur. " tahun");
            $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->foto);
            
            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
            $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
            $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);

            $no++;
            $numrow++;
        }

        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(18);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(40);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(13);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);

        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        $excel->getActiveSheet(0)->setTitle("Laporan Data Pasien");
        $excel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');    header('Content-Disposition: attachment; filename="Data Pasien.xlsx"');
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    function pdf_pasien() {
        $pdf = new FPDF('L', 'mm','folio');

        $pdf->AddPage();

        $pdf->SetFont('Times','B',18);
        $pdf->Cell(330,7,'LAPORAN DATA MEDIS PASIEN',0,1,'C');
        $pdf->Cell(330,7,'ARKAMAYA MEDICAL',0,1,'C');

        $pdf->SetLineWidth(1.2);
        $pdf->Line(10,27.10,320.5,27.10);

        $pdf->Cell(20,15,'',0,1);

        $pdf->SetLineWidth(0);
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(10,6,'NO',1,0,'C');
        $pdf->Cell(40,6,'USERNAME',1,0,'C');
        $pdf->Cell(40,6,'NAMA',1,0,'C');
        $pdf->Cell(40,6,'JENIS KELAMIN',1,0,'C');
        $pdf->Cell(50,6,'EMAIL',1,0,'C');
        $pdf->Cell(70,6,'ALAMAT',1,0,'C');
        $pdf->Cell(35,6,'NO HP',1,0,'C');
        $pdf->Cell(25,6,'UMUR',1,1,'C');

        $pdf->SetFont('Times','',10);

        $no=1;

        $data_pasien = $this->admin_model->GetPasien()->result();

        foreach ($data_pasien as $row) {
            $cellWidth=70;
            $cellHeight=6;
            
            if($pdf->GetStringWidth($row->alamat_lengkap) < $cellWidth) {
                $line=1;
            } 
            else {
                $textLength=strlen($row->alamat_lengkap);    
                $errMargin=5;
                $startChar=0;
                $maxChar=0;
                $textArray=array();
                $tmpString="";

                while($startChar < $textLength) { 

                    while ($pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) && ($startChar+$maxChar) < $textLength ) {
                        $maxChar++;
                        $tmpString=substr($row->alamat_lengkap,$startChar,$maxChar);
                    }

                    $startChar=$startChar+$maxChar;

                    array_push($textArray,$tmpString);

                    $maxChar=0;
                    $tmpString='';
                        
                }

                $line=count($textArray);
            }

            $pdf->Cell(10,($line * $cellHeight),$no,1,0,'C'); 
            $pdf->Cell(40,($line * $cellHeight),$row->username,1,0);
            $pdf->Cell(40,($line * $cellHeight),$row->nama_pasien,1,0);
            $pdf->Cell(40,($line * $cellHeight),$row->jenis_kelamin,1,0);
            $pdf->Cell(50,($line * $cellHeight),$row->email,1,0);

            $xPos=$pdf->GetX();
            $yPos=$pdf->GetY();

            $pdf->MultiCell(70,$cellHeight,$row->alamat_lengkap,1); 

            $pdf->SetXY($xPos + $cellWidth , $yPos);

            $pdf->Cell(35,($line * $cellHeight),$row->no_hp,1,0);
            $pdf->Cell(25,($line * $cellHeight),$row->umur. " tahun",1,1);

            $no++;
        }

        $pdf->Output();
    }

    //OBAT
    public function obat() {
        $data['data_obat'] = $this->admin_model->GetObat();

        $this->load->view('admin/barang/obat/tabel', $data);
    }

    public function detail_obat($id_obat) {
        $data['detail_obat'] = $this->db->query("select * from obat where id_obat = $id_obat");
        $this->load->view('admin/barang/obat/detail',$data);
    }    

    public function tambah_obat() {
        $this->load->view('admin/barang/obat/tambah');
    }

    public function proses_tambah_obat() {
        $id_obat = $_POST['id_obat'];
        $nama_obat = $_POST['nama_obat'];
        $golongan = $_POST['golongan'];
        $kategori = $_POST['kategori'];
        $bentuk = $_POST['bentuk'];
        $manfaat = $_POST['manfaat'];
        $dikonsumsi_oleh = $_POST['dikonsumsi_oleh'];

        $data = array('id_obat' => $id_obat, 'nama_obat' => $nama_obat, 'golongan' => $golongan, 'kategori' => $kategori, 'bentuk' => $bentuk, 'manfaat' => $manfaat, 'dikonsumsi_oleh' => $dikonsumsi_oleh);
        $res = $this->admin_model->AddData('obat', $data);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/obat');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Tambah Data Obat berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Tambah Data Obat tidak berhasil.
                </div>'); 
        }
    }

    public function edit_obat($id_obat) { 
        $data['data_obat'] = $this->db->query("select * from obat where id_obat = $id_obat");
        $this->load->view('admin/barang/obat/edit', $data);
        
    }

    public function proses_edit_obat() {
        $id_obat = $_POST['id_obat'];
        $nama_obat = $_POST['nama_obat'];
        $golongan = $_POST['golongan'];
        $kategori = $_POST['kategori'];
        $bentuk = $_POST['bentuk'];
        $manfaat = $_POST['manfaat'];
        $dikonsumsi_oleh = $_POST['dikonsumsi_oleh'];

        $data = array('id_obat' => $id_obat, 'nama_obat' => $nama_obat, 'golongan' => $golongan, 'kategori' => $kategori, 'bentuk' => $bentuk, 'manfaat' => $manfaat, 'dikonsumsi_oleh' => $dikonsumsi_oleh);
        $where = array('id_obat' => $id_obat);
        $res = $this->admin_model->UpdateData('obat', $data, $where);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/obat');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Edit Data Obat berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Edit Data Obat tidak berhasil.
                </div>'); 
        }
    }

    public function hapus_obat($id_obat) {
        $where = array('id_obat' => $id_obat);
        $res = $this->admin_model->DeleteData('obat',$where);

        if($res >= 1) {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data Obat berhasil.
                </div>'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Hapus Data Obat tidak berhasil.
                </div>');  
        }
    }

    public function excel_obat() {
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excel = new PHPExcel();    

        $excel->getProperties()
                    ->setCreator('Arkamaya')     
                    ->setLastModifiedBy('Arkamaya')
                    ->setTitle("Data Obat")
                    ->setSubject("Obat") 
                    ->setDescription("Laporan Data Obat")
                    ->setKeywords("Data Obat");

        $style_col = array(
            'font' => array('bold' => true),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER), 
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
        );

        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER), 
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DATA OBAT"); 
        $excel->getActiveSheet()->mergeCells('A1:G1');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $excel->setActiveSheetIndex(0)->setCellValue('A2', "ARKAMAYA MEDICAL");
        $excel->getActiveSheet()->mergeCells('A2:G2');   
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);   
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(18);  
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

        $excel->setActiveSheetIndex(0)->setCellValue('A5', "NO");
        $excel->setActiveSheetIndex(0)->setCellValue('B5', "NAMA"); 
        $excel->setActiveSheetIndex(0)->setCellValue('C5', "GOLONGAN"); 
        $excel->setActiveSheetIndex(0)->setCellValue('D5', "KATEGORI"); 
        $excel->setActiveSheetIndex(0)->setCellValue('E5', "BENTUK"); 
        $excel->setActiveSheetIndex(0)->setCellValue('F5', "MANFAAT");
        $excel->setActiveSheetIndex(0)->setCellValue('G5', "DIKONSUMSI OLEH");

        $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);

        $data_obat = $this->admin_model->GetObat()->result();

        $no = 1; 
        $numrow = 6; 
        foreach($data_obat as $data) { 
            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_obat);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->golongan);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->kategori);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->bentuk);
            $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->manfaat);
            $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->dikonsumsi_oleh);
            
            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
            $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
            $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);
            $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row)->getAlignment()->setWrapText(true);

            $no++;
            $numrow++;
        }

        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(18);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(18);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(27);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        $excel->getActiveSheet(0)->setTitle("Laporan Data Obat");
        $excel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');    header('Content-Disposition: attachment; filename="Data Obat.xlsx"');
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    //LAYANAN
    public function layanan() {
        $data['data_layanan'] = $this->admin_model->GetLayanan();

        $this->load->view('admin/barang/layanan/tabel', $data);
    }

    public function tambah_layanan() {
        $this->load->view('admin/barang/layanan/tambah');
    }

    public function proses_tambah_layanan() {
        $id_layanan = $_POST['id_layanan'];
        $nama_layanan = $_POST['nama_layanan'];
        $kategori = $_POST['kategori'];

        $data = array('id_layanan' => $id_layanan, 'nama_layanan' => $nama_layanan, 'kategori' => $kategori);
        $res = $this->admin_model->AddData('layanan', $data);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/layanan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Tambah Data Layanan berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Tambah Data Layanan tidak berhasil.
                </div>'); 
        }
    }

    public function edit_layanan($id_layanan) { 
        $data['data_layanan'] = $this->db->query("select * from layanan where id_layanan = $id_layanan");
        $this->load->view('admin/barang/layanan/edit', $data);
        
    }

    public function proses_edit_layanan() {
        $id_layanan = $_POST['id_layanan'];
        $nama_layanan = $_POST['nama_layanan'];
        $kategori = $_POST['kategori'];

        $data = array('id_layanan' => $id_layanan, 'nama_layanan' => $nama_layanan, 'kategori' => $kategori);
        $where = array('id_layanan' => $id_layanan);
        $res = $this->admin_model->UpdateData('layanan', $data, $where);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/layanan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Edit Data Layanan berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Edit Data Layanan tidak berhasil.
                </div>'); 
        }
    }

    public function hapus_layanan($id_layanan) {
        $where = array('id_layanan' => $id_layanan);
        $res = $this->admin_model->DeleteData('layanan',$where);

        if($res >= 1) {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data Layanan berhasil.
                </div>'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Hapus Data Layanan tidak berhasil.
                </div>');  
        }
    }

    public function excel_layanan() {
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        $excel = new PHPExcel();    

        $excel->getProperties()
                    ->setCreator('Arkamaya')     
                    ->setLastModifiedBy('Arkamaya')
                    ->setTitle("Data Layanan")
                    ->setSubject("Layanan") 
                    ->setDescription("Laporan Data Layanan")
                    ->setKeywords("Data Layanan");

        $style_col = array(
            'font' => array('bold' => true),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER), 
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
        );

        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER), 
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DATA LAYANAN"); 
        $excel->getActiveSheet()->mergeCells('A1:C1');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $excel->setActiveSheetIndex(0)->setCellValue('A2', "ARKAMAYA MEDICAL");
        $excel->getActiveSheet()->mergeCells('A2:C2');   
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE);   
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(18);  
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

        $excel->setActiveSheetIndex(0)->setCellValue('A5', "NO");
        $excel->setActiveSheetIndex(0)->setCellValue('B5', "NAMA"); 
        $excel->setActiveSheetIndex(0)->setCellValue('C5', "KATEGORI"); 

        $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);

        $data_layanan = $this->admin_model->GetLayanan()->result();

        $no = 1; 
        $numrow = 6; 
        foreach($data_layanan as $data) { 
            $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_layanan);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->kategori);
            
            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
            
            $no++;
            $numrow++;
        }

        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);

        $excel->getActiveSheet(0)->setTitle("Laporan Data Layanan");
        $excel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');    header('Content-Disposition: attachment; filename="Data Layanan.xlsx"');
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    //TRANSAKSI
    public function transaksi()
    {
        $data['data_transaksi'] = $this->admin_model->GetTransaksi();
    
        $this->load->view('admin/transaksi/tabel',$data);
    }

    public function detail_transaksi($id_transaksi) {
        $data['detail_transaksi'] = $this->db->query("select * from transaksi join pasien on transaksi.id_pasien=pasien.id_pasien join medis on transaksi.id_medis=medis.id_medis join obat on transaksi.id_obat_1=obat.id_obat join layanan on transaksi.id_layanan_1=layanan.id_layanan where id_transaksi = $id_transaksi");
        $data['obat2'] = $this->db->query("select * from transaksi join obat on transaksi.id_obat_2=obat.id_obat where id_transaksi = $id_transaksi");
        $data['obat3'] = $this->db->query("select * from transaksi join obat on transaksi.id_obat_3=obat.id_obat where id_transaksi = $id_transaksi");
        $data['obat4'] = $this->db->query("select * from transaksi join obat on transaksi.id_obat_4=obat.id_obat where id_transaksi = $id_transaksi");
        $data['obat5'] = $this->db->query("select * from transaksi join obat on transaksi.id_obat_5=obat.id_obat where id_transaksi = $id_transaksi");
        $data['layanan2'] = $this->db->query("select * from transaksi join layanan on transaksi.id_layanan_2=layanan.id_layanan where id_transaksi = $id_transaksi");

        $this->load->view('admin/transaksi/detail',$data);
    } 

    public function status_transaksi() {
        $id_transaksi = $_POST['id_transaksi'];
        $status_transaksi = $_POST['status_transaksi'];

        $data = array('id_transaksi' => $id_transaksi, 'status_transaksi' => $status_transaksi);
        $where = array('id_transaksi' => $id_transaksi);

        $res = $this->admin_model->UpdateData('transaksi', $data, $where);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/transaksi');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Status Transaksi berhasil diubah.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Status Transaksi tidak diubah.
                </div>'); 
        }
    }

    public function cari_transaksi() {
        $status_transaksi=$this->input->get('status_transaksi');

        // if ($status_transaksi=='') {
        //     $data['data_transaksi'] = $this->admin_model->GetTransaksi();
        // }

        $data['data_transaksi'] = $this->admin_model->cari_transaksi($status_transaksi);
        $this->load->view('admin/transaksi/tabel', $data);
    }

    public function tambah_transaksi() {
        $data['pasien'] = $this->admin_model->pasien();
        $data['medis'] = $this->admin_model->medis();
        $data['obat1'] = $this->admin_model->obat();
        $data['obat2'] = $this->admin_model->obat();
        $data['obat3'] = $this->admin_model->obat();
        $data['obat4'] = $this->admin_model->obat();
        $data['obat5'] = $this->admin_model->obat();
        $data['layanan1'] = $this->admin_model->layanan();
        $data['layanan2'] = $this->admin_model->layanan();

        $this->load->view('admin/transaksi/tambah', $data);
    }

    public function proses_tambah_transaksi() {
        $data['pasien'] = $this->admin_model->pasien();
        $data['medis'] = $this->admin_model->medis();
        $data['obat1'] = $this->admin_model->obat();
        $data['obat2'] = $this->admin_model->obat();
        $data['obat3'] = $this->admin_model->obat();
        $data['obat4'] = $this->admin_model->obat();
        $data['obat5'] = $this->admin_model->obat();
        $data['layanan1'] = $this->admin_model->layanan();
        $data['layanan2'] = $this->admin_model->layanan();

        $id_transaksi = $_POST['id_transaksi'];
        $id_pasien = $_POST['pasien'];
        $id_medis = $_POST['medis'];
        $id_obat_1 = $_POST['obat1'];
        $id_obat_2 = $_POST['obat2'];
        $id_obat_3 = $_POST['obat3'];
        $id_obat_4 = $_POST['obat4'];
        $id_obat_5 = $_POST['obat5'];
        $id_layanan_1 = $_POST['layanan1'];
        $id_layanan_2 = $_POST['layanan2'];
        $desk_gejala = $_POST['desk_gejala'];
        $jumlah_obat_1 = $_POST['jumlah_obat_1'];
        $jumlah_obat_2 = $_POST['jumlah_obat_2'];
        $jumlah_obat_3 = $_POST['jumlah_obat_3'];
        $jumlah_obat_4 = $_POST['jumlah_obat_4'];
        $jumlah_obat_5 = $_POST['jumlah_obat_5'];
        $total_obat = $_POST['total_obat'];
        $harga_layanan_1 = $_POST['harga_layanan_1'];
        $harga_layanan_2 = $_POST['harga_layanan_2'];
        $total_layanan = $harga_layanan_1+$harga_layanan_2;
        $harga_medis = $_POST['harga_medis'];
        $total_bayar = $total_obat+$total_layanan+$harga_medis;
        $status_transaksi = $_POST['status_transaksi'];

        $data = array('id_transaksi' => $id_transaksi, 'id_pasien' => $id_pasien, 'id_medis' => $id_medis, 'id_obat_1' => $id_obat_1, 'id_obat_2' => $id_obat_2, 'id_obat_3' => $id_obat_3, 'id_obat_4' => $id_obat_4, 'id_obat_5' => $id_obat_5, 'id_layanan_1' => $id_layanan_1, 'id_layanan_2' => $id_layanan_2, 'desk_gejala' => $desk_gejala, 'jumlah_obat_1' => $jumlah_obat_1, 'jumlah_obat_2' => $jumlah_obat_2, 'jumlah_obat_3' => $jumlah_obat_3, 'jumlah_obat_4' => $jumlah_obat_4, 'jumlah_obat_5' => $jumlah_obat_5, 'total_obat' => $total_obat, 'harga_layanan_1' => $harga_layanan_1, 'harga_layanan_2' => $harga_layanan_2, 'total_layanan' => $total_layanan, 'harga_medis' => $harga_medis, 'total_bayar' => $total_bayar, 'status_transaksi' => $status_transaksi);
        $res = $this->admin_model->AddData('transaksi', $data);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/transaksi');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Tambah Data Transaksi berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Tambah Data Transaksi tidak berhasil.
                </div>'); 
        }
    }

    public function edit_transaksi($id_transaksi) {
        $data['data_transaksi'] = $this->db->query("select * from transaksi join pasien on transaksi.id_pasien=pasien.id_pasien join medis on transaksi.id_medis=medis.id_medis join obat on transaksi.id_obat_1=obat.id_obat join layanan on transaksi.id_layanan_1=layanan.id_layanan where id_transaksi = $id_transaksi");
        $data['obat2'] = $this->db->query("select * from transaksi join obat on transaksi.id_obat_2=obat.id_obat where id_transaksi = $id_transaksi");
        $data['obat3'] = $this->db->query("select * from transaksi join obat on transaksi.id_obat_3=obat.id_obat where id_transaksi = $id_transaksi");
        $data['obat4'] = $this->db->query("select * from transaksi join obat on transaksi.id_obat_4=obat.id_obat where id_transaksi = $id_transaksi");
        $data['obat5'] = $this->db->query("select * from transaksi join obat on transaksi.id_obat_5=obat.id_obat where id_transaksi = $id_transaksi");
        $data['layanan2'] = $this->db->query("select * from transaksi join layanan on transaksi.id_layanan_2=layanan.id_layanan where id_transaksi = $id_transaksi");

        $this->load->view('admin/transaksi/edit', $data);
    }
    
    public function proses_edit_transaksi() {
        $id_transaksi = $_POST['id_transaksi'];
        $desk_gejala = $_POST['desk_gejala'];
        $jumlah_obat_1 = $_POST['jumlah_obat_1'];
        $jumlah_obat_2 = $_POST['jumlah_obat_2'];
        $jumlah_obat_3 = $_POST['jumlah_obat_3'];
        $jumlah_obat_4 = $_POST['jumlah_obat_4'];
        $jumlah_obat_5 = $_POST['jumlah_obat_5'];
        $total_obat = $_POST['total_obat'];
        $harga_layanan_1 = $_POST['harga_layanan_1'];
        $harga_layanan_2 = $_POST['harga_layanan_2'];
        $total_layanan = $harga_layanan_1+$harga_layanan_2;
        $harga_medis = $_POST['harga_medis'];
        $total_bayar = $total_obat+$total_layanan+$harga_medis;

        $data = array('id_transaksi' => $id_transaksi, 'desk_gejala' => $desk_gejala, 'jumlah_obat_1' => $jumlah_obat_1, 'jumlah_obat_2' => $jumlah_obat_2, 'jumlah_obat_3' => $jumlah_obat_3, 'jumlah_obat_4' => $jumlah_obat_4, 'jumlah_obat_5' => $jumlah_obat_5, 'total_obat' => $total_obat, 'harga_layanan_1' => $harga_layanan_1, 'harga_layanan_2' => $harga_layanan_2, 'total_layanan' => $total_layanan, 'harga_medis' => $harga_medis, 'total_bayar' => $total_bayar);
        $where = array('id_transaksi' => $id_transaksi);
        $res = $this->admin_model->UpdateData('transaksi', $data, $where);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/transaksi');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Edit Data Transaksi berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Edit Data Transaksi tidak berhasil.
                </div>'); 
        }
    }

    public function hapus_transaksi($id_transaksi) {
        $where = array('id_transaksi' => $id_transaksi);
        $res = $this->admin_model->DeleteData('transaksi',$where);

        if($res >= 1) {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data Transaksi berhasil.
                </div>'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Hapus Data Transaksi tidak berhasil.
                </div>');  
        }
    }

    //FASILITAS
    public function fasilitas() {
        $data["data_fasilitas"] = $this->fasilitas_model->getAll();
        $this->load->view("admin/fasilitas/tabel", $data);
    }

    public function tambah_fasilitas() {
        $this->load->view('admin/fasilitas/tambah');
    }

    public function proses_tambah_fasilitas() {
        $fasilitas = $this->fasilitas_model;
        $validation = $this->form_validation;
        $validation->set_rules($fasilitas->rules());

        if ($validation->run()) {
            $fasilitas->save();
            header('location:'.base_url().'admin/Home/fasilitas');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Tambah Data Fasilitas berhasil.
                </div>'); 
        } 
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Tambah Data Fasilitas tidak berhasil.
                </div>'); 
        }
    }

    public function edit_fasilitas($id_fasilitas) { 
        if (!isset($id_fasilitas)) redirect('admin/Home/fasilitas');
       
        $fasilitas = $this->fasilitas_model;
        $validation = $this->form_validation;
        $validation->set_rules($fasilitas->rules());

        if ($validation->run()) {
            $fasilitas->update();
            header('location:'.base_url().'admin/Home/fasilitas');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Edit Data Fasilitas berhasil.
                </div>'); 
        }
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Edit Data Fasilitas tidak berhasil.
                </div>'); 
        }

        $data["fasilitas"] = $fasilitas->getById($id_fasilitas);
        if (!$data["fasilitas"]) show_404();
        
        $this->load->view("admin/fasilitas/edit", $data);
    }

    public function hapus_fasilitas($id_fasilitas=null) {
        if (!isset($id_fasilitas)) show_404(); 

        if ($this->fasilitas_model->delete($id_fasilitas)) {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data Fasilitas berhasil.
                </div>');
            redirect(site_url('admin/Home/fasilitas'));
        } 
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data F tidak berhasil.
                </div>');
        }
    }

    //Artikel
    public function artikel() {
        $data["data_artikel"] = $this->artikel_model->getAll();
        $this->load->view("admin/artikel/tabel", $data);
    }

    public function detail_artikel($id_artikel) {
        $data['detail_artikel'] = $this->db->query("select * from artikel where id_artikel = $id_artikel");
        $this->load->view('admin/artikel/detail',$data);
    }

    public function tambah_artikel() {
        $this->load->view('admin/artikel/tambah');
    }

    public function proses_tambah_artikel() {
        $artikel = $this->artikel_model;
        $validation = $this->form_validation;
        $validation->set_rules($artikel->rules());

        if ($validation->run()) {
            $artikel->save();
            header('location:'.base_url().'admin/Home/artikel');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Tambah Data Artikel berhasil.
                </div>'); 
        } 
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Tambah Data Artikel tidak berhasil.
                </div>'); 
        }
    }

    public function edit_artikel($id_artikel) { 
        if (!isset($id_artikel)) redirect('admin/Home/artikel');
       
        $artikel = $this->artikel_model;
        $validation = $this->form_validation;
        $validation->set_rules($artikel->rules());

        if ($validation->run()) {
            $artikel->update();
            header('location:'.base_url().'admin/Home/artikel');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Edit Data Artikel berhasil.
                </div>'); 
        }
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Edit Data Artikel tidak berhasil.
                </div>'); 
        }

        $data["artikel"] = $artikel->getById($id_artikel);
        if (!$data["artikel"]) show_404();
        
        $this->load->view("admin/artikel/edit", $data);
    }

    public function hapus_artikel($id_artikel=null) {
        if (!isset($id_artikel)) show_404(); 

        if ($this->artikel_model->delete($id_artikel)) {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data Artikel berhasil.
                </div>');
            redirect(site_url('admin/Home/artikel'));
        } 
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data Artikel tidak berhasil.
                </div>');
        }
    }

    //BANNER
    public function banner() {
        $data['data_banner'] = $this->admin_model->GetBanner();

        $this->load->view('admin/banner/tabel', $data);
    }

    public function tambah_banner() {
        $this->load->view('admin/banner/tambah');
    }

    public function proses_tambah_banner() {
        $id_banner = $_POST['id_banner'];
        $judul_banner = $_POST['judul_banner'];
        $deskripsi = $_POST['deskripsi'];

        $data = array('id_banner' => $id_banner, 'judul_banner' => $judul_banner, 'deskripsi' => $deskripsi);
        $res = $this->admin_model->AddData('banner', $data);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/banner');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Tambah Data Banner berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Tambah Data Banner tidak berhasil.
                </div>'); 
        }
    }

    public function edit_banner($id_banner) { 
        $data['data_banner'] = $this->db->query("select * from banner where id_banner = $id_banner");
        $this->load->view('admin/banner/edit', $data);
        
    }

    public function proses_edit_banner() {
        $id_banner = $_POST['id_banner'];
        $judul_banner = $_POST['judul_banner'];
        $deskripsi = $_POST['deskripsi'];

        $data = array('id_banner' => $id_banner, 'judul_banner' => $judul_banner, 'deskripsi' => $deskripsi);
        $where = array('id_banner' => $id_banner);
        $res = $this->admin_model->UpdateData('banner', $data, $where);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/banner');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Edit Data Banner berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Edit Data Banner tidak berhasil.
                </div>'); 
        }
    }

    public function hapus_banner($id_banner) {
        $where = array('id_banner' => $id_banner);
        $res = $this->admin_model->DeleteData('banner',$where);

        if($res >= 1) {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data Banner berhasil.
                </div>'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Hapus Data Banner tidak berhasil.
                </div>');  
        }
    }
    
    //PERUSAHAAN
    public function perusahaan() {
        $data['data_perusahaan'] = $this->admin_model->GetPerusahaan();

        $this->load->view('admin/perusahaan/tabel', $data);
    }

    public function detail_perusahaan($id_perusahaan) {
        $data['detail_perusahaan'] = $this->db->query("select * from perusahaan where id_perusahaan = $id_perusahaan");
        $this->load->view('admin/perusahaan/detail',$data);
    }   

    public function tambah_perusahaan() {
        $this->load->view('admin/perusahaan/tambah');
    } 

    public function proses_tambah_perusahaan() {
        $id_perusahaan = $_POST['id_perusahaan'];
        $nama_perusahaan = $_POST['nama_perusahaan'];
        $deskripsi = $_POST['deskripsi'];
        $jadwal = $_POST['jadwal'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $twitter = $_POST['twitter'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];

        $data = array('id_perusahaan' => $id_perusahaan, 'nama_perusahaan' => $nama_perusahaan, 'deskripsi' => $deskripsi, 'jadwal' => $jadwal, 'no_hp' => $no_hp, 'email' => $email, 'alamat' => $alamat, 'twitter' => $twitter, 'facebook' => $facebook, 'instagram' => $instagram);
        $res = $this->admin_model->AddData('perusahaan', $data);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/perusahaan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Tambah Data Perusahaan berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Tambah Data Perusahaan tidak berhasil.
                </div>'); 
        }
    }

    public function edit_perusahaan($id_perusahaan) { 
        $data['data_perusahaan'] = $this->db->query("select * from perusahaan where id_perusahaan = $id_perusahaan");
        $this->load->view('admin/perusahaan/edit', $data);
        
    }

    public function proses_edit_perusahaan() {
        $id_perusahaan = $_POST['id_perusahaan'];
        $nama_perusahaan = $_POST['nama_perusahaan'];
        $deskripsi = $_POST['deskripsi'];
        $jadwal = $_POST['jadwal'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $twitter = $_POST['twitter'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];

        $data = array('id_perusahaan' => $id_perusahaan, 'nama_perusahaan' => $nama_perusahaan, 'deskripsi' => $deskripsi, 'jadwal' => $jadwal, 'no_hp' => $no_hp, 'email' => $email, 'alamat' => $alamat, 'twitter' => $twitter, 'facebook' => $facebook, 'instagram' => $instagram);
        $where = array('id_perusahaan' => $id_perusahaan);
        $res = $this->admin_model->UpdateData('perusahaan', $data, $where);

        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/perusahaan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Edit Data Perusahaan berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Edit Data Perusahaan tidak berhasil.
                </div>'); 
        }
    }

    public function hapus_perusahaan($id_perusahaan) {
        $where = array('id_perusahaan' => $id_perusahaan);
        $res = $this->admin_model->DeleteData('perusahaan',$where);

        if($res >= 1) {
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Hapus Data Perusahaan berhasil.
                </div>'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Hapus Data Perusahaan tidak berhasil.
                </div>');  
        }
    }

    public function profil() {
        $id_admin = $this->session->userdata['id_admin'];
        $data['profil_admin'] = $this->db->query("select * from admin where id_admin = $id_admin");
        $this->load->view('admin/profil',$data);
    }

    public function edit_profil() {
        $id_admin = $_POST['id_admin'];       
        $username = $_POST['username'];
        $nama_admin = $_POST['nama_admin'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $email = $_POST['email'];       
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];

        if (!empty($_FILES["foto"]["name"])) {
            $foto = $this->admin_model->_uploadFoto();
        } 
        else {
            $foto = $_POST['old_image'];
        }
        
        $data = array('id_admin' => $id_admin, 'username' => $username, 'nama_admin' => $nama_admin, 'jenis_kelamin' => $jenis_kelamin, 'email' => $email, 'alamat' => $alamat, 'no_hp' => $no_hp, 'foto' => $foto);
        $where = array('id_admin'=> $id_admin);

        $res=$this->admin_model->UpdateData('admin',$data,$where);
        
        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/profil');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Edit Profil berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Edit Profil tidak berhasil.
                </div>'); 
        }
    }

    //UBAH PASSWORD
    function ubah_password() 
    {
        $this->load->view('admin/ubah_password');
    }
    
    function proses_ubah_password()
    {
        $id_admin = $this->session->userdata['id_admin'];
        $password = md5($_POST['password']);
        
        $data = array('password' => $password);
        $where = array('id_admin' => $id_admin);
        print_r($data);
        
        $res = $this->admin_model->UpdateData('admin',$data,$where);
        
        if ($res >= 1) {
            header('location:'.base_url().'admin/Home/ubah_password');
            $this->session->set_flashdata('pesan','<div class="alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>
                Ubah Password berhasil.
                </div>'); 
            
        } else {
            $this->session->set_flashdata('pesan','<div class="alert alert-warning"> 
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-bell"></i>
                Ubah Password tidak berhasil.
                </div>'); 
        }
    }
}