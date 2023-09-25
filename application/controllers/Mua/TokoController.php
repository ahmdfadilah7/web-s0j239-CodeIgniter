<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TokoController extends CI_Controller {

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
		$data['view'] = 'mua/toko/index';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['toko'] = $this->M_data->selectDataWhere('*', 'toko', 'mua_id', $this->session->userdata('id_mua'));

        $this->load->view('mua/layouts/app', $data);
	}

    public function add()
    {
        $data['view'] = 'mua/toko/add';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('mua/layouts/app', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required');
        $this->form_validation->set_rules('deskripsi_toko', 'Deskripsi Toko', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('mua/toko/add'));
        } else {
            $insert['mua_id'] = $this->session->userdata('id_mua');
            $insert['nama_toko'] = $this->input->post('nama_toko');
            $insert['deskripsi_toko'] = $this->input->post('deskripsi_toko');
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');

            $config['upload_path'] = "assets/images/";
            $config['overwrite'] = TRUE;            
            $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname = explode(".", $_FILES['banner_toko']['name']);
            $ext = end($dname);
            $nama = 'Banner-Toko'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('banner_toko')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['banner_toko'] = 'assets/images/'.$nama;
            }
            $this->M_data->insert($insert, 'toko');

            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan toko.');
            redirect(base_url('mua/toko'));
        }
    }

    public function edit($id)
    {
        $data['view'] = 'mua/toko/edit';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['toko'] = $this->M_data->selectDataWhere('*', 'toko', 'id', $id)->row();

        $this->load->view('mua/layouts/app', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required');
        $this->form_validation->set_rules('deskripsi_toko', 'Deskripsi Toko', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('mua/toko/edit/'.$id));
        } else {
            $insert['nama_toko'] = $this->input->post('nama_toko');
            $insert['deskripsi_toko'] = $this->input->post('deskripsi_toko');
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');

            $config['upload_path'] = "assets/images/";
            $config['overwrite'] = TRUE;            
            $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname = explode(".", $_FILES['banner_toko']['name']);
            $ext = end($dname);
            $nama = 'Banner-Toko'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('banner_toko')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['banner_toko'] = 'assets/images/'.$nama;
            }
            $this->M_data->updateData($insert, 'toko', 'id', $id);

            $this->session->set_flashdata('berhasil', 'Berhasil mengedit toko.');
            redirect(base_url('mua/toko'));
        }
    }
}
