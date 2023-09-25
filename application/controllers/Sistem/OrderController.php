<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {

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
		$data['view'] = 'sistem/order/index';
        $data['settings'] = $this->M_data->selectDataWhere('*', 'setting')->row();

        $mua_id = $this->session->userdata('id_mua');
        $data['invoice'] = $this->db->query(
            "SELECT 
                invoice.*,
                user.nama,
                user.no_telp,
                rekening.nama_rekening,
                rekening.no_rekening,
                rekening.bank
            FROM invoice
            INNER JOIN user ON invoice.user_id=user.id
            INNER JOIN rekening ON invoice.rekening_id=rekening.id
            INNER JOIN transaksi ON invoice.id=transaksi.invoice_id
            INNER JOIN paket ON transaksi.paket_id=paket.id
            GROUP BY transaksi.invoice_id
            ORDER BY invoice.id DESC
            "
        );

        $this->load->view('sistem/layouts/app', $data);
	}

    public function konfirmasi($kode_invoice)
    {
        $update['status'] = '2';
        $this->M_data->updateData($update, 'invoice', 'kode_invoice', $kode_invoice);

        $this->session->set_flashdata('berhasil', 'Konfirmasi pembayaran berhasil.');
        redirect(base_url('sistem/order'));
    }
}
