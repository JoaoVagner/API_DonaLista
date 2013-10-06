<?php

namespace Model;

class Login extends \Fuel\Core\Model {

    public $collection = 'users';

    public function __construct() {
        
    }

    public function login($username, $password) {
        $userCollection = \Mongaconnector::collection($this->collection);

        $params = array(
            'username' => $username,
            'password' => \Fuel\Core\Crypt::encode($password)
        );

        $searchUser = $userCollection->find($params);

        if ($searchUser->count() > 0) {
            return $searchUser->toArray();
        } else {
            return array('error' => true, 'message' => 'username or password not foud in database');
        }
    }

    public function recovery($email, $birthday) {
        $userCollection = \Mongaconnector::collection($this->collection);

        $params = array(
            'email' => $username,
            'birthday' => $birthday
        );

        $searchUser = $userCollection->find($params);

        if ($searchUser->count() > 0) {
            //to-do: send email to user to new password
            return $searchUser->toArray();
        } else {
            return array('error' => true, 'message' => 'username or password not foud in database');
        }
    }
    
    private function send_email_recovery($dataUser) {
        
    }

}