
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
                <!-- Display validation errors if any -->
                <?php if (session()->has('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Form with file upload -->
                <form action="<?= site_url('product/requestProduct') ?>" method="post" enctype="multipart/form-data" id="productRequestForm">
                    <?= csrf_field() ?>

                    <!-- Form wizard navigation -->
                    <div id="formWizard" class="mb-4">
                        <ul class="nav nav-pills nav-justified form-wizard-steps">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" data-step="1">
                                    <span class="step-title">Product Details</span>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" data-step="2">
                                    <span class="step-title">Images & Documents</span>
                                </button>
                            </li>
                        </ul>
                    </div>

                    <!-- Step 1: Product Details -->
                    <div class="form-step" id="step1">
                        <div class="row">
                            <!-- Product Name -->
                            <div class="col-md-6 mb-3">
                                <label for="productName" class="form-label">Product Name <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control <?= session('errors.productName') ? 'is-invalid' : '' ?>" 
                                       id="productName" 
                                       name="productName" 
                                       value="<?= old('productName') ?>" 
                                       required>
                                <?php if (session('errors.productName')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.productName') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Category -->
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                <select class="form-select <?= session('errors.category') ? 'is-invalid' : '' ?>" 
                                        id="category" 
                                        name="category" 
                                        required>
                                    <option value="">Select Category</option>
                                    <option value="Medicine" <?= old('category') == 'Medicine' ? 'selected' : '' ?>>Medicine</option>
                                    <option value="Supplement" <?= old('category') == 'Supplement' ? 'selected' : '' ?>>Supplement</option>
                                    <option value="Medical Device" <?= old('category') == 'Medical Device' ? 'selected' : '' ?>>Medical Device</option>
                                    <option value="Personal Care" <?= old('category') == 'Personal Care' ? 'selected' : '' ?>>Personal Care</option>
                                </select>
                                <?php if (session('errors.category')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.category') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Dosage Form -->
                            <div class="col-md-6 mb-3">
                                <label for="dosageForm" class="form-label">Dosage Form <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control <?= session('errors.dosageForm') ? 'is-invalid' : '' ?>" 
                                       id="dosageForm" 
                                       name="dosageForm" 
                                       value="<?= old('dosageForm') ?>" 
                                       placeholder="e.g., Tablet, Syrup" 
                                       required>
                                <?php if (session('errors.dosageForm')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.dosageForm') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Strength -->
                            <div class="col-md-6 mb-3">
                                <label for="strength" class="form-label">Strength <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control <?= session('errors.strength') ? 'is-invalid' : '' ?>" 
                                       id="strength" 
                                       name="strength" 
                                       value="<?= old('strength') ?>" 
                                       placeholder="e.g., 500mg, 10ml" 
                                       required>
                                <?php if (session('errors.strength')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.strength') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Description -->
                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control <?= session('errors.description') ? 'is-invalid' : '' ?>" 
                                          id="description" 
                                          name="description" 
                                          rows="4" 
                                          placeholder="Provide a brief description of the product"><?= old('description') ?></textarea>
                                <?php if (session('errors.description')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.description') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Therapeutic Use -->
                            <div class="col-12 mb-3">
                                <label for="therapeuticUse" class="form-label">Therapeutic Use</label>
                                <input type="text" 
                                       class="form-control <?= session('errors.therapeuticUse') ? 'is-invalid' : '' ?>" 
                                       id="therapeuticUse" 
                                       name="therapeuticUse" 
                                       value="<?= old('therapeuticUse') ?>" 
                                       placeholder="e.g., Pain relief, Vitamin supplement">
                                <?php if (session('errors.therapeuticUse')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.therapeuticUse') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Images and Documents -->
                    <div class="form-step" id="step2" style="display: none;">
                        <div class="row">
                            <!-- Product Image -->
                            <div class="col-12 mb-3">
                                <label for="productImage" class="form-label">Product Image</label>
                                <input type="file" 
                                       class="form-control <?= session('errors.productImage') ? 'is-invalid' : '' ?>" 
                                       id="productImage" 
                                       name="productImage" 
                                       accept=".jpg, .jpeg, .png">
                                <div class="form-text">Accepted formats: JPG, JPEG, PNG</div>
                                <?php if (session('errors.productImage')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.productImage') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Product Brochure -->
                            <div class="col-12 mb-3">
                                <label for="productBrochure" class="form-label">Product Brochure (optional)</label>
                                <input type="file" 
                                       class="form-control <?= session('errors.productBrochure') ? 'is-invalid' : '' ?>" 
                                       id="productBrochure" 
                                       name="productBrochure" 
                                       accept=".pdf">
                                <div class="form-text">Accepted format: PDF</div>
                                <?php if (session('errors.productBrochure')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.productBrochure') ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Certifications -->
                            <div class="col-12 mb-3">
                                <label for="certifications" class="form-label">Certifications (if any)</label>
                                <input type="file" 
                                       class="form-control <?= session('errors.certifications') ? 'is-invalid' : '' ?>" 
                                       id="certifications" 
                                       name="certifications" 
                                       accept=".pdf, .jpg, .jpeg, .png">
                                <div class="form-text">Accepted formats: PDF, JPG, JPEG, PNG</div>
                                <?php if (session('errors.certifications')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.certifications') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Form Navigation Buttons -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="prevStep" style="display: none;">Previous</button>
                        <button type="button" class="btn btn-primary" id="nextStep">Next</button>
                        <button type="submit" class="btn btn-success" id="submitBtn" style="display: none;">Submit Request</button>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('productRequestForm');
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const nextBtn = document.getElementById('nextStep');
    const prevBtn = document.getElementById('prevStep');
    const submitBtn = document.getElementById('submitBtn');
    const stepButtons = document.querySelectorAll('.form-wizard-steps .nav-link');
    
    let currentStep = 1;

    // Validate required fields in step 1
    function validateStep1() {
        const required = ['productName', 'category', 'dosageForm', 'strength'];
        return required.every(fieldName => {
            const field = document.getElementById(fieldName);
            return field.value.trim() !== '';
        });
    }

    // Handle next button click
    nextBtn.addEventListener('click', function() {
        if (currentStep === 1 && validateStep1()) {
            step1.style.display = 'none';
            step2.style.display = 'block';
            prevBtn.style.display = 'block';
            nextBtn.style.display = 'none';
            submitBtn.style.display = 'block'; // Show submit button at step 2
            currentStep = 2;
            
            // Update wizard steps
            stepButtons.forEach(button => {
                button.classList.remove('active');
                if (button.getAttribute('data-step') == '2') {
                    button.classList.add('active');
                }
            });
        }
    });

    // Handle previous button click
    prevBtn.addEventListener('click', function() {
        if (currentStep === 2) {
            step2.style.display = 'none';
            step1.style.display = 'block';
            prevBtn.style.display = 'none';
            nextBtn.style.display = 'block';
            submitBtn.style.display = 'none'; // Hide submit button at step 1
            currentStep = 1;
            
            // Update wizard steps
            stepButtons.forEach(button => {
                button.classList.remove('active');
                if (button.getAttribute('data-step') == '1') {
                    button.classList.add('active');
                }
            });
        }
    });

    // Form submission handler
    form.addEventListener('submit', function(e) {
        if (currentStep === 1 && !validateStep1()) {
            e.preventDefault();
            alert('Please fill in all required fields before proceeding.');
        }
    });
});
</script>

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
<style>
.form-wizard-steps .nav-link {
    position: relative;
    padding: 1rem;
    margin-right: 1rem;
    border-radius: 0.5rem;
    background-color: #f8f9fa;
    border: none;
}

.form-wizard-steps .nav-link.active {
    background-color: #0d6efd;
    color: white;
}

.step-number {
    display: inline-block;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    border-radius: 50%;
    background-color: #dee2e6;
    margin-right: 0.5rem;
}

.nav-link.active .step-number {
    background-color: white;
    color: #0d6efd;
}

.form-wizard-steps {
    margin-bottom: 2rem;
}

.invalid-feedback {
    display: block;
}
</style>
<!-- Form Steps -->

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