<!DOCTYPE html>
<html lang="en">
 <head>
    	<!--Title-->
	<title>ARANEA Business Partner Dashboard</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Dexignlabs">
	<meta name="robots" content="index, follow">

	<meta name="keywords" content="Business Partner Dashboard, ARANEA, Supplier, Manufacturer, Agency, Distributor, Franchise, Bootstrap Template, Responsive Design, Web Application">

	<meta name="description" content="ARANEA Business Partner Dashboard offers seamless integration for Suppliers, Manufacturers, Agents, Agencies, Distributors, and Franchises to manage their activities in one place.">

	<meta property="og:title" content="ARANEA Business Partner Dashboard">
	<meta property="og:description" content="ARANEA Business Partner Dashboard offers seamless integration for Suppliers, Manufacturers, Agents, Agencies, Distributors, and Franchises to manage their activities in one place.">
	<meta property="og:image" content="base_url/assets/assets/img/illustrations/ARANEA.png">

	<meta name="format-detection" content="telephone=no">

	<meta name="twitter:title" content="ARANEA Business Partner Dashboard">
	<meta name="twitter:description" content="ARANEA Business Partner Dashboard offers seamless integration for Suppliers, Manufacturers, Agents, Agencies, Distributors, and Franchises to manage their activities in one place.">
	<meta name="twitter:image" content="base_url/assets/assets/img/illustrations/ARANEA.png">
	<meta name="twitter:card" content="summary_large_image">

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
	<link href="vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">
	<link href="vendor/dropzone/dist/dropzone.css" rel="stylesheet">

	
	<!-- Style css -->
   <link class="main-css" href="css/style.css" rel="stylesheet">
	
</head>
<body>


<!-- Content body start -->
<div class="content-body">
    <div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-lg border-0">
                <div class="card-header text-center bg-primary text-white">
                    <h4 class="card-title m-0">Reset Your Password</h4>
                </div>
                <div class="card-body p-4">
                <?php if(session()->getFlashdata('update_password_success')): ?>
                        <div class="alert alert-success" id="successMessage">
                        <button type="button" class="close small-close" onclick="closeAlert('successMessage')">×</button>
                            <?= session()->getFlashdata('update_password_success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(session()->getFlashdata('update_password_error')): ?>
                    <div class="alert alert-danger" id="errorMessage">
                        <button type="button" class="close small-close" onclick="closeAlert('errorMessage')">×</button>
                        <?= session()->getFlashdata('update_password_error'); ?>
                        <?php   session()->remove('update_password_error');  ?>
                    </div>
                <?php endif; ?>
                    <form action="<?= site_url('update_password') ?>" method="post" novalidate>
                        <input type="hidden" name="token" value="<?= $data['token'] ?>">

                        <!-- New Password Field -->
                        <div class="form-group mb-3">
                            <label for="password">New Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text toggle-password">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                            <small class="form-text text-muted">Password must be at least 8 characters.</small>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="form-group mb-4">
                            <label for="confirm_password">Confirm Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text toggle-password">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                                </div>
                            </div>
                            <small id="passwordHelp" class="form-text text-danger" style="display: none;">Passwords do not match.</small>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content body end -->

<!-- Footer -->
<div class="footer text-center mt-4">
    <div class="copyright">
        <p>&copy; <span class="current-year">2024</span> Designed & Developed by <a href="https://dexignlab.com/" target="_blank">DexignLab</a></p>
    </div>
</div>

<!-- Scripts -->
<script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/dlabnav-init.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<!-- Toggle Password Visibility Script and Validation -->
<script>
    document.querySelectorAll('.toggle-password').forEach(item => {
        item.addEventListener('click', function() {
            let input = this.parentNode.previousElementSibling;
            if (input.type === 'password') {
                input.type = 'text';
                this.querySelector('i').classList.remove('fa-eye-slash');
                this.querySelector('i').classList.add('fa-eye');
            } else {
                input.type = 'password';
                this.querySelector('i').classList.remove('fa-eye');
                this.querySelector('i').classList.add('fa-eye-slash');
            }
        });
    });

    // Password Match Validation
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const passwordHelp = document.getElementById('passwordHelp');

    confirmPassword.addEventListener('input', function() {
        if (confirmPassword.value !== password.value) {
            passwordHelp.style.display = 'block';
        } else {
            passwordHelp.style.display = 'none';
        }
    });
    <script>
         // Function to close the alert and remember the user's choice
         function closeAlert(id) {
            var successMessage = document.getElementById(id);
            successMessage.style.display = 'none';
        }

    </script>
</script>
</body>
</html>
