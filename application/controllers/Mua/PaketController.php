<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaketController extends CI_Controller {

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
		$data['view'] = 'mua/paket/index';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['paket'] = $this->M_data->selectDataWhere('*', 'paket', 'mua_id', $this->session->userdata('id_mua'));

        $this->load->view('mua/layouts/app', $data);
	}

    public function add()
    {
        $data['view'] = 'mua/paket/add';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('mua/layouts/app', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required');
        $this->form_validation->set_rules('deskripsi_paket', 'Deskripsi Paket', 'required');
        $this->form_validation->set_rules('harga_paket', 'Harga Paket', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('mua/paket/add'));
        } else {
            $insert['mua_id'] = $this->session->userdata('id_mua');
            $insert['nama_paket'] = $this->input->post('nama_paket');
            $insert['deskripsi_paket'] = $this->input->post('deskripsi_paket');
            $insert['harga_paket'] = $this->input->post('harga_paket');
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');

            $config['upload_path'] = "assets/images/";
            $config['overwrite'] = TRUE;            
            $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname = explode(".", $_FILES['gambar_paket']['name']);
            $ext = end($dname);
            $nama = 'Gambar-Paket'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_paket')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['gambar_paket'] = 'assets/images/'.$nama;
            }
            $this->M_data->insert($insert, 'paket');

            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan paket.');
            redirect(base_url('mua/paket'));
        }
    }

    public function edit($id)
    {
        $data['view'] = 'mua/paket/edit';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['paket'] = $this->M_data->selectDataWhere('*', 'paket', 'id', $id)->row();

        $this->load->view('mua/layouts/app', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_paket', 'Nama paket', 'required');
        $this->form_validation->set_rules('deskripsi_paket', 'Deskripsi paket', 'required');
        $this->form_validation->set_rules('harga_paket', 'Harga Paket', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('mua/paket/edit/'.$id));
        } else {
            $insert['nama_paket'] = $this->input->post('nama_paket');
            $insert['deskripsi_paket'] = $this->input->post('deskripsi_paket');
            $insert['harga_paket'] = $this->input->post('harga_paket');
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');

            $config['upload_path'] = "assets/images/";
            $config['overwrite'] = TRUE;            
            $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
            $dname = explode(".", $_FILES['gambar_paket']['name']);
            $ext = end($dname);
            $nama = 'Banner-paket'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_paket')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['gambar_paket'] = 'assets/images/'.$nama;
            }
            $this->M_data->updateData($insert, 'paket', 'id', $id);

            $this->session->set_flashdata('berhasil', 'Berhasil mengedit paket.');
            redirect(base_url('mua/paket'));
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
