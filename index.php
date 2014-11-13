<?php
/*
  Application Load Block
*/
require_once 'config.php';
require_once 'lib/password.php';

$files = glob(__DIR__ . '/Classes/*.php');

foreach ($files as $file)
    require_once($file);

/*
  Here goes code, related for authentication controller
  Actually this block should be called by application router, but this this not realized in this application
  Checking for show OR post action actually belongs to router
*/

session_start();

if(isset($_POST['action']) && $_POST['action'] == 'login') {
  /*
    POST AuthenticationController
  */
  $view_data = AuthenticationController::create($_POST['email'], $_POST['password']);
  $content = AutheficationView::build_form($view_data);

} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'logout') {
  /*
    DESTROY AuthenticationController
  */
  AuthenticationController::destroy();
  $content = AutheficationView::build_form();

} else {
  /*
    GET AuthenticationController
  */
  if(User::current_user_id()){
    $view_data = AuthenticationController::show();
    $content = AutheficationView::build_wellcome_page($view_data);
  }
  else
    $content = AutheficationView::build_form();
}

/*
  Result Render
*/
ApplicationView::render_html_page($content);