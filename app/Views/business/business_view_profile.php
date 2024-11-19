<!-- Content body start -->
<style>
    /* General Styling */
    .content-body {
        font-family: Arial, sans-serif;
        color: #333;
        padding: 20px;
    }
    
    /* Card Styling */
    .profile-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    /* Header Styling */
    .profile-header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .profile-header img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 20px;
    }
    .profile-header .title {
        font-size: 1.8em;
        font-weight: bold;
        color: #333;
    }
    .profile-header .subtitle {
        font-size: 1em;
        color: #555;
        margin-top: 5px;
    }

    /* Profile Info Styling */
    .profile-info-section {
        margin-top: 30px;
    }
    .profile-info-section h4 {
        font-size: 1.2em;
        color: #333;
        border-bottom: 2px solid #007bff;
        padding-bottom: 8px;
        margin-bottom: 15px;
    }
    .profile-info {
        display: flex;
        flex-wrap: wrap;
    }
    .profile-info div {
        width: 50%;
        padding: 10px;
    }
    .info-label {
        font-weight: 800;
        color: #555;
    }
    .info-text {
        font-size: 1.2em;
        color: #333;
    }
    
    /* Footer Styling */
    .footer {
        text-align: center;
        font-size: 0.9em;
        color: #777;
        margin-top: 30px;
    }
</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="profile-card">
            <!-- Profile Header -->
            <div class="profile-header">
                <img src="<?php if($user['profile_photo'] != null && $user['profile_photo'] != '') { echo base_url('/uploads/user/' . $user['profile_photo']); } else { echo 'images/user.jpg'; }?>" alt="Profile Picture">
                <div>
                    <div class="title"><?= esc(!empty($user['firstname']) ? $user['firstname'] : $user['user_name']) ?> <?= esc($user['lastname'] ?? '') ?></div>
                    <div class="subtitle"><?= esc($user['designation'] ?? 'Position Unavailable') ?> at <?= esc($user['company_name'] ?? 'Company Unavailable') ?></div>
                </div>
            </div>

            <!-- Profile Information Sections -->
            <div class="profile-info-section">
                <h4>Contact Details</h4>
                <div class="profile-info">
                    <div><span class="info-label">Email:</span> <span class="info-text"><?= esc($user['email'] ?? 'Not provided') ?></span></div>
                    <div><span class="info-label">Phone:</span> <span class="info-text"><?= esc($user['phone'] ?? 'Not provided') ?></span></div>
                    <div><span class="info-label">Country:</span> <span class="info-text"><?= esc($user['country'] ?? 'Not provided') ?></span></div>
                    <div><span class="info-label">City:</span> <span class="info-text"><?= esc($user['city'] ?? 'Not provided') ?></span></div>
                </div>
            </div>

            <div class="profile-info-section">
                <h4>Personal Information</h4>
                <div class="profile-info">
                    <div><span class="info-label">Username:</span> <span class="info-text"><?= esc($user['user_name'] ?? 'Not provided') ?></span></div>
                    <div><span class="info-label">Gender:</span> <span class="info-text"><?= esc($user['gender'] ?? 'Not provided') ?></span></div>
                    <div><span class="info-label">Date of Birth:</span> <span class="info-text"><?php if($user['dob'] != '0000-00-00') { echo $user['dob']; } ?></span></div>
                    <div><span class="info-label">Experience:</span> <span class="info-text"><?= esc($user['experience'] ?? 'Not provided') ?> years</span></div>
                </div>
            </div>

            <div class="profile-info-section">
                <h4>Professional Information</h4>
                <div class="profile-info">
                    <div><span class="info-label">Company:</span> <span class="info-text"><?= esc($user['company_name'] ?? 'Not provided') ?></span></div>
                    <div><span class="info-label">Designation:</span> <span class="info-text"><?= esc($user['designation'] ?? 'Not provided') ?></span></div>
                    <div><span class="info-label">Skills:</span> <span class="info-text"><?= esc($user['skills'] ?? 'Not provided') ?></span></div>
                    <div><span class="info-label">Preferred Language:</span> <span class="info-text"><?= esc($user['language'] ?? 'Not provided') ?></span></div>
                </div>
            </div>

            <div class="profile-info-section">
                <h4>About Me</h4>
                <p class="info-text"><?= nl2br(esc($user['about_me'] ?? 'No additional details provided.')) ?></p>
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
	<script src="vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>

    <script>
         $(document).ready(function(){
            $('#DOB').datepicker({
                format: 'dd-mm-yyyy',    // Date format
                endDate: '0d',           // Disable future dates
                autoclose: true,         // Automatically close after selecting a date
                todayHighlight: true     // Highlight today's date
            });
         });
        </script>
	
   
</body>
</html>