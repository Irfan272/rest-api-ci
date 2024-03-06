<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    private $table_name = 'tbl_user';
    public $username;
    public $email;
    public $password;
    public $role;

    public function getAll(){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->order_by('username', 'ASC');
        $query = $this->db->get();
        return $query->result();   
    }

    public function get_by_email($email){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('email',$email);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            // Log or display the error
            log_message('error', 'User not found for email: ' . $email);
            return null;
        }
    }

    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_user',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save($data){
        $this->db->insert($this->table_name,$data);
        return true;
    }

    public function update($id,$data){
        $this->db->where('id_user',$id);
        $this->db->update($this->table_name,$data);
        return true;
    }

    public function delete($id){
        $this->db->where('id_user',$id);
        $this->db->delete($this->table_name);

        return true;
    }
}




?>