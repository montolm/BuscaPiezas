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
    }
    
    public function index(){
         $this->loadView('search_parts');
    }
}
