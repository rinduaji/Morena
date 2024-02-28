<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpjs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_bpjs');
    }

    public function index()
    {
        $this->load->helper('url');
        
        $data['kandidat'] = $this->m_bpjs->nama_kandidat();
        
        $this->load->view('navbar');
        $this->load->view('bpjs_view',$data);
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->m_bpjs->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $m_bpjs) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $m_bpjs->nama;
            $row[] = $m_bpjs->area;
            $row[] = $m_bpjs->treg;
            $row[] = $m_bpjs->no_hp1;
            $row[] = $m_bpjs->email;
            $row[] = $m_bpjs->no_ktp;
            $row[] = $m_bpjs->no_kk;
            $row[] = $m_bpjs->bpjs_kesehatan;
            $row[] = $m_bpjs->bpjs_tenagakerja;
            $row[] = $m_bpjs->nik;
            $row[] = $m_bpjs->nama_k;
            $row[] = $m_bpjs->jenis_kelamin_k;
            $row[] = $m_bpjs->status_hubungan_k;
            $row[] = $m_bpjs->kepemilikan_bpjs;
            $row[] = $m_bpjs->bpjs_join_perusahaan;
            if($m_bpjs->photo)
                $row[] = '<a href="'.base_url('uploads/materai/'.$m_bpjs->photo).'" target="_blank"><img src="'.base_url('uploads/materai/'.$m_bpjs->photo).'" class="img-responsive" /></a>';
            else
                $row[] = '(No photo)';
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_bpjs('."'".$m_bpjs->id_bpjs."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_bpjs('."'".$m_bpjs->id_bpjs."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_bpjs->count_all(),
                        "recordsFiltered" => $this->m_bpjs->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->m_bpjs->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
         
        $data = array(
                'id_karyawan_onboard' => $this->input->post('id_karyawan_onboard'),
                'no_kk' => $this->input->post('nik'),
                'bpjs_kesehatan' => $this->input->post('bpjs_kesehatan'),
                'bpjs_tenagakerja' => $this->input->post('bpjs_tenagakerja'),
                'nik' => $this->input->post('nik'),
                'nama_k' => $this->input->post('nama_k'),
                'jenis_kelamin_k' => $this->input->post('jenis_kelamin_k'),
                'status_hubungan_k' => $this->input->post('status_hubungan_k'),
                'kepemilikan_bpjs' => $this->input->post('kepemilikan_bpjs'),
                'bpjs_join_perusahaan' => $this->input->post('bpjs_join_perusahaan'),
                'upd' => $this->input->post('upd'),
            );
 
        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
            $data['photo'] = $upload;
        }
 
        $insert = $this->m_bpjs->save($data);
 
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'id_karyawan_onboard' => $this->input->post('id_karyawan_onboard'),
                'no_kk' => $this->input->post('nik'),
                'bpjs_kesehatan' => $this->input->post('bpjs_kesehatan'),
                'bpjs_tenagakerja' => $this->input->post('bpjs_tenagakerja'),
                'nik' => $this->input->post('nik'),
                'nama_k' => $this->input->post('nama_k'),
                'jenis_kelamin_k' => $this->input->post('jenis_kelamin_k'),
                'status_hubungan_k' => $this->input->post('status_hubungan_k'),
                'kepemilikan_bpjs' => $this->input->post('kepemilikan_bpjs'),
                'bpjs_join_perusahaan' => $this->input->post('bpjs_join_perusahaan'),
                'upd' => $this->input->post('upd'),
            );
 
        if($this->input->post('remove_photo')) // if remove photo checked
        {
            if(file_exists('uploads/materai/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
                unlink('uploads/materai/'.$this->input->post('remove_photo'));
            $data['photo'] = '';
        }
 
        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
             
            // delete file
            $m_bpjs = $this->m_bpjs->get_by_id($this->input->post('id_bpjs'));
            if(file_exists('uploads/materai/'.$m_bpjs->photo) && $m_bpjs->photo)
                unlink('uploads/materai/'.$m_bpjs->photo);
 
            $data['photo'] = $upload;
        }
 
        $this->m_bpjs->update(array('id_bpjs' => $this->input->post('id_bpjs')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $m_bpjs = $this->m_bpjs->get_by_id($id);
        if(file_exists('uploads/materai/'.$m_bpjs->photo) && $m_bpjs->photo)
            unlink('uploads/materai/'.$m_bpjs->photo);
         
        $this->m_bpjs->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
    private function _do_upload()
    {
        $config['upload_path']          = 'uploads/materai/';
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['max_size']             = 100; //set max size allowed in Kilobyte
        // $config['max_width']            = 1000; // set max width image allowed
        // $config['max_height']           = 1000; // set max height allowed
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
 
        if($this->input->post('id_karyawan_onboard') == '')
        {
            $data['inputerror'][] = 'id_karyawan_onboard';
            $data['error_string'][] = 'Please select Nama';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('no_kk') == '')
        {
            $data['inputerror'][] = 'no_kk';
            $data['error_string'][] = 'NO KK is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('nik') == '')
        {
            $data['inputerror'][] = 'nik';
            $data['error_string'][] = 'NIK is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama_k') == '')
        {
            $data['inputerror'][] = 'nama_k';
            $data['error_string'][] = 'Nama Anggota Keluarga Bank is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('jenis_kelamin_k') == '')
        {
            $data['inputerror'][] = 'jenis_kelamin_k';
            $data['error_string'][] = 'Jenis Kelamin Anggota Keluarga is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('status_hubungan_k') == '')
        {
            $data['inputerror'][] = 'status_hubungan_k';
            $data['error_string'][] = 'Status Hubungan Anggota Keluarga is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    } 
}