
<!--**********************************
    Content body start
***********************************-->
<div class="page-titles">
    <div class="sub-dz-head">
        <div class="d-flex align-items-center dz-head-title">
            <h2 class="text-white m-0">Products Details</h2>
        </div>
    </div>
</div>

<!-- Search bar -->
<div class="container-fluid mb-4 d-flex justify-content-end">
    <div class="search-container">
        <input type="text" id="searchBar" class="form-control" placeholder="Search products..." onkeyup="filterProducts()">
    </div>
</div>

<style>
    .search-container {
        max-width: 300px;
        width: 100%;
    }
</style>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Row -->
                <div class="row" id="productContainer">
                    <?php foreach ($product_data as $product): ?>
                    <!-- column -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 product-item" data-name="<?= esc(strtolower($product['ProductName'])) ?>">
                        <div class="card pull-up">
                            <a href="<?= base_url('product_details_view?product_id='.$product['product_id']) ?>" class="text-decoration-none text-dark">
                                <div class="card-body align-items-center flex-wrap">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="ico-icon">
                                            <img src="<?= esc($product['icon']) ?>" alt="<?= esc($product['ProductName']) ?>" style="width: 50px; height: 50px; object-fit: contain;">
                                        </div>
                                        <div class="ms-3">
                                            <h4 class="card-title mb-0"><?= esc($product['ProductName']) ?></h4>
                                            <span>
                                                <?= esc($product['DosageForm']) ?>
                                                <?php if (strpos(strtolower($product['DosageForm']), 'tablet') !== false): ?>
                                                    <i class="fas fa-tablets"></i>
                                                <?php elseif (strpos(strtolower($product['DosageForm']), 'syrup') !== false): ?>
                                                    <i class="fas fa-prescription-bottle-alt"></i>
                                                <?php elseif (strpos(strtolower($product['DosageForm']), 'injection') !== false): ?>
                                                    <i class="fas fa-syringe"></i>
                                                <?php elseif (strpos(strtolower($product['DosageForm']), 'suspension') !== false): ?>
                                                    <i class="fas fa-vial"></i>
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                    </div>    
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <p class="mb-0 fs-14 text-dark font-w600"><?= esc($product['Strength']) ?></p>
                                            <span class="fs-12"><?= esc($product['Content']) ?></span>
                                        </div>
                                        <div>
                                            <p class="mb-0 fs-14 text-success font-w600">Info</p>
                                            <span class="fs-12"><?= esc(substr($product['TherapeuticUse'], 0, 30)) ?>...</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- /column -->
                    <?php endforeach; ?>
                </div>
                <!-- Message when no products found -->
                <div id="noResultsMessage" class="text-center mt-4" style="display: none;">
                    <p>The product is not available. Do you want to request the product?</p>
                    <button class="btn btn-primary" onclick="requestProduct()">Request Product</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Request Product -->
<div class="modal fade" id="requestProductModal" tabindex="-1" aria-labelledby="requestProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requestProductModalLabel">Request New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('product/requestProduct') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?> <!-- CSRF protection token -->

                    <div id="smartwizard_modal" class="form-wizard">
                        <ul class="nav nav-wizard">
                            <li><a class="nav-link" href="#step_product_details_modal">
                                <span>1</span> 
                            </a></li>
                            <li><a class="nav-link" href="#step_images_documents_modal">
                                <span>2</span>
                            </a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- Step 1: Product Details -->
                            <div id="step_product_details_modal" class="tab-pane" role="tabpanel">
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

                            <!-- Step 2: Images and Documents -->
                            <div id="step_images_documents_modal" class="tab-pane" role="tabpanel">
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
                        </div>
                    </div>
                </form>
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
        <p>Copyright © Designed &amp; Developed by <a href=""
                target="_blank">SpyderHub</a> <span class="current-year">2024</span>
        </p>
    </div>
</div>
<!--**********************************
    Footer end
***********************************-->

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

<!-- JavaScript for search functionality -->
<script>
    // JavaScript function to filter products
    function filterProducts() {
        const searchInput = document.getElementById('searchBar').value.toLowerCase();
        const products = document.querySelectorAll('.product-item');
        let hasVisibleProducts = false;
        products.forEach(product => {
            const productName = product.getAttribute('data-name');
            if (productName.includes(searchInput)) {
                product.style.display = 'block';
                hasVisibleProducts = true;
            } else {
                product.style.display = 'none';
            }
        });

        // Show or hide the noResultsMessage based on whether there are visible products
        const noResultsMessage = document.getElementById('noResultsMessage');
        if (hasVisibleProducts) {
            noResultsMessage.style.display = 'none';
        } else {
            noResultsMessage.style.display = 'block';
        }
    }

    // Function to handle the "Request Product" button click
    function requestProduct() {
        $('#requestProductModal').modal('show'); // Trigger the modal
    }

    $(document).ready(function() {
    // Initialize SmartWizard for modal
    $('#smartwizard_modal').smartWizard({
        toolbarSettings: {
            toolbarExtraButtons: [] // No extra buttons needed initially
        }
    });

    // Function to handle the "Request Product" button click
    $(".btn-primary").on("click", function() {
        $('#requestProductModal').modal('show'); // Trigger the modal
    });

    // Function to handle step changes
    $("#smartwizard_modal").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
        const isLastStep = stepNumber === 1; // Check if it's the second step (step 1 is the second one, 0-indexed)

        // If it's the last step, change "Next" to "Submit"
        if (isLastStep) {
            $(".sw-btn-next").text("Submit");
        } else {
            $(".sw-btn-next").text("Next");
        }
    });

    // Handle "Submit" button click
    $(".sw-btn-next").on("click", function() {
        const isLastStep = $("#smartwizard_modal").smartWizard("getStepIndex") === 1;
        if (isLastStep) {
            // If it's the last step, trigger the form submit
            $("#requestProductModal form").submit();
        }
    });
});



</script>
<!-- Form Steps -->
<script src="vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	
	<script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
<!-- Custom CSS -->
<style>
    .search-container {
        max-width: 300px;
    }
</style>
</body>
</html>