<!-- Content body start -->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Healthcare Product</h4>
                    </div>
                    <div class="card-body">
                        <div id="smartwizard" class="form-wizard order-create">
                            <ul class="nav nav-wizard">
                                <li><a class="nav-link" href="#step_product_details">
                                    <span>1</span> 
                                </a></li>
                                <li><a class="nav-link" href="#step_pricing_stock">
                                    <span>2</span>
                                </a></li>
                                <li><a class="nav-link" href="#step_images_documents">
                                    <span>3</span>
                                </a></li>
                                <li><a class="nav-link" href="#step_review">
                                    <span>4</span>
                                </a></li>
                            </ul>
                            <div class="tab-content">
                                <!-- Step 1: Product Details -->
                                <div id="step_product_details" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Product Name</label>
                                            <input type="text" name="productName" class="form-control" placeholder="Product Name" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Category</label>
                                            <select name="category" class="form-control" required>
                                                <option value="">Select Category</option>
                                                <option value="Medicine">Medicine</option>
                                                <option value="Supplement">Supplement</option>
                                                <option value="Medical Device">Medical Device</option>
                                                <option value="Personal Care">Personal Care</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Dosage Form</label>
                                            <input type="text" name="dosageForm" class="form-control" placeholder="e.g., Tablet, Syrup" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Strength</label>
                                            <input type="text" name="strength" class="form-control" placeholder="e.g., 500mg, 10ml" required>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" class="form-control" rows="4" placeholder="Provide a brief description of the product"></textarea>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <label class="form-label">Therapeutic Use</label>
                                            <input type="text" name="therapeuticUse" class="form-control" placeholder="e.g., Pain relief, Vitamin supplement">
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 2: Pricing and Stock Information -->
                                <div id="step_pricing_stock" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Price (per unit)</label>
                                            <input type="number" name="price" class="form-control" placeholder="Enter price" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label required">Stock Quantity</label>
                                            <input type="number" name="stock" class="form-control" placeholder="Available stock" required>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label">Minimum Order Quantity</label>
                                            <input type="number" name="minOrderQty" class="form-control" placeholder="Minimum order quantity">
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label class="form-label">SKU (Stock Keeping Unit)</label>
                                            <input type="text" name="sku" class="form-control" placeholder="SKU Code">
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 3: Images and Documents -->
                                <div id="step_images_documents" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-12 mb-2">
                                            <label class="form-label">Product Image</label>
                                            <input type="file" name="productImage" class="form-control" accept=".jpg, .jpeg, .png">
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <label class="form-label">Product Brochure (optional)</label>
                                            <input type="file" name="productBrochure" class="form-control" accept=".pdf">
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <label class="form-label">Certifications (if any)</label>
                                            <input type="file" name="certifications" class="form-control" accept=".pdf, .jpg, .png">
                                        </div>
                                    </div>
                                </div>
                                <!-- Step 4: Final Review and Submit -->
                                <div id="step_review" class="tab-pane" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="confirmDetails" required>
                                                <label class="form-check-label" for="confirmDetails">
                                                    I confirm that the details provided are accurate.
                                                </label>
                                            </div>
                                            <div class="text-center mt-3">
                                                <button type="submit" class="btn btn-primary">Add Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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