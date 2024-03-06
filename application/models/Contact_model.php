<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model{
    private $table_name = 'tbl_contact';
    public $firstname;
    public $lastname;
    public $email;
    public $message;

    public function getAll(){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('status', 'TRUE');
        $this->db->order_by('firstname', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function save($data){
        $this->db->insert($this->table_name,$data);
        return true;
    }

    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_contact', $id);
        $query = $this->db->get();
        return $query->row();
    }

}