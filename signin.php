<?php
    ob_start();
    session_start();
    include 'partial/head.php';
    include 'partial/nav.php';
    require_once 'includes/db.php';
    require_once 'includes/conn.php';
?>

<?php

    if(isset($_POST['SignIn'])) {
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = md5(mysqli_real_escape_string($connection,$_POST['password']));


        $query = $connection->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
        $row = $query->fetch_array(MYSQLI_BOTH);

        if($row==0) {

            $result='<div class="alert alert-danger">Your logon attempt failed. Please try again.</div>';

        } else {

            $_SESSION["user_id"] = $row["userID"];
            $_SESSION["fullName"] = $row["fullName"];

            $_SESSION["loggedIn"] = true;
            header('Location: home.php');
        }
    }
?>

    <div class="container u-form">
        <form class="form-horizontal signupform" id="userForm" autocomplete="off" method="post" action="signin.php">
            <fieldset>

                <div class="form-group">
                    <label class="col-md-4 control-label" for=""></label>
                    <div class="col-md-5 from-m-f">
                        <legend class="text-center">Sign In</legend>
                    </div>
                </div>

                <!--  Error Message-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for=""></label>
                    <div class="col-md-5">
                        <?php echo $result; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="email"></label>
                    <div class="col-md-5">
                        <input id="email" name="email" type="email" placeholder="Email Address" class="form-control input-md inputbox"> <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="password"></label>
                    <div class="col-md-5">
                        <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md inputbox">
                        <span class="help-block help-login"><a href="signup.php">Create an Account</a></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="password_again"></label>
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-default btn-block" name="SignIn" id="SignIn">Login</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.min.js"></script>
    <script src="js/main.js"></script>
