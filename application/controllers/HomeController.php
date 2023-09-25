<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // if($this->session->userdata('status') != 'login'){
        //     redirect('auth/login');
        // }
        $this->load->model('M_data');
        $this->load->library('upload');
    }

	public function index()
	{
		$data['view'] = 'home/index';
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['about'] = $this->M_data->selectDataWhere('*', 'about')->row();
        $data['slider'] = $this->M_data->selectDataWhere('*', 'slider');
        $data['toko'] = $this->db->query("SELECT toko.*, mua.nama FROM toko INNER JOIN mua ON toko.mua_id=mua.id");

        $this->load->view('layouts/app', $data);
	}
}
