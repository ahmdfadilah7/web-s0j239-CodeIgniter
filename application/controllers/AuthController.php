<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        $this->load->library('upload');
    }

	public function login()
	{
        $data['view'] = 'auth/login';
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('layouts/app', $data);
	}

    public function register()
	{
        $data['view'] = 'auth/register';
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('layouts/app', $data);
	}

    public function proses_login()
    {
        //form validasi
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('gagal', 'Username dan Password harus diisi');
            redirect(base_url('login'));
            die();
        }        

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => md5($password)
        );
        $cek = $this->M_data->cek_login('user', $where);

        if ($cek->num_rows() == 1) {

            $dataadmin = $cek->result_array();

            foreach ($dataadmin as $h) {
                $id_user = $h['id'];
                $nama = $h['nama'];
                $username = $h['username'];
                $foto = $h['foto'];
            }

            $data_session = array(
                'status_pelanggan' => 'login',
                'nama_pelanggan' => $nama,
                'username_pelanggan' => $username,
                'id_pelanggan' => $id_user,
                'foto_pelanggan' => $foto,
            );

            $this->session->set_userdata($data_session);
            $this->session->set_flashdata('berhasil', 'Selamat datang <strong>'.$this->session->userdata('username').'</strong>');

            redirect(base_url('home'));
        } else {
            $this->session->set_flashdata('gagal', 'Username dan Password tidak cocok');
            redirect(base_url('login'));
        }
    }

    public function proses_register()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('register'));
        } else {
            $insert['nama'] = $this->input->post('nama');
            $insert['email'] = $this->input->post('email');
            $insert['no_telp'] = $this->input->post('no_telp');
            $insert['jns_kelamin'] = $this->input->post('jns_kelamin');
            $insert['alamat'] = $this->input->post('alamat');
            $insert['username'] = $this->input->post('username');
            $insert['password'] = md5($this->input->post('password'));
            $insert['created_at'] = date('Y-m-d H:i:s');
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
            $this->M_data->insert($insert, 'user');

            $this->session->set_flashdata('berhasil', 'Register berhasil.');
            redirect(base_url('login'));
        }
    }

    public function logout(){
        $this->session->sess_destroy();
		redirect(base_url('login'));
    }
}
