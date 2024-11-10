<!-- Content body start -->

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
           
            <div class="col-xl-12 col-lg-12">
                <div class="card profile-card card-bx m-b30">
                    <div class="card-header">
                        <h4 class="card-title">Forgot Password</h4>
                    </div>
                    <?php if(session()->getFlashdata('reset_link_success')): ?>
                        <div class="alert alert-success" id="successMessage">
                        <button type="button" class="close small-close" onclick="closeAlert('successMessage')">×</button>
                            <?= session()->getFlashdata('reset_link_success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(session()->getFlashdata('rese_link_error')): ?>
                    <div class="alert alert-danger" id="errorMessage">
                        <button type="button" class="close small-close" onclick="closeAlert('errorMessage')">×</button>
                        <?= session()->getFlashdata('reset_link_error'); ?>
                        <?php   session()->remove('reset_link_error');  ?>
                    </div>
                <?php endif; ?>
                    <form method="post" action="<?= site_url('send_reset_link') ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label" for="UserName">User Name</label>
                                    <input type="email" class="form-control" name="email" value="" id="email" placeholder="Enter your email" required />
                                    <button class="mt-3" type="submit">Send Reset Link</button>
                                </div>
                            </div>
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

    <script>
         // Function to close the alert and remember the user's choice
         function closeAlert(id) {
            var successMessage = document.getElementById(id);
            successMessage.style.display = 'none';
        }

    </script>

   
</body>
</html>