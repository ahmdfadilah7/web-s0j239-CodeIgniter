<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutController extends CI_Controller {

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
		$data['view'] = 'sistem/about/index';
        $data['about'] = $this->M_data->selectDataWhere('*', 'about');
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);
	}

    public function add() 
    {
        $data['view'] = 'sistem/about/add';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('sistem/about/add'));
        } else {
            $insert['judul'] = $this->input->post('judul');
            $insert['deskripsi'] = $this->input->post('deskripsi');
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');

            $config['upload_path'] = "assets/images/";
            $config['overwrite'] = TRUE;            
            $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname = explode(".", $_FILES['gambar']['name']);
            $ext = end($dname);
            $nama = 'About'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['gambar'] = 'assets/images/'.$nama;
            }
            $this->M_data->insert($insert, 'about');

            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan About.');
            redirect(base_url('sistem/about'));
        }
    }

    public function edit($id) 
    {
        $data['view'] = 'sistem/about/edit';
        $data['about'] = $this->M_data->selectDataWhere('*', 'about', 'id', $id)->row();
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);        
    }

    public function update($id) 
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('sistem/about/edit/'.$id));
        } else {
            $insert['judul'] = $this->input->post('judul');
            $insert['deskripsi'] = $this->input->post('deskripsi');
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');
            
            $config['upload_path'] = "assets/images/";
            $config['overwrite'] = TRUE;            
            $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname = explode(".", $_FILES['gambar']['name']);
            $ext = end($dname);
            $nama = 'About'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['gambar'] = 'assets/images/'.$nama;
            }
            $this->M_data->updateData($insert, 'about', 'id', $id);

            $this->session->set_flashdata('berhasil', 'Berhasil mengedit About.');
            redirect(base_url('sistem/about'));
        }
    }
}
