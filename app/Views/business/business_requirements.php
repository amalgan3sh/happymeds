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
                                        <th>User ID</th>
                                        <th>Order items</th>
                                        <th>Total Amount</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $key => $order): ?>
            <tr>
                <td><strong><?= $key + 1; ?></strong></td>
                <td><?= esc($order['user_id']); ?></td>
                <td>
                    <?php 
                    // Decode the order items JSON string
                    $order_items = json_decode($order['order_items'], true); 
                    if (!empty($order_items)) {
                        foreach ($order_items as $item) {
                            // Display each item's name, quantity, and price
                            echo esc($item['ProductName']) . ' (Quantity: ' . esc($item['quantity']) . ', Price: ' . esc($item['price']) . ')<br>';
                        }
                    } else {
                        echo 'No items found.';
                    }
                    ?>
                </td>
                <td><?= esc($order['total_amount']); ?></td>
                <td><?= date('d F Y', strtotime($order['created_at'])); ?></td>
                <td>
                    <span class="badge light 
                        <?= $order['status'] === 'Have It' ? 'badge-success' : 
                            ($order['status'] === "Don't Have It" ? 'badge-danger' : 'badge-warning'); ?>">
                        <?= ucfirst(esc($order['status'])); ?>
                    </span>
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
            <a class="dropdown-item" href="<?= base_url('order/updateStatus/' . $order['order_id'] . '/have'); ?>">Mark as Have It</a>
            <a class="dropdown-item" href="<?= base_url('order/updateStatus/' . $order['order_id'] . '/donthave'); ?>">Mark as Don't Have It</a>
        </div>
    </div>
</td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7" class="text-center">No orders found.</td>
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


<!-- Footer start -->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="https://dexignlab.com/" target="_blank">DexignLab</a> 
        <span class="current-year">2024</span></p>
    </div>
</div>
<!-- Footer end -->

<!-- Support ticket button start -->

<!-- Support ticket button end -->

</div>
<!-- Main wrapper end -->

<!-- Scripts -->
<!-- Required vendors -->
<script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/dlabnav-init.js"></script>

</body>
</html>