<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> B2B Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
<!-- Success and Error Messages -->
<?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert alert-danger">
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <p><?= esc($error) ?></p>
                            <?php endforeach ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('pendingVerification')) : ?>
                        <div class="modal fade" id="resubmitModal" tabindex="-1" aria-labelledby="resubmitModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="resubmitModalLabel">Verification Already in Process</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Your verification is currently in process. Do you want to resubmit the details and update your application?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-primary" id="resubmitButton">Resubmit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                // Show modal
                                var myModal = new bootstrap.Modal(document.getElementById('resubmitModal'));
                                myModal.show();

                                // Handle resubmit button click
                                $('#resubmitButton').click(function() {
                                    $.ajax({
                                        url: '<?= base_url('resubmit-verification') ?>',
                                        type: 'POST',
                                        data: $('form[name="kyc-verification-form"]').serialize(),
                                        dataType: 'json',
                                        success: function(response) {
                                            if(response.success) {
                                                location.reload();
                                            } else {
                                                alert('Error updating verification details');
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error('Error:', error);
                                            alert('Error updating verification details');
                                        }
                                    });
                                });
                            });
                        </script>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="business-orders-tab" data-bs-toggle="tab" href="#business-orders" role="tab" aria-controls="business-orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Business Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="kyc-verification-tab" data-bs-toggle="tab" href="#kyc-verification" role="tab" aria-controls="kyc-verification" aria-selected="true"><i class="fi-rs-file-check mr-10"></i>KYC Verification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-management-tab" data-bs-toggle="tab" href="#account-management" role="tab" aria-controls="account-management" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account Management</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="page-login.html"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <!-- Dashboard Tab -->
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Welcome <?php echo htmlspecialchars($user['user_name']); ?>!</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                Manage your business account here. You can review your <a href="#business-orders">business orders</a>,<br />
                                                update <a href="#company-details">company details</a>, and access <a href="#account-management">account settings</a>.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Business Orders Tab -->
                                <div class="tab-pane fade" id="business-orders" role="tabpanel" aria-labelledby="business-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Your Business Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>#1357</td>
                                                            <td>March 15, 2023</td>
                                                            <td>Processing</td>
                                                            <td>$1,250.00 for 100 items</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2468</td>
                                                            <td>June 29, 2023</td>
                                                            <td>Completed</td>
                                                            <td>$3,640.00 for 500 items</td>
                                                            <td><a href="#" class="btn-small d-block">View</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Track Orders Tab -->
                                <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Track Your Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>Enter your Order ID and Billing Email to track the status of your orders.</p>
                                            <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                <div class="input-style mb-20">
                                                    <label>Order ID</label>
                                                    <input name="order-id" placeholder="Order ID" type="text" />
                                                </div>
                                                <div class="input-style mb-20">
                                                    <label>Billing email</label>
                                                    <input name="billing-email" placeholder="Billing Email" type="email" />
                                                </div>
                                                <button class="submit submit-auto-width" type="submit">Track</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                 <!-- KYC Verification Tab -->
                                 <div class="tab-pane fade" id="kyc-verification" role="tabpanel" aria-labelledby="kyc-verification-tab">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">KYC Verification</h3>
        </div>
        <div class="card-body">
            <?php if ($kycStatus === 'success'): ?>
                <!-- Congratulatory Message for Verified Users -->
                <div class="alert alert-success">
                    <h4>Congratulations!</h4>
                    <p>Your KYC verification has been successfully completed. You are now officially recognized as a valued B2B partner of Aranea.</p>
                    <p>Welcome to the Aranea family! We are thrilled to have you onboard. As a verified partner, you can now access all of our exclusive B2B features and start making the most of our platform.</p>
                    <p>Thank you for choosing Aranea. We look forward to a prosperous partnership!</p>
                </div>
            <?php else: ?>
                <!-- KYC Verification Form for Non-Verified Users -->
                <form method="post" action="submit-verification-form" name="kyc-verification-form">
                    <div class="row">
                        <!-- Personal Details -->
                        <div class="form-group col-md-6">
                            <label>Full Legal Name <span class="required">*</span></label>
                            <input required class="form-control" name="full_name" type="text" placeholder="Enter Full Legal Name" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Date of Birth <span class="required">*</span></label>
                            <input required class="form-control" name="dob" type="date" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nationality <span class="required">*</span></label>
                            <input required class="form-control" name="nationality" type="text" placeholder="Enter Nationality" />
                        </div>

                        <!-- License and Certification Information -->
                        <div class="form-group col-md-6">
                            <label>Drug License Number <span class="required">*</span></label>
                            <input required class="form-control" name="drug_license_number" type="text" placeholder="Enter Drug License Number" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pharmacy/Medical License Number <span class="required">*</span></label>
                            <input required class="form-control" name="medical_license_number" type="text" placeholder="Enter Medical License Number" />
                        </div>

                        <!-- Contact Information -->
                        <div class="form-group col-md-6">
                            <label>Registered Business Address <span class="required">*</span></label>
                            <input required class="form-control" name="business_address" type="text" placeholder="Enter Business Address" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contact Number <span class="required">*</span></label>
                            <input required class="form-control" name="contact_number" type="text" placeholder="Enter Contact Number" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Official Email Address <span class="required">*</span></label>
                            <input required class="form-control" name="official_email" type="email" placeholder="Enter Official Email Address" />
                        </div>

                        <!-- Bank and Financial Details -->
                        <div class="form-group col-md-6">
                            <label>Tax Identification Number (TIN) <span class="required">*</span></label>
                            <input required class="form-control" name="tax_identification_number" type="text" placeholder="Enter TIN" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>PAN Card Number <span class="required">*</span></label>
                            <input required class="form-control" name="pan_card_number" type="text" placeholder="Enter PAN Card Number" />
                        </div>

                        <!-- Additional Compliance Details -->
                        <div class="form-group col-md-6">
                            <label>Product Handling Certification <span class="required">*</span></label>
                            <input required class="form-control" name="handling_certification" type="text" placeholder="Certification ID or Details" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Good Manufacturing Practice (GMP) Compliance <span class="required">*</span></label>
                            <input required class="form-control" name="gmp_compliance" type="text" placeholder="GMP Compliance Details" />
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-fill-out submit font-weight-bold">Submit for Verification</button>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

                                <!-- Account Management Tab -->
                                <div class="tab-pane fade" id="account-management" role="tabpanel" aria-labelledby="account-management-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Management</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" name="enq">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Contact First Name <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="first_name" type="text" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Contact Last Name <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="last_name" type="text" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Display Name <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="display_name" type="text" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Contact Email <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="email" type="email" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Current Password <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="password" type="password" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>New Password <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="new_password" type="password" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Confirm Password <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="confirm_password" type="password" />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit font-weight-bold">Save Changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>