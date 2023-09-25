<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        $this->load->library('upload');
    }

	public function index()
	{
		$data['view'] = 'about/index';
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['about'] = $this->M_data->selectDataWhere('*', 'about')->row();

        $this->load->view('layouts/app', $data);
	}
}
