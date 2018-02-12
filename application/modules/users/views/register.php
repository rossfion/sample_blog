<div class="register">
	<h1 class="title_h1">Register</h1>

	<?php 
	echo validation_errors("<p class='error'>", "</p>");

	?>

	<p>Please fill in your details and hit Submit</p>

	<?php
	echo form_open(base_url()."users/submit_register");

	$data = array(
        'name'          => 'first_name',
        'id'            => 'first_name',
        'placeholder'   => 'First Name',
		);
	echo form_input($data);
	echo "<br>";

	$data = array(
        'name'          => 'last_name',
        'id'            => 'last_name',
        'placeholder'   => 'Last Name',
		);
	echo form_input($data);
	echo "<br>";

	$data = array(
        'name'          => 'email',
        'id'            => 'email',
        'placeholder'   => 'E-mail',
		);
	echo form_input($data);
	echo "<br>";

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
        'name'          => 'password_confirmation',
        'id'            => 'password_confirmation',
        'placeholder'   => 'Password Confirmation',
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

	<p>Already a member?  <a class="alt_link" href="/users/login">Log In!</a></p>
</div>

<script src="/assets/js/navbar.js"></script>