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
                        <h4 class="card-title">Product Information Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
						<form action="<?= base_url('submit_product_data') ?>" method="post" enctype="multipart/form-data">
						<div class="row">
                                    <div class="col-xl-6">
                                        <!-- Product Name -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="ProductName">Product Name</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter product name" required>
                                                <div class="invalid-feedback">
                                                    Please enter Product Name.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Content -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="Content">Content</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="Content" name="Content" placeholder="Enter content" required>
                                                <div class="invalid-feedback">
                                                    Please enter Content.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Dosage Form -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="DosageForm">Dosage Form</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="DosageForm" name="DosageForm" placeholder="Enter dosage form" required>
                                                <div class="invalid-feedback">
                                                    Please enter Dosage Form.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Strength -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="Strength">Strength</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="Strength" name="Strength" placeholder="Enter strength" required>
                                                <div class="invalid-feedback">
                                                    Please enter Strength.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Therapeutic Use -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="TherapeuticUse">Therapeutic Use</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="TherapeuticUse" name="TherapeuticUse" placeholder="Enter therapeutic use" required>
                                                <div class="invalid-feedback">
                                                    Please enter Therapeutic Use.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Manufacturer Name -->
<div class="mb-3 row">
    <label class="col-lg-4 col-form-label form-label" for="ManufacturerName">Manufacturer Name</label>
    <div class="col-lg-6">
        <select class="form-control" id="ManufacturerName" name="ManufacturerName" required>
            <option value="" disabled selected>Select Manufacturer</option>
            <?php foreach ($manufacturers as $manufacturer): ?>
                <option value="<?= $manufacturer['user_id'] ?>"><?= $manufacturer['user_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback">
            Please select a Manufacturer Name.
        </div>
    </div>
</div>

                                        <!-- Tablet Shape and Color -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="TabletShapeAndColor">Tablet Shape and Color</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="TabletShapeAndColor" name="TabletShapeAndColor" placeholder="Enter tablet shape and color" required>
                                                <div class="invalid-feedback">
                                                    Please enter Tablet Shape and Color.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Packaging -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="Packaging">Packaging</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="Packaging" name="Packaging" placeholder="Enter packaging details" required>
                                                <div class="invalid-feedback">
                                                    Please enter Packaging.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Batch Number -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="BatchNumber">Batch Number</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="BatchNumber" name="BatchNumber" placeholder="Enter batch number" required>
                                                <div class="invalid-feedback">
                                                    Please enter Batch Number.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Manufacturing Date -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="ManufacturingDate">Manufacturing Date</label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="ManufacturingDate" name="ManufacturingDate" required>
                                                <div class="invalid-feedback">
                                                    Please select Manufacturing Date.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Expiry Date -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="ExpiryDate">Expiry Date</label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="ExpiryDate" name="ExpiryDate" required>
                                                <div class="invalid-feedback">
                                                    Please select Expiry Date.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Unit Size -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="UnitSize">Unit Size</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="UnitSize" name="UnitSize" placeholder="Enter unit size" required>
                                                <div class="invalid-feedback">
                                                    Please enter Unit Size.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Shipper Size -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="ShipperSize">Shipper Size</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="ShipperSize" name="ShipperSize" placeholder="Enter shipper size" required>
                                                <div class="invalid-feedback">
                                                    Please enter Shipper Size.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Icon -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="icon">Icon</label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" id="icon" name="icon" required>
                                                <div class="invalid-feedback">
                                                    Please upload an Icon.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <!-- Product Image -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="product_img_main">Product Image</label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" id="product_img_main" name="product_img_main" required>
                                                <div class="invalid-feedback">
                                                    Please upload a Product Image.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Rating -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="rating">Rating</label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" placeholder="Enter rating" required>
                                                <div class="invalid-feedback">
                                                    Please enter a Rating.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Product Images -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="product_images">Product Images</label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" id="product_images" name="product_images[]" multiple required>
                                                <div class="invalid-feedback">
                                                    Please upload Product Images.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Thumbnail -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="thumbnail">Thumbnail</label>
                                            <div class="col-lg-6">
                                                <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                                                <div class="invalid-feedback">
                                                    Please upload a Thumbnail.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Sold Units -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="sold_units">Sold Units</label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="sold_units" name="sold_units" placeholder="Enter sold units" required>
                                                <div class="invalid-feedback">
                                                    Please enter Sold Units.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Price -->
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label form-label" for="Price">Price</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="Price" name="Price" placeholder="Enter price" required>
                                                <div class="invalid-feedback">
                                                    Please enter Price.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mb-3 row">
                                            <div class="col-lg-6 offset-lg-4">
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
        <!-- End row -->
    </div>
</div>


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