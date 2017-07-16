<?php
require_once 'core/init.php';
if(Input::exists()){
    if(Token::check(Input::get('token'))){
        $validate =new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));
        if($validation->passed()){
            $user = new User();
            $remember = (Input::get('remember')=== 'on')? true:false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);
            if($login){
                Redirect::to("index.php");
            }else{
                $big_errors = 'Sorry, logging in failed.';
            }
        }else{
            foreach($validation->errors() as $error){
                $big_errors = $error;
            }
        }
    }
}
if ( !empty($big_errors) ) {
	?>
	<script type="text/javascript">
		alert(<?php echo "('" . $big_errors . "')"; ?>);
	</script>
	<?php
}else{
	//Do nothing
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Log In to KCA Timetable</title>
        <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
  	<div style="margin-top: 40px; color: #000; text-align: center;">
     <h3>Sign In to KCA timetable but if you do not already have an<br> account with KCA timetable? <a href="register.php">Sign Up</a> </h3>
  </div>
    <div class="wrapper">
	<div class="container">
		<h1>Log In</h1>
		<form class="form" action="" method="POST">
			<input type="text" placeholder="Username" name="username" id="username" autocomplete="off">
			<input type="password" placeholder="Password" name="password" id="password" autocomplete="off">
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
			<button type="submit" id="login-button">Login</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li>KCA LOGIN </li>
		<li>PAGE</li>
		<li>TIMETABLE</li>
		<li>RESET PASSWORD</li>
		<li>UPDATE DATA</li>
		<li>KCA</li>
		<li>TIMETABLE</li>
		<li>PAGE</li>
		<li>KCA LOGIN</li>
		<li>RESET PASSWORD</li>
	</ul>
</div>
    
  </body>
</html>
