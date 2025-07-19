<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('../assets/images/icons/favicon.ico') }}"/>

    <!-- CSS Vendor -->
    <link rel="stylesheet" href="{{ asset('../assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/vendor/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/css/util.css') }}">
    <link rel="stylesheet" href="{{ asset('../assets/css/main.css') }}">

    <!-- Custom Styles -->
    <style>
        body {
            background: url('../assets/images/bg-01.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .wrap-login100 {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 50px 30px;
            backdrop-filter: blur(15px) saturate(180%);
            -webkit-backdrop-filter: blur(15px) saturate(180%);
            box-shadow:
                0 8px 32px 0 rgba(0, 0, 0, 0.37),
                0 0 30px rgba(0, 174, 255, 0.6); /* Lampu glow biru */
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .login100-form-title {
            border-radius: 16px 16px 0 0;
            padding: 40px 15px 30px;
            background-image: url('../assets/images/bg-01.jpg');
            background-size: cover;
            background-position: center;
            text-align: center;
        }

        .login100-form-title-1 {
            display: block;
            color: #fff;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .company-name {
            display: block;
            color: #fff;
            font-size: 20px;
            font-weight: normal;
            animation: fadeSlide 1.5s ease-out;
        }

        .emoji-animation {
            text-align: center;
            font-size: 24px;
            margin-top: 10px;
            animation: bounceIn 1.5s ease infinite alternate;
        }

        @keyframes fadeSlide {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounceIn {
            from {
                transform: translateY(0);
            }
            to {
                transform: translateY(-5px);
            }
        }

        .login100-form-btn {
            background: rgba(0, 255, 128, 0.15);
            color: black;
            font-weight: bold;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 16px;
            padding: 12px 25px;
            backdrop-filter: blur(12px) saturate(180%);
            -webkit-backdrop-filter: blur(12px) saturate(180%);
            box-shadow: 0 8px 32px rgba(0, 128, 0, 0.37);
            transition: all 0.3s ease;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .login100-form-btn:hover {
            background: rgba(0, 255, 128, 0.25);
            transform: scale(1.04);
            box-shadow: 0 10px 40px rgba(0, 128, 0, 0.5);
        }
    </style>
</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <!-- Header -->
                <div class="login100-form-title">
                    <span class="login100-form-title-1">Sign In</span>
                    <span class="company-name">PT. ABC</span>
                    <div class="emoji-animation">💼💪</div>
                </div>

                <!-- Form Login -->
                <form class="login100-form validate-form" action="/loginPost" method="POST">
                    @csrf

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" name="email" placeholder="Enter email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">Remember me</label>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- JS Vendor -->
    <script src="{{ asset('../assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('../assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('../assets/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('../assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../assets/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('../assets/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('../assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('../assets/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('../assets/js/main.js') }}"></script>

</body>
</html>
