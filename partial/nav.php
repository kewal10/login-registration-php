<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="signin.php">Login and Registration &ndash; PHP</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                <?php
                if(!isset($_SESSION['user_id']))
                {

                   echo '<li class="nav-link"><a class="nav-link" href="signup.php">Register</a></li>';
                   echo '<li class="nav-link"><a class="nav-link" href="signin.php">Login</a></li>';
                }
                else
                {
                    echo '<li class="nav-link"><a class="nav-link" href="logout.php">Logout</a></li>';
                }
                ?>

            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
