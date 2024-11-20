<!-- Content body start -->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:80px;">#</th>
                                        <th>Order ID</th>
                                        <th>Customer ID</th>
                                        <th>Manufacturer ID</th>
                                        <th>Product Details</th>
                                        <th>Total Amount</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Milestone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($purchaseOrders as $index => $order): ?>
                                    <tr>
                                        <td><strong><?= $index + 1 ?></strong></td>
                                        <td><?= $order['order_id'] ?></td>
                                        <td><?= $order['customer_id'] ?></td>
                                        <td><?= $order['manufacturer_id'] ?></td>
                                        <td>
                                            <?php 
                                            $products = json_decode($order['product_details'], true);
                                            if ($products) {
                                                foreach ($products as $product) {
                                                    echo "<div class='product-item mb-2'>";
                                                    echo "<div class='fw-bold'>" . esc($product['ProductName']) . "</div>";
                                                    echo "<div class='text-muted small'>";
                                                    echo "Form: " . esc($product['DosageForm']) . "<br>";
                                                    echo "Qty: " . esc($product['quantity']) . "<br>";
                                                    echo "Price: ₹" . number_format($product['price'], 2) . "<br>";
                                                    echo "Total: ₹" . number_format($product['quantity'] * $product['price'], 2);
                                                    echo "</div>";
                                                    echo "</div>";
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>₹<?= number_format($order['total_amount'], 2) ?></td>
                                        <td><?= date('d M Y', strtotime($order['created_at'])) ?></td>
                                        <td>
                                            <?php
                                            $statusClass = match($order['status']) {
                                                'Completed' => 'success',
                                                'Pending' => 'warning',
                                                'Cancelled' => 'danger',
                                                default => 'secondary'
                                            };
                                            ?>
                                            <span class="badge light badge-<?= $statusClass ?>">
                                                <?= $order['status'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-buttons d-flex gap-2">
                                                <a href="<?= base_url('business/view/'.$order['id']) ?>" 
                                                class="btn btn-success btn-sm">
                                                    View
                                                </a>
                                                <a href="<?= base_url('business/accounts/'.$order['id']) ?>" 
                                                class="btn btn-success btn-sm">
                                                    Accounts
                                                </a>
                                                <a href="<?= base_url('business/documentation/'.$order['id']) ?>" 
                                                class="btn btn-warning btn-sm">
                                                    Documentation
                                                </a>
                                                <a href="<?= base_url('business/production/'.$order['id']) ?>" 
                                                class="btn btn-danger btn-sm">
                                                    Production
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-light sharp" data-bs-toggle="dropdown" aria-label="Order Actions">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <circle fill="#000000" cx="5" cy="12" r="2" />
                                                            <circle fill="#000000" cx="12" cy="12" r="2" />
                                                            <circle fill="#000000" cx="19" cy="12" r="2" />
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="<?= base_url('order/updateStatus/' . $order['order_id'] . '/have'); ?>">Verification on the Process</a>
                                                    <a class="dropdown-item" href="<?= base_url('order/updateStatus/' . $order['order_id'] . '/donthave'); ?>">Issued purchase order</a>
                                                    <a class="dropdown-item" href="<?= base_url('order/updateStatus/' . $order['order_id'] . '/donthave'); ?>">Testing</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
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

<style>
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    
    .action-buttons .btn {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        white-space: nowrap;
    }
    
    .btn-success {
        background-color: #68e365;
        border-color: #68e365;
    }
    
    .btn-warning {
        background-color: #ffb22b;
        border-color: #ffb22b;
    }
    
    .btn-danger {
        background-color: #ff6647;
        border-color: #ff6647;
    }
    
    .product-item {
        padding: 8px;
        border-radius: 4px;
        background-color: #f8f9fa;
        margin-bottom: 8px;
    }

    .product-item:last-child {
        margin-bottom: 0;
    }
    
    .table-responsive {
        overflow-x: auto;
    }
    
    @media (max-width: 768px) {
        .action-buttons {
            flex-direction: column;
        }
        
        .action-buttons .btn {
            width: 100%;
        }
    }
</style>


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