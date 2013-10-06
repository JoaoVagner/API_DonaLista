<?php

/**
 * Connector for Monga Vendor
 * 
 * @author João Vagner <joao.vagner at gmail.com.br>
 */
class Mongaconnector {

    /**
     * @var string
     */
    public static $username;

    /**
     * @var string
     */
    public static $password;

    /**
     * @var string
     */
    public static $dsn;

    /**
     * @var string
     */
    public static $database;

    public function __construct() {
        \Fuel\Core\Config::load('db');
        $mongoConfig = \Fuel\Core\Config::get('mongo.default');

        self::setDatabase($mongoConfig['database']);
        self::setPassword($mongoConfig['password']);
        self::setUsername($mongoConfig['username']);
        self::setDsn($mongoConfig['dsn']);
    }

    /**
     * 
     * connection Monga and return object database
     * 
     * @return Object Monga
     */
    public static function connection() {
        //connection mongaDB
        $connection = Monga::connection(self::getDsn(), array(
                        //'username' => self::getUsername(),
                        //'password' => self::getPassword()
        ));

        return $connection;
    }

    /**
     * select database using Monga ORM
     * 
     * @return object Monga
     */
    public function database() {
        $conn = self::connection();
        $database = $conn->database(self::getDatabase());

        return $database;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setDatabase($database) {
        $this->database = $database;
    }

    public function setDsn($dsn) {
        $this->dsn = $dsn;
    }

    public static function getUsername() {
        return self::$username;
    }

    public static function getPassword() {
        return self::$password;
    }

    public static function getDatabase() {
        return self::$database;
    }

    public static function getDsn() {
        return self::$dsn;
    }

}