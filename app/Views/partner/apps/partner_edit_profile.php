<div class="page-titles">
<div class="sub-dz-head">
	<div class="d-flex align-items-center dz-head-title">
		<h2 class="text-white m-0">Portfolio</h2>
	</div>
</div>
</div>
		
		
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				
                <!-- row -->
                <div class="row">
					<div class="col-xl-3 col-lg-4">
						<div class="clearfix">
							<div class="card card-bx profile-card author-profile m-b30">
								<div class="card-body">
									<div class="p-5">
										<div class="author-profile">
                                        <div class="author-media">
                                            <?php if (empty($userProfile['profile_photo'])): ?>
                                                <img id="profilePreview" src="<?= esc(base_url('images/user.png')) ?>" alt="Default Profile Photo">
                                            <?php else: ?>
                                                <img id="profilePreview" src="<?= esc(base_url('public/uploads/profiles/' . $userProfile['profile_photo'])) ?>" alt="Profile Photo">
                                            <?php endif; ?>
                                            <div class="upload-link" title="" data-toggle="tooltip" data-placement="right" data-original-title="update">
                                                <input type="file" class="update-flie" id="profile_photo" name="profile_photo" onchange="previewProfilePhoto()">
                                                <i class="fa fa-camera"></i>
                                            </div>
                                        </div>
											<div class="author-info">
												<h6 class="title"><?php echo $userProfile['user_name']; ?></h6>
												<span><?php echo $userProfile['designation']; ?></span>
											</div>
										</div>
									</div>
									<div class="info-list">
										<ul>
											<li><a href="app-profile.html">Models</a><span>36</span></li>
											<li><a href="uc-lightgallery.html">Gallery</a><span>3</span></li>
											<li><a href="app-profile.html">Lessons</a><span>1</span></li>
										</ul>
									</div>
								</div>
								<div class="card-footer">
									<div class="input-group mb-3">
										<div class="form-control rounded text-center">Portfolio</div>
									</div>
									<div class="input-group">
										<a href="https://www.dexignlab.com/" target="_blank" class="form-control text-hover rounded ">www.dexignlab.com</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-lg-8">
						<div class="card profile-card card-bx m-b30">
							<div class="card-header">
							<h4 class="card-title">Account setup</h4>
							</div>
							<form class="profile-form" method="post" action="<?= base_url('update_profile') ?>" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="user_name">Username</label>
                                                <input type="text" name="user_name" class="form-control" value="<?php echo $userProfile['user_name']; ?>" id="user_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="email">Email address</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $userProfile['email']; ?>" id="email">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="phone">Phone</label>
                                                <input type="tel" class="form-control" name="phone" value="<?php echo $userProfile['phone']; ?>" id="phone">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="company_name">Company Name</label>
                                                <input type="text" name="company_name" class="form-control" value="<?php echo $userProfile['company_name']; ?>" id="company_name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="firstname">First Name</label>
                                                <input type="text" name="firstname" class="form-control" value="<?php echo $userProfile['firstname']; ?>" id="firstname">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="lastname">Last Name</label>
                                                <input type="text" name="lastname" class="form-control" value="<?php echo $userProfile['lastname']; ?>" id="lastname">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="designation">Designation</label>
                                                <input type="text" name="designation" class="form-control" value="<?php echo $userProfile['designation']; ?>" id="designation">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="skills">Skills</label>
                                                <input type="text" name="skills" class="form-control" value="<?php echo $userProfile['skills']; ?>" id="skills">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Gender</label>
                                                <select class="form-control" name="gender" id="gender">
                                                    <option value="">Please select</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="dob">Date of Birth</label>
                                                <div class="input-hasicon mb-xl-0 mb-3">
                                                    <input class="form-control mb-xl-0 mb-3" value="<?php echo $userProfile['dob']; ?>" name="dob" type="date" id="dob">
                                                    <div class="icon"><i class="far fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Country</label>
                                                <select class="form-control" name="country" id="country">
                                                    <option value="">Please select a country</option>
                                                </select>
                                                <div id="countryError" class="error-message"></div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">City</label>
                                                <select class="form-control" name="city" id="city">
                                                    <option value="">Please select a city</option>
                                                </select>
                                                <div id="cityError" class="error-message"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="about_me">About Me</label>
                                                <textarea class="form-control" name="about_me" id="about_me" rows="4"><?php echo $userProfile['about_me']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="profile_photo">Profile Photo</label>
                                                <input type="file" class="form-control" name="profile_photo" id="profile_photo">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="language">Language</label>
                                                <input type="text" <?php echo $userProfile['language']; ?> class="form-control" name="language" value="English" id="language">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="age">Age</label>
                                                <input type="number" value = "<?php echo $userProfile['age']; ?>" class="form-control" name="age" value="30" id="age">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="experience">Experience (years)</label>
                                                <input type="number" class="form-control" value="<?php echo $userProfile['experience']; ?>" name="experience" value="5" id="experience">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="location">Location</label>
                                                <input type="text" class="form-control" value ="<?php echo $userProfile['location']; ?>" name="location" value="New York, USA" id="location">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">UPDATE</button>
                                    <a href="page-forgot-password.html" class="text-hover float-end">Forgot your password?</a>
                                </div>
                            </form>
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
				<p>Copyright © Designed &amp; Developed by <a href="https://spyderhub.com/"
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
	<script src="vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script>
        // URL of the GeoDB Cities API
        const geoDBUrl = 'https://geodb-cities-api.wirefreethought.com/v1/geo/countries';

        // Function to load countries
        async function loadCountries() {
            try {
                const response = await fetch(geoDBUrl);
                const data = await response.json();
                const countries = data.data;

                const countrySelect = document.getElementById('country');
                countries.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.code;
                    option.textContent = country.name;
                    countrySelect.appendChild(option);
                });
            } catch (error) {
                console.error('Error loading countries:', error);
            }
        }

        // Function to load cities based on selected country
        async function loadCities() {
            const countryCode = document.getElementById('country').value;
            const citySelect = document.getElementById('city');
            citySelect.innerHTML = '<option value="">Select City</option>'; // Clear cities

            if (countryCode) {
                try {
                    const response = await fetch(${geoDBUrl}/${countryCode}/cities);
                    const data = await response.json();
                    const cities = data.data;

                    cities.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.name;
                        option.textContent = city.name;
                        citySelect.appendChild(option);
                    });
                } catch (error) {
                    console.error('Error loading cities:', error);
                }
            }
        }

        // Function to handle form submission
        function submitSelection() {
            const country = document.getElementById('country').value;
            const city = document.getElementById('city').value;
            if (country && city) {
                alert(You selected ${city}, ${country});
            } else {
                alert('Please select both a country and a city.');
            }
        }

        // Load countries when the page loads
        window.onload = loadCountries;

        // Add event listener to load cities when country is selected
        document.getElementById('country').addEventListener('change', loadCities);
    </script>

    <script>
    function previewProfilePhoto() {
        const file = document.getElementById("profile_photo").files[0];  // Get the selected file
        const preview = document.getElementById("profilePreview");  // Get the image preview element

        const reader = new FileReader();

        // This function will run once the file is read
        reader.onloadend = function () {
            preview.src = reader.result;  // Set the preview image source to the uploaded file
        }

        if (file) {
            reader.readAsDataURL(file);  // Read the file as a Data URL (base64 string)
        } else {
            preview.src = "";  // Reset if no file is selected
        }
    }
</script>

</body>
</html>