<?php
Class ApplicationView {
  static function render_html_page($content){
    echo self::get_page_header();
    echo $content;
    echo self::get_page_footer();
  }

  static function get_page_header() {

    $content = <<<HTML
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Base Auth</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="assests/style.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="assests/vendor/verify.notify.min.js"></script>
    <script src="assests/vendor/placeholders.min.js"></script>
  </head>
  <body>
    <div class="container">

HTML;
    return $content;
  }

  static function get_page_footer(){
     $content = <<<HTML

    </div>
  </body>
</html>
HTML;
    return $content;
  }

  static function genereate_flash_error($msg){
    if ($msg!='')
      return "<div class=\"alert alert-danger\" role=\"alert\">$msg</div>";
    else 
      return "";
  }
}