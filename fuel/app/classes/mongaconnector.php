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

    /**
     * 
     * connection Monga and return object database
     * 
     * @return Object Monga
     */
    public static function connection() {

        \Fuel\Core\Config::load('db');
        $mongoConfig = \Fuel\Core\Config::get('mongo.default');

        self::setDatabase($mongoConfig['database']);
        self::setPassword($mongoConfig['password']);
        self::setUsername($mongoConfig['username']);
        self::setDsn($mongoConfig['dsn']);

        //connection mongaDB
        $connection = Monga::connection(self::getDsn(), array(
                        //'username' => self::getUsername(),
                        //'password' => self::getPassword()
        ));

        return $connection;
    }

    /**
     * select database;
     * 
     * @return object Monga
     */
    public static function database() {
        $conn = self::connection();
        return $conn->database(self::getDatabase());
    }

    /**
     * 
     * @return Object Collection
     */
    public static function collection($collection) {
        $database = self::database();

        return $database->collection($collection);
    }

    public static function setUsername($username) {
        self::$username = $username;
    }

    public static function setPassword($password) {
        self::$password = $password;
    }

    public static function setDatabase($database) {
        self::$database = $database;
    }

    public static function setDsn($dsn) {
        self::$dsn = $dsn;
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