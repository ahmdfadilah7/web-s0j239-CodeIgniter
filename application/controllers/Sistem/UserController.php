<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

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
		$data['view'] = 'sistem//user/index';
        $data['user'] = $this->M_data->selectDataWhere('*', 'user');
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);
	}

    public function delete($id) 
    {
        $where = array('id' => $id);
        $delete = $this->M_data->delete('slider', $where);
        if ($delete) {
            $this->session->set_flashdata('berhasil', 'slider berhasil dihapus');
            redirect(base_url('sistem/slider'));
        } else {
            $this->session->set_flashdata('gagal', 'slider gagal dihapus');
            redirect(base_url('sistem/slider'));
        }
    }
}
