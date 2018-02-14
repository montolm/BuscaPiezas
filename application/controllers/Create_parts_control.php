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
        $this->load->model('Api_model');
        $this->load->model('Create_part_model');
    }

    public function urlBP() {
        $this->loadView('create-parts');

    }

    public function createPart() {
        $user_name = $this->session->userdata('username');
        $id_vehiclePart_Sum = $this->Api_model->getMaxNUMId('replacement', 'id_replacement');
        $user_id_exist = $this->Api_model->getId('user_replacement', 'email', 'id_user', $user_name);
        $id_system = $this->input->post('selectCategory');
        $id_vehicle_type = $this->input->post('selectType');
        $id_gas = $this->input->post('selectGas');
        $id_state = $this->input->post('selectState');
        $id_part = $this->input->post('vehiclePart');
        $price_part = $this->input->post($id_part);
        $comment_part = $this->input->post($id_part . '_comment');
        $creation_date = date("y-m-d", time());
        $fec_actu = date("y-m-d", time());
        $mca_inh = 'N';

//        echo '$user_name '.$user_name.' $id_vehiclePart_Sum '.$id_vehiclePart_Sum.' $user_id_exist '.$user_id_exist.' $id_system '.$id_system.
//                ' $id_vehicle_type '.$id_vehicle_type.' $id_state '.$id_state.' $id_part '.$id_part.' $price_part '.$price_part.' $comment_part '.$comment_part.' $id_gas '.$id_gas;
//                
        if ($user_id_exist > 0) {

            $datos = array("id_replacement" => $id_vehiclePart_Sum,
                "id_system" => $id_system,
                "id_vehicle_type" => $id_vehicle_type,
                "id_gas" => $id_gas,
                "id_state" => $id_state,
                "id_part" => $id_part,
                "id_user_replacement" => $user_id_exist,
                "mca_inh" => $mca_inh,
                "creation_date" => $creation_date,
                "date_update" => $fec_actu,
                "price" => $price_part,
                "comment" => $comment_part);

            $result = $this->Create_part_model->createReplacementPart($datos);
            $returnValue = $this->Api_model->getException($result);

            if ($returnValue == 1) {
                //$NameMake = $this->Api_model->consultMakeName($id_vehicle_make);
               // $this->loadSesionModel($NameMake, NULL, $id_vehicle_make);
               echo TRUE;
            } else {
                echo FALSE;
            }
        } else {
            echo FALSE;
        }
    }

}
