<?php

/**
 * Signup class
 */
class Signup extends Controller
{
    public function index(){
        $user = new User();
        $result = $user->validate($_POST);
        // $db = new Database();
        // $db->create_tables();
        var_dump($result);
        show($user->errors);
        show($_POST);
        $data['title'] = "Signup";
        $this->view('signup',$data);
    }
}