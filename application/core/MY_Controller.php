<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class CI_Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /* Retorna la fecha en que se crean los registros */

    public function getCreationDate() {
        return date("y-m-d", time());
    }

    /* Retorna la fecha en que se actualiza el registro */

    public function getUpdateDate() {
        return date("y-m-d", time());
    }

    /* Carga la vista deseada */

    public function loadView($view) {
        $this->load->view($view);
    }

    /* Retorna un array con los datos geolocalizacion */

    public function getLatitudeLongitude() {
        return '';
    }

    /* Inserta el inicio de sesion */

    public function createSesion($datos) {
        return $this->startSesion($datos);
    }

    /* Inicia la Sesion usuario */

    public function startSesion($datos) {
        return $this->session->set_userdata($datos);
    }

    /* Finaliza la Sesion usuario */

    public function closeSesion() {
        $usuario_data = array(
            'logged' => FALSE
        );
        $this->session->set_userdata($usuario_data);
    }

    /* Finaliza la Sesion Global de la aplicacion */

    public function closeAllSesion() {
        $this->sess_destroy();
    }
    
    /*Retorna TRUE si el usuario esta logueado*/
    public function isLogin(){
        return $this->session->userdata('logged');
    }
    
    function geolocalizar($direccion){
 
 
    // urlencode codifica datos de texto modificando simbolos como acentos
 
    $direccion = urlencode($direccion);
   
 
    // envio la consulta a Google map api
    $url = "http://maps.google.com/maps/api/geocode/json?address={$direccion}";
 
 
    // recibo la respuesta en formato Json
 
    $datosjson = file_get_contents($url);
    
 
    // decodificamos los datos Json
    $datosmapa = json_decode($datosjson, true);
 
 
    // si recibimos estado o status igual a OK, es porque se encontro la direccion
 
    if($datosmapa['status']='OK'){
 
        // asignamos los datos
        $latitud = $datosmapa['results'][0]['geometry']['location']['lat'];
 
        $longitud = $datosmapa['results'][0]['geometry']['location']['lng'];
        $localizacion = $datosmapa['results'][0]['formatted_address'];
 
        
            
 
            // Guardamos los datos en una matriz
            $datosmapa = array();           
 
            
            array_push(
 
                $datosmapa,
                    $latitud,
 
                    $longitud,
                    $localizacion
 
                );
            
 
            return $datosmapa;
            
 
        }
}

}
