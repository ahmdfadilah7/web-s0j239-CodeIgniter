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
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('mua/auth/login', $data);
	}

    public function register()
    {
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('mua/auth/register', $data);
    }

    public function proses_register()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
        $this->form_validation->set_rules('jns_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', validation_errors());
            redirect(base_url('mua/register'));
        } else {
            $insert['nama'] = $this->input->post('nama');
            $insert['email'] = $this->input->post('email');
            $insert['no_telp'] = $this->input->post('no_telp');
            $insert['jns_kelamin'] = $this->input->post('jns_kelamin');
            $insert['username'] = $this->input->post('username');
            $insert['password'] = md5($this->input->post('password'));
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
            $this->M_data->insert($insert, 'mua');

            $this->session->set_flashdata('berhasil', 'Register make up artist berhasil.');
            redirect(base_url('mua/login'));
        }
    }

    public function proses_login()
    {
        //form validasi
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('gagal', 'Username dan Password harus diisi');
            redirect('mua/login');
            die();
        }        

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => md5($password)
        );
        $cek = $this->M_data->cek_login('mua', $where);

        if ($cek->num_rows() == 1) {

            $dataadmin = $cek->result_array();

            foreach ($dataadmin as $h) {
                $id_user = $h['id'];
                $nama = $h['nama'];
                $foto = $h['foto'];
            }

            $data_session = array(
                'status_mua' => 'login',
                'nama_mua' => $nama,
                'id_mua' => $id_user,
                'foto_mua' => $foto,
            );

            $this->session->set_userdata($data_session);
            $this->session->set_flashdata('berhasil', 'Selamat datang <strong>'.$this->session->userdata('username').'</strong>');

            redirect('mua/dashboard');
        } else {
            $this->session->set_flashdata('gagal', 'Username dan Password tidak cocok');
            redirect('mua/login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
		redirect('mua/login');
    }
}
