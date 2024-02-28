<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_onboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_karyawan_onboard');
    }

    public function index()
    {
        $this->load->helper('url');
        
        $data['kandidat'] = $this->m_karyawan_onboard->nama_kandidat();
        
        $this->load->view('navbar');
        $this->load->view('karyawan_onboard_view',$data);
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->m_karyawan_onboard->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $m_karyawan_onboard) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $m_karyawan_onboard->nama;
            $row[] = $m_karyawan_onboard->area;
            $row[] = $m_karyawan_onboard->treg;
            $row[] = $m_karyawan_onboard->no_hp1;
            $row[] = $m_karyawan_onboard->email;
            $row[] = $m_karyawan_onboard->no_ktp;
            $row[] = $m_karyawan_onboard->ibu_kandung;
            $row[] = $m_karyawan_onboard->npwp;
            $row[] = $m_karyawan_onboard->norek_bank;
            $row[] = $m_karyawan_onboard->nama_bank;
            $row[] = $m_karyawan_onboard->nama_pemilik;
            $row[] = $m_karyawan_onboard->join_date;
            $row[] = $m_karyawan_onboard->end_date;
            // if($m_karyawan_onboard->photo)
            //     $row[] = '<a href="'.base_url('upload/'.$m_karyawan_onboard->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_karyawan_onboard->photo).'" class="img-responsive" /></a>';
            // else
            //     $row[] = '(No photo)';
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_karyawan_onboard('."'".$m_karyawan_onboard->id_bank."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_karyawan_onboard('."'".$m_karyawan_onboard->id_bank."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_karyawan_onboard->count_all(),
                        "recordsFiltered" => $this->m_karyawan_onboard->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->m_karyawan_onboard->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
         
        $data = array(
                'user_id' => $this->input->post('user_id'),
                'ibu_kandung' => $this->input->post('ibu_kandung'),
                'npwp' => $this->input->post('npwp'),
                'norek_bank' => $this->input->post('norek_bank'),
                'nama_bank' => $this->input->post('nama_bank'),
                'nama_pemilik' => $this->input->post('nama_pemilik'),
                'join_date' => $this->input->post('join_date'),
                'end_date' => $this->input->post('end_date'),
                'upd' => $this->input->post('upd'),
            );
 
        // if(!empty($_FILES['photo']['name']))
        // {
        //     $upload = $this->_do_upload();
        //     $data['photo'] = $upload;
        // }
 
        $insert = $this->m_karyawan_onboard->save($data);
 
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'user_id' => $this->input->post('user_id'),
            'ibu_kandung' => $this->input->post('ibu_kandung'),
            'npwp' => $this->input->post('npwp'),
            'norek_bank' => $this->input->post('norek_bank'),
            'nama_bank' => $this->input->post('nama_bank'),
            'nama_pemilik' => $this->input->post('nama_pemilik'),
            'join_date' => $this->input->post('join_date'),
            'end_date' => $this->input->post('end_date'),
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
            // $m_karyawan_onboard = $this->m_karyawan_onboard->get_by_id($this->input->post('id'));
        //     if(file_exists('upload/'.$m_karyawan_onboard->photo) && $m_karyawan_onboard->photo)
        //         unlink('upload/'.$m_karyawan_onboard->photo);
 
        //     $data['photo'] = $upload;
        // }
 
        $this->m_karyawan_onboard->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $m_karyawan_onboard = $this->m_karyawan_onboard->get_by_id($id);
        // if(file_exists('upload/'.$m_karyawan_onboard->photo) && $m_karyawan_onboard->photo)
        //     unlink('upload/'.$m_karyawan_onboard->photo);
         
        $this->m_karyawan_onboard->delete_by_id($id);
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
 
        if($this->input->post('user_id') == '')
        {
            $data['inputerror'][] = 'user_id';
            $data['error_string'][] = 'Please select bpjs';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('ibu_kandung') == '')
        {
            $data['inputerror'][] = 'ibu_kandung';
            $data['error_string'][] = 'Ibu Kandung is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('npwp') == '')
        {
            $data['inputerror'][] = 'npwp';
            $data['error_string'][] = 'NPWP is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('norek_bank') == '')
        {
            $data['inputerror'][] = 'norek_bank';
            $data['error_string'][] = 'No Rekening Bank is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama_bank') == '')
        {
            $data['inputerror'][] = 'nama_bank';
            $data['error_string'][] = 'Nama Bank is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama_pemilik') == '')
        {
            $data['inputerror'][] = 'nama_pemilik';
            $data['error_string'][] = 'Nama Pemilik Bank is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('join_date') == '')
        {
            $data['inputerror'][] = 'join_date';
            $data['error_string'][] = 'Join Date is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('end_date') == '')
        {
            $data['inputerror'][] = 'end_date';
            $data['error_string'][] = 'End Date is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    } 
}