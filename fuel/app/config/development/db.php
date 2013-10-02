<?php

/**
 * The development database settings. These get merged with the global settings.
 */
return array(
    'mongo' => array(
        // This group is used when no instance name has been provided.
        'default' => array(
            'hostname' => 'localhost',
            'database' => 'donalista',
        ),
        // List your own groups below.
        'my_mongo_connection' => array(
            'hostname' => 'localhost',
            'database' => 'my_db',
            'replicaset' => 'replica',
            'username' => 'user',
            'password' => 'p@s$w0rD',
        ),
    ),
);
