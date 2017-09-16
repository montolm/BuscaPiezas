<?php

if (!defined('BASEPATH')) {
    exit('No direct script access');
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Busca_piezas_control
 *
 * @author montolio
 */
class Create_parts_control extends CI_Api {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('create-parts');
    }

    public function urlBP() {
        $this->loadView('create-parts'); //create-parts
    }
    public function createPart(){
        echo FALSE;
    }

}
