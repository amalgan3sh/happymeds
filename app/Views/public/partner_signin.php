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
        <!-- Start Sign up Area  -->
        <div class="signup-area">
            <div class="wrapper">
                <div class="row">
                    
                <div class="col-lg-6 bg-color-blackest left-wrapper">
                        <div class="sign-up-box">
                            
                            <div class="signup-box-bottom">
                                <div class="signup-box-content">
                                    <div class="social-btn-grp">
                                    <a id="googleSignInBtn" class="btn-default btn-border">
                                            <span class="icon-left"><img src="<?php echo base_url('assets/landing/') ?>assets/images/sign-up/google.png"
                                                                        alt="Google Icon"></span>Login with Google
                                        </a>
                                        <a id="facebookLoginBtn" class="btn-default btn-border" href="#">
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
                                        <div class="forget-text"><a class="btn-read-more" href="reset_password"><span>Forgot password</span></a></div>
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
                    <div class="col-lg-6 right-wrapper" style="position: relative; background-image: url('assets/landing/assets/images/brand_partner_mobile.png'); background-size: 70%; background-position: center; background-repeat: no-repeat;">
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


    <!-- Add this modal markup before the closing body tag -->
<div class="modal fade" id="resetPasswordModal">
    <div class="modal-dialog">
        <div class="modal-content bg-color-blackest">
            <div class="modal-header border-0">
                <h5 class="modal-title text-white">Reset Password</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Email Step -->
                <div id="emailStep" class="reset-step">
                    <div class="input-section mail-section">
                        <div class="icon"><i class="fa-sharp fa-regular fa-envelope"></i></div>
                        <input type="email" class="form-control" id="resetEmail" placeholder="Enter your email address" required>
                    </div>
                    <button type="button" class="btn-default" onclick="requestPasswordReset()">Send OTP</button>
                </div>

                <!-- OTP and New Password Step -->
                <div id="otpStep" class="reset-step" style="display: none;">
                    <div class="input-section">
                        <div class="icon"><i class="fa-sharp fa-regular fa-key"></i></div>
                        <input type="text" class="form-control" id="otpCode" placeholder="Enter OTP from email" required>
                    </div>
                    <div class="input-section password-section">
                        <div class="icon"><i class="fa-sharp fa-regular fa-lock"></i></div>
                        <input type="password" class="form-control" id="newPassword" placeholder="New Password" required>
                    </div>
                    <div class="input-section password-section">
                        <div class="icon"><i class="fa-sharp fa-regular fa-lock"></i></div>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
                    </div>
                    <button type="button" class="btn-default" onclick="verifyOTPAndReset()">Reset Password</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Update the forgot password link to open modal
document.querySelector('a[href="reset_password"]').addEventListener('click', function(e) {
    e.preventDefault();
    var resetModal = new bootstrap.Modal(document.getElementById('resetPasswordModal'));
    resetModal.show();
});

function requestPasswordReset() {
    const email = document.getElementById('resetEmail').value;
    
    if (!email) {
        showAlert('Please enter your email address', 'error');
        return;
    }

    fetch('<?= base_url('auth/init-password-reset') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('emailStep').style.display = 'none';
            document.getElementById('otpStep').style.display = 'block';
            showAlert('OTP has been sent to your email', 'success');
        } else {
            showAlert(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('An error occurred. Please try again.', 'error');
    });
}

function verifyOTPAndReset() {
    const email = document.getElementById('resetEmail').value;
    const otp = document.getElementById('otpCode').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    if (!otp || !newPassword || !confirmPassword) {
        showAlert('Please fill in all fields', 'error');
        return;
    }

    if (newPassword !== confirmPassword) {
        showAlert('Passwords do not match', 'error');
        return;
    }
    
    fetch('<?= base_url('auth/verify-otp-reset-password') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            email: email,
            otp: otp,
            new_password: newPassword
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showAlert('Password reset successful. Please login with your new password.', 'success');
            setTimeout(() => {
                bootstrap.Modal.getInstance(document.getElementById('resetPasswordModal')).hide();
                window.location.href = '<?= base_url('partner_signin') ?>';
            }, 2000);
        } else {
            showAlert(data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlert('An error occurred. Please try again.', 'error');
    });
}

function showAlert(message, type) {
    // Create alert element
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
    alertDiv.role = 'alert';
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    
    // Insert alert before the modal body content
    const modalBody = document.querySelector('.modal-body');
    modalBody.insertBefore(alertDiv, modalBody.firstChild);
    
    // Auto dismiss after 5 seconds
    setTimeout(() => {
        alertDiv.remove();
    }, 5000);
}
</script>

<style>
.modal-content.bg-color-blackest {
    background-color: var(--color-blackest);
    color: var(--color-white);
}

.reset-step {
    transition: all 0.3s ease;
}

.reset-step .input-section {
    margin-bottom: 20px;
}

.alert {
    margin-bottom: 20px;
}
</style>

    <!-- JS
============================================ -->
<style>
    #googleSignInBtn div {
    /* Any custom styles here should be avoided */
}
</style>

<script>
    function handleCredentialResponse(response) {
        console.log("Encoded JWT ID token: " + response.credential);

        // Send the ID token to the server for verification and authentication
        fetch('<?= base_url('auth/verify_google_token') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({token: response.credential})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect user after successful sign-in and verification
                window.location.href = "<?= base_url('happymeds/business_home') ?>";
            } else {
                console.error("Authentication failed:", data);
            }
        })
        .catch(error => console.error("Error:", error));
    }

    window.onload = function () {
        google.accounts.id.initialize({
            client_id: "<?= $googleClientId ?>",  // Pass client ID from the backend
            callback: handleCredentialResponse
        });

        google.accounts.id.renderButton(
            document.getElementById("googleSignInBtn"),
            { theme: "outline", size: "large" } // Customize button
        );
        google.accounts.id.prompt(); // Automatically shows prompt
    }
</script>

<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '<?= $facebookAppId ?>',
            cookie     : true,
            xfbml      : true,
            version    : 'v16.0' // Use the correct version of Facebook's Graph API
        });
        
        // Now that FB is initialized, you can safely call FB.login
        document.getElementById('facebookLoginBtn').addEventListener('click', function() {
            FB.login(function(response) {
                if (response.status === 'connected') {
                    FB.api('/me', {fields: 'id,name,email'}, function(userInfo) {
                        console.log('User Info:', userInfo);
                        // Handle login on server-side
                    });
                } else {
                    console.log('User canceled login or did not fully authorize.');
                }
            }, {scope: 'public_profile,email'});
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

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