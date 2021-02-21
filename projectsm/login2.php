 <?php
session_start();
// if(isset($_SESSION["user"])){
//     header("Location: member2.php");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    /* div{
    border:1px solid black;
}  */
</style>


<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="img/田寮月世界2.jpg" alt=""></div>
                            <div class="col-lg-6 m-auto">
                                <div class="p-5 justify-content-center">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome In!</h1>
                                    </div>
                                    <form class="user" action="login_backend.php" method="post">
                                        <div class="text-center text-danger">
                                            <?php
                                            if(isset($_SESSION["user_error"])){
                                                echo $_SESSION["user_error"];
                                                unset($_SESSION["user_error"]);
                                            }
                                            if(isset($_SESSION["user_logout"])){
                                                echo $_SESSION["user_logout"];
                                                unset($_SESSION["user_logout"]);
                                            }
                                            ?></div>
                                        <div class="form-group">
                                            <label for="account"></label>
                                            <input id="account" type="text" class="form-control form-control-user"
                                                name="account" placeholder="Please enter your account">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input id="password" type="password" class="form-control form-control-user"
                                                 name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>