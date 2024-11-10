<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-style-mode" content="1"> <!-- 0 == light, 1 == dark -->

    <title>Forgot Password || AiWave - AI SaaS Website HTML5 UI Kit</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/landing/') ?>assets/images/logo/favicon.png">
    <!-- CSS ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('assets/landing/') ?>assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing/') ?>assets/css/plugins/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing/') ?>assets/css/plugins/feature.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing/') ?>assets/css/plugins/animation.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing/') ?>assets/css/plugins/slick.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing/') ?>assets/css/plugins/slick-theme.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing/') ?>assets/css/plugins/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing/') ?>assets/css/plugins/prism.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/landing/') ?>assets/css/style.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</head>

<body>
    <main class="page-wrapper">
        <div id="my_switcher" class="my_switcher">
            <ul>
                <li>
                    <a href="javascript: void(0);" data-theme="light" class="setColor light">
                        <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/switch/sun-01.svg" alt="Sun images"><span title="Light Mode">
                            Light</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                        <img src="<?php echo base_url('assets/landing/') ?>assets/images/light/switch/vector.svg" alt="Vector Images"><span title="Dark Mode">
                            Dark</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Start Forgot Password Area -->
        <div class="forgot-password-area">
            <div class="wrapper">
                <div class="row">
                    <div class="col-lg-6 bg-color-blackest left-wrapper">
                        <div class="forgot-password-box">
                            <div class="forgot-password-box-bottom">
                                <div class="forgot-password-box-content">
                                    <h3>Forgot Your Password?</h3>
                                    <p>Enter your email address below to reset your password.</p>
                                    <form action="<?php echo base_url('forgot_password_process'); ?>" method="post">
                                        <div class="input-section mail-section">
                                            <div class="icon"><i class="fa-sharp fa-regular fa-envelope"></i></div>
                                            <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email address">
                                        </div>
                                        <button type="submit" class="btn-default">Reset Password</button>
                                    </form>
                                    <div class="back-to-login">
                                        <a href="<?php echo base_url('login'); ?>" class="btn-read-more ml--5"><span>Back to Login</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 right-wrapper" style="position: relative; background-image: url('assets/landing/assets/images/forgot-password-image.png'); background-size: 70%; background-position: center; background-repeat: no-repeat;">
                        <div class="client-feedback-area">
                            <div class="single-feedback">
                                <!-- Optional content like testimonials or additional images can go here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="close-button" href="index.html">
                <i class="fa-sharp fa-regular fa-x"></i>
            </a>
        </div>
        <!-- End Forgot Password Area -->
    </main>

    <!-- All Scripts  -->
    <div class="rbt-progress-parent">
        <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- JS -->
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/modernizr.min.js"></script>
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/waypoint.min.js"></script>
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/wow.min.js"></script>
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/counterup.min.js"></script>
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/sal.min.js"></script>
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/slick.min.js"></script>
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/text-type.js"></script>
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/prism.js"></script>
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/backto-top.js"></script>
    <!-- Light Mode Switcher -->
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/js.cookie.js"></script>
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/jquery.style.swicher.js"></script>

    <script src="<?php echo base_url('assets/landing/') ?>assets/js/vendor/jquery-one-page-nav.js"></script>
    <!-- Main JS -->
    <script src="<?php echo base_url('assets/landing/') ?>assets/js/main.js"></script>
</body>

</html>