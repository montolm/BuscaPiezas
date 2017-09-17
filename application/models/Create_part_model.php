<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Create_part_model
 *
 * @author montolio
 */
class Create_part_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /* Inserta piza por tipo de vehiculo */

    public function createReplacementPart($datos) {
        $insert = $this->db->insert('replacement', $datos);
        if ($insert > 0) {
            return $insert;
        } else {
            return 0;
        }
    }

}
