
		
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
                                                <img src="<?= esc(base_url('images/tab/1.jpg')) ?>" alt="Default Profile Photo">
                                            <?php else: ?>
                                                <img src="<?= esc(base_url('public/uploads/profiles/' . $userProfile['profile_photo'])) ?>" alt="Profile Photo">
                                            <?php endif; ?>
												<div class="upload-link" title="" data-toggle="tooltip" data-placement="right" data-original-title="update">
													<input type="file" class="update-flie">
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
                                                    <input class="form-control mb-xl-0 mb-3 bt-datepicker" value="<?php echo $userProfile['dob']; ?>" name="dob" type="date" id="dob">
                                                    <div class="icon"><i class="far fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Country</label>
                                                <select class="default-select form-control" name="country" value="<?php echo $userProfile['country']; ?>" id="country">
                                                    <option value="">Please select</option>
                                                    <option value="russia">Russia</option>
                                                    <option value="canada">Canada</option>
                                                    <option value="china">China</option>
                                                    <option value="india">India</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">City</label>
                                                <select class="form-control default-select" name="city" id="city" value = "<?php echo $userProfile['city']; ?>">
                                                    <option value="">Please select</option>
                                                    <option value="krasnodar">Krasnodar</option>
                                                    <option value="tyumen">Tyumen</option>
                                                    <option value="chelyabinsk">Chelyabinsk</option>
                                                    <option value="moscow">Moscow</option>
                                                </select>
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
				<p>Copyright © Designed &amp; Developed by <a href="https://dexignlab.com/"
						target="_blank">DexignLab</a> <span class="current-year">2024</span>
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
	
   
</body>
</html>