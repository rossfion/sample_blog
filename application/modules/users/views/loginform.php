<div class="login">
	<h1 class="title_h1">Login</h1>

	<?php echo validation_errors("<p class='error'>", "</p>"); ?>

	<?php if ($this->session->flashdata("success_message")) {
		echo "<p class='success'>".$this->session->flashdata("success_message")."</p>";
	} ?>

	<p>Please fill in your details and hit Submit</p>

	<?php
	echo form_open(base_url()."users/submit_login");

	$data = array(
        'name'          => 'username',
        'id'            => 'username',
        'placeholder'   => 'Username',
		);
	echo form_input($data);
	echo "<br>";

	$data = array(
        'name'          => 'password',
        'id'            => 'password',
        'placeholder'   => 'Password',
		);
	echo form_password($data);
	echo "<br>";

	$data = array(
        'name'          => 'submit',
        'id'            => 'submit',
        'value'   		=> 'Submit',
		);
	echo form_submit($data);

	echo form_close(); ?>

	<p>Not a member?  <a class="alt_link" href="/users/register">Register!</a></p>
</div>

<script src="/assets/js/navbar.js"></script>