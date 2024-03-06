<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi_model extends CI_Model{
    private $table_name = 'tbl_divisi';
    public $nama_divisi;

    public function getAll(){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('status','TRUE');
        $this->db->order_by('nama_divisi','ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_divisi',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save($data){
        $this->db->insert($this->table_name,$data);
        return true;
    }

    public function update($id,$data){
        $this->db->where('id_divisi',$id);
        $this->db->update($this->table_name,$data);
        return true;
    }

    public function delete($id){
        $data = array(
            'status' => 'FALSE'
        );

        $this->db->where('id_divisi',$id);
        $this->db->update($this->table_name,$data);
        return true;
    }

}

?>