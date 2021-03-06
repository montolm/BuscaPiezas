<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in th0e editor.
 */

class Api extends CI_Controller {
    /* Carga la vista del view solicitado */

    function loadView($view) {
        $this->load->view($view);
    }

    /* Carga las vista de las consultas */

    function loadView_c($view) {
        $this->load->view($this->config->item('CONSTANT_CARPETA_C') . $view);
    }

    /* Coloca el usuario en sesion al loguerase */

    function loadViewS($user) {
        $this->starSession($user);
        $this->load->view('home');
    }

    /* funcion como modelo de un ws que retorna un json */

    function nombre() {
        $name = $this->input->get('fullName');
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('foo' => $name)));
    }

    /* Metodo encargado para menejar sessiones de usuario todavia
      no esta en uso */

    public function starSession($user_sesion) {
        // $this->session->sess_destroy();
        $newdata = array(
            'username' => $user_sesion,
            'email' => 'johndoe@some-site.com',
            'logged_in' => TRUE
        );

        $this->session->set_userdata($newdata);

        // echo 'Name ' . $name;
    }

    /* Retorna el nombre de la vista */

    public function viewName($ViewName) {
        return $ViewName;
    }
    /*Elimina todos los datos de session al caducar el tiempo de inactividad
    de una sesion*/
    public function endSesionInactivity() {
      $this->session->sess_destroy();
       echo TRUE;
    }

}
