<?php
Class AuthenticationController{

  static function create($email, $password){
    $user = User::find_by_email(trim($email));

    if(!$user) 
      return ['error' => "User with email $email does not exist", 'email' => $email];
    if(!$user->check_password(trim($password)))
      return ['error' => "Password is invalid", 'email' => $email];

    $user->set_as_current_user();
    header("Location: index.php");
  }

  static function show(){
    $user_id = User::current_user_id();
    return ['user' => User::find_by_id($user_id)];
  }

  static function destroy(){
    session_unset();
    header("Location: index.php");
  }

}
