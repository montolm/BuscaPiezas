<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class User_model extends CI_Model {

    public function __construct() {

        parent::__construct();
    }

    function create_user_model($datos) {
        $insert = $this->db->insert('user', $datos);
        if ($insert > 0) {
            return $insert;
        } else {
            return 0;
        }
    }

}
