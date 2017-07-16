<?php
require_once 'core/init.php';
if(Input::exists()){
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            ),
            'password' => array(
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
            'name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            )
        ));
        if ($validation->passed()) {
            //register user
            $user = new User();
            $salt = Hash::salt(32);

            try{
                $user->create(array(
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'name' => Input::get('name'),
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => 1
                ));
                Session::flash('home', 'You have been registered Successfully you can now login');
                Redirect::to('login.php');
            }catch (Exception $e){
                die($e->getMessage());
            }
        } else {
            //Output errors
            foreach ($validation->errors() as $error) {
                $big_errors = $error . '<br>';
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
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sign Up to KCA Timetable</title>
        <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
  <div style="margin-top: 40px; color: #000; text-align: center;">
      <h3>Sign Up to KCA timetable or do you already have an<br> account with KCA timetable? <a href="login.php">Log In</a> </h3>
  </div>
    <div class="wrapper" style="border:none; min-height: 600px;">
	<div class="container" >
		<h1>Register</h1>
		
		<form class="form" action="" method="POST">
			 <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
        </div>
        <div class="field">
            <label for="password">Choose Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="field">
            <label for="password_again">Confirm Password</label>
            <input type="password" name="password_again" id="password_again">
        </div>
        <div class="field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>" autocomplete="off"><br>
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        </div>
			<button type="submit" id="login-button">Sign Up</button>
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
