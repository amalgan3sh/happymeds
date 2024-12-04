<div class="content-body">
            <div class="container-fluid">
                <!-- row -->
				<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Profile Datatable</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table id="example3" class="display min-w850">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Strength</th>
                <th>Stock Quantity</th>
                <th>Price</th>
                <th>Manufacturer</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <!-- Image -->
                        <td>
                            <img class="rounded-circle" width="35"
                                src="<?= base_url(esc($product['thumbnail'])); ?>" alt="">
                        </td>
                        <!-- Product Name -->
                        <td><?= esc($product['ProductName']); ?></td>
                        <!-- Category -->
                        <td><?= esc($product['DosageForm']); ?></td>
                        <!-- Strength -->
                        <td><?= esc($product['Strength']); ?></td>
                        <!-- Stock Quantity -->
                        <td><?= esc($product['total_units'] ?? 0); ?></td>
                    <!-- Price -->
                        <td>$<?= esc($product['price']); ?></td>
                        <!-- Manufacturer -->
                        <td><?= esc($product['manufacturer_id'] ?? 'No Manufacturer'); ?></td>                        <!-- Actions -->
                        <td>
                            <div class="d-flex">
                                <a href="<?= base_url('agent/edit_product/' . $product['product_id']); ?>" 
                                   class="btn btn-primary shadow btn-xs sharp me-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0);" 
   class="btn btn-danger shadow btn-xs sharp delete-product" 
   data-id="<?= esc($product['product_id']); ?>">
   <i class="fas fa-trash-alt"></i>
</a>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Attach event listener to all delete buttons
    const deleteButtons = document.querySelectorAll('.delete-product');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-id'); // Get product ID

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the delete URL
                    window.location.href = `<?= base_url('agent/delete_product/'); ?>${productId}`;
                }
            });
        });
    });
});
</script>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No products found for this agent.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
                                </div>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="vendor/datatables/responsive/responsive.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>

	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
   
</body>
</html>