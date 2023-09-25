<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status_mua') != 'login'){
            redirect('mua/login');
        }
        $this->load->model('M_data');
        $this->load->library('upload');
    }

	public function index()
	{
		$data['view'] = 'mua/dashboard/index';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('mua/layouts/app', $data);
	}
}
