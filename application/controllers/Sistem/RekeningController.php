<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RekeningController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != 'login'){
            redirect('sistem/authcontroller/login');
        }
        $this->load->model('M_data');
        $this->load->library('upload');
    }

	public function index()
	{
		$data['view'] = 'sistem//rekening/index';
        $data['rekening'] = $this->M_data->selectDataWhere('*', 'rekening');
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);
	}

    public function add() 
    {
        $data['view'] = 'sistem/rekening/add';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_rekening', 'Nama Rekening', 'required');
        $this->form_validation->set_rules('no_rekening', 'No Rekening', 'required');
        $this->form_validation->set_rules('bank', 'Bank', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('sistem/rekening/add'));
        } else {
            $insert['nama_rekening'] = $this->input->post('nama_rekening');
            $insert['no_rekening'] = $this->input->post('no_rekening');
            $insert['bank'] = $this->input->post('bank');
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');

            $this->M_data->insert($insert, 'rekening');

            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan rekening.');
            redirect(base_url('sistem/rekening'));
        }
    }

    public function edit($id) 
    {
        $data['view'] = 'sistem/rekening/edit';
        $data['rekening'] = $this->M_data->selectDataWhere('*', 'rekening', 'id', $id)->row();
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);        
    }

    public function update($id) 
    {
        $this->form_validation->set_rules('nama_rekening', 'Nama Rekening', 'required');
        $this->form_validation->set_rules('no_rekening', 'No Rekening', 'required');
        $this->form_validation->set_rules('bank', 'Bank', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('sistem/rekening/edit/'.$id));
        } else {
            $insert['nama_rekening'] = $this->input->post('nama_rekening');
            $insert['no_rekening'] = $this->input->post('no_rekening');
            $insert['bank'] = $this->input->post('bank');
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');
            
            $this->M_data->updateData($insert, 'rekening', 'id', $id);

            $this->session->set_flashdata('berhasil', 'Berhasil mengedit rekening.');
            redirect(base_url('sistem/rekening'));
        }
    }

    public function delete($id) 
    {
        $where = array('id' => $id);
        $delete = $this->M_data->delete('rekening', $where);
        if ($delete) {
            $this->session->set_flashdata('berhasil', 'rekening berhasil dihapus');
            redirect(base_url('sistem/rekening'));
        } else {
            $this->session->set_flashdata('gagal', 'rekening gagal dihapus');
            redirect(base_url('sistem/rekening'));
        }
    }
}
