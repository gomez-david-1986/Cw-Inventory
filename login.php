<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-utilities.min.css" rel="stylesheet">
    <link href="assets/css/custom-bootstrap.css" rel="stylesheet">


</head>
<body class="BackgroundImg">

<main>

    <div class="d-flex flex-column min-vh-100 min-vw-100">
        <div class="d-flex flex-grow-1 justify-content-center align-items-center">

            <div class="card rounded">
                <div class="card-header">
                    <h3 class="mb-0 text-center">
                        Login
                    </h3>
                </div>
                <div class="card-body">
                    <form action="DoLogIn.php?Action=TEST" autocomplete="off" class="form" id="formLogin" method="POST"
                          novalidate="" role="form">

                        <div class="form-group mt-1">
                            <label for="uname1">
                                Email
                            </label>
                            <input class="form-control form-control-lg rounded-0" id="Email" name="login-email"
                                   required=""
                                   type="email">
                            </input>
                        </div>
                        <div class="form-group mt-1">
                            <label>
                                Password
                            </label>
                            <input autocomplete="new-password" class="form-control form-control-lg rounded-0"
                                   id="PassWrd"
                                   name="login-password" required="" type="password">
                            </input>
                        </div>
                        <button class="btn btn-success float-end mt-2 " id="btnLogin" type="submit">
                            Login
                        </button>

                    </form>
                </div>
                <!--/card-block-->
            </div>
        </div>
    </div>

    <!-- /form card login -->

</main>

<script src="index.js"></script>
</body>
</html>