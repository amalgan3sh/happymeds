<!-- Content body start -->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Requirement</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('submit-product-requirement') ?>" method="post">

                            <div class="row">
                                <!-- Customer Name -->
                                <div class="col-lg-6 mb-2">
                                    <label class="form-label required">Customer Name</label>
                                    <input type="text" name="customerName" class="form-control" placeholder="Enter customer name" required>
                                </div>

                                <!-- Product Requirement Name -->
                                <div class="col-lg-6 mb-2">
                                    <label class="form-label required">Product Requirement Name</label>
                                    <input type="text" name="productRequirementName" class="form-control" placeholder="Enter requirement name" required>
                                </div>

                                <!-- Date -->
                                <div class="col-lg-6 mb-2">
                                    <label class="form-label required">Date</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>

                                <!-- Notes -->
                                <div class="col-lg-12 mb-2">
                                    <label class="form-label">Notes</label>
                                    <textarea name="notes" class="form-control" placeholder="Enter any additional notes"></textarea>
                                </div>

                                <!-- Manufacturer Dropdown -->
                                <div class="col-lg-6 mb-2">
                                    <label class="form-label required">Manufacturer</label>
                                    <select name="manufacturer" class="form-control" required>
                                        <option value="">Select Manufacturer</option>
                                        <!-- Loop through manufacturers and populate the dropdown -->
                                        <?php foreach ($manufacturers as $manufacturer): ?>
                                            <option value="<?= $manufacturer['user_id']; ?>">
                                                <?= $manufacturer['company_name']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>


                                <div class="col-lg-6 mb-2">
                                    <label class="form-label required">Product</label>
                                    <select name="product[]" id="product" class="form-control select2" multiple="multiple" required>
                                        <option value="">Select Product</option>
                                    </select>
                                </div>

                                <script>
                                    $(document).ready(function () {
                                        // Initialize Select2
                                        $('#product').select2({
                                            placeholder: "Select products",
                                            allowClear: true
                                        });
                                    
                                        // Handle manufacturer dropdown change
                                        $('select[name="manufacturer"]').on('change', function () {
                                            var manufacturerId = $(this).val(); // Get selected manufacturer ID
                                    
                                            // Check if a manufacturer is selected
                                            if (manufacturerId) {
                                                $.ajax({
                                                    url: "<?= base_url('distributor/getProductsByManufacturer/'); ?>" + manufacturerId,
                                                    type: 'GET',
                                                    dataType: 'json',
                                                    success: function (response) {
                                                        // Clear the product dropdown
                                                        $('#product').empty();
                                    
                                                        // Check if products are returned
                                                        if (response && response.length > 0) {
                                                            // Populate dropdown with products
                                                            $.each(response, function (index, product) {
                                                                $('#product').append(
                                                                    '<option value="' + product.product_id + '">' + product.ProductName + '</option>'
                                                                );
                                                            });
                                    
                                                            // Refresh Select2
                                                            $('#product').trigger('change');
                                                        } else {
                                                            // Show SweetAlert if no products found
                                                            Swal.fire({
                                                                icon: 'info',
                                                                title: 'No Products',
                                                                text: 'There are no products listed for this manufacturer.',
                                                                confirmButtonText: 'OK'
                                                            });
                                                        }
                                                    },
                                                    error: function (xhr, status, error) {
                                                        // Display an error popup on failure
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: 'An error occurred while fetching products. Please try again later.',
                                                            confirmButtonText: 'OK'
                                                        });
                                                        console.error('AJAX Error:', error);
                                                    }
                                                });
                                            } else {
                                                // Reset product dropdown if no manufacturer selected
                                                $('#product').empty();
                                                $('#product').trigger('change');
                                            }
                                        });
                                    });
                                </script>
                                <!-- Submit Button -->
                                <div class="col-12 mb-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="card-header">
                        <h4 class="card-title">Product Requirements</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="productRequirementsTable" class="table table-striped table-bordered table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Manufacturer ID</th>
                                        <th>Product Details</th>
                                        <th>Total Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($requirements)) : ?>
                                        <?php foreach ($requirements as $index => $requirement) : ?>
                                            <tr>
                                                <td>
                                                    <?= $index + 1 ?>
                                                </td>
                                                <td>
                                                    <?= esc($requirement->order_id ?? '-') ?>
                                                </td>
                                                <td>
                                                    <?= esc($requirement->manufacturer_name ?? '-') ?>
                                                </td>
                                                <!-- Changed to manufacturer_name -->
                                                <td>
                                                    <?php
                                            $details = json_decode($requirement->order_items, true); // Decode JSON string into an array
                                            if (!empty($details)) {
                                                foreach ($details as $itemId => $item) {
                                                    echo 'Product ID: ' . esc($item['product_id'] ?? '-') . '<br>';
                                                    echo 'Product Name: ' . esc($item['ProductName'] ?? '-') . '<br>';
                                                    echo 'Dosage Form: ' . esc($item['DosageForm'] ?? '-') . '<br>';
                                                    echo 'Quantity: ' . esc($item['quantity'] ?? '-') . '<br>';
                                                    echo 'Price: ' . esc($item['price'] ?? '0.00') . '<br>';
                                                    echo '<hr>'; // Add a separator for multiple items
                                                }
                                            } else {
                                                echo 'No order details available.';
                                            }
                                            ?>
                                                </td>
                                                <td>
                                                    <?= esc($requirement->total_amount ?? '0.00') ?>
                                                </td>
                                                <td>
                                                    <!-- Delete button -->
                                                    <button class="btn btn-danger btn-sm delete-btn" data-id="<?= esc($requirement->order_id) ?>">
                                                        Delete
                                                    </button>
                                                    <a href="<?= base_url('distributor_view_requirement') ?>" class="btn btn-info btn-sm">                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                                <?php else : ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">No requirements found</td>
                                                    </tr>
                                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <script>
            $(document).ready(function() {
                $('#productRequirementsTable').DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    pageLength: 5,
                    lengthChange: true,
                    info: true
                });

                // Delete button click event
                $('.delete-btn').on('click', function() {
                    const orderId = $(this).data('id'); // Get the order ID

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Perform AJAX request to delete the order
                            $.ajax({
                                url: "<?= base_url('distributor/deleteRequirement'); ?>",
                                type: 'POST',
                                data: { order_id: orderId },
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire(
                                            'Deleted!',
                                            'Your order has been deleted.',
                                            'success'
                                        );
                                        // Reload the page or remove the row
                                        location.reload();
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            response.message || 'Failed to delete the order.',
                                            'error'
                                        );
                                    }
                                },
                                error: function() {
                                    Swal.fire(
                                        'Error!',
                                        'An error occurred while deleting the order.',
                                        'error'
                                    );
                                }
                            });
                        }
                    });
                });
            });
        </script>
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
        <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">SpyderHub</a> <span class="current-year">2024</span>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="vendor/select2/js/select2.full.min.js"></script>
<script src="js/plugins-init/select2-init.js"></script>

<script src="vendor/jquery-steps/build/jquery.steps.min.js"></script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<!-- Form validate init -->
<script src="js/plugins-init/jquery.validate-init.js"></script>

<script src="vendor/dropzone/dist/dropzone.js"></script>


<!-- Form Steps -->
<script src="vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>

<script src="js/custom.min.js"></script>
<script src="js/dlabnav-init.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</body>

</html>