<main class="main" id="top">
    <section class="py-8" id="user-types">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xxl-5 text-center mb-3">
                    <h6 class="fw-bold fs-4 display-3 lh-sm mb-3">Register or Sign in with Google</h6>
                    <p class="mb-4">Fill out the form below to create your B2B customer account or use Google Sign-In.</p>
                </div>
            </div>
            <div class="row flex-center">
                <div class="col-lg-6">
                    <div class="card-body mx-auto">
                        <form id="b2b-register-form" action="<?php echo base_url('register_customer'); ?>" method="POST">
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="companyName" name="companyName" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary rounded-pill">Register</button>
                        </form>
                        <div class="text-center my-3">or</div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div id="g_id_onload"
                                    data-client_id="484079248335-d4kd454b6p9cu9uesk3618b93fj347cl.apps.googleusercontent.com"
                                    data-callback="handleCredentialResponse">
                                </div>
                                <div class="g_id_signin" data-type="standard"></div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" onclick="facebookLogin()">Continue with Facebook</button>
                            </div>
                        </div>
                        <div id="error-message" class="text-danger mt-3"></div> <!-- Error message container -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
  // Initialize the Facebook SDK
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '7519451998103227', // Replace 'YOUR_APP_ID' with your actual Facebook App ID
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v20.0'                   // Use this Graph API version for this call.
    });

    FB.AppEvents.logPageView();               // Log page view event
  };

  // Load the Facebook SDK script
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_GB/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Function to handle Facebook login
  function facebookLogin() {
    FB.getLoginStatus(function(response) {
      if (response.status === 'connected') {
        handleFBLogin(response.authResponse);
      } else {
        FB.login(function(response) {
          if (response.authResponse) {
            handleFBLogin(response.authResponse);
          } else {
            document.getElementById('error-message').textContent = 'User cancelled login or did not fully authorize.';
          }
        }, {scope: 'public_profile,email'});
      }
    });
  }

  // Function to handle the login response
  function handleFBLogin(authResponse) {
    const accessToken = authResponse.accessToken;

    FB.api('/me', {fields: 'name,email'}, function(response) {
      // Send the user's information to your server-side script
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '<?php echo base_url('facebook_register_process'); ?>');
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
      xhr.send('access_token=' + accessToken + '&email=' + response.email + '&name=' + response.name);
    });
  }

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
