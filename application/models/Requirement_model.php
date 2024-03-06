<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requirement_model extends CI_Model{
    private $table_name = 'tbl_requirement';
    public $nama_requirement;

    public function getAll(){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->order_by('nama_requirement', 'ASC');
        $this->db->where('status','TRUE');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_requirement',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save($data){
        $this->db->insert($this->table_name,$data);
        return true;
    }

    public function update($id,$data){
        $this->db->where('id_requirement',$id);
        $this->db->update($this->table_name,$data);
        return true;
    }

    public function delete($id){
        $data = array(
            'status' => 'FALSE'
        );
        $this->db->where('id_requirement',$id);
        $this->db->update($this->table_name,$data);
        return true;
    }


}