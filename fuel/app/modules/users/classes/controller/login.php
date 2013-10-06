<?php

namespace Users;

class Controller_Login extends \Controller_Rest {

    public function action_login() {
        $modelUser = new \Model\Login();
        $dataPost = \Input::all();

        $loginAuth = $modelUser->login($dataPost['username'], $dataPost['password']);

        return $this->response($loginAuth);
    }
    
    public function action_recovery() {
        $modelUser = new \Model\Login();
        $dataPost = \Input::all();

        $loginAuth = $modelUser->recovery($dataPost['email'], $dataPost['birthday']);

        return $this->response($loginAuth);
    }

}
