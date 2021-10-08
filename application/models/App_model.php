<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class App_model extends CI_Model {

    public function cek_login(){
        $email    = set_value('email');
        $password = set_value('password');

        $result = $this->db->where('email',$email)->where('password',$password)->limit(1)->get('users');
        if($result->num_rows() > 0){
            return $result->row();
        }else{return array();}
    }
    
    public function is_login($email,$nama){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email'=>$email,'nama_user'=>$nama));
        $query = $this->db->get();
        return $query->row();
    }

    public function tampil($tabel) {
        $query = $this->db->get($tabel);
        return $query->result();
    }
    public function tampil_join($table1,$table2){
        $this->db->select($table1.'.*,'.$table2.'.*');
        $this->db->from($table1);
        $this->db->join($table2, $table2.'.id_user='.$table1.'.id_pelanggan');
        $query = $this->db->get ();
        return $query->result ();
    }
    public function data_pagination($limit, $start) {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->group_by('id_brg');
        $this->db->order_by('id_brg');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result();
    }
    public function tampil_byid($id,$tabel) {
        $this->db->where($id);
        $query = $this->db->get($tabel);
        return $query->row();
    }
    public function jumlah($tabel) {
        $query = $this->db->get($tabel);
        return $query->num_rows();
    }
    public function tambah($tabel,$data) {
        return $this->db->insert($tabel, $data);
    }
    public function edit($id,$tabel,$data) {
        $this->db->where($id);
        return $this->db->update($tabel, $data);
    }
    public function hapus($tabel,$id) {
        return $this->db->delete($tabel, $id);
    }

}

/* End of file App_model.php */

?>