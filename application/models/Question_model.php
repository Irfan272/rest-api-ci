<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_model extends CI_Model{
    private $table_name = 'tbl_question';
    private $table_detail = 'tbl_question_detail';

    public $id_divisi;
    public $pertanyaan;

    public function getAll(){
        $this->db->select('tbl_question.*, tbl_divisi.nama_divisi');
        $this->db->from($this->table_name);
        $this->db->join('tbl_divisi', 'tbl_divisi.id_divisi = tbl_question.id_divisi');
        $this->db->where('tbl_question.status','TRUE');
        $this->db->order_by('pertanyaan','ASC');
        $query = $this->db->get();
        return $query->result();
    }


    public function get_by_id($id){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_question', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_by_id_divisi($id){
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_divisi', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function save($data){
        $this->db->insert($this->table_name,$data);
        return true;
    }

    public function update($id,$data){
        $this->db->where('id_question', $id);
        $this->db->update($this->table_name,$data);
        return true;
    }

    public function delete($id){
        $data = array(
            'status' => 'FALSE'
        );
        $this->db->where('id_question', $id);
        $this->db->update($this->table_name,$data);
        return true;
    }

    // Table Quesion Detail
    public function save_detail($data){
        $this->db->insert($this->table_detail,$data);
        return true;
    }


}

?>