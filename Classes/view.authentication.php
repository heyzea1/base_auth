<?php
Class AutheficationView {
  static function build_form($view_data=[]){
    $email_value = isset($view_data['email']) ? " value='$view_data[email]'" : '';
    $content = '<form class="form-signin" role="form" method="post"><h2 class="form-signin-heading">Please sign in</h2>';
    if(isset($view_data['error']))
      $content .= ApplicationView::genereate_flash_error($view_data['error']);
    $content .= '
        <input type="hidden" name="action" value="login"/>
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" id="inputEmail" name="email" class="form-control" '.$email_value.' placeholder="Email address" data-validate="required,email" autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password"  name="password" id="inputPassword" class="form-control" placeholder="Password" data-validate="required,min(3)">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>';
      return $content;

  }

  static function build_wellcome_page($view_data){
    $content = '
      <div class="well block-wellcome">
        <p> Добро пожаловать, <b>'.$view_data['user']->data['name'].'</b></p>
        <a href="?action=logout">Выход</a>
      </div>
    ';
    return $content;
  }
}
