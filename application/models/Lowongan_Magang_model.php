<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan_magang_model extends CI_Model{
    private $table_name = 'tbl_lowongan_magang';
    public $id_divisi;
    public $posisi;

    public function getAll(){
        $this->db->select('tbl_lowongan_magang.*, tbl_divisi.nama_divisi');
        $this->db->from($this->table_name);
        $this->db->join('tbl_divisi', 'tbl_divisi.id_divisi = tbl_lowongan_magang.id_divisi');
        $this->db->order_by('posisi','ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id($id){ 
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_lowongan_magang', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save($data){
        $this->db->insert($this->table_name,$data);
        return true;
    }

    public function update($id,$data){
        $this->db->where('id_lowongan_magang', $id);
        $this->db->update($this->table_name,$data);
        return true;
    }

    public function delete($id){
        $this->db->where('id_lowongan_magang', $id);
        $this->db->delete($this->table_name);
        return true;
    }


}

?>