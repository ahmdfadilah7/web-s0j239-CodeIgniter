<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

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
		$data['view'] = 'mua/profile/index';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['mua'] = $this->M_data->selectDataWhere('*', 'mua', 'id', $this->session->userdata('id_mua'));

        $this->load->view('mua/layouts/app', $data);
	}

    public function edit($id)
    {
        $data['view'] = 'mua/profile/edit';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['mua'] = $this->M_data->selectDataWhere('*', 'mua', 'id', $id)->row();

        $this->load->view('mua/layouts/app', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('mua/profile/edit/'.$id));
        } else {
            $insert['nama'] = $this->input->post('nama');
            $insert['email'] = $this->input->post('email');
            $insert['no_telp'] = $this->input->post('no_telp');
            $insert['jns_kelamin'] = $this->input->post('jns_kelamin');
            $insert['username'] = $this->input->post('username');
            if ($this->input->post('password') <> '') {
                $insert['password'] = md5($this->input->post('password'));
            }
            $insert['alamat'] = $this->input->post('alamat');
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');

            $config['upload_path'] = "assets/images/";
            $config['overwrite'] = TRUE;            
            $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname = explode(".", $_FILES['foto']['name']);
            $ext = end($dname);
            $nama = 'Mua'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['foto'] = 'assets/images/'.$nama;
            }
            $this->M_data->updateData($insert, 'mua', 'id', $id);

            $this->session->set_flashdata('berhasil', 'Edit profile berhasil.');
            redirect(base_url('mua/profile'));
        }
    }

    public function delete($id) 
    {
        $where = array('id' => $id);
        $delete = $this->M_data->delete('paket', $where);
        if ($delete) {
            $this->session->set_flashdata('berhasil', 'Paket berhasil dihapus');
            redirect(base_url('mua/paket'));
        } else {
            $this->session->set_flashdata('gagal', 'Paket gagal dihapus');
            redirect(base_url('mua/paket'));
        }
    }
}
