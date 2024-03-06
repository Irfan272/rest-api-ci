<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar_model extends CI_Model{
    private $table_name = 'tbl_pelamar';
    public $id_lowongan;
    public $fullname;
    public $email;
    public $phone_number;
    

    public function getAll(){
        $this->db->select('tbl_lowongan.posisi, tbl_pelamar.*');
        $this->db->from($this->table_name);
        $this->db->join('tbl_lowongan', 'tbl_lowongan.id_lowongan = tbl_pelamar.id_lowongan');
      
        $this->db->order_by('posisi', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllPelamarJoin(){
        $this->db->select(' tbl_pelamar.*, tbl_lowongan.*, tbl_divisi.nama_divisi');
        $this->db->from($this->table_name);
        $this->db->join('tbl_lowongan', 'tbl_pelamar.id_lowongan = tbl_lowongan.id_lowongan');
        $this->db->join('tbl_divisi', 'tbl_lowongan.id_divisi = tbl_divisi.id_divisi');
        $this->db->where('tbl_pelamar.status','TRUE');
        $this->db->order_by('id_pelamar', 'ASC');
        $query = $this->db->get();
        return $query->result();
        
    }

    // public function getPelamarJoin_by_id($id){
    //     $this->db->select(' tbl_pelamar.*, tbl_lowongan.*, tbl_experience.*, tbl_divisi.nama_divisi, tbl_question.*');
    //     $this->db->from($this->table_name);
    //     $this->db->join('tbl_lowongan', 'tbl_pelamar.id_lowongan = tbl_lowongan.id_lowongan');
    //     $this->db->join('tbl_experience', 'tbl_pelamar.id_pelamar = tbl_experience.id_pelamar');
    //     $this->db->join('tbl_divisi', 'tbl_lowongan.id_divisi = tbl_divisi.id_divisi');
    //     $this->db->join('tbl_question', 'tbl_pelamar.id_pelamar = tbl_question.id_pelamar');
    //     $this->db->where('id_pelamar', $id);
    //     $query = $this->db->get();
    //     return $query->row();
        
    // }


    public function getPelamarJoin_by_id($id){
     $this->db->select(' tbl_pelamar.*, tbl_lowongan.*, tbl_experience.*, tbl_divisi.nama_divisi, tbl_question.*');
        $this->db->from($this->table_name);
        $this->db->join('tbl_lowongan', 'tbl_pelamar.id_lowongan = tbl_lowongan.id_lowongan');
        $this->db->join('tbl_experience', 'tbl_pelamar.id_pelamar = tbl_experience.id_pelamar');
        $this->db->join('tbl_divisi', 'tbl_lowongan.id_divisi = tbl_divisi.id_divisi');
        $this->db->join('tbl_question', 'tbl_pelamar.id_pelamar = tbl_question.id_pelamar');
        $this->db->where('tbl_pelamar.id_pelamar', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_pelamar', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_id_pelamar_by_id($id){
        $this->db->select('id_pelamar');
        $this->db->from($this->table_name);
        $this->db->where('id_pelamar', $id);
        $query = $this->db->get();
        return $query->row();
    }

    
    public function get_id_lowongan_by_id($id){
        $this->db->select('id_lowongan');
        $this->db->from($this->table_name);
        $this->db->where('id_pelamar', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save($data){
        $this->db->insert($this->table_name,$data);
        return true;
    }

    public function update_status($id){
        $data = array(
            'status' => 'TRUE'
        );
        $this->db->where('id_pelamar', $id);
        $this->db->update($this->table_name,$data);
        return true;
    }


    
}
