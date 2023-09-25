<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingController extends CI_Controller {

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
		$data['view'] = 'sistem/setting/index';
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting');
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);
	}

    public function edit($id) 
    {
        $data['view'] = 'sistem/setting/edit';
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting', 'id', $id)->row();
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);        
    }

    public function update($id) 
    {
        $this->form_validation->set_rules('nama_website', 'Nama Website', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('google_map', 'Google Map', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('sistem/setting/edit/'.$id));
        } else {
            $insert['nama_website'] = $this->input->post('nama_website');
            $insert['email'] = $this->input->post('email');
            $insert['no_telp'] = $this->input->post('no_telp');
            $insert['alamat'] = $this->input->post('alamat');
            $insert['google_map'] = $this->input->post('google_map');
            $insert['facebook'] = $this->input->post('facebook');
            $insert['twitter'] = $this->input->post('twitter');
            $insert['instagram'] = $this->input->post('instagram');
            $insert['youtube'] = $this->input->post('youtube');
            
            $config['upload_path'] = "assets/images/";
            $config['overwrite'] = TRUE;            
            $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname = explode(".", $_FILES['logo_website']['name']);
            $ext = end($dname);
            $nama = 'Logo'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('logo_website')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['logo_website'] = 'assets/images/'.$nama;
            }

            $config2['upload_path'] = "assets/images/";
            $config2['overwrite'] = TRUE;            
            $config2['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname2 = explode(".", $_FILES['favicon_website']['name']);
            $ext2 = end($dname2);
            $nama2 = 'Favicon'."-".time().'-'.rand(100,999).".".$ext2;
            $config2['file_name'] = $nama2;
            $config2['remove_spaces'] = FALSE;
            $this->upload->initialize($config2);
            if (!$this->upload->do_upload('favicon_website')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['favicon_website'] = 'assets/images/'.$nama2;
            }

            $this->M_data->updateData($insert, 'setting', 'id', $id);

            $this->session->set_flashdata('berhasil', 'Berhasil mengedit Setting');
            redirect(base_url('sistem/setting'));
        }
    }
}
