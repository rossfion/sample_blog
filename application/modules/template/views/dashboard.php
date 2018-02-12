<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
  </head>
  <body>

    <nav class="navbar">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" id="navbar_mobile_button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="#"><img id="travlogo" src="assets/images/travlogo.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
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
  		<div class="col-sm-12 admin_panel">

          <?php
            if (!isset($view_file)) {
              $view_file = "";
            }

            if($view_file == "manage") {
              $this->load->view("webpages/manage");
            }

            if($view_file == "create_edit") {
              $this->load->view("webpages/create_edit");
            }

            // echo "<br>".print_r($this->session->userdata); 

          ?>
			</div>
		</div>

    <div class="row">
      <div class="col-sm-12 footer">
        <p>&copy; 2017 <a href="http://www.travterrell.com" target="_blank">travterrell.com</a></p>
      </div>
    </div>

  </body>
</html>