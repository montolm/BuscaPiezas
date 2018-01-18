<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Search_parts
 *
 * @author montolio
 */
class Search_parts_control extends CI_Api {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Create_part_model');
    }

    public function index() {
        $this->loadView('search_parts');
    }

    /* Actualiza campos tabla replacement */

    public function updatePart() {
        $id_replacement = $this->input->post('partReplacement');
        $price = $this->input->post($id_replacement . '_price');
        $comment = $this->input->post($id_replacement . '_comment');
        $fec_actu = date("y-m-d", time());
        $datos = array('price' => $price,
            'comment' => $comment,
            'date_update' => $fec_actu);
        $result = $this->Create_part_model->updateReplacementPart($id_replacement, $datos);

        echo $result;
    }

}
