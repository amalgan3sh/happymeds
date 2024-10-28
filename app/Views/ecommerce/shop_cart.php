<main class="main">
    <!-- Other HTML content -->

    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($cartItems)): ?>
                                <?php foreach ($cartItems as $item): ?>
                                    <tr>
                                        <td><img src="<?php echo base_url($item['thumbnail']); ?>" alt="<?php echo htmlspecialchars($item['ProductName']); ?>" width="50"></td>
                                        <td><?php echo htmlspecialchars($item['ProductName']); ?></td>
                                        <td>$<?php echo number_format($item['price'], 2); ?></td>
                                        <td>
                                            <input type="text" value="<?php echo htmlspecialchars($item['quantity']); ?>" readonly>
                                        </td>
                                        <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                                        <td><a href="<?php echo site_url('cart/remove/' . $item['product_id']); ?>">Remove</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">Your cart is empty.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Summary and Checkout Section -->
            <div class="col-lg-4">
                <div class="cart-summary">
                    <h4>Summary</h4>
                    <ul>
                        <li><span>Subtotal</span> <span>$<?php echo number_format($totalAmount, 2); ?></span></li>
                        <li><span>Shipping</span> <span>Free</span></li>
                        <li><span>Total</span> <span>$<?php echo number_format($totalAmount, 2); ?></span></li>
                    </ul>
                    <button class="btn btn-primary btn-block" id="checkoutButton">Proceed To Checkout</button>
                    <a href="<?php echo site_url('cart/clear'); ?>" class="btn btn-secondary btn-block mt-2">Clear Cart</a>
                </div>
            </div>
        </div>
    </div>

    <!-- KYC Modal -->
    <div class="modal fade" id="kycModal" tabindex="-1" aria-labelledby="kycModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kycModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="kycModalBody"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Later</button>
                    <button type="button" class="btn btn-primary" id="kycModalAction">Verify Now</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const kycStatus = "<?php echo $kycStatus ?? 'none'; ?>";
            const checkoutButton = document.getElementById('checkoutButton');
            const kycModal = new bootstrap.Modal(document.getElementById('kycModal'));
            const kycModalLabel = document.getElementById('kycModalLabel');
            const kycModalBody = document.getElementById('kycModalBody');
            const kycModalAction = document.getElementById('kycModalAction');

            checkoutButton.addEventListener('click', function (event) {
                event.preventDefault();

                if (kycStatus === 'pending') {
                    kycModalLabel.textContent = "KYC Verification Pending";
                    kycModalBody.textContent = "Your KYC verification is pending. Please wait for it to complete. Note: Usually, it takes 2 working days. You will be notified via email or phone once it's complete.";
                    kycModalAction.style.display = 'none';
                    kycModal.show();
                } else if (kycStatus === 'none' || !kycStatus) {
                    kycModalLabel.textContent = "KYC Verification Required";
                    kycModalBody.textContent = "You need to complete KYC verification first to proceed with the checkout.";
                    kycModalAction.style.display = 'inline-block';
                    kycModalAction.textContent = "Verify Now";
                    kycModalAction.addEventListener('click', function () {
                        window.location.href = "<?php echo site_url('account'); ?>";
                    });
                    kycModal.show();
                } else if (kycStatus === 'success') {
                    window.location.href = "<?php echo site_url('checkout'); ?>";
                }
            });
        });
    </script>
</main>