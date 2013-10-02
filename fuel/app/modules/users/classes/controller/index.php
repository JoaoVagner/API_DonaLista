<?php

namespace Users;

class Controller_Index extends \Controller_Rest {

    
    public function action_test() {
//        $monga = \Monga::connection("mongodb://localhost", array());
//        $database = $monga->database('donalista');
//        $collection = $database->collection('test');
//        $allCollection = $collection->find();
//        var_dump($allCollection->toArray());
        
        return $this->response(array(
                    'foo' => \Input::get('foo'),
                    'baz' => array(
                        1, 50, 219
                    ),
                    'empty' => null
        ));
    }

}
