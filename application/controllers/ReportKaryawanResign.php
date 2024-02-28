<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportKaryawanResign extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_report_karyawan_resign');
    }

    public function index()
    {
        $this->load->helper('url');
        
        $data['kandidat'] = $this->m_report_karyawan_resign->nama_kandidat();
        $this->load->view('navbar',$data);
        $this->load->view('report_karyawan_resign_view',$data);
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->m_report_karyawan_resign->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $m_report_karyawan_resign) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $m_report_karyawan_resign->nama;
            $row[] = $m_report_karyawan_resign->area;
            $row[] = $m_report_karyawan_resign->treg;
            $row[] = $m_report_karyawan_resign->no_hp1;
            $row[] = $m_report_karyawan_resign->email;
            $row[] = $m_report_karyawan_resign->no_ktp;
            $row[] = $m_report_karyawan_resign->ibu_kandung;
            $row[] = $m_report_karyawan_resign->npwp;
            $row[] = $m_report_karyawan_resign->no_kk;
            $row[] = $m_report_karyawan_resign->bpjs_kesehatan;
            $row[] = $m_report_karyawan_resign->bpjs_tenagakerja;
            $row[] = $m_report_karyawan_resign->norek_bank;
            $row[] = $m_report_karyawan_resign->nama_bank;
            $row[] = $m_report_karyawan_resign->nama_pemilik;
            $row[] = $m_report_karyawan_resign->join_date;
            $row[] = $m_report_karyawan_resign->end_date;
            $row[] = $m_report_karyawan_resign->jenis_kontrak;
            $row[] = $m_report_karyawan_resign->no_kontrak;
            $row[] = $m_report_karyawan_resign->perner;
            $row[] = $m_report_karyawan_resign->status_kontrak;
            $row[] = $m_report_karyawan_resign->awal_kontrak;
            $row[] = $m_report_karyawan_resign->akhir_kontrak;
            $row[] = $m_report_karyawan_resign->jabatan;
            $row[] = $m_report_karyawan_resign->status;
            $row[] = $m_report_karyawan_resign->keterangan_resign;
            $row[] = $m_report_karyawan_resign->tgl_resign;
            // if($m_report_karyawan_resign->photo)
            //     $row[] = '<a href="'.base_url('upload/'.$m_report_karyawan_resign->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_report_karyawan_resign->photo).'" class="img-responsive" /></a>';
            // else
            //     $row[] = '(No photo)';
 
            //add html for action
            // $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_report_karyawan('."'".$m_report_karyawan_resign->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            //       <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_report_karyawan('."'".$m_report_karyawan_resign->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_report_karyawan_resign->count_all(),
                        "recordsFiltered" => $this->m_report_karyawan_resign->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->m_report_karyawan_resign->get_by_id($id);
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
            );
 
        // if(!empty($_FILES['photo']['name']))
        // {
        //     $upload = $this->_do_upload();
        //     $data['photo'] = $upload;
        // }
 
        $insert = $this->m_report_karyawan_resign->save($data);
 
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
            // $m_report_karyawan_resign = $this->m_report_karyawan_resign->get_by_id($this->input->post('id'));
        //     if(file_exists('upload/'.$m_report_karyawan_resign->photo) && $m_report_karyawan_resign->photo)
        //         unlink('upload/'.$m_report_karyawan_resign->photo);
 
        //     $data['photo'] = $upload;
        // }
 
        $this->m_report_karyawan_resign->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $m_report_karyawan_resign = $this->m_report_karyawan_resign->get_by_id($id);
        // if(file_exists('upload/'.$m_report_karyawan_resign->photo) && $m_report_karyawan_resign->photo)
        //     unlink('upload/'.$m_report_karyawan_resign->photo);
         
        $this->m_report_karyawan_resign->delete_by_id($id);
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