<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SliderController extends CI_Controller {

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
		$data['view'] = 'sistem//slider/index';
        $data['slider'] = $this->M_data->selectDataWhere('*', 'slider');
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);
	}

    public function add() 
    {
        $data['view'] = 'sistem/slider/add';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('sistem/slider/add'));
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
            $nama = 'Slider'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['gambar'] = 'assets/images/'.$nama;
            }
            $this->M_data->insert($insert, 'slider');

            $this->session->set_flashdata('berhasil', 'Berhasil menambahkan slider.');
            redirect(base_url('sistem/slider'));
        }
    }

    public function edit($id) 
    {
        $data['view'] = 'sistem/slider/edit';
        $data['slider'] = $this->M_data->selectDataWhere('*', 'slider', 'id', $id)->row();
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/layouts/app', $data);        
    }

    public function update($id) 
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('sistem/slider/edit/'.$id));
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
            $nama = 'slider'."-".time().'-'.rand(100,999).".".$ext;
            $config['file_name'] = $nama;
            $config['remove_spaces'] = FALSE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
            } else {
                $upload_data = $this->upload->data();

                $insert['gambar'] = 'assets/images/'.$nama;
            }
            $this->M_data->updateData($insert, 'slider', 'id', $id);

            $this->session->set_flashdata('berhasil', 'Berhasil mengedit slider.');
            redirect(base_url('sistem/slider'));
        }
    }

    public function delete($id) 
    {
        $where = array('id' => $id);
        $delete = $this->M_data->delete('slider', $where);
        if ($delete) {
            $this->session->set_flashdata('berhasil', 'slider berhasil dihapus');
            redirect(base_url('sistem/slider'));
        } else {
            $this->session->set_flashdata('gagal', 'slider gagal dihapus');
            redirect(base_url('sistem/slider'));
        }
    }
}
