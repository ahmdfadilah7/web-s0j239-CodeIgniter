<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status_pelanggan') != 'login'){
            redirect(base_url('login'));
        }
        $this->load->model('M_data');
        $this->load->library('upload');
    }

	public function index()
	{
		$data['view'] = 'cart/index';
        $data['setting'] = $this->M_data->selectDataWhere('*', 'setting')->row();
        $data['rekening'] = $this->M_data->selectDataWhere('*', 'rekening');

        $user_id = $this->session->userdata('id_pelanggan');
        $data['paket'] = $this->db->query(
                "SELECT 
                    paket.nama_paket, 
                    transaksi.invoice_id, 
                    mua.nama as nama_mua, 
                    rekening.nama_rekening,
                    rekening.no_rekening,
                    rekening.bank,
                    paket.harga_paket,
                    invoice.id,
                    invoice.kode_invoice,
                    invoice.status
                FROM transaksi 
                INNER JOIN paket ON transaksi.paket_id=paket.id
                INNER JOIN invoice ON transaksi.invoice_id=invoice.id
                INNER JOIN mua ON paket.mua_id=mua.id
                INNER JOIN rekening ON invoice.rekening_id=rekening.id
                WHERE invoice.status = '0' AND invoice.user_id = '$user_id'
                "
            );
        
        $data['invoice'] = $this->db->query(
                "SELECT 
                    invoice.*,
                    rekening.nama_rekening,
                    rekening.no_rekening,
                    rekening.bank
                FROM invoice
                INNER JOIN rekening ON invoice.rekening_id=rekening.id            
                WHERE status != '0' AND user_id = '$user_id'
                "
            );

        $this->load->view('layouts/app', $data);
	}

    public function get_order($id)
    {
        $paket = $this->db->query(
            "SELECT paket.*, mua.nama FROM paket INNER JOIN mua ON paket.mua_id=mua.id WHERE paket.id = '$id'" 
        )->row();

        echo json_encode($paket);
    }

    public function get_invoice($id)
    {
        $transaksi = $this->db->query(
            "SELECT  
                invoice.id,
                invoice.kode_invoice,
                paket.nama_paket,
                paket.harga_paket 
            FROM transaksi 
            INNER JOIN invoice ON transaksi.invoice_id=invoice.id 
            INNER JOIN paket ON transaksi.paket_id=paket.id 
            WHERE transaksi.invoice_id = '$id'
            " 
        )->result();
        foreach ($transaksi as $row) {
            $invoice_id = $row->id;
            $kode_invoice = $row->kode_invoice;
            $harga_paket[] = $row->harga_paket;
        }
        $data = array(
            'invoice_id' => $invoice_id,
            'kode_invoice' => $kode_invoice,
            'total' => array_sum($harga_paket)
        );

        echo json_encode($data);
    }

    public function pembayaran()
    {        
        $update['status'] = '1';
        $update['total'] = $this->input->post('total');
        $this->M_data->updateData($update, 'invoice', 'id', $this->input->post('invoice_id'));

        $insert['invoice_id'] = $this->input->post('invoice_id');
        $insert['created_at'] = date('Y-m-d H:i:s');
        $insert['updated_at'] = date('Y-m-d H:i:s');

        $config['upload_path'] = "assets/images/";
        $config['overwrite'] = TRUE;            
        $config['allowed_types'] = 'svg|SVG|jpg|bmp|BMP|png|PNG|JPG|jpeg|JPEG|gif|GIF';
        $dname = explode(".", $_FILES['bukti_pembayaran']['name']);
        $ext = end($dname);
        $nama = 'Bukti-Pembayaran'."-".time().'-'.rand(100,999).".".$ext;
        $config['file_name'] = $nama;
        $config['remove_spaces'] = FALSE;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('bukti_pembayaran')) {
        } else {
            $upload_data = $this->upload->data();

            $insert['bukti_pembayaran'] = 'assets/images/'.$nama;
        }
        
        $this->M_data->insert($insert, 'pembayaran');

        $this->session->set_flashdata('berhasil', 'Berhasil melakukan pembayaran.');
        redirect(base_url('cart'));
    }

    public function store()
    {
        $user_id = $this->session->userdata('id_pelanggan');
        $paket_id = $this->input->post('paket_id');
        $invoice = $this->db->query("SELECT * FROM invoice WHERE user_id = '$user_id' AND status = '0'");
        
        if ($invoice->num_rows() > 0) {
            $invoice_id = $invoice->row()->id;
            $transaksi = $this->db->query("SELECT * FROM transaksi WHERE paket_id = '$paket_id' AND invoice_id = '$invoice_id'");
            if ($transaksi->num_rows() > 0) {
            } else {
                $addtransaksi['invoice_id'] = $invoice_id;
                $addtransaksi['paket_id'] = $paket_id;
                $addtransaksi['created_at'] = date('Y-m-d H:i:s');
                $addtransaksi['updated_at'] = date('Y-m-d H:i:s');

                $this->M_data->insert($addtransaksi, 'transaksi');
            }
        } else {
            $max_invoice = $this->M_data->selectDataWhere('max(kode_invoice) as max_invoice', 'invoice');
            if ($max_invoice->num_rows() > 0) {
                $urutan = (int) substr($max_invoice->row()->max_invoice, 11, 3);
                $urutan++;
                $insert['kode_invoice'] = 'INV'.date('dmY').sprintf('%03s', $urutan);
            } else {
                $insert['kode_invoice'] = 'INV'.date('dmY').'001';
            }
            $insert['user_id'] = $this->session->userdata('id_pelanggan');
            $insert['rekening_id'] = $this->input->post('rekening_id');
            $insert['status'] = '0';
            $insert['created_at'] = date('Y-m-d H:i:s');
            $insert['updated_at'] = date('Y-m-d H:i:s');
            $this->db->insert('invoice', $insert);
            $invoice_id = $this->db->insert_id();

            $addtransaksi['invoice_id'] = $invoice_id;
            $addtransaksi['paket_id'] = $paket_id;
            $addtransaksi['created_at'] = date('Y-m-d H:i:s');
            $addtransaksi['updated_at'] = date('Y-m-d H:i:s');

            $this->M_data->insert($addtransaksi, 'transaksi');
        }

        $this->session->set_flashdata('berhasil', 'Berhasil menambahkan paket.');
        redirect(base_url('cart'));

    }
}
