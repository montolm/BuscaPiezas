<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH')) {
    exit('No direct script access');
}

class Login_control extends CI_Api {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->model('Api_model');
    }

    function index() {
        $this->load->view('index');
    }

    /* Retorna si existe el usuario via ajax */

    public function userExist() {
        $username = $this->input->post('fullName');
        $verify_username = $this->Login_model->verifyUsername($username);
        if ($verify_username == 1) {
            echo TRUE;
        } else {
            echo FALSE;
        }
    }

    /* Llama la vista user */

    public function urlUser() {
        $this->loadView('user');
    }

    /* Consulta si el usuario y clave existen como usuario activo y registrado. */

    public function validateLogin() {
        if ($this->input->post()) {
            $user_name = $this->input->post('email');
            $password = $this->input->post('password');
            if ($user_name !== '' && $password !== '') {
                $register = $this->Login_model->validateUserModel($user_name, md5($this->input->post('password')));
                //Si es cero no existe usuario 
                if ($register == 0) {
                    //$this->loadView('login');
                    redirect($this->config->item('CONSTANT_LOADVIEW') . 'login' . '');
                } else {
                    $user_id = $this->Api_model->getId('user_replacement', 'email', 'id_user', $user_name);
                    $newdata = array(
                        'username' => $user_name,
                        'email' => $user_name,
                        'id_user' => $user_id,
                        'logged' => TRUE
                    );
                    $this->createSesion($newdata);
                    redirect($this->config->item('CONSTANT_LOADVIEW') . 'index' . '');
                }
            } else {
                redirect($this->config->item('CONSTANT_LOADVIEW') . 'index' . '');
            }
        } else {
            if ($this->isLogin()) {
                echo 'ESTA LOGUEADO';
            } else {
                echo 'NO LOGUIN';
            }
        }
        $password = null;
    }

}
