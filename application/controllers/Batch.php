<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_batch');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('navbar');
        $this->load->view('batch_view');
    }
 
    public function ajax_list()
    {
        $this->load->helper('url');
 
        $list = $this->m_batch->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $m_batch) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $m_batch->nama_batch;
            $row[] = $m_batch->area;
            $row[] = $m_batch->layanan;
            $row[] = $m_batch->tgl_mulai_batch;
            $row[] = $m_batch->tgl_akhir_batch;
            // $row[] = $m_batch->lup;
            $row[] = $m_batch->upd;
            // if($m_batch->photo)
            //     $row[] = '<a href="'.base_url('upload/'.$m_batch->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_batch->photo).'" class="img-responsive" /></a>';
            // else
            //     $row[] = '(No photo)';
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_batch('."'".$m_batch->id_batch."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_batch('."'".$m_batch->id_batch."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_batch->count_all(),
                        "recordsFiltered" => $this->m_batch->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->m_batch->get_by_id($id);
        // $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
         
        $data = array(
                'area' => $this->input->post('area'),
                'layanan' => $this->input->post('layanan'),
                'nama_batch' => $this->input->post('nama_batch'),
                'tgl_mulai_batch' => $this->input->post('tgl_mulai_batch'),
                'tgl_akhir_batch' => $this->input->post('tgl_akhir_batch'),
                'lup' => date("Y-m-d"),
                'upd' => $this->input->post('upd'),
            );
 
        // if(!empty($_FILES['photo']['name']))
        // {
        //     $upload = $this->_do_upload();
        //     $data['photo'] = $upload;
        // }
        $total_cek_tanggal = $this->m_batch->cek_tanggal_batch($this->input->post('tgl_mulai_batch'), $this->input->post('tgl_akhir_batch'),
        $this->input->post('area'), $this->input->post('layanan'), $this->input->post('nama_batch'));
        if($total_cek_tanggal > 0 ) {
            echo json_encode(array("status" => TRUE, "cek" => "ada"));
        }
        else {
            $insert = $this->m_batch->save($data);
 
            echo json_encode(array("status" => TRUE));
        }
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'area' => $this->input->post('area'),
                'layanan' => $this->input->post('layanan'),
                'nama_batch' => $this->input->post('nama_batch'),
                'tgl_mulai_batch' => $this->input->post('tgl_mulai_batch'),
                'tgl_akhir_batch' => $this->input->post('tgl_akhir_batch'),
                'lup' => date("Y-m-d"),
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
            // $m_batch = $this->m_batch->get_by_id($this->input->post('id_batch'));
        //     if(file_exists('upload/'.$m_batch->photo) && $m_batch->photo)
        //         unlink('upload/'.$m_batch->photo);
 
        //     $data['photo'] = $upload;
        // }
 
        $this->m_batch->update(array('id_batch' => $this->input->post('id_batch')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $m_batch = $this->m_batch->get_by_id($id);
        // if(file_exists('upload/'.$m_batch->photo) && $m_batch->photo)
        //     unlink('upload/'.$m_batch->photo);
         
        $this->m_batch->delete_by_id($id);
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
 
        if($this->input->post('area') == '')
        {
            $data['inputerror'][] = 'area';
            $data['error_string'][] = 'Area is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('layanan') == '')
        {
            $data['inputerror'][] = 'layanan';
            $data['error_string'][] = 'Layanan is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama_batch') == '')
        {
            $data['inputerror'][] = 'nama_batch';
            $data['error_string'][] = 'Nama Batch is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('tgl_mulai_batch') == '')
        {
            $data['inputerror'][] = 'tgl_mulai_batch';
            $data['error_string'][] = 'Tanggal Mulai Batch is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('upd') == '')
        {
            $data['inputerror'][] = 'upd';
            $data['error_string'][] = 'UPD is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('tgl_akhir_batch') == '')
        {
            $data['inputerror'][] = 'tgl_akhir_batch';
            $data['error_string'][] = 'Tanggal Akhir Batch is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}