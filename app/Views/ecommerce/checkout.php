<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="checkout_wrap widget-taber-content background-white">
                                
                            <?php if (session()->getFlashdata('success')): ?>
                                <div class="alert alert-success text-center" style="font-size: 1.5rem; padding: 20px;">
                                    <?= session()->getFlashdata('success'); ?>
                                </div>
                            <?php endif; ?>

                                <!-- Checkout Form Container -->
                                <div id="checkout-form" class="padding_eight_all bg-white" style="<?= session()->getFlashdata('success') ? 'display: none;' : ''; ?>">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Checkout</h1>
                                        <p class="mb-30">Please confirm your shipping details to complete the order</p>
                                    </div>
                                    <form method="post" action="<?php echo site_url('checkout/confirmOrder'); ?>">
                                    <div class="form-group">
                                            <input type="text" required name="address" placeholder="Shipping Address" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required name="city" placeholder="City" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required name="zip_code" placeholder="Zip Code" />
                                        </div>
                                        <div class="form-group">
                                        <select name="state" required class="form-control">
                                            <option value="">Select State</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Ladakh">Ladakh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        </select>
                                        </div>
                                        <div class="login_footer form-group mb-50">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="terms" id="agreeTerms" required />
                                                <label class="form-check-label" for="agreeTerms">
                                                    <span>I agree to the terms &amp; policies.</span>
                                                </label>
                                            </div>
                                            <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Learn more</a>
                                        </div>
                                        <div class="form-group mb-30">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold">Confirm Order</button>
                                        </div>
                                        <p class="font-xs text-muted">
                                            <strong>Note:</strong> Your personal data will be used to process your order according to our privacy policy.
                                        </p>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <div class="order-summary mt-115">
                                <h2>Order Summary</h2>
                                <ul>
                                    <?php 
                                    $cartItems = session()->get('cart') ?? [];
                                    $subtotal = 0;

                                    foreach ($cartItems as $item): 
                                        $itemTotal = $item['price'] * $item['quantity'];
                                        $subtotal += $itemTotal;
                                    ?>
                                        <li>
                                            <?php echo htmlspecialchars($item['ProductName']); ?> (x<?php echo $item['quantity']; ?>)
                                            <span><?php echo number_format($itemTotal, 2); ?></span>
                                        </li>
                                    <?php endforeach; ?>

                                    <li>Subtotal <span><?php echo number_format($subtotal, 2); ?></span></li>
                                    <li>Shipping <span>Free</span></li>
                                    <li>Total <span><?php echo number_format($subtotal, 2); ?></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>