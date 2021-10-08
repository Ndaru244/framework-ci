<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('role_user') != 1){
            $this->session->set_flashdata('pesan','
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Anda Belum Login Sebagai Admin!!!<a class="text-warning" href='.base_url().'> Kembali</a></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
            redirect(base_url('login'),'refresh');
        }
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('App_model');
    }

    public function index() {
        $barang         = $this->db->count_all('barang');
        $barang_masuk   = $this->db->count_all('barang_masuk');
        $barang_keluar  = $this->db->count_all('barang_keluar');
        $pesanan        = $this->db->count_all('detail_pesan');
        $data = array(
            'title'         => 'Dashboard',
            'nama_app'      => 'clothing',
            'nama_page'     => 'Dashboard',
            'barang'        => $barang,
            'barang_masuk'  => $barang_masuk,
            'barang_keluar' => $barang_keluar,
            'pesanan'       => $pesanan,
        );

        $this->load->view('app/templates/header',$data);
        $this->load->view('app/lib/home',$data);
        $this->load->view('app/templates/footer',$data);
    }

    public function data_barang() {
        $barang = $this->App_model->tampil('barang');
        $data = array(
            'title'     => 'Barang',
            'nama_app'  => 'clothing',
            'nama_page' => 'Data barang',
            'barang'    => $barang
        );

        $this->load->view('app/templates/header',$data);
        $this->load->view('app/lib/barang/data_barang',$data);
        $this->load->view('app/templates/footer',$data);
    }
    public function barang_tambah() {
        $validasi = $this->form_validation;
        $validasi->set_rules(
            'nama_brg',
            'Nama barang',
            'required', array('required' => '%s Harus Diisi')
        );
        $validasi->set_rules(
            'kat_id',
            'Kategori Barang',
            'required', array('required' => '%s Harus Diisi')
        );
        $validasi->set_rules(
            'stok_brg',
            'Stok Barang',
            'required', array('required' => '%s Harus Diisi')
        );
        $validasi->set_rules(
            'harga_brg',
            'Harga Barang',
            'required', array('required' => '%s Harus Diisi')
        );
        
        if ($validasi->run()) {
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']  = '2400';
            $config['max_width']  = '2024';
            $config['max_height']  = '2024';

            $this->upload->initialize($config);
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar_brg')) {
                $barang = $this->App_model->tampil('barang');
                $kategori = $this->App_model->tampil('kategori');
                $data = array(
                    'title'     => 'Tambah Data Barang',
                    'nama_app'  => 'clothing',
                    'nama_page' => 'Tambah Data Barang',
                    'kategori'  => $kategori,
                    'barang'    => $barang,
                    'error'     => $this->upload->display_errors()
                );
                $this->load->view('app/templates/header',$data);
                $this->load->view('app/lib/barang/tambah_barang',$data);
                $this->load->view('app/templates/footer',$data);
            } else {
                $upload_gambar = array('upload_data' => $this->upload->data());
                
                $config['image_library']  = 'GD2';
                $config['source_image']   = './assets/uploads/' . $upload_gambar['upload_data']['file_name'];
                $config['create_thumb']   = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']          = 250;
                $config['height']         = 250;
                $config['thumb_marker']   = NULL;
                $config['new_image']      = './assets/uploads/thumbs/';
                
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = array(
                    'nama_brg'      => $this->input->post('nama_brg'),
                    'ket_brg'       => $this->input->post('ket_brg'),
                    'kat_id'        => $this->input->post('kat_id'),
                    'stok_brg'      => $this->input->post('stok_brg'),
                    'harga_brg'     => $this->input->post('harga_brg'),
                    'total_brg	'   => $this->input->post('stok_brg') * $this->input->post('harga_brg'),
                    'gambar_brg'    => $upload_gambar['upload_data']['file_name']
                );
                $this->image_lib->clear();
                $this->App_model->tambah('barang',$data);
                $this->session->set_flashdata('sukses', 'Berhasil menambah data');
                redirect(base_url('barang'),'refresh');
            }
        }
        $barang = $this->App_model->tampil('barang');
        $kategori = $this->App_model->tampil('kategori');
        $data = array(
            'title'     => 'Tambah Data Barang',
            'nama_app'  => 'clothing',
            'nama_page' => 'Tambah Data Barang',
            'kategori'  => $kategori,
            'barang'    => $barang
        );
        $this->load->view('app/templates/header',$data);
        $this->load->view('app/lib/barang/tambah_barang',$data);
        $this->load->view('app/templates/footer',$data);
    }

    public function edit_barang($id) {
        $id_brg = array('id_brg' => $id);
        $validasi = $this->form_validation;
        $validasi->set_rules(
            'nama_brg',
            'Nama barang',
            'required', array('required' => '%s Harus Diisi')
        );
        $validasi->set_rules(
            'kat_id',
            'Kategori Barang',
            'required', array('required' => '%s Harus Diisi')
        );
        $validasi->set_rules(
            'harga_brg',
            'Harga Barang',
            'required', array('required' => '%s Harus Diisi')
        );

        if ($validasi->run() === FALSE) {
            $barang = $this->App_model->tampil_byid($id_brg,'barang');
            $kategori = $this->App_model->tampil('kategori');
            $data = array(
                'title'     => 'Edit Data Barang',
                'nama_app'  => 'clothing',
                'nama_page' => 'Edit Data Barang',
                'kategori'  => $kategori,
                'barang'    => $barang
            );
            $this->load->view('app/templates/header',$data);
            $this->load->view('app/lib/barang/edit_barang',$data);
            $this->load->view('app/templates/footer',$data);
        } else {
            $barang = $this->App_model->tampil_byid($id_brg,'barang');
            $data = array(
                'nama_brg'      => $this->input->post('nama_brg'),
                'ket_brg'       => $this->input->post('ket_brg'),
                'kat_id'        => $this->input->post('kat_id'),
                'harga_brg'     => $this->input->post('harga_brg'),
                'total_brg	'   => $barang->stok_brg * $this->input->post('harga_brg')
            );
            $rekap = array(
                'nama_brg'      => $this->input->post('nama_brg'),
                'harga_brg'     => $this->input->post('harga_brg')
            );
            $this->App_model->edit($id_brg,'barang_masuk',$rekap);
            $this->App_model->edit($id_brg,'barang_keluar',$rekap);
            $this->App_model->edit($id_brg,'barang',$data);
            $this->session->set_flashdata('sukses', 'Berhasil mengedit data');
            redirect(base_url('barang'),'refresh');
        }
    }

    public function hapus_barang($id) {
        $id_brg = array('id_brg' => $id);
        $data = $this->App_model->tampil_byid($id_brg,'barang');
        $this->App_model->hapus('barang',$id_brg);
        unlink('./assets/uploads/' . $data->gambar_brg);
        unlink('./assets/uploads/thumbs/' . $data->gambar_brg);
        $this->session->set_flashdata('sukses', 'Berhasil menghapus data');
        redirect('barang', 'refresh');
    }

    public function tambah_stok() {
        $validasi = $this->form_validation;
        $validasi->set_rules(
            'stok_brg',
            'Stok',
            'required', array('required' => '%s Harus Diisi')
        );
        if ($validasi->run() === FALSE) {
            redirect(base_url('barang/tambah'),'refresh');
        } else {
            $id_brg = $this->input->post('id_brg');
            $where = array('id_brg' => $id_brg);
            
            $barang = $this->App_model->tampil_byid($where,'barang');
            $harga = $barang->harga_brg;
            $stok_baru = $this->input->post('stok_brg') + $barang->stok_brg;
            
            $data = array(
                'stok_brg' => $stok_baru,
                'total_brg	' => $stok_baru * $harga
            );
            $rekap = array(
                'nama_brg'  => $barang->nama_brg,
                'harga_brg' => $barang->harga_brg,
                'qty'       => $this->input->post('stok_brg'),
                'tgl_masuk' => date('Y-m-d H:m:s')
            );
            
            $this->App_model->edit($where, 'barang', $data);
            $this->App_model->tambah('barang_masuk',$rekap);
            $this->session->set_flashdata('sukses', 'Berhasil menambah stok');
            redirect(base_url('barang'),'refresh');
        }
    }
    public function kategori() {
        $validasi = $this->form_validation;
        $validasi->set_rules(
            'kat_nama',
            'Nama Kategori',
            'required|is_unique[kategori.kat_nama]',
            array(
                'required' => '%s Harus Diisi',
                'is_unique' => '%s Sudah Ada!!'
                )
        );
        if ($validasi->run() === FALSE) {
            $kategori = $this->App_model->tampil('kategori');
            $data = array(
                'title'     => 'Kategori',
                'nama_app'  => 'clothing',
                'nama_page' => 'Kategori',
                'kategori'  => $kategori
            );
    
            $this->load->view('app/templates/header',$data);
            $this->load->view('app/lib/barang/kategori',$data);
            $this->load->view('app/templates/footer',$data);
        } else {
            $data = array(
                'kat_nama' => $this->input->post('kat_nama')
            );
            $this->App_model->tambah('kategori',$data);
            $this->session->set_flashdata('sukses', 'Berhasil menambah data');
            redirect(base_url('kategori'), 'refresh');
        }
    }

    public function edit_kategori($id) {
        $id_kat = array('kat_id' => $id);
        $validasi = $this->form_validation;
        $validasi->set_rules(
            'kat_nama','Nama Kategori',
            'required',array('required' => '%s Harus Diisi')
        );
        if ($validasi->run() === FALSE) {
            $kategori = $this->App_model->tampil_byid($id_kat,'kategori');
            $data = array(
                'title'     => 'Edit Kategori',
                'nama_app'  => 'clothing',
                'nama_page' => 'Edit Kategori',
                'kategori'  => $kategori
            );

            $this->load->view('app/templates/header',$data);
            $this->load->view('app/lib/barang/edit_kategori',$data);
            $this->load->view('app/templates/footer',$data);
        } else {
            $data = array(
                'kat_nama' => $this->input->post('kat_nama')
            );
            $this->App_model->edit($id_kat,'kategori',$data);
            $this->session->set_flashdata('sukses', 'Berhasil mengedit data');
            redirect(base_url('kategori'), 'refresh');
        }
    }
    
    public function hapus_kategori($id) {
        $id_kat = array('kat_id' => $id);
        $this->App_model->hapus('kategori',$id_kat);
        $this->session->set_flashdata('sukses', 'Berhasil menghapus data');
        redirect('kategori', 'refresh');
    }

    public function barang_masuk() {
        $rekap = $this->App_model->tampil('barang_masuk');
        $data = array(
            'title'     => 'Rekap Barang Masuk',
            'nama_app'  => 'clothing',
            'nama_page' => 'Rekap Barang Masuk',
            'rekap'     => $rekap
        );

        $this->load->view('app/templates/header',$data);
        $this->load->view('app/lib/rekap/barang_masuk',$data);
        $this->load->view('app/templates/footer',$data);
    }

    public function barang_keluar() {
        $rekap = $this->App_model->tampil('barang_keluar');
        $data = array(
            'title'     => 'Rekap Barang Keluar',
            'nama_app'  => 'clothing',
            'nama_page' => 'Rekap Barang Keluar',
            'rekap'     => $rekap
        );

        $this->load->view('app/templates/header',$data);
        $this->load->view('app/lib/rekap/barang_keluar',$data);
        $this->load->view('app/templates/footer',$data);
    }
    public function pesanan() {
        $pesanan = $this->App_model->tampil_join('detail_pesan','users');
        $data = array(
            'title'     => 'Data Pesanan',
            'nama_app'  => 'clothing',
            'nama_page' => 'Data Pesanan',
            'pesanan'   => $pesanan
        );

        $this->load->view('app/templates/header',$data);
        $this->load->view('app/lib/pesanan/data_pesanan',$data);
        $this->load->view('app/templates/footer',$data);
    }

}
/* End of file Dashboard.php */
?>