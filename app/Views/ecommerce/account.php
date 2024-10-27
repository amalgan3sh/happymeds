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
                                        <a class="nav-link" id="company-details-tab" data-bs-toggle="tab" href="#company-details" role="tab" aria-controls="company-details" aria-selected="true"><i class="fi-rs-building mr-10"></i>Company Details</a>
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
                                            <h3 class="mb-0">Welcome to Your B2B Account!</h3>
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

                                <!-- Company Details Tab -->
                                <div class="tab-pane fade" id="company-details" role="tabpanel" aria-labelledby="company-details-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Company Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <address>
                                                <strong>Company Name:</strong> ABC Corporation<br />
                                                <strong>Address:</strong> 123 Business St., Suite 500<br />
                                                City, State, 12345<br />
                                                <strong>Phone:</strong> +1 234 567 890<br />
                                                <strong>Email:</strong> contact@abccorp.com
                                            </address>
                                            <a href="#" class="btn-small">Edit Company Details</a>
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