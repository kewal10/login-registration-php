<?php
    ob_start();
    session_start();
    include 'partial/head.php';
    include 'partial/nav.php';
    include 'includes/db.php';
    include 'includes/conn.php';
?>

<?php

    if(isset($_POST['Register'])) {
        $fullName = mysqli_real_escape_string($connection,$_POST['fullname']);
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = md5(mysqli_real_escape_string($connection,$_POST['password']));
        $cdate = $_POST['Y-m-d H:i:s'];
        $timestamp = date('Y-m-d H:i:s', strtotime($cdate));

        $check = $connection->query("SELECT email FROM users WHERE email='$email'");
        $run = $check->fetch_array(MYSQLI_BOTH);
        if($run==0) {
            $query = $connection->query(" INSERT INTO users ( fullName, email, password, created_date )
            VALUES ( '$fullName', '$email', '$password', curdate()) ");

            header('Location: signin.php');
        } else {
            $result='<div class="alert alert-danger">Sorry this Email is already exist</div>';
        }

    }

?>


<div class="container u-form comp-container">
    <form class="form-horizontal signupform" id="userForm" autocomplete="off" method="post" action="signup.php">
        <fieldset>

            <div class="form-group c-a-a">
              <label class="col-md-4 control-label" for=""></label>
              <div class="col-md-5 from-m-f">
                  <legend class="text-center">Create an Account</legend>
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
                <label class="col-md-4 control-label" for="fullname"></label>
                <div class="col-md-5">
                    <input id="fullname" name="fullname" type="text" placeholder="Full Name" class="form-control input-md inputbox"> <span class="help-block"></span>
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
                    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md inputbox"> <span class="help-block"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="password_again"></label>
                <div class="col-md-5">
                    <input id="password_again" name="password_again" type="password" placeholder="Confirm Password" class="form-control input-md inputbox">
                    <span class="help-block help-login"><a href="signin.php">I Have a Acount </a></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="password_again"></label>
                <div class="col-md-5">
                    <button type="submit" class="btn btn-default btn-block" name="Register" id="Register">Create Account</button>
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