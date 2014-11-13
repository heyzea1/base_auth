<?php

Class User {
  public $data;

  function __construct($_data) {
    $this->data = $_data;
  }

  function set_as_current_user(){
    $_SESSION['user_id'] = $this->data['id'];
  }

  function check_password($pure_password){
    return self::encrypt_password($pure_password) == $this->data['encrypted_password'];
  }

  static function encrypt_password($pure_password) {
    return password_hash($pure_password, PASSWORD_BCRYPT, ['salt' => APP_SALT]);
  }

  static function current_user_id(){
    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
  }

  static function find_by_email($email){
    $data = Database::single_line_from_query("SELECT * from users where email = ".Database::escape($email));
    return $data ? new User($data) : false;
  }

  static function find_by_id($id){
    $data = Database::single_line_from_query("SELECT * from users where id = ".Database::escape($id));
    return $data ? new User($data) : false;
  }
}