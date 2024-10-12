<!-- Content body start -->
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
                                        <img src="images/tab/1.jpg" alt="">
                                        <div class="upload-link" title="" data-toggle="tooltip" data-placement="right" data-original-title="update">
                                            <input type="file" class="update-flie">
                                            <i class="fa fa-camera"></i>
                                        </div>
                                    </div>
                                    <div class="author-info">
                                        <h6 class="title">
                                            <?= esc(!empty($user['firstname']) ? $user['firstname'] : $user['user_name']) ?>
                                        </h6>
                                        <span>
                                            <?= esc(!empty($user['lastname']) ? $user['lastname'] : '') ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="info-list">
                                <ul>
                                    <li><a href="app-profile.html">Products</a><span>36</span></li>
                                    <li><a href="uc-lightgallery.html">Gallery</a><span>3</span></li>
                                    <li><a href="app-profile.html">Orders</a><span>5</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="input-group mb-3">
                                <div class="form-control rounded text-center">Profile</div>
                            </div>
                            <div class="input-group">
                                <a href="https://www.example.com/" target="_blank" class="form-control text-hover rounded">www.example.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="card profile-card card-bx m-b30">
                    <div class="card-header">
                        <h4 class="card-title">Edit Profile</h4>
                    </div>
                    <form class="profile-form" action="<?= site_url('user/updateProfile') ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="FirstName">First Name</label>
                                        <input type="text" class="form-control" name="firstname" value="<?= esc($user['firstname']) ?>" id="FirstName">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="LastName">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" value="<?= esc($user['lastname']) ?>" id="LastName">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="UserName">User Name</label>
                                        <input type="text" class="form-control" name="user_name" value="<?= esc($user['user_name']) ?>" id="UserName">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="CompanyName">Company Name</label>
                                        <input type="text" class="form-control" name="company_name" value="<?= esc($user['company_name']) ?>" id="CompanyName">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="Designation">Designation</label>
                                        <input type="text" class="form-control" name="designation" value="<?= esc($user['designation']) ?>" id="Designation">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="Skills">Skills</label>
                                        <input type="text" class="form-control" name="skills" value="<?= esc($user['skills']) ?>" id="Skills">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <select class="form-control" name="gender" id="Gender">
                                            <option value="">Please select</option>
                                            <option value="Male" <?= ($user['gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
                                            <option value="Female" <?= ($user['gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
                                            <option value="Other" <?= ($user['gender'] == 'Other') ? 'selected' : '' ?>>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="DOB">DOB</label>
                                        <input type="date" class="form-control" name="dob" value="<?= esc($user['dob']) ?>" id="DOB">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="tel" class="form-control" name="phone" value="<?= esc($user['phone']) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="Email">Email address</label>
                                        <input type="email" class="form-control" name="email" value="<?= esc($user['email']) ?>" id="Email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" value="<?= esc($user['country']) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" name="city" value="<?= esc($user['city']) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="AboutMe">About Me</label>
                                        <textarea class="form-control" name="about_me" id="AboutMe" rows="3"><?= esc($user['about_me']) ?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Experience (years)</label>
                                        <input type="number" class="form-control" name="experience" value="<?= esc($user['experience']) ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Preferred Language</label>
                                        <input type="text" class="form-control" name="language" value="<?= esc($user['language']) ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                            <a href="page-forgot-password.html" class="text-hover float-end">Forgot your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content body end -->
		
		
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