<?php
require_once 'core/init.php';
$user = new User();
if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}
if(Input::exists()){
    if(Token::check(Input::get('token'))){
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            )
        ));
        if($validation->passed()){
            //Update
            try{
                $user->update(array(
                    'name' => Input::get('name')
                ));
                Session::flash('home', 'Your details have been updated.');
                Redirect::to('index.php');
            }catch (Exception $e){
                die($e->getMessage());
            }
        }else{
            foreach($validation->errors() as $error){
                $big_errors = $error . '';
            }
        }
    }
}
//update password
if ( Input::exists() ) {
  if ( Token::check(Input::get('changepassword_token')) ) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'oldpassword' => array(
                'required' => true,
                'min' => 6
            ),
            'newpassword' => array(
                'required' => true,
                'min' => 6
            ),
            'newpassword_confirm' => array(
                'required' => true,
                'min' => 6,
                'matches' => 'newpassword'
            )
        ));
        if($validation->passed()){
            //If validation passes change password
          if ( Hash::make(Input::get('oldpassword'), $user->data()->salt) !== ($user->data()->password) ) {
            $big_errors = "Your current password is wrong, please try again!";
          }else{
            $salt = Hash::salt(32);
          }
            try{
                $user->update(array(
                    'password' => Hash::make(Input::get('newpassword'), $salt),
                    'salt' => $salt
                ));
                $password_email = decrypt(escape($user->data()->email_address), $key);
                $password_subject = "Password change was a success";
                $password_header = "From: noreply@aoaadvocates.com";
                $password_message = "
Dear ". decrypt(escape($user->data()->firstname), $key) ." ". decrypt(escape($user->data()->othername), $key) .",

How are you doing ". decrypt(escape($user->data()->firstname), $key) .", we hope you are well, your password was

successfully changed.

We thank you for staying with us,

Regards,

KCA
                ";
                mail($password_email, $password_subject, $password_message, $password_header);
                Session::flash('home', 'Your successfully edited/updated your password.');
                Redirect::to('update.php');
            }catch (Exception $e){
                die($e->getMessage());
            }
        }else{
            foreach($validation->errors() as $error){
                $big_errors = $error . '<br>';
            }
        }
  }
}
if ( !empty( $big_errors ) ) {
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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Update User Information</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Update User Information</a>
            </div>
            <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Pages <b class='caret'></b></a>
                    <ul class='dropdown-menu'>
                    <?php
                        echo    "<li>";
                          echo   "<a href='index.php'>Time Table</a>";
                        echo    "</li>";
                        echo    "<li>";
                          echo   "<a href='logout.php'>Log Out</a>";
                        echo    "</li>";
                      
                    ?>
                    </ul>
                  </li>
                </ul>
            </div>          
        </div>
        <!-- /.container -->
    </nav>
    <div style="border:1px solid #e2e2e2; width: 500px; min-height: 300px; margin:40px auto 40px auto; text-align: center; padding:20px;">
        <form action="" method="post">
        <h5>Change your Name</h5>
            <div class="field">
                <div class="input-group">
                <span class="input-group-addon"> Full Name: </span>
                <input type="text" name="name" class="form-control" value="<?php echo escape($user->data()->name); ?>">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            </div><br>
                <input type="submit" value="UPDATE" style="background-color:#333;" class="btn btn-danger btn-lg btn-block">
            </div>
            <hr>
        </form>
        <form action="" method="POST">
                    <div class="">
                        <h5>Change Your Password</h5>
                       <div class="input-group">
                          <span class="input-group-addon">Old Password: </span>
                          <input type="password" class="form-control" name="oldpassword" placeholder="Old Password"  />
                        </div>
                        <br />
                        <div class="input-group">
                          <span class="input-group-addon">New Password: </span>
                          <input type="password" class="form-control" name="newpassword" placeholder="New Password" />
                        </div>
                        <br />
                        <div class="input-group">
                          <span class="input-group-addon">New Password: </span>
                          <input type="password" class="form-control" name="newpassword_confirm" placeholder="Confirm new password" />
                        </div>
                        <input type="hidden" name="changepassword_token" value="<?php echo $tokenforcontactus; ?>"><br>
                        <input type="submit" value="CHANGE PASSWORD" style="background-color:#333;" class="btn btn-danger btn-lg btn-block">
                    </div>
                </form>
    </div>

</body>

</html>