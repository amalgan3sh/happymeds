<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Information Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form method="post" action="<?= site_url('save_customer_data') ?>" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- User ID -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="user_id">User ID</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="user_id" name="user_name" placeholder="User ID" required>
                                                <div class="invalid-feedback">
                                                    Please enter User ID.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- First Name -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="firstname">First Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required>
                                                <div class="invalid-feedback">
                                                    Please enter First Name.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Last Name -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="lastname">Last Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" required>
                                                <div class="invalid-feedback">
                                                    Please enter Last Name.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="email">Email</label>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                                                <div class="invalid-feedback">
                                                    Please enter a valid Email.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Phone -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="phone">Phone</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
                                                <div class="invalid-feedback">
                                                    Please enter a valid Phone number.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Gender -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="gender">Gender</label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="gender" name="gender" required>
                                                    <option value="">Please select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a Gender.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Date of Birth -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="dob">Date of Birth</label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="dob" name="dob" required>
                                                <div class="invalid-feedback">
                                                    Please select a Date of Birth.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Skills -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="skills">Skills</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="skills" name="skills" placeholder="Enter skills" required>
                                                <div class="invalid-feedback">
                                                    Please enter your Skills.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- About Me -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="about_me">About Me</label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" id="about_me" name="about_me" rows="4" placeholder="Tell us about yourself" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter some information about yourself.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <!-- Company Name -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="company_name">Company Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" required>
                                                <div class="invalid-feedback">
                                                    Please enter Company Name.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- User Type -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="user_type">User Type</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="user_type" name="user_type" placeholder="Enter user type" required>
                                                <div class="invalid-feedback">
                                                    Please enter User Type.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Location -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="location">Location</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" required>
                                                <div class="invalid-feedback">
                                                    Please enter Location.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Country -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="country">Country</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" required>
                                                <div class="invalid-feedback">
                                                    Please enter Country.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- City -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="city">City</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter city" required>
                                                <div class="invalid-feedback">
                                                    Please enter City.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mb-3 row">
                                            <div class="col-lg-8 ms-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->


		<!--**********************************
            Footer start
        ***********************************-->
		<div class="footer">
			<div class="copyright">
				<p>Copyright © Designed &amp; Developed by <a href="#"
						target="_blank">SpyderHub</a> <span class="current-year">2024</span>
				</p>
			</div>
		</div>
		<!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

		<!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
        Scripts
    ***********************************-->
	<!-- Required vendors -->
	<script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
	
	<script>
		(function () {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
				.forEach(function (form) {
					form.addEventListener('submit', function (event) {
						if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()
						}

						form.classList.add('was-validated')
					}, false)
				})
		})()
	</script>
</body>

</html>