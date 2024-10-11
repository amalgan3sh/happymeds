<!-- Content body start -->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manage Products</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:50px;">
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>PRODUCT ID</th>
                                        <th>PRODUCT NAME</th>
                                        <th>CATEGORY</th>
                                        <th>STOCK STATUS</th>
                                        <th>PRICE</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($products) && is_array($products)) : ?>
                                        <?php foreach ($products as $product) : ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                        <input type="checkbox" class="form-check-input" id="checkProduct<?= $product['id'] ?>">
                                                        <label class="form-check-label" for="checkProduct<?= $product['id'] ?>"></label>
                                                    </div>
                                                </td>
                                                <td><strong><?= $product['id'] ?></strong></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url('uploads/' . $product['product_image']) ?>" class="rounded-lg me-2" width="24" alt="">
                                                        <span class="w-space-no"><?= esc($product['product_name']) ?></span>
                                                    </div>
                                                </td>
                                                <td><?= esc($product['category']) ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <?php if ($product['stock_quantity'] > 10) : ?>
                                                            <i class="fa fa-circle text-success me-1"></i> In Stock
                                                        <?php elseif ($product['stock_quantity'] > 0) : ?>
                                                            <i class="fa fa-circle text-warning me-1"></i> Low Stock
                                                        <?php else : ?>
                                                            <i class="fa fa-circle text-danger me-1"></i> Out of Stock
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td>$<?= number_format($product['price'], 2) ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="<?= site_url('product/edit/' . $product['id']) ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="<?= site_url('product/delete/' . $product['id']) ?>" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want to delete this product?');"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="7" class="text-center">No products found</td>
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
<!-- Content body end -->


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
	
   
</body>
</html>