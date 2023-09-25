<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
    }

	public function login()
	{
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $this->load->view('sistem/auth/login', $data);
	}

    public function proses_login()
    {
        //form validasi
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('gagal', 'Username dan Password harus diisi');
            redirect('sistem/authcontroller/login');
            die();
        }        

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => md5($password)
        );
        $cek = $this->M_data->cek_login('admin', $where);

        if ($cek->num_rows() == 1) {

            $dataadmin = $cek->result_array();

            foreach ($dataadmin as $h) {
                $level_akses = $h['level'];
                $id_user = $h['id'];
                $username = $h['username'];
                $foto = $h['foto'];
            }

            $data_session = array(
                'status' => 'login',
                'username' => $username,
                'level' => $level_akses,
                'id_user' => $id_user,
                'foto' => $foto,
            );

            $this->session->set_userdata($data_session);
            $this->session->set_flashdata('berhasil', 'Selamat datang <strong>'.$this->session->userdata('username').'</strong>');

            redirect('sistem/dashboard');
        } else {
            $this->session->set_flashdata('gagal', 'Username dan Password tidak cocok');
            redirect('sistem/authcontroller/login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
		redirect('sistem/authcontroller/login');
    }
}
