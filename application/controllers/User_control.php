<?php

/* Cambiar el nombre debe de ser Usuario_CI */

class User_control extends CI_Api {

    function __construct() {
        parent::__construct();
        $this->load->model('Api_model');
        $this->load->model('User_model');
    }

    function index() {
        $this->load->view('user');
    }

    /* Retorna si existe el email via ajax */

    public function emailExist() {
        
    }

    /* Retorna si existe el usuario via ajax */

    public function userExist() {
        
    }

    /* Llama la vista user */

    function urlUser() {
        $this->loadView('user');
    }

    function urlLogin() {
        $this->closeSesion();
        $this->loadView('login');
    }

    function createUser() {
        if ($this->input->post()) {
            $id_userSum = $this->Api_model->getMaxNUMId('user_replacement', 'id_user');
            $name = $this->input->post('firstname');
            $phone = $this->input->post('phone');
            $direction_street = $this->input->post('directionstreet');
            $direction_number = $this->input->post('directionNumber');
            $identification = $this->input->post('identification');
            $email = $this->input->post('email');
            $passw = md5($this->input->post('password'));
            $country = $this->input->post('selectCountry');
            $city = $this->input->post('selectCity');
            $name_country = $this->input->post('nameCountry');
            $name_city = $this->input->post('nameCity');
            // Buscamos la latitud, longitud en base a la direccion calle número, ciudad, país
            $localizar = $direction_street . ", " . $direction_number . ", " . $name_city . ", " . $name_country;
            $datosmapa = $this->geolocalizar($localizar);
            $latitud = $datosmapa[0]; //Latitud
            $longitude = $datosmapa[1]; //Longitude
            $mca_inh = 'N';
            //function return id role user
            $id_role = 1;
            if ($id_userSum > 0) {
                $datos = array("id_user" => $id_userSum,
                    "email" => $email,
                    "password" => $passw,
                    "street" => $direction_street,
                    "num_locale" => $direction_number,
                    "latitude" => $latitud,
                    "longitude" => $longitude,
                    "creation_date" => $this->getCreationDate(),
                    "date_update" => $this->getUpdateDate(),
                    "company_name" => $name,
                    "company_id" => $identification,
                    "mca_inh" => $mca_inh,
                    "id_role" => $id_role,
                    "id_country" => $country,
                    "id_city" => $city);
            }

            $result = $this->User_model->create_user_model($datos);

            if ($result > 0) {
                $this->loadView('login');
            } 
            // $returnValue = $this->Api_model->getException($result);
            // echo $returnValue;
        }
    }

    public function updateUser() {
        
    }

    public function deleteUser() {
        
    }

    public function consultUser() {
        
    }

}
