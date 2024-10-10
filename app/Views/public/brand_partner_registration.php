<main class="main" id="top">
    <section class="py-8" id="user-types">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xxl-5 text-center mb-3">
                    <h6 class="fw-bold fs-4 display-3 lh-sm mb-3">Register as Brand partner</h6>
                    <p class="mb-4">Fill out the form below to create your Brand Partner account or use Google Sign-In.</p>
                </div>
            </div>
            <div class="row flex-center">
                <div class="col-lg-6">
                    <div class="card-body mx-auto">
                        <form id="b2b-register-form" action="<?php echo base_url('register_brand_partner'); ?>" method="POST" onsubmit="return validatePassword()">
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="companyName" name="companyName" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span toggle="#password" class="fa fa-fw fa-eye password-toggle-icon"></span>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                <span toggle="#confirmPassword" class="fa fa-fw fa-eye password-toggle-icon"></span>
                            </div>
                            <div id="password-error" class="text-danger mb-3"></div> <!-- Error message for password validation -->
                            <button type="submit" class="btn btn-lg btn-primary rounded-pill">Register</button>
                        </form>
                        <div class="text-center my-3">or</div>
                        <div id="g_id_onload"
                            data-client_id="484079248335-d4kd454b6p9cu9uesk3618b93fj347cl.apps.googleusercontent.com"
                            data-callback="handleCredentialResponse">
                        </div>
                        <div class="g_id_signin" data-type="standard"></div>
                        <div id="error-message" class="text-danger mt-3"></div> <!-- Error message container -->
                        <div class="text-center mt-3">Already registered? <a href="<?php echo base_url('customer_login'); ?>">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Password Toggle Script -->
<script>
  document.querySelectorAll('.password-toggle-icon').forEach(function(eyeIcon) {
    eyeIcon.addEventListener('click', function() {
      let input = document.querySelector(eyeIcon.getAttribute('toggle'));
      if (input.getAttribute('type') === 'password') {
        input.setAttribute('type', 'text');
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
      } else {
        input.setAttribute('type', 'password');
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
      }
    });
  });

  // Password validation
  function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var errorElement = document.getElementById("password-error");

    if (password !== confirmPassword) {
      errorElement.textContent = "Passwords do not match!";
      return false;  // Prevent form submission
    }
    return true;  // Allow form submission
  }
</script>

<!-- CSS for aligning the eye icon properly -->
<style>
  .password-toggle-icon {
    position: absolute;
    right: 10px; /* Adjust this value to control horizontal spacing */
    top: 55px;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6c757d;
    padding: 5px; /* Add padding around the icon */
}

</style>
