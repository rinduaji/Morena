<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_kandidat');
    }

    public function index()
    {
        $this->load->helper('url');
        
        $this->load->view('navbar');
        $this->load->view('kandidat_view');
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->m_kandidat->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $m_kandidat) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $m_kandidat->nama;
            $row[] = $m_kandidat->area;
            $row[] = $m_kandidat->treg;
            $row[] = $m_kandidat->alamat;
            $row[] = $m_kandidat->kelurahan;
            $row[] = $m_kandidat->kecamatan;
            $row[] = $m_kandidat->kota;
            $row[] = $m_kandidat->propinsi;
            $row[] = $m_kandidat->project;
            $row[] = $m_kandidat->layanan;
            $row[] = $m_kandidat->loker;
            $row[] = $m_kandidat->kota_lahir;
            $row[] = $m_kandidat->tgl_lahir;
            $row[] = $m_kandidat->no_hp1;
            $row[] = $m_kandidat->no_hp2;
            $row[] = $m_kandidat->email;
            $row[] = $m_kandidat->no_ktp;
            $row[] = $m_kandidat->status_nikah;
            $row[] = $m_kandidat->pendidikan;
            $row[] = $m_kandidat->jurusan;
            $row[] = $m_kandidat->nama_sekolah;
            $row[] = $m_kandidat->th_lulus;
            $row[] = $m_kandidat->jenis_kelamin;
            $row[] = $m_kandidat->agama;
            $row[] = $m_kandidat->status;
            $row[] = $m_kandidat->tgl_input;
            $row[] = $m_kandidat->rencana_posisi;
            $row[] = $m_kandidat->pengalaman_kerja;
            $row[] = $m_kandidat->vaksin1;
            $row[] = $m_kandidat->vaksin2;
            $row[] = $m_kandidat->booster;
            // if($m_kandidat->photo)
            //     $row[] = '<a href="'.base_url('upload/'.$m_kandidat->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_kandidat->photo).'" class="img-responsive" /></a>';
            // else
            //     $row[] = '(No photo)';
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kandidat('."'".$m_kandidat->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            if($_SESSION['jabatan'] == 'DUKTEK') {
            $row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kandidat('."'".$m_kandidat->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            }
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_kandidat->count_all(),
                        "recordsFiltered" => $this->m_kandidat->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->m_kandidat->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
         
        $data = array(
                'nama' => $this->input->post('nama'),
                'area' => $this->input->post('area'),
                'treg' => $this->input->post('treg'),
                'alamat' => $this->input->post('alamat'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kota' => $this->input->post('kota'),
                'propinsi' => $this->input->post('propinsi'),
                'project' => $this->input->post('project'),
                'layanan' => $this->input->post('layanan'),
                'loker' => $this->input->post('loker'),
                'kota_lahir' => $this->input->post('kota_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'no_hp1' => $this->input->post('no_hp1'),
                'no_hp2' => $this->input->post('no_hp2'),
                'email' => $this->input->post('email'),
                'no_ktp' => $this->input->post('no_ktp'),
                'status_nikah' => $this->input->post('status_nikah'),
                'pendidikan' => $this->input->post('pendidikan'),
                'jurusan' => $this->input->post('jurusan'),
                'nama_sekolah' => $this->input->post('nama_sekolah'),
                'th_lulus' => $this->input->post('th_lulus'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'agama' => $this->input->post('agama'),
                'status' => $this->input->post('status'),
                'tgl_input' => $this->input->post('tgl_input'),
                'rencana_posisi' => $this->input->post('rencana_posisi'),
                'pengalaman_kerja' => $this->input->post('pengalaman_kerja'),
                'vaksin1' => $this->input->post('vaksin1'),
                'vaksin2' => $this->input->post('vaksin2'),
                'booster' => $this->input->post('booster'),
                'upd' => $this->input->post('upd'),
            );
 
        // if(!empty($_FILES['photo']['name']))
        // {
        //     $upload = $this->_do_upload();
        //     $data['photo'] = $upload;
        // }
 
        $insert = $this->m_kandidat->save($data);
 
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'nama' => $this->input->post('nama'),
                'area' => $this->input->post('area'),
                'treg' => $this->input->post('treg'),
                'alamat' => $this->input->post('alamat'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kota' => $this->input->post('kota'),
                'propinsi' => $this->input->post('propinsi'),
                'project' => $this->input->post('project'),
                'layanan' => $this->input->post('layanan'),
                'loker' => $this->input->post('loker'),
                'kota_lahir' => $this->input->post('kota_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'no_hp1' => $this->input->post('no_hp1'),
                'no_hp2' => $this->input->post('no_hp2'),
                'email' => $this->input->post('email'),
                'no_ktp' => $this->input->post('no_ktp'),
                'status_nikah' => $this->input->post('status_nikah'),
                'pendidikan' => $this->input->post('pendidikan'),
                'jurusan' => $this->input->post('jurusan'),
                'nama_sekolah' => $this->input->post('nama_sekolah'),
                'th_lulus' => $this->input->post('th_lulus'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'agama' => $this->input->post('agama'),
                'status' => $this->input->post('status'),
                'tgl_input' => $this->input->post('tgl_input'),
                'rencana_posisi' => $this->input->post('rencana_posisi'),
                'pengalaman_kerja' => $this->input->post('pengalaman_kerja'),
                'vaksin1' => $this->input->post('vaksin1'),
                'vaksin2' => $this->input->post('vaksin2'),
                'booster' => $this->input->post('booster'),
                'upd' => $this->input->post('upd'),
            );
 
        // if($this->input->post('remove_photo')) // if remove photo checked
        // {
        //     if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
        //         unlink('upload/'.$this->input->post('remove_photo'));
        //     $data['photo'] = '';
        // }
 
        // if(!empty($_FILES['photo']['name']))
        // {
        //     $upload = $this->_do_upload();
             
            //delete file
            // $m_kandidat = $this->m_kandidat->get_by_id($this->input->post('id'));
        //     if(file_exists('upload/'.$m_kandidat->photo) && $m_kandidat->photo)
        //         unlink('upload/'.$m_kandidat->photo);
 
        //     $data['photo'] = $upload;
        // }
 
        $this->m_kandidat->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $m_kandidat = $this->m_kandidat->get_by_id($id);
        // if(file_exists('upload/'.$m_kandidat->photo) && $m_kandidat->photo)
        //     unlink('upload/'.$m_kandidat->photo);
         
        $this->m_kandidat->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
    private function _do_upload()
    {
        $config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
 
        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama') == '')
        {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Nama is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('area') == '')
        {
            $data['inputerror'][] = 'area';
            $data['error_string'][] = 'Area is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('alamat') == '')
        {
            $data['inputerror'][] = 'alamat';
            $data['error_string'][] = 'Alamat is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('treg') == '')
        {
            $data['inputerror'][] = 'treg';
            $data['error_string'][] = 'Pilih Treg';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('kelurahan') == '')
        {
            $data['inputerror'][] = 'kelurahan';
            $data['error_string'][] = 'Kelurahan is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('kecamatan') == '')
        {
            $data['inputerror'][] = 'kecamatan';
            $data['error_string'][] = 'Kecamatan is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('kota') == '')
        {
            $data['inputerror'][] = 'kota';
            $data['error_string'][] = 'Kota is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('propinsi') == '')
        {
            $data['inputerror'][] = 'propinsi';
            $data['error_string'][] = 'Provinsi is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('project') == '')
        {
            $data['inputerror'][] = 'project';
            $data['error_string'][] = 'Project is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('layanan') == '')
        {
            $data['inputerror'][] = 'layanan';
            $data['error_string'][] = 'Layanan is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('loker') == '')
        {
            $data['inputerror'][] = 'loker';
            $data['error_string'][] = 'Loker is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('kota_lahir') == '')
        {
            $data['inputerror'][] = 'kota_lahir';
            $data['error_string'][] = 'Kota Lahir is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('tgl_lahir') == '')
        {
            $data['inputerror'][] = 'tgl_lahir';
            $data['error_string'][] = 'Tanggal Lahir is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('no_hp1') == '')
        {
            $data['inputerror'][] = 'no_hp1';
            $data['error_string'][] = 'No HP is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('no_hp2') == '')
        {
            $data['inputerror'][] = 'no_hp2';
            $data['error_string'][] = 'No HP Darurat is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('no_ktp') == '')
        {
            $data['inputerror'][] = 'no_ktp';
            $data['error_string'][] = 'NO KTP is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('status_nikah') == '')
        {
            $data['inputerror'][] = 'status_nikah';
            $data['error_string'][] = 'Status Nikah is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('pendidikan') == '')
        {
            $data['inputerror'][] = 'pendidikan';
            $data['error_string'][] = 'Pendidikan is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('jurusan') == '')
        {
            $data['inputerror'][] = 'jurusan';
            $data['error_string'][] = 'Jurusan is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama_sekolah') == '')
        {
            $data['inputerror'][] = 'nama_sekolah';
            $data['error_string'][] = 'Nama Sekolah is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('th_lulus') == '')
        {
            $data['inputerror'][] = 'th_lulus';
            $data['error_string'][] = 'Tahun Lulus is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('jenis_kelamin') == '')
        {
            $data['inputerror'][] = 'jenis_kelamin';
            $data['error_string'][] = 'Jenis Kelamin is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('agama') == '')
        {
            $data['inputerror'][] = 'agama';
            $data['error_string'][] = 'Agama is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('status') == '')
        {
            $data['inputerror'][] = 'status';
            $data['error_string'][] = 'Status is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('tgl_input') == '')
        {
            $data['inputerror'][] = 'tgl_input';
            $data['error_string'][] = 'Tanggal Input is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('rencana_posisi') == '')
        {
            $data['inputerror'][] = 'rencana_posisi';
            $data['error_string'][] = 'Rencana Posisi is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('pengalaman_kerja') == '')
        {
            $data['inputerror'][] = 'pengalaman_kerja';
            $data['error_string'][] = 'Pengalaman Kerja is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('vaksin1') == '')
        {
            $data['inputerror'][] = 'vaksin1';
            $data['error_string'][] = 'Vaksin 1 is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('vaksin2') == '')
        {
            $data['inputerror'][] = 'vaksin2';
            $data['error_string'][] = 'Vaksin 2 is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('booster') == '')
        {
            $data['inputerror'][] = 'booster';
            $data['error_string'][] = 'Booster is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}