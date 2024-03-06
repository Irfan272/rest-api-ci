<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan_Detail_model extends CI_Model{
    private $table_name = 'tbl_lowongan_detail';
    public $id_lowongan;
    public $requirement;
 
    public function getAll(){
        $this->db->select('tbl_lowongan.*, tbl_divisi.nama_divisi');
        $this->db->from($this->table_name);
        $this->db->join('tbl_divisi', 'tbl_divisi.id_divisi = tbl_lowongan.id_divisi');
        $this->db->order_by('posisi','ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getNameRequirement($id){
        $this->db->select('tbl_requirement.nama_requirement');
        $this->db->from($this->table_name);
        $this->db->join('tbl_requirement','tbl_lowongan_detail.id_requirement = tbl_requirement.id_requirement');
        $this->db->where('id_lowongan', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id($id){ 
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_lowongan_detail', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getByLowonganId($id){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_lowongan', $id);
        $query = $this->db->get();
        return $query->result();
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

    // public function delete($id){
    //    // Update field id_lowongan menjadi NULL atau 0 pada tbl_lowongan_detail
    //    $this->db->set('id_lowongan', NULL); // Atau sesuaikan dengan nilai default id_lowongan jika ada
    //    $this->db->where('id_lowongan', $id);
    //    $this->db->update('tbl_lowongan_detail');
    // }

    public function delete($id){
        $this->db->where('id_lowongan', $id);
        $this->db->delete($this->table_name);
        return true;
    }

}

?>