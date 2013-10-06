<?php

namespace Users;

class Controller_Index extends \Controller_Rest {
    
    public function action_test() {
        return $this->response(array(
                    'foo' => \Input::get('foo'),
                    'baz' => array(
                        1, 50, 219
                    ),
                    'empty' => null
        ));
    }

}
