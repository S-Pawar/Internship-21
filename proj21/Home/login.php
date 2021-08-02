

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">



<head>


    <?php include "../common/comHeader.html" ?>
    <script src="./login.js" type="text/javascript"></script>
</head>



<body>



<div id="mainContent">



<body class="text-center">
    <form class="form-signin" id="login_form" name="form1" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
    <label for="inputEmail" class="sr-only">Username</label>
    <input type="text"  name="username" id="username" class="form-control" placeholder="Username" required="" autofocus=""><br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="password_log" class="form-control" placeholder="Password" required="">
    <br>
    <button class="btn  btn-primary btn-block" name="save" id="loginbtn" value="Login" type="submit">Log in</button>

    </form>



</div>

<script type="javascript" src="../common/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="../common/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


        </body>
</html>
