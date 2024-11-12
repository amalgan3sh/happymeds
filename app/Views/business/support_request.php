<!-- Content body start -->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Support Request</h4>
                    </div> 
                    <div class="card-body">

                    <!-- Display success or error messages -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
                    <?php elseif (session()->getFlashdata('error')): ?>
                        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
                    <?php endif; ?>

                    <form action="<?= site_url('business_support_request_submit') ?>" method="post">
                    <div class="mb-3">

                        <label class="form-label required" for="name">Name:</label>
                        <input class="form-control" type="name" name="name" id="name" required>

                        </div>
                        <div class="mb-3">

                            <label class="form-label required" for="email">Email:</label>
                            <input class="form-control" type="email" name="email" id="email" required>

                        </div>
                        <div class="mb-3">
                            
                        <label class="form-label required" for="message">Message:</label>
                            <textarea class="form-control"  name="message" id="message" required></textarea>
                        </div>

                        <div>
                        <button class="mt-3" type="submit">Send</button>
                        </div>
                    </form>
                    
                   
                    </div>
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

    <script src="vendor/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="js/plugins-init/jquery.validate-init.js"></script>
	
	 <script src="vendor/dropzone/dist/dropzone.js"></script>


	<!-- Form Steps -->
	<script src="vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	
	<script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
	

</body>

</html>