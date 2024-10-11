<!--**********************************
            Content body start
        ***********************************-->
		
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
			  <div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Add New</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
				<div class="mb-3">
				  <label for="exampleFormControlInput1" class="form-label mb-2">Email address</label>
				  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
				</div>
				<div class="mb-3">
				  <label for="exampleFormControlInput2" class="form-label mb-2">User Name</label>
				  <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="username">
				</div>
				<div class="mb-3">
				  <label  class="form-label mb-2">Joining Date</label>
				  <div class="input-hasicon mb-sm-0 mb-3">
					<input name="datepicker" class="form-control bt-datepicker">
					<div class="icon"><i class="far fa-calendar"></i></div>
				</div>
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			  </div>
			</div>
		  </div>
		</div>
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<!-- Row -->
				<div class="row">
					<div class="col-xl-3 col-xxl-4">
						<div class="card portofolio">
							<div class="card-header border-0 pb-0">
								<h4 class="card-title">My Profile</h4>
								<div class="dropdown custom-dropdown mb-0 tbl-orders-style">
									<div class="btn sharp tp-btn" data-bs-toggle="dropdown" aria-expanded="false" role="button">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="var(--text-dark)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="var(--text-dark)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="var(--text-dark)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</div>
									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="javascript:void(0);">Details</a>
										<a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="text-center my-profile">
									<div class="media d-block">
										<div class="media-img">
											<img src="images/user.jpg" alt="">
											<a href="javascript:void(0);"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
										</div>
										
										<h3 class="mt-3 font-w800 text-dark"><?= esc($user['user_name']) ?></h3>
										<span><?= esc($user['email']) ?></span>
									</div>
									<div class="media-content">
										<h4 class="mt-3 font-w400 fs-16 text-dark mb-0">Joined on <?= date('d M Y', strtotime($user['created_date'])) ?></h4>
										<p class="my-3">Welcome to your dashboard! Here you can manage your profile, track recent activities, and stay updated on important notifications. Keep your information up to date to ensure smooth business operations and get the most out of our platform. If you need any assistance, feel free to reach out to our support team.</p>									</div>
									<div class="text-center mt-4">
                    <a href="javascript:void(0);" class="btn btn-primary btn-sm">Update Profile</a>
                    <a href="javascript:void(0);" class="btn btn-secondary btn-sm">View Details</a>
                </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-xxl-8">
    <div class="card">
        <div class="card-header border-0 flex-wrap">
            <h4 class="card-title">Your Products</h4>
            <div class="d-flex align-items-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" onclick="window.location.href='business_add_product#step_product_details' ">
                    + Add New
                </button>

                <div class="dropdown custom-dropdown mb-0 ms-3">
                    <div class="btn sharp tp-btn" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.0335 13C12.5854 13 13.0328 12.5523 13.0328 12C13.0328 11.4477 12.5854 11 12.0335 11C11.4816 11 11.0342 11.4477 11.0342 12C11.0342 12.5523 11.4816 13 12.0335 13Z" stroke="var(--text-dark)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M12.0335 6C12.5854 6 13.0328 5.55228 13.0328 5C13.0328 4.44772 12.5854 4 12.0335 4C11.4816 4 11.0342 4.44772 11.0342 5C11.0342 5.55228 11.4816 6 12.0335 6Z" stroke="var(--text-dark)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M12.0335 20C12.5854 20 13.0328 19.5523 13.0328 19C13.0328 18.4477 12.5854 18 12.0335 18C11.4816 18 11.0342 18.4477 11.0342 19C11.0342 19.5523 11.4816 20 12.0335 20Z" stroke="var(--text-dark)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="javascript:void(0);">Details</a>
                        <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="table-responsive">
            <table class="table table-striped">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($products) && is_array($products)) : ?>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= esc($product['product_name']); ?></td>
                    <td><?= esc($product['category']); ?></td>
                    <td>$<?= number_format($product['price'], 2); ?></td>
                    <td><?= ($product['stock_quantity'] > 0) ? 'In Stock' : 'Out of Stock'; ?></td>
                    <td>
                        <a href="<?= base_url('product/edit/' . $product['id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="<?= base_url('product/delete/' . $product['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="5">No products available.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
            </div>
        </div>
    </div>
</div>
					<div class="col-xl-6">
					<div class="card h-auto">
    <div class="card-header pb-2 d-block d-sm-flex flex-wrap border-0">
        <div class="mb-3">
            <h4 class="card-title">Recent Activity</h4>
            <p class="mb-0 fs-13">Tracking the latest account transactions</p>
        </div>
        <ul class="nav nav-pills">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-yesterday-tab" data-bs-toggle="pill" data-bs-target="#pills-Yesterday" type="button" role="tab" aria-controls="pills-Yesterday" aria-selected="true">Yesterday</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button" role="tab" aria-controls="pills-today" aria-selected="false">Today</button>
            </li>
        </ul>
    </div>
    <div class="card-body tab-content pt-0 pb-sm-0 pb-3">
        <!-- Yesterday's Activity -->
        <div class="tab-pane fade show active" id="pills-Yesterday" role="tabpanel" aria-labelledby="pills-yesterday-tab">
            <div class="table-responsive">
                <table class="table portfolio-table">
                    <tbody>
                        <tr>
                            <td>
                                <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="63" height="63" rx="31.5" fill="#13B440"/>
                                    <path d="M25.4811 24.6342L30.3542 19.7375M30.7114 20.0874L29.9375 24.2319M35.2311 26.6623L37.2689 24.6341M32.8125 42.875V24.232M32.8125 42.875C32.8125 43.6689 32.1689 44.3125 31.375 44.3125C30.5811 44.3125 29.9375 43.6689 29.9375 42.875" stroke="white" fill="white"/>
                                </svg>
                            </td>
                            <td>
                                <span class="font-w600 text-dark">Topup</span>
                            </td>
                            <td>
                                <span class="text-dark">06:24:45 AM</span>
                            </td>
                            <td>
                                <span class="font-w600 text-dark">+$5,553</span>
                            </td>
                            <td class="text-end">
                                <a class="btn-link text-success" href="javascript:void(0);">Completed</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="63" height="63" rx="31.5" fill="#FD5353"/>
                                    <path d="M37.2694 38.9907L32.3963 43.8874M32.8125 39.393V20.7499M30.3618 43.8945L25.4816 38.9907" stroke="white" fill="white"/>
                                </svg>
                            </td>
                            <td>
                                <span class="font-w600 text-dark">Withdraw</span>
                            </td>
                            <td>
                                <span class="text-dark">06:24:45 AM</span>
                            </td>
                            <td>
                                <span class="font-w600 text-dark">-$5,553</span>
                            </td>
                            <td class="text-end">
                                <a class="btn-link text-dark" href="javascript:void(0);">Pending</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="63" height="63" rx="31.5" fill="#FD5353"/>
                                    <path d="M37.2694 38.9907L32.3963 43.8874M32.8125 39.393V20.7499M30.3618 43.8945L25.4816 38.9907" stroke="white" fill="white"/>
                                </svg>
                            </td>
                            <td>
                                <span class="font-w600 text-dark">Withdraw</span>
                            </td>
                            <td>
                                <span class="text-dark">06:24:45 AM</span>
                            </td>
                            <td>
                                <span class="font-w600 text-dark">-$912</span>
                            </td>
                            <td class="text-end">
                                <a class="btn-link text-danger" href="javascript:void(0);">Canceled</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Today's Activity -->
        <div class="tab-pane fade" id="pills-today" role="tabpanel" aria-labelledby="pills-today-tab">
            <div class="table-responsive">
                <table class="table portfolio-table">
                    <tbody>
                        <tr>
                            <td>
                                <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="63" height="63" rx="31.5" fill="#13B440"/>
                                    <path d="M25.4811 24.6342L30.3542 19.7375M30.7114 20.0874L29.9375 24.2319M35.2311 26.6623L37.2689 24.6341M32.8125 42.875V24.232M32.8125 42.875C32.8125 43.6689 32.1689 44.3125 31.375 44.3125C30.5811 44.3125 29.9375 43.6689 29.9375 42.875" stroke="white" fill="white"/>
                                </svg>
                            </td>
                            <td>
                                <span class="font-w600 text-dark">Topup</span>
                            </td>
                            <td>
                                <span class="text-dark">06:24:45 AM</span>
                            </td>
                            <td>
                                <span class="font-w600 text-dark">+$7,762</span>
                            </td>
                            <td class="text-end">
                                <a class="btn-link text-success" href="javascript:void(0);">Completed</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="63" height="63" rx="31.5" fill="#FD5353"/>
                                    <path d="M37.2694 38.9907L32.3963 43.8874M32.8125 39.393V20.7499M30.3618 43.8945L25.4816 38.9907" stroke="white" fill="white"/>
                                </svg>
                            </td>
                            <td>
                                <span class="font-w600 text-dark">Withdraw</span>
                            </td>
                            <td>
                                <span class="text-dark">06:24:45 AM</span>
                            </td>
                            <td>
                                <span class="font-w600 text-dark">-$912</span>
                            </td>
                            <td class="text-end">
                                <a class="btn-link text-danger" href="javascript:void(0);">Canceled</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
					</div>
					<div class="col-xl-6">
    <div class="row">
        <!-- Weekly Summary -->
        <div class="col-xl-12">
            <div class="card overflow-hidden h-auto">
                <div class="card-body pb-4">
                    <div class="row">
                        <div class="col-xl-5 col-md-5">
                            <h4 class="card-title mb-0">Weekly Summary</h4>
                            <p>Overview of key metrics for the week</p>
                            <div class="d-flex mb-3 align-items-center">
                                <svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="22.2609" height="16" rx="8" fill="#2BC155"/>
                                </svg>
                                <span class="fs-16 text-dark mx-2 font-w600">30%</span>
                                <span class="fs-14">Successful Market Transactions</span>
                            </div>
                            <div class="d-flex mb-3 align-items-center">
                                <svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="22.2609" height="16" rx="8" fill="#FD5353"/>
                                </svg>
                                <span class="fs-16 text-dark mx-2 font-w600">46%</span>
                                <span class="fs-14">Applications Answered</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="22.2609" height="16" rx="8" fill="#D7D7D7"/>
                                </svg>
                                <span class="fs-16 text-dark mx-2 font-w600">10%</span>
                                <span class="fs-14">Pending Requests</span>
                            </div>
                        </div>
                        <div class="col-xl-7 col-md-7 align-self-center" style="position: relative;">
                            <div id="columnChart"></div>
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
        <!--**********************************
            Content body end
        ***********************************-->
		

		
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
	<script src="vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>
	<!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>

	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="js/dashboard/portfolio.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
   
</body>
</html>