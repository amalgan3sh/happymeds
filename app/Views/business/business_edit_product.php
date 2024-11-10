<!-- Content body start -->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Healthcare Product</h4>
                    </div> 
                    <div class="card-body">
                    
                    <form action="<?= site_url('product/editProduct') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?> <!-- CSRF protection token -->
                    
                    <div class="row">
                        <input type="hidden" id="id" name="id" value="<?php echo $product[0]['id']; ?>">
                        <div class="col-lg-6 mb-2">
                            <label class="form-label required">Product Name</label>
                            <input type="text" name="productName" class="form-control" placeholder="Product Name" required value="<?php echo $product[0]['product_name']; ?>">
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label class="form-label required">Category</label>
                            <select name="category" class="form-control" required>
                                <option value="">Select Category</option>
                                <option value="Medicine" <?php if($product[0]['category'] == 'Medicine') { echo 'selected'; } ?>>Medicine</option>
                                <option value="Supplement" <?php if($product[0]['category'] == 'Supplement') { echo 'selected'; } ?>>Supplement</option>
                                <option value="Medical Device" <?php if($product[0]['category'] == 'Medical Device') { echo 'selected'; } ?>>Medical Device</option>
                                <option value="Personal Care" <?php if($product[0]['category'] == 'Personal Care') { echo 'selected'; } ?>>Personal Care</option>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label class="form-label required">Price (per unit)</label>
                            <input type="number" name="price" class="form-control" placeholder="Enter price" required value="<?php echo $product[0]['price']; ?>">
                        </div>
                        
                        <div class="col-lg-6 mb-2" id="stock_quantity_div">
                            <label class="form-label required">Stock Quantity</label>
                            <input type="number" id="stock" name="stock" class="form-control" placeholder="Available stock" required value="<?php echo $product[0]['stock_quantity']; ?>">
                        </div>
                        <div class="text-right mt-3">
                            <button type="submit" class="btn btn-sm btn-primary">Update Product</button>
                            <a href="<?= base_url('business_home' ); ?>" class="btn btn-sm btn-danger">Cancel</a>
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
	
	

</body>

</html>