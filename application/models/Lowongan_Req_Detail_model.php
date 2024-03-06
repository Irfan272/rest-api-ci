<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan_Req_Detail_model extends CI_Model{
    private $table_name = 'tbl_lowongan_req_detail';
    public $id_lowongan;

    public $job_description;

    public function getByLowonganId($id){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_lowongan', $id);
        $query = $this->db->get();
        return $query->result();    
    }
    
    public function getNameRequirement($id){
        $this->db->select('tbl_requirement.nama_requirement');
        $this->db->from($this->table_name);
        $this->db->join('tbl_requirement','tbl_lowongan_req_detail.id_requirement = tbl_requirement.id_requirement');
        $this->db->where('id_lowongan', $id);
        $query = $this->db->get();
        return $query->result();
    }
    


    public function save($data){
        $this->db->insert($this->table_name,$data);
        return true;
    }

    public function delete($id){
        $this->db->where('id_lowongan',$id);
        $this->db->delete($this->table_name);
        return true;
    }

}