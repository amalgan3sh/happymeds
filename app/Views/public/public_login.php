<!DOCTYPE html>
<html lang="en">

<head>
    <!--Title-->
    <title>ARANEA Platform : Supplier/ Manufacturer/ Agent/ Agency/ Distributor/ Franchise Portal</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="ARANEA">
    <meta name="robots" content="index, follow">

    <meta name="keywords" content="Supplier, Manufacturer, Distributor, Agent, Agency, Franchise, Admin Dashboard, Bootstrap Template, ARANEA Platform, Trading, B2B, Product Distribution">
    <meta name="description" content="ARANEA Platform offers a comprehensive portal for Suppliers, Manufacturers, Agents, Agencies, Distributors, and Franchises. This portal facilitates efficient trading, seamless product management, and exclusive pricing strategies tailored to your needs. Join ARANEA to unlock the potential of your business with a robust and responsive platform.">

    <meta property="og:title" content="ARANEA Platform : Supplier/ Manufacturer/ Agent/ Agency/ Distributor/ Franchise Portal">
    <meta property="og:description" content="ARANEA Platform offers a comprehensive portal for Suppliers, Manufacturers, Agents, Agencies, Distributors, and Franchises. This portal facilitates efficient trading, seamless product management, and exclusive pricing strategies tailored to your needs. Join ARANEA to unlock the potential of your business with a robust and responsive platform.">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link class="main-css" href="css/style.css" rel="stylesheet">

</head>

<body class="body">
    <div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="login-aside text-center  d-flex flex-column flex-row-auto">
            <h3 class="mb-2 text-white">Welcome to ARANEA Platform!</h3>
            <p class="mb-4">Supplier & Manufacturer Portal</p>
            <div class="aside-image position-relative" style="background-image:url(images/background/pic-2.png);">
                <img class="img1 move-1" src="images/background/pic3.png" alt="">
                <img class="img2 move-2" src="images/background/pic4.png" alt="">
                <img class="img3 move-3" src="images/background/pic5.png" alt="">
            </div>
        </div>
        <div class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <div class="d-flex justify-content-center h-100 align-items-center">
                <div class="authincation-content style-2">
                    <div class="row no-gutters">
                        <div class="col-xl-12 tab-content">

                            <!-- Email/Password Login Form -->
                            <div id="email-login-form" class="auth-form tab-pane fade show active form-validation">
                                <form action="<?= base_url('login_user') ?>" method="POST">
                                    <div class="text-center mb-4">
                                        <h3 class="text-center mb-2 text-dark">Sign In to ARANEA Portal</h3>
                                        <span>Manage Your Product & Distribution Strategies</span>
                                    </div>
                                    
                                    <!-- Email Login -->
                                    <div class="sepertor">
                                        <span class="d-block mb-4 fs-13">Sign in with email</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label required">Email address</label>
                                        <input type="email" class="form-control" name="email" id="email" value="">
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label required">Password</label>
                                        <input type="password" id="dlab-password" class="form-control" name="password" value="">
                                        <span class="show-pass eye">
                                            <i class="fa fa-eye-slash"></i>
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                    
                                    <!-- Option for phone login -->
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <a href="javascript:void(0);" class="text-primary" id="phone-login-btn">Sign in with Phone Number</a>
                                    </div>
                                    <button class="btn btn-block btn-primary">Sign In</button>
                                </form>
                            </div>

                            <!-- Phone OTP Login Form -->
                            <div id="phone-login-form" class="auth-form" style="display: none;">
                                <form action="<?= base_url('verify_phone') ?>" method="POST">
                                    <div class="text-center mb-4">
                                        <h3 class="text-center mb-2 text-dark">Sign In with Phone Number</h3>
                                        <span>Enter your phone number to receive an OTP</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label required">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your phone number">
                                    </div>
                                    <button type="button" class="btn btn-block btn-primary" id="send-otp-btn">Send OTP</button>
                                    
                                    <!-- OTP Input -->
                                    <div id="otp-section" style="display: none;">
                                        <div class="mb-3">
                                            <label for="otp" class="form-label required">Enter OTP</label>
                                            <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter the OTP">
                                        </div>
                                        <button type="submit" class="btn btn-block btn-primary">Verify OTP</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Social Media Sign-in -->
                            <div class="text-center mt-4">
                                <h4 class="text-center mb-2 text-dark">Or Sign In with</h4>
                                <div class="row mb-4">
                                    <div class="col-xl-6 col-12">
                                        <a href="<?= base_url('google_login') ?>" class="btn btn-outline-dark btn-sm btn-block">
                                            <i class="fab fa-google me-1"></i> Sign in with Google
                                        </a>
                                    </div>
                                    <div class="col-xl-6 col-12">
                                        <a href="javascript:void(0);" class="btn btn-outline-dark btn-sm btn-block mt-xl-0 mt-3">
                                            <i class="fab fa-apple me-1"></i> Sign in with Apple
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="new-account mt-3 text-center">
                                <p class="font-w500">Don't have an account? <a class="text-primary" href="<?= base_url('public_register') ?>" data-toggle="tab">Sign up here</a></p>
                            </div>

                            <div class="d-flex align-items-center justify-content-center">
                                <a href="javascript:void(0);" class="text-primary">Terms</a>
                                <a href="javascript:void(0);" class="text-primary mx-5">Plans</a>
                                <a href="javascript:void(0);" class="text-primary">Contact Us</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>

    <script>
        // Show phone login form when "Sign in with Phone Number" is clicked
        document.getElementById('phone-login-btn').addEventListener('click', function () {
            document.getElementById('email-login-form').style.display = 'none';
            document.getElementById('phone-login-form').style.display = 'block';
        });

        // Show OTP input after sending OTP
        document.getElementById('send-otp-btn').addEventListener('click', function () {
            var phoneNumber = document.getElementById('phone').value;
            if (phoneNumber) {
                // Here, you would ideally send the OTP via an AJAX call
                document.getElementById('otp-section').style.display = 'block';
                alert("OTP sent to " + phoneNumber); // Mock response
            } else {
                alert("Please enter a phone number");
            }
        });
    </script>
</body>

</html>