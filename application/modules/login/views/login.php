<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/uploads/Berdin.ico') ?>">
    <title><?= $title ?></title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap/" />
    <link href="<?= base_url('assets/adminwrap/') ?>node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/adminwrap/') ?>css/pages/login-register-lock.css" rel="stylesheet">
    <link href="<?= base_url('assets/adminwrap/') ?>css/style.css" rel="stylesheet">

    <!-- You can change the theme colors from here -->
    <link href="<?= base_url('assets/adminwrap/') ?>css/colors/default.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/adminwrap/') ?>node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>

<body class="card-no-border">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">CONTACT SYSTEM</p>
        </div>
    </div>
    <section id="wrapper"> 
            <div class="login-box card rounded">
                <div class="card-body">

                    <!-- LOGIN FORM  -->
                    <form class="form-horizontal form-material" id="loginidForm" onsubmit="loginForm(event)"
                        style="border-style: inset; padding:10px; border-radius: 5px;">
                        <h3 class="box-title m-b-20 text-center">Contact System Login</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <div class="d-flex justify-content-between">
                                        <label for="login_username"><strong>Email </strong></label>
                                        <!-- <i class="fas fa-user"></i> -->
                                    </div>
                                    <input class="form-control" type="text" name="username" placeholder="Enter email"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="d-flex justify-content-between">
                                    <label for="login_password"><strong>Password </strong></label>
                                    <i class="fas fa-eye" style="cursor: pointer; color: black;"
                                        onclick="Loginpasswordtoggle()"></i>
                                </div>
                                <input class="form-control" type="password" name="password" placeholder="Enter password"
                                    required>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <a href="javascript:void(0)" onclick="showRegistrationForm()" class="font-bold">register</a>
                        </div> 
                    </form>

                    <!-- registration form  -->
                    <form class="form-horizontal form-material" id="registrationidForm" onsubmit="registrationForm(event)"
                        style="display: none; border-style: inset; padding:10px; border-radius: 5px;">
                        <h3 class="box-title m-b-20 text-center">Contact System Registration</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="username" placeholder="Enter name"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12"> 
                                <input class="form-control" type="text" name="email" placeholder="Enter Email Address"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12"> 
                                <input class="form-control" type="password" name="password" placeholder="Enter password"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12"> 
                                <input class="form-control" type="password" name="cpassword" placeholder="Enter confirm password"
                                    required>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Submit</button>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <a href="javascript:void(0)" onclick="showLoginForm()" class="font-bold">Sign in</a>
                        </div> 
                    </form>
                </div>
            </div> 
    </section>

    <script src="<?= base_url('assets/adminwrap/') ?>node_modules/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/adminwrap/') ?>node_modules/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url('assets/adminwrap/') ?>node_modules/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?= base_url('assets/adminwrap/') ?>node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript"> 
        $(function () {
            $(".preloader").fadeOut();
            $('[data-toggle="tooltip"]').tooltip()
            startTime();
        });

        function Loginpasswordtoggle() {
            if ($('#loginidForm').find('input[name="password"]').attr('type') === "password") {
                $('form#loginidForm').find('input[name="password"]').attr('type', 'text')
                $('form#loginidForm').find('i.fas.fa-eye').css('color', '#20aee3')
            } else if ($('#loginidForm').find('input[name="password"]').attr('type') === "text") {
                $('form#loginidForm').find('input[name="password"]').attr('type', 'password')
                $('form#loginidForm').find('i.fas.fa-eye').css('color', 'black')
            }
        } 
        const showLoginForm = () => {
            $('#registrationidForm').css("display", "none");
            $('#loginidForm').css("display", "block");
        }
        const showRegistrationForm = () => {
            $('#registrationidForm').css("display", "block");
            $('#loginidForm').css("display", "none");
        }

        const loginForm = (e) => {
            e.preventDefault();
            let data = new FormData(e.currentTarget);
            sendAjax('<?= base_url('login/auth') ?>', data).then((res) => {
                swalRes(res.response, res.msg);
                return (res.response == 200) ? true : false;
            }).then((r) => {
                (r) && setTimeout(function () {
                    myReloadPage()
                }, 1500);
            });
        }
        const registrationForm = (e) =>{
            e.preventDefault();
            let data = new FormData(e.currentTarget);
            sendAjax('<?= base_url('login/registrationForm') ?>', data).then((res) => {
                swalRes(res.response, res.msg);
                return (res.response == 200) ? true : false;
            }).then((r) => {
                (r) && setTimeout(function () {
                    myReloadPage()
                }, 1500);
            });
        }

        function startTime() {
            var today = new Date();
            $('#runningTime').val(today.toLocaleString('en-US', {
                hour12: true
            }));
            $('#runningTimes').val(today.toLocaleString('en-US', {
                hour12: true
            }));
            t = setTimeout(function () {
                startTime()
            }, 500);
        }

        /* useful function */
        function sendAjax(url, data = {}, isForm = false) {
            if (isForm) {
                return new Promise(function (myResolve, myReject) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        dataType: "json",
                        data: data,
                        async: false,
                        cache: false,
                        enctype: "multipart/form-data",
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            // loader(element.target, element.type)
                        },
                        success: function (res) {
                            myResolve(res); // when successful
                        },
                        error: function (err) {
                            myReject(err); // when error
                        },
                    });
                });

            } else {
                return new Promise(function (myResolve, myReject) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        dataType: "json",
                        data: data,
                        async: false,
                        processData: false,
                        contentType: false,
                        cache: false,
                        beforeSend: function () {
                            // loader(element.target, element.type)
                        },
                        success: function (res) {
                            myResolve(res); // when successful
                        },
                        error: function (err) {
                            myReject(err); // when error
                        },
                    });
                });
            }
        }
        const swalRes = (status, message) => {
            (status == 200) ? Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: message,
                showConfirmButton: false,
                timer: 1500
            }) : Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: message,
                showConfirmButton: false,
                timer: 1500
            })
        }
        const myReloadPage = () => {
            window.location = window.location;
        }
    </script>

</body>

</html>