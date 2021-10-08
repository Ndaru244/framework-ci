<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('App_model');
    }

    public function index() {
        $config['base_url'] = base_url().'main/index/'; //site url
        $config['total_rows'] = $this->db->count_all('barang'); //total row
        $config['use_page_number']= TRUE;
        $config['per_page'] = 4;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '<i class="fas fa-chevron-right"></i>';
        $config['prev_link']        = '<i class="fas fa-chevron-left"></i>';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $config['first_url']= base_url();

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $barang = $this->App_model->data_pagination($config["per_page"], $page);
        $links = $this->pagination->create_links();
        $data = array(
            'title'         => 'Pesan Barang',
            'nama_app'      => 'clothing',
            'nama_page'     => 'Pesan Barang',
            'barang'        => $barang,
            'links'        => $links
        );
        $this->load->view('app/templates/header_front',$data);
        $this->load->view('app/user/home',$data);
        $this->load->view('app/templates/footer_front',$data);
    }
    
    public function lihat_pesanan() {
        $pesanan = $this->App_model->tampil_join('detail_pesan','users');
        $data = array(
            'title'         => 'Riwayat Pesanan',
            'nama_app'      => 'clothing',
            'nama_page'     => 'Riwayat Pesanan',
            'pesanan'       => $pesanan,
        );
        $this->load->view('app/templates/header_front',$data);
        $this->load->view('app/user/pesan/lihat_pesanan',$data);
        $this->load->view('app/templates/footer_front',$data);
    }

    public function tambah() {
        $id             = $this->input->post('id');
        $qty            = $this->input->post('qty');
        $price          = $this->input->post('price');
        $name           = $this->input->post('name');

        $data = array(
            'id'=>$id,
            'qty'=>$qty,
            'price'=>$price,
            'name'=>$name
        );

        $this->cart->insert($data);
        redirect(base_url(),'refresh');
    }

    public function keranjang() {
        $keranjang = $this->cart->contents();
        $data = array(
            'title'         => 'Keranjang',
            'nama_app'      => 'clothing',
            'nama_page'     => 'Data Keranjang',
            'keranjang'     =>$keranjang
        );
        $this->load->view('app/templates/header_front',$data);
        $this->load->view('app/user/pesan/keranjang',$data);
        $this->load->view('app/templates/footer_front',$data);
    }

    public function update($id) {
        $data = array(
            'rowid' => $id,
            'qty'   => $this->input->post('qty')
        );
        $this->cart->update($data);
        redirect(base_url('lihat_keranjang'),'refresh');
    }

    public function delete($id) {
        $this->cart->remove($id);
        redirect(base_url('lihat_keranjang'),'refresh');
    }
    
    public function delete_all() {
        $this->cart->destroy();
        redirect(base_url('lihat_keranjang'),'refresh');
    }

    public function checkout() {
        $keranjang = $this->cart->contents();
        $email = $this->session->userdata('email');
        $nama = $this->session->userdata('nama_user');
        $pelanggan = $this->App_model->is_login($email,$nama);

        $validasi = $this->form_validation;
        $validasi->set_rules(
            'alamat', 'Alamat', 'required', array('required' => '%s Harus Diisi')
        );
        
        if($validasi->run()===FALSE) {
            $data = array(
                'title'         => 'checkout',
                'nama_app'      => 'clothing',
                'nama_page'     => 'checkout',
                'pelanggan'     => $pelanggan,
                'keranjang'     =>$keranjang
            );
            $this->load->view('app/templates/header_front',$data);
            $this->load->view('app/user/pesan/checkout',$data);
            $this->load->view('app/templates/footer_front',$data);
        } else {
            $data = array(
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'kode_pesan' => $this->input->post('kode_pesan'),
                'status' => 'dipesan'
            );
            $this->App_model->tambah('detail_pesan',$data);
            foreach ($keranjang as $cart) :
                $barang   = $this->App_model->tampil_byid(array('id_brg'=>$cart['id']),'barang');
                $data = array(
                    'id_pelanggan' => $this->input->post('id_pelanggan'),
                    'kode_pesan'   => $this->input->post('kode_pesan'),
                    'id_brg'       => $cart['id'],
                    'nama_brg'     => $barang->nama_brg,
                    'harga'        => $cart['price'],
                    'jumlah'       => $cart['qty'],
                    'total'=> $cart['subtotal'],
                    'tgl_pesan'=> $this->input->post('tgl_pesan')
                );

                $this->App_model->tambah('pesan',$data);
            endforeach;
            $this->cart->destroy();
            $this->session->set_flashdata('sukses', 'Checkout Berhasil');
            redirect(base_url(), 'refresh');
        }
    }

}
/* End of file Main.php */
?>