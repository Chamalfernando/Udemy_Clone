<?php

/**
 * Login class
 */
class Login extends Controller
{
    public function index(){

        $data['title'] = "Login";
        $this->view('login',$data);
    }
}
