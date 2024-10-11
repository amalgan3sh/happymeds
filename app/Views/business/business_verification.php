<!-- Content body start -->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">KYC Verification</h4>
                    </div>
                    <div class="card-body">
                    <form action="<?php echo base_url('submit_verification') ?>" method="post" enctype="multipart/form-data">

                        <div id="smartwizard" class="form-wizard order-create">
                            <ul class="nav nav-wizard">
                                <li><a class="nav-link" href="#step_personal"> 
                                    <span>1</span> 
                                </a></li>
                                <li><a class="nav-link" href="#step_company">
                                    <span>2</span>
                                </a></li>
                                <li><a class="nav-link" href="#step_banking">
                                    <span>3</span>
                                </a></li>
                                <li><a class="nav-link" href="#step_compliance">
                                    <span>4</span>
                                </a></li>
                                <li><a class="nav-link" href="#step_documents">
                                    <span>5</span>
                                </a></li>
                                <li><a class="nav-link" href="#step_review">
                                    <span>6</span>
                                </a></li>
                            </ul>
                            <div class="tab-content">
                                <!-- Step 1: Personal Information -->
                                <div id="step_personal" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">First Name</label>
                                            <input type="text" name="firstName" class="form-control" placeholder="John" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Last Name</label>
                                            <input type="text" name="lastName" class="form-control" placeholder="Doe" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Date of Birth</label>
                                            <input type="date" name="dob" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Nationality</label>
                                            <input type="text" name="nationality" class="form-control" placeholder="Country" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Email Address</label>
                                            <input type="email" name="email" class="form-control" placeholder="example@example.com" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Phone Number</label>
                                            <input type="tel" name="phone" class="form-control" placeholder="(+1) 123-456-7890" required>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <label class="form-label required">Residential Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Street Address" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <input type="text" name="city" class="form-control" placeholder="City" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <input type="text" name="state" class="form-control" placeholder="State" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 2: Company Information -->
                                <div id="step_company" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Company Name</label>
                                            <input type="text" name="companyName" class="form-control" placeholder="Company Name" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Business Registration Number</label>
                                            <input type="text" name="registrationNumber" class="form-control" placeholder="Registration Number" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Company Email Address</label>
                                            <input type="email" name="companyEmail" class="form-control" placeholder="company@example.com" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Company Phone Number</label>
                                            <input type="tel" name="companyPhone" class="form-control" placeholder="(+1) 123-456-7890" required>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <label class="form-label">Company Website</label>
                                            <input type="url" name="website" class="form-control" placeholder="https://example.com">
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 3: Banking Information -->
                                <div id="step_banking" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Bank Name</label>
                                            <input type="text" name="bankName" class="form-control" placeholder="Bank Name" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Account Number</label>
                                            <input type="text" name="accountNumber" class="form-control" placeholder="Account Number" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">SWIFT Code/IBAN</label>
                                            <input type="text" name="swiftCode" class="form-control" placeholder="SWIFT Code/IBAN" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 4: Compliance Information -->
                                <div id="step_compliance" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Tax Identification Number (TIN)</label>
                                            <input type="text" name="tin" class="form-control" placeholder="TIN" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label">VAT/GST Number</label>
                                            <input type="text" name="vatNumber" class="form-control" placeholder="VAT/GST Number">
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <label class="form-label">Licenses and Certifications</label>
                                            <input type="file" name="licenses" class="form-control" accept=".pdf,.jpg,.png">
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 5: Document Uploads -->
                                <div id="step_documents" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-12 mb-2">
                                            <label class="form-label required">Proof of Identity (ID Card, Passport)</label>
                                            <input type="file" name="identityProof" class="form-control" accept=".pdf,.jpg,.png" required>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <label class="form-label required">Proof of Address (Utility Bill, Lease Agreement)</label>
                                            <input type="file" name="addressProof" class="form-control" accept=".pdf,.jpg,.png" required>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <label class="form-label">Bank Statement (optional)</label>
                                            <input type="file" name="bankStatement" class="form-control" accept=".pdf,.jpg,.png">
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 6: Final Review and Signature -->
                                <div id="step_review" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                                <label class="form-check-label" for="agreeTerms">
                                                    I agree to the terms and conditions.
                                                </label>
                                            </div>
                                            <div class="text-center mt-3">
                                                <button type="submit" class="btn btn-primary">Submit KYC</button>
                                            </div>
                                        </div>
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
	
   
	<script>
		$(document).ready(function(){
			// SmartWizard initialize
			$('#smartwizard').smartWizard(); 
		});
	</script>

</body>

</html>