<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MuaController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        $this->load->library('upload');
    }

	public function index()
	{
		$data['view'] = 'mua/index';
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->library('pagination');

        $config['base_url'] = site_url('mua');
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->db->query("SELECT toko.*, mua.nama FROM toko INNER JOIN mua ON toko.mua_id=mua.id")->num_rows();
        $config['per_page'] = 8;

        $config['full_tag_open'] = '<ul class="pagination">';        
        $config['full_tag_close'] = '</ul>';        
        $config['first_link'] = 'First';        
        $config['last_link'] = 'Last';        
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['first_tag_close'] = '</span></li>';        
        $config['prev_link'] = '&laquo';        
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['prev_tag_close'] = '</span></li>';        
        $config['next_link'] = '&raquo';        
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['next_tag_close'] = '</span></li>';        
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['last_tag_close'] = '</span></li>';        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
        $config['cur_tag_close'] = '</a></li>';        
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
        $config['num_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);
        $limit = $config['per_page'];
        if ($this->input->get('per_page') <> '') {
            $offset = html_escape($this->input->get('per_page'));
        } else {
            $offset = 0;
        }

        $data['toko'] = $this->db->query("SELECT toko.*, mua.nama FROM toko INNER JOIN mua ON toko.mua_id=mua.id LIMIT $limit OFFSET $offset");

        $this->load->view('layouts/app', $data);
	}

    public function detail($id, $id2)
    {
        $data['view'] = 'mua/detail';
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $nama_mua = str_replace('-', ' ', $id);
        $nama_toko = str_replace('-', ' ', $id2);
        $data['toko'] = $this->db->query("SELECT toko.*, mua.nama FROM toko 
            INNER JOIN mua ON toko.mua_id=mua.id
            WHERE mua.nama LIKE '%$nama_mua%' AND toko.nama_toko LIKE '%$nama_toko%'
        ")->row();
        $data['paket'] = $this->db->query("SELECT paket.*, mua.nama FROM paket
            INNER JOIN mua ON paket.mua_id=mua.id
            WHERE mua.nama LIKE '%$nama_mua%'
            ORDER BY paket.id DESC
        ");

        $this->load->view('layouts/app', $data);
    }

    public function detail_paket($id, $id2)
    {
        $data['view'] = 'mua/detailpaket';
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $nama_mua = str_replace('-', ' ', $id);
        $nama_paket = str_replace('-', ' ', $id2);
        $data['paket'] = $this->db->query("SELECT paket.*, mua.nama FROM paket
            INNER JOIN mua ON paket.mua_id=mua.id
            WHERE mua.nama LIKE '%$nama_mua%' AND paket.nama_paket LIKE '%$nama_paket%'
        ")->row();
        $data['paketothers'] = $this->db->query("SELECT paket.*, mua.nama FROM paket
            INNER JOIN mua ON paket.mua_id=mua.id
            WHERE mua.nama LIKE '%$nama_mua%' AND paket.nama_paket NOT LIKE '%$nama_paket%'
        ");
        $data['rekening'] = $this->M_data->selectDataWhere('*', 'rekening');

        $this->load->view('layouts/app', $data);
    }
}
