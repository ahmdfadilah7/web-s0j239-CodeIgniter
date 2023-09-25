<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status_pelanggan') != 'login'){
            redirect(base_url('login'));
        }
        $this->load->model('M_data');
        $this->load->library('upload');
    }

	public function index()
	{
		$data['view'] = 'profile/index';
        $data['profile'] = $this->M_data->selectDataWhere('*', 'user', 'id', $this->session->userdata('id_pelanggan'))->row();
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('layouts/app', $data);
	}    

    public function edit() 
    {
        $data['view'] = 'profile/edit';
        $data['profile'] = $this->M_data->selectDataWhere('*', 'user', 'id', $this->session->userdata('id_pelanggan'))->row();
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('layouts/app', $data);        
    }

    public function update() 
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('profile/edit'));
        } else {
            $insert['nama'] = $this->input->post('nama');
            $insert['email'] = $this->input->post('email');
            $insert['no_telp'] = $this->input->post('no_telp');
            $insert['jns_kelamin'] = $this->input->post('jns_kelamin');
            $insert['alamat'] = $this->input->post('alamat');
            $insert['username'] = $this->input->post('username');
            $insert['updated_at'] = date('Y-m-d H:i:s');
            
            $config['upload_path'] = "assets/images/";
            $config['overwrite'] = TRUE;            
            $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname = explode(".", $_FILES['foto']['name']);
            $ext = end($dname);
            $nama = 'Pelanggan'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['foto'] = 'assets/images/'.$nama;
            }

            if ($this->input->post('password') <> '') {
                $insert['password'] = md5($this->input->post('password'));
            }
            $this->M_data->updateData($insert, 'user', 'id', $this->session->userdata('id_pelanggan'));

            $this->session->set_flashdata('berhasil', 'Berhasil mengedit profile.');
            redirect(base_url('profile'));
        }
    }
}
