<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				<!-- Row -->
				<div class="row">
					<div class="col-xl-12">
					<div class="filter cm-content-box box-primary">
    <div class="content-title SlideToolHeader">
        <div class="cpa">
            <i class="fa-sharp fa-solid fa-filter me-2"></i>Bank Account
        </div>
        <div class="tools">
            <a href="javascript:void(0);" class="expand handle"><i class="fal fa-angle-down"></i></a>
        </div>
    </div>
    <div class="cm-content-body form excerpt">
        <div class="card-body">
		<form action="<?= base_url('save_bank_account') ?>" method="post">
    <div class="row">
        <!-- CSRF Protection -->

        <div class="col-xl-3 col-sm-6">
		<label class="form-label">Users</label>
    <select class="form-control mb-xl-0 mb-3" id="user_id" name="user_id">
        <option value="">Select User</option>
        <?php if (!empty($associatedUsers)): ?>
            <?php foreach ($associatedUsers as $associatedUser): ?>
                <option value="<?= esc($associatedUser['user_id']) ?>">
                    <?= esc($associatedUser['firstname'] . ' ' . $associatedUser['lastname']) ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="">No associated users found</option>
        <?php endif; ?>
    </select>
        </div>
        <div class="col-xl-3 col-sm-6">
            <label class="form-label">Account Number</label>
            <input type="text" class="form-control mb-xl-0 mb-3" id="account_number" name="account_number" placeholder="Account Number">
        </div>
        <div class="col-xl-3 col-sm-6">
            <label class="form-label">IFSC</label>
            <input type="text" class="form-control mb-xl-0 mb-3" id="ifsc" name="ifsc" placeholder="IFSC Code">
        </div>
        <div class="col-xl-3 col-sm-6">
            <label class="form-label">Name</label>
            <input type="text" class="form-control mb-xl-0 mb-3" id="name" name="name" placeholder="Name">
        </div>
        <div class="col-xl-3 col-sm-6">
            <label class="form-label">Branch</label>
            <input type="text" class="form-control mb-xl-0 mb-3" id="branch" name="branch" placeholder="Branch">
        </div>
        <div class="col-xl-3 col-sm-6">
            <label class="form-label">City</label>
            <input type="text" class="form-control mb-xl-0 mb-3" id="city" name="city" placeholder="City">
        </div>
        <div class="col-xl-3 col-sm-6">
            <label class="form-label">State</label>
            <input type="text" class="form-control mb-xl-0 mb-3" id="state" name="state" placeholder="State">
        </div>
        <div class="col-xl-3 col-sm-6">
            <label class="form-label">ZIP Code</label>
            <input type="text" class="form-control mb-xl-0 mb-3" id="zip" name="zip" placeholder="ZIP Code">
        </div>
        <div class="col-xl-3 col-sm-6">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
        </div>
    </div>
</div>
						
						<div class="filter cm-content-box box-primary">
							<div class="content-title SlideToolHeader">
								<div class="cpa">
									<i class="fa-solid fa-envelope me-1"></i> Bank Account List
								</div>
								<div class="tools">
									<a href="javascript:void(0);" class="expand handle"><i
											class="fal fa-angle-down"></i></a>
								</div>
							</div>
							<div class="cm-content-body form excerpt">
								<div class="card-body pb-4">
									<div class="table-responsive">
									<table class="table">
    <thead>
        <tr>
            <th>Sr.No</th>
            <th>User Name</th>
            <th>Account Number</th>
            <th>Branch</th>
            <th>City</th>
            <th>State</th>
            <th>Status</th>
            <th>Modified</th>
            <th class="pe-4">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($bankAccounts)): ?>
            <?php $srNo = 1; ?>
            <?php foreach ($bankAccounts as $bankAccount): ?>
                <tr>
                    <td><?= esc($srNo++) ?></td>
                    <td><?= esc($bankAccount['user_name']) ?></td>
                    <td><?= esc($bankAccount['account_number']) ?></td>
                    <td><?= esc($bankAccount['branch']) ?></td>
                    <td><?= esc($bankAccount['city']) ?></td>
                    <td><?= esc($bankAccount['state']) ?></td>
                    <td><span class="badge badge-success light">Active</span></td>
                    <td><?= esc($bankAccount['modified_at'] ?? 'N/A') ?></td>
                    <td class="text-nowrap">
                        <a href="javascript:void(0);" class="btn btn-warning btn-sm content-icon">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="<?= site_url('delete-bank-account/' . $bankAccount['account_id']) ?>" method="POST" style="display:inline;">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm content-icon" onclick="return confirm('Are you sure you want to delete this account?');">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9" class="text-center">No bank account details found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
										<div class="d-flex align-items-center justify-content-lg-between justify-content-center flex-wrap">
											<small class="mb-lg-0 mb-2">Page 1 of 5, showing 2 records out of 8 total, starting on record 1, ending on 2</small>
											<nav aria-label="Page navigation example mb-2">
												<ul class="pagination mb-2 mb-sm-0">
													<li class="page-item"><a class="page-link"
															href="javascript:void(0);"><i
																class="fa-solid fa-angle-left"></i></a></li>
													<li class="page-item"><a class="page-link"
															href="javascript:void(0);">1</a></li>
													<li class="page-item"><a class="page-link"
															href="javascript:void(0);">2</a></li>
													<li class="page-item"><a class="page-link"
															href="javascript:void(0);">3</a></li>
													<li class="page-item"><a class="page-link "
															href="javascript:void(0);"><i
																class="fa-solid fa-angle-right"></i></a></li>
												</ul>
											</nav>
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
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>

	<script src="js/dashboard/cms.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
   
</body>
</html>