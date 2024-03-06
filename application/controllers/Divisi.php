<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('Divisi_model');
        $this->load->library('form_validation');
    }

    public function simpan(){
        $this->form_validation->set_rules('nama_divisi', 'Nama Divisi', 'required');

        if($this->form_validation->run() == TRUE){
            $data = array(
                'nama_divisi' => $this->input->post("nama_divisi")
            );

            $simpan = $this->divisi_model->save($data);

            if($simpan) {
                header('Content-Type: application/json');
                echo json_encode(
                    array(
                        'success' => true,
                        'message' => 'Data Berhasil Disimpan!'
                    )
                );
            }else{
                header('Content-Type: application/json');
                echo json_encode(
                    array(
                        'success' => false,
                        'message' => 'Data Gagal Disimpan!'
                    )
                );
            }
        }else{
            header('Content-Type: application/json');
            echo json_encode(
                array(
                    'success' => false,
                    'message' => validation_errors()
                )
            );
        }
    }


}