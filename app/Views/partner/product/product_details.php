
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
        alert('Redirecting to the product request form...');
        // Redirect to the product request page
        window.location.href = 'request_product_page_url'; // Replace with the actual URL
    }
</script>

<!-- Custom CSS -->
<style>
    .search-container {
        max-width: 300px;
    }
</style>
</body>
</html>