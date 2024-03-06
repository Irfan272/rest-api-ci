<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Experience_model extends CI_Model{
    private $table_name = 'tbl_experience ';

    public $id_pelamar;
    public $cv_resume;
    public $link_instagram;
    public $link_twitter;
    public $link_linkedIn;

    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_experience', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save($data){
        $this->db->insert($this->table_name,$data);
        return true;
    }





}

?>
