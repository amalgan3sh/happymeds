<main class="main" id="top">
    <section class="py-8" id="user-login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xxl-5 text-center mb-3">
                    <h6 class="fw-bold fs-4 display-3 lh-sm mb-3">Login or Sign in with Google</h6>
                    <p class="mb-4">Enter your credentials below to log into your account or use Google Sign-In.</p>
                </div>
            </div>
            <div class="row flex-center">
                <div class="col-lg-6">
                    <div class="card-body mx-auto">
                        <form id="login-form" action="<?php echo base_url('login_process'); ?>" method="POST">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number or Email</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary rounded-pill">Login</button>
                        </form>
                        <div class="text-center my-3">or</div>
                        <div class="mb-3">
                            <button class="btn btn-primary w-100" onclick="requestOTP()">Login with OTP</button>
                        </div>
                        <div class="mb-3">
                            <div id="g_id_onload"
                                data-client_id="484079248335-d4kd454b6p9cu9uesk3618b93fj347cl.apps.googleusercontent.com"
                                data-callback="handleCredentialResponse">
                            </div>
                            <div class="g_id_signin" data-type="standard"></div>
                        </div>
                        <div class="text-center mb-3">Not registered yet? <a href="<?php echo base_url('brand_partner_registration'); ?>">Register as Brand partner</a></div>
                        <div id="error-message" class="text-danger mt-3"></div> <!-- Error message container -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
  // Function to handle OTP request
  function requestOTP() {
    // Code to request OTP, could be implemented using AJAX to send request to server
    // Upon successful request, navigate to OTP verification page
    window.location.href = "<?php echo base_url('otp_verification'); ?>";
  }

  // Function to handle Google login success
  function onSuccess(googleUser) {
    const profile = googleUser.getBasicProfile();
    const id_token = googleUser.getAuthResponse().id_token;

    // Log user details to the console
    console.log('ID Token: ' + id_token);
    console.log('Full Name: ' + profile.getName());
    console.log('Given Name: ' + profile.getGivenName());
    console.log('Family Name: ' + profile.getFamilyName());
    console.log('Email: ' + profile.getEmail());

    // Send the user's information to your server-side script
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo base_url('google_login_process'); ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
        // Handle successful login here (e.g., redirect to dashboard)
        window.location.href = '<?php echo base_url('dashboard'); ?>';
        } else {
        // Handle login failure
        console.error('Login failed: ' + xhr.responseText);
        // Redirect to registration page
        window.location.href = '<?php echo base_url('brand_partner_registration'); ?>';
        }
    };
    xhr.send('id_token=' + id_token + '&email=' + profile.getEmail() + '&name=' + profile.getName());
  }

  function onFailure(error) {
    console.log(error);
    const errorMessage = document.getElementById('error-message');
    
    if (error.error === 'popup_closed_by_user') {
      errorMessage.textContent = 'Sign-in popup closed before completing the sign-in. Please try again.';
    } else {
      errorMessage.textContent = 'An error occurred during sign-in. Please try again.';
    }
  }

  function renderButton() {
    gapi.signin2.render('my-signin2', {
      'scope': 'profile email',
      'width': 240,
      'height': 50,
      'longtitle': true,
      'theme': 'dark',
      'onsuccess': onSuccess,
      'onfailure': onFailure
    });
  }

  // Initialize the Google Sign-In button
  window.onload = function() {
    renderButton();
  };
</script>
