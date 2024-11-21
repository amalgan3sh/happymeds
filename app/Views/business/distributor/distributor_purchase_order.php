<!-- Content body start -->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    

                    <div class="card-header">
                        <h4 class="card-title">Purchase Order</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="productRequirementsTable" class="table table-striped table-bordered table-responsive-md">
                            <thead>
        <tr>
            <th>#</th>
            <th>Order ID</th>
            <th>Product Name</th>
            <th>Manufacturer</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($purchaseOrders)): ?>
            <?php foreach ($purchaseOrders as $index => $order): ?>
                <tr>
                    <td><?= esc($index + 1) ?></td>
                    <td><?= esc($order['order_id']) ?></td>
                    <td><?= esc($order['ProductName']) ?></td>
                    <td>
                        <?= esc($order['firstname'] . ' ' . $order['lastname']) ?> (<?= esc($order['company_name']) ?>)
                    </td>
                    <td><?= esc($order['total_amount']) ?></td>
                    <td><?= esc($order['status']) ?></td>
                    <td>
                        <a href="<?= site_url('view_order/' . $order['id']) ?>" class="btn btn-info btn-sm">View</a>
                        <a href="<?= site_url('delete_order/' . $order['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No purchase orders found.</td>
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