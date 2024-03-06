<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan_Job_Detail_model extends CI_Model{
    private $table_name = 'tbl_lowongan_job_detail';
    public $id_lowongan;

    public $job_description;

    public function getByLowonganId($id){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_lowongan', $id);
        $query = $this->db->get();
        return $query->result();    
    }

    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_lowongan', $id);
        $query = $this->db->get();
        return $query->row();
    }



    public function getNameJobDesc($id){
        $this->db->select('tbl_job_description.job_description');
        $this->db->from($this->table_name);
        $this->db->join('tbl_job_description','tbl_lowongan_job_detail.id_job_description = tbl_job_description.id_job_description');
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