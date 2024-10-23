<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-style-mode" content="1"> <!-- 0 == light, 1 == dark -->

    <title>Sign Up || AiWave- AI SaaS Website HTML5 UI Kit</title>
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
        <!-- Start Sign up Area  -->
        <div class="signup-area">
            <div class="wrapper">
                <div class="row">
                    
                <div class="col-lg-6 bg-color-blackest left-wrapper">
                        <div class="sign-up-box">
                            
                            <div class="signup-box-bottom">
                                <div class="signup-box-content">
                                    <div class="social-btn-grp">
                                        <a class="btn-default btn-border" href="#">
                                            <span class="icon-left"><img src="<?php echo base_url('assets/landing/') ?>assets/images/sign-up/google.png"
                                                    alt="Google Icon"></span>Login with Google
                                        </a>
                                        <a class="btn-default btn-border" href="#">
                                            <span class="icon-left"><img src="<?php echo base_url('assets/landing/') ?>assets/images/sign-up/facebook.png"
                                                    alt="Google Icon"></span>Login with Facebook
                                        </a>
                                    </div>
                                    <div class="text-social-area">
                                        <hr>
                                        <span>Or continue with</span>
                                        <hr>
                                    </div>
                                    <form action="<?php echo base_url('login_process'); ?>" method="post">
                                        <div class="input-section mail-section">
                                            <div class="icon"><i class="fa-sharp fa-regular fa-envelope"></i></div>
                                            <input  type="text" class="form-control" id="phone" name="phone" required placeholder="Enter email address">
                                        </div>
                                        <div class="input-section password-section">
                                            <div class="icon"><i class="fa-sharp fa-regular fa-lock"></i></div>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                        <div class="forget-text"><a class="btn-read-more" href="#"><span>Forgot
                                                    password</span></a></div>
                                        <button type="submit" class="btn-default">Sign In</button>
                                    </form>
                                </div>
                                <div class="signup-box-footer">
                                    <div class="bottom-text">
                                        Don't have an account? <a class="btn-read-more ml--5" href="partner_register"><span>Sign Up</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 right-wrapper" style="position: relative; background-image: url('https://rainbowthemes.net/html/aiwave/assets/images/cta-img/view-img.png'); background-size: 70%; background-position: center; background-repeat: no-repeat;">
    <div class="client-feedback-area">
        <div class="single-feedback">
            <!-- Content goes here -->
        </div>
    </div>
    
    <!-- Additional images around the main background image -->
    <!-- <div class="extra-image image-3" style="position: absolute; top: 20%; left: 20%; width: 12%;">
        <img src="images/background/pic3.png" alt="Image 3">
    </div>
    <div class="extra-image image-4" style="position: absolute; top: 20%; right: 20%; width: 12%;">
        <img src="images/background/pic4.png" alt="Image 4">
    </div>
    <div class="extra-image image-5" style="position: absolute; bottom: 20%; left: 20%; width: 12%;">
        <img src="images/background/pic5.png" alt="Image 5">
    </div> -->
</div>
                </div>
            </div>
            <a class="close-button" href="index.html">
                <i class="fa-sharp fa-regular fa-x"></i>
            </a>
        </div>
        <!-- End Sign up Area  -->
    </main>

    <!-- All Scripts  -->
    <div class="rbt-progress-parent">
        <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- JS
============================================ -->
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