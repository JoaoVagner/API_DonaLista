<?php

return array(
    'fuelphp' => array(
        'app_created' => function() {
            if ($_SERVER['SCRIPT_NAME'] !== 'oil') {
                //loading db Mongo Configuration
                \Fuel\Core\Config::load('db');
                $mongoConfig = \Fuel\Core\Config::get('mongo.default');
                $connection = Monga::connection("{$mongoConfig['dsn']}", array());
                $database = $connection->database($mongoConfig['database']);

                $collectionApplicationAccess = $database->collection('applications_access');


                //get header using function
                $getHeader = function($key) {
                            $all = getallheaders();
                            return (isset($all[$key]) ? $all[$key] : null);
                        };

                $token = $getHeader('token');
                $appId = $getHeader('app_id');
                $secretId = $getHeader('secret_id');

                $paramsAuth = array(
                    'app_id' => $appId,
                    'secret_id' => $secretId,
                    'token' => $token,
                    'username' => !isset($_SERVER['PHP_AUTH_USER']) ? null : $_SERVER['PHP_AUTH_USER'],
                    'passsword' => !isset($_SERVER['PHP_AUTH_PW']) ? null : $_SERVER['PHP_AUTH_PW']
                );

                $authApp = $collectionApplicationAccess->find($paramsAuth);

                if (count($authApp->toArray()) <= 0) {

                    $response = New \Fuel\Core\Response();
                    $response->set_header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
                    $response->set_header('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT');
                    $response->set_header('Pragma', 'no-cache');
                    $response->set_header('Content-type', 'application/json');

                    $returnError = array(
                        'error' => true,
                        'message' => 'AUTH FAILED'
                    );

                    die($response->body(json_encode($returnError)));
                } else { 
                    
                    
                }
            }
        },
        'request_started' => function() {
            
        },
    )
);

/* End of file event.php */