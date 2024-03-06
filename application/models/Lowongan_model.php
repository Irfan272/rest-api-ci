<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan_model extends CI_Model{
    private $table_name = 'tbl_lowongan';
    public $id_divisi;
    public $posisi;
    public $kategori;

    public function getAll(){
        $this->db->select('tbl_lowongan.*, tbl_divisi.nama_divisi');
        $this->db->from($this->table_name);
        $this->db->join('tbl_divisi', 'tbl_divisi.id_divisi = tbl_lowongan.id_divisi');
        $this->db->where('tbl_lowongan.status','TRUE');
        $this->db->order_by('posisi','ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getNameDivisi($id){
        $this->db->select('tbl_divisi.nama_divisi');
        $this->db->from($this->table_name);
        $this->db->join('tbl_divisi','tbl_divisi.id_divisi = tbl_lowongan.id_divisi');
        $this->db->where('id_lowongan',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_by_id($id){ 
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_lowongan', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_divisi_by_id($id){ 
        $this->db->select('id_divisi');
        $this->db->from($this->table_name);
        $this->db->where('id_lowongan', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save($data){
        $this->db->insert($this->table_name,$data);
        return true;
    }

    public function update($id,$data){
        $this->db->where('id_lowongan', $id);
        $this->db->update($this->table_name,$data);
        return true;
    }

    public function delete($id){
        $data = array(
            'status' => 'FALSE'
        );
        $this->db->where('id_lowongan', $id);
        $this->db->update($this->table_name,$data);
        return true;
    }


}

?>