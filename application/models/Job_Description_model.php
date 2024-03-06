<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_Description_model extends CI_Model{
    private $table_name = 'tbl_job_description';
    public $job_description;

    public function getAll(){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->order_by('job_description', 'ASC');
        $this->db->where('status','TRUE');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_job_description',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save($data){
        $this->db->insert($this->table_name,$data);
        return true;
    }

    public function update($id,$data){
        $this->db->where('id_job_description',$id);
        $this->db->update($this->table_name,$data);
        return true;
    }

    public function delete($id){
        $data = array(
            'status' => 'FALSE'
        );

        $this->db->where('id_job_description',$id);
        $this->db->update($this->table_name,$data);
        return true;
    }


}