<?php
// Retrieve cart items from the session
$cartItems = $_SESSION['cart'] ?? [];



// Calculate total amount
$totalAmount = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cartItems));
?>
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
                        <li><span>Estimate for</span> <span>United Kingdom</span></li>
                        <li><span>Total</span> <span>$<?php echo number_format($totalAmount, 2); ?></span></li>
                    </ul>
                    <a href="<?php echo site_url('checkout'); ?>" class="btn btn-primary btn-block">Proceed To Checkout</a>
                    <a href="<?php echo site_url('cart/clear'); ?>" class="btn btn-secondary btn-block mt-2">Clear Cart</a>
                </div>
            </div>
        </div>
    </div>
</main>