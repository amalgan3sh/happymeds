<main class="main" id="top">
    <section class="py-8" id="user-types">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xxl-5 text-center mb-3">
                <h1 class="fw-bold display-3 lh-sm mb-3">Brand Partner Login</h1>
                    <p class="lead mb-4">Enter your phone number below to log in to your Brand Partner account or use Google Sign-In.</p>
                </div>
            </div>
            <div class="row flex-center">
                <div class="col-lg-6">
                    <div class="card-body mx-auto">
                        <form id="b2b-register-form" action="<?php echo base_url('otp_login_process'); ?>" method="POST">
                            <div id="phone-number-section">
                                <div class="mb-3">
                                    <label for="phone-number" class="form-label">Phone number</label>
                                    <input type="text" class="form-control" id="phone-number" name="phone-number" required>
                                </div>
                                <button type="button" id="next-button" class="btn btn-lg btn-primary rounded-pill">Next</button>
                            </div>
                            <div id="otp-section" style="display:none;">
                                <div class="mb-3">
                                    <label for="otp" class="form-label">OTP</label>
                                    <input type="text" class="form-control" id="otp" name="otp" required>
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary rounded-pill">Submit</button>
                            </div>
                        </form>
                        <div class="text-center my-3">or</div>
                        <div id="g_id_onload"
                            data-client_id="484079248335-d4kd454b6p9cu9uesk3618b93fj347cl.apps.googleusercontent.com"
                            data-callback="handleCredentialResponse">
                        </div>
                        <div class="g_id_signin" data-type="standard"></div>
                        <div id="error-message" class="text-danger mt-3"></div> <!-- Error message container -->
                        <div class="text-center mb-3">Not registered yet? <a href="<?php echo base_url('brand_partner_registration'); ?>">Register with us</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
  document.getElementById('next-button').addEventListener('click', function() {
    var phoneNumber = document.getElementById('phone-number').value;

    if(phoneNumber) {
      // Here you can add an AJAX call to send the phone number to the server and get the OTP
      // For this example, we'll just show the OTP section
      document.getElementById('phone-number-section').style.display = 'none';
      document.getElementById('otp-section').style.display = 'block';
    } else {
      alert('Please enter a valid phone number.');
    }
  });

  function onSuccess(googleUser) {
    const profile = googleUser.getBasicProfile();
    const id_token = googleUser.getAuthResponse().id_token;

    // Send the user's information to your server-side script
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo base_url('google_register_process'); ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
        // Handle successful registration here (e.g., redirect to dashboard)
        window.location.href = '<?php echo base_url('dashboard'); ?>';
        } else {
        // Handle registration failure
        console.error('Registration failed: ' + xhr.responseText);
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
