<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

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
		$data['view'] = 'sistem/admin/index';
        $data['admin'] = $this->M_data->selectDataWhere('*', 'admin');
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);
	}

    public function add() 
    {
        $data['view'] = 'sistem/admin/add';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('sistem/admin/add'));
        } else {
            $insert['username'] = $this->input->post('username');
            $insert['password'] = md5($this->input->post('password'));
            $insert['level'] = 'Administrator';
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');

            $config['upload_path'] = "assets/images/";
            $config['overwrite'] = TRUE;            
            $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname = explode(".", $_FILES['foto']['name']);
            $ext = end($dname);
            $nama = 'Admin'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['foto'] = 'assets/images/'.$nama;
            }
            $this->M_data->insert($insert, 'admin');

            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan admin.');
            redirect(base_url('sistem/admin'));
        }
    }

    public function edit($id) 
    {
        $data['view'] = 'sistem/admin/edit';
        $data['admin'] = $this->M_data->selectDataWhere('*', 'admin', 'id', $id)->row();
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);        
    }

    public function update($id) 
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('sistem/admin/edit/'.$id));
        } else {
            $insert['username'] = $this->input->post('username');
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');
            
            if ($this->input->post('password') <> '') {
                $insert['password'] = $this->input->post('password');
            }

            $config['upload_path'] = "assets/images/";
            $config['overwrite'] = TRUE;            
            $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname = explode(".", $_FILES['foto']['name']);
            $ext = end($dname);
            $nama = 'Admin'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['foto'] = 'assets/images/'.$nama;
            }
            $this->M_data->updateData($insert, 'admin', 'id', $id);

            $this->session->set_flashdata('berhasil', 'Berhasil mengedit admin.');
            redirect(base_url('sistem/admin'));
        }
    }

    public function delete($id) 
    {
        $where = array('id' => $id);
        $delete = $this->M_data->delete('admin', $where);
        if ($delete) {
            $this->session->set_flashdata('berhasil', 'Admin berhasil dihapus');
            redirect(base_url('sistem/admin'));
        } else {
            $this->session->set_flashdata('gagal', 'Admin gagal dihapus');
            redirect(base_url('sistem/admin'));
        }
    }
}
