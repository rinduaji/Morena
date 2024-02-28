<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportKandidat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->library(array('excel','session'));
        $this->load->model('m_import_excel');
    }

    public function index()
    {
        $this->load->helper('url');
		
        $this->load->view('navbar');
        $this->load->view('import_kandidat_view');

        // $data = array(
		// 	'list_data'	=> $this->ImportModel->getData()
		// );
		// $this->load->view('import_excel.php',$data);
    }

	public function import_excel(){
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();	
				for($row=2; $row<=$highestRow; $row++)
				{
					$nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$area = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$treg = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$alamat = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$kelurahan = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$kecamatan = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$kota = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$propinsi = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$project = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$layanan = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$loker = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$kota_lahir = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$tgl_lahir = date('Y-m-d', strtotime($worksheet->getCellByColumnAndRow(13, $row)->getValue()));
					$no_hp1 = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
					$no_hp2 = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
					$email = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
					$no_ktp = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
					$status_nikah = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
					$pendidikan = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
					$jurusan = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
					$nama_sekolah = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
					$th_lulus = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
					$jenis_kelamin = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
					$agama = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
					$rencana_posisi = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
					$pengalaman_kerja = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
					$vaksin1 = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
					$vaksin2 = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
					$booster = $worksheet->getCellByColumnAndRow(29, $row)->getValue();
					// $batch = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
					$status = "kandidat";
					$tgl_input = date("Y-m-d");
					$temp_data[] = array(
						'nama'	=> $nama,
						'area'	=> $area,
						'treg'	=> $treg,
						'alamat'	=> $alamat,
						'kelurahan'	=> $kelurahan,
						'kecamatan'	=> $kecamatan,
						'kota'	=> $kota,
						'propinsi'	=> $propinsi,
						'project'	=> $project,
						'layanan'	=> $layanan,
						'loker'	=> $loker,
						'kota_lahir'	=> $kota_lahir,
						'tgl_lahir'	=> $tgl_lahir,
						'no_hp1'	=> $no_hp1,
						'no_hp2'	=> $no_hp2,
						'email'	=> $email,
						'no_ktp'	=> $no_ktp,
						'status_nikah'	=> $status_nikah,
						'pendidikan'	=> $pendidikan,
						'jurusan'	=> $jurusan,
						'nama_sekolah'	=> $nama_sekolah,
						'th_lulus'	=> $th_lulus,
						'jenis_kelamin'	=> $jenis_kelamin,
						'agama'	=> $agama,
						'status'	=> $status,
						'tgl_input'	=> $tgl_input,
						'rencana_posisi'	=> $rencana_posisi,
						'pengalaman_kerja'	=> $pengalaman_kerja,
						'vaksin1'	=> $vaksin1,
						'vaksin2'	=> $vaksin2,
						'booster'	=> $booster,
					); 	
				}
			}
			// $this->load->model('ImportModel');
			$insert = $this->m_import_excel->insert($temp_data);
			if($insert){
				$this->session->set_flashdata('status', '
				<div class="btn btn-success">
					Data Berhasil di Import ke Database
				</div>');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('status', '
				<div class="btn btn-danger">
					Terjadi Kesalahan
				</div>');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
	}
 
}