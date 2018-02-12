<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
  </head>
  <body>

  <!-- Check the see if the page in the index page or not.  If it is the index page it will hide the navbar and footer to execute the jQuery animations properly -->
  <?php
    if($view_file == "index") {
      $navbar_class = "navbar navbar_footer_index";
      $footer_class = "col-sm-12 footer navbar_footer_index";
    } else {
      $navbar_class = "navbar";
      $footer_class = "col-sm-12 footer";
    }
  ?>

    <nav class="<?php echo $navbar_class; ?>">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" id="navbar_mobile_button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="#"><img id="travlogo" src="/assets/images/travlogo.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul id="navlinks" class="nav navbar-nav navbar-right">
            <li><a href="/">HOME</a></li>
            <li><a href='/webpages/blog'>BLOG</a></li>
            <li><a href="/users/register">REGISTER</a></li>
            <?php if ($this->session->userdata("user_id")) {
                  echo "<li><a href='/webpages/manage'>MANAGE</a></li>";
                  echo "<li><a href='/users/logoff'>LOG OFF</a></li>";
                } else {
                  echo "<li><a href='/users/login'>LOG IN</a></li>";
                }
          ?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="row">
      <div class="col-sm-12 content">
        <?php
        if (!isset($view_file)) {
          $view_file = "";
        }

        if($view_file == "index") {
          $this->load->view("cms/index");
        }

        if($view_file == "post") {
          $this->load->view("cms/post");
        }

        if($view_file == "register") {
          $this->load->view("users/register");
        }

        if($view_file == "loginform") {
          $this->load->view("users/loginform");
        }

        if($view_file == "blog") {
          $this->load->view("webpages/blog");
        }

        // echo "<br>".print_r($this->session->userdata);
        // echo "<br>".$view_file;
        // echo "<br>".$navbar_class;
        // echo $footer_class;
        ?>
      </div>
    </div>

    <div class="row">
      <div class="<?php echo $footer_class; ?>">
        <p>&copy; <?php echo date("Y"); ?> <a href="http://www.travterrell.com" target="_blank">travterrell.com</a></p>
      </div>
    </div>

  </body>
</html>