<?php
/*
* Mysql database class - only one connection alowed
*/
class Database {
    private $_connection;
    private static $_instance; //The single instance
    private $_host     = MYSQL_HOST;
    private $_username = MYSQL_USER;
    private $_password = MYSQL_PASSWORD;
    private $_database = MYSQL_DATABASE;

    public static function getInstance() {
        if(!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct() {
        $this->_connection = new mysqli($this->_host, $this->_username, 
            $this->_password, $this->_database);
        
        mysqli_query($this->_connection, 'set names utf8');

        if(mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysql_error(), E_USER_ERROR);
        }
    }

    private function __clone() { }

    public function getConnection() {
        return $this->_connection;
    }

    public static function query($sql){

        $result = mysqli_query(Database::getInstance()->getConnection(), $sql);
        if(mysqli_connect_errno())
            die($query.':'.mysqli_connect_error());
        else 
            return $result;
    }
    public static function single_line_from_query($sql){
        $results = Database::query($sql." LIMIT 1")->fetch_array(MYSQLI_ASSOC);
        return empty($results) ? false : $results;
    }
    
    public static function escape($str){
        return '"'.mysqli_real_escape_string(Database::getInstance()->getConnection(), $str).'"';
    }

}
