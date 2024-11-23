<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Profile Datatable</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Company Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Date of Birth</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($customers as $customer): ?>
                                    <tr>
                                    <td>
                                            <img class="rounded-circle" width="35" 
                                                 src="<?= empty($customer['profile_photo']) ? 'https://banner2.cleanpng.com/20181110/srt/kisspng-computer-icons-login-scalable-vector-graphics-emai-1713924340552.webp' : base_url('images/profile/small/' . $customer['profile_photo']); ?>" 
                                                 alt="Profile Photo">
                                        </td>                                        <td><?= esc($customer['firstname']) . ' ' . esc($customer['lastname']); ?></td>
                                        <td><?= esc($customer['company_name']); ?></td>
                                        <td><a href="javascript:void(0);"><strong><?= esc($customer['phone']); ?></strong></a></td>
                                        <td><a href="javascript:void(0);"><strong><?= esc($customer['email']); ?></strong></a></td>
                                        <td><?= esc($customer['gender']); ?></td>
                                        <td><?= esc($customer['dob']); ?></td>
                                        <td><?= esc($customer['location']); ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp delete-btn" data-user-id="<?= $customer['user_id']; ?>"><i class="fas fa-trash-alt"></i></a>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    // Dynamically set the base URL using PHP
    const baseURL = "<?php echo base_url(); ?>";

    // Add event listener to the delete buttons
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.getAttribute('data-user-id');  // Get the user ID from the button's data attribute

            // Show confirmation dialog using SweetAlert2
            Swal.fire({
                title: 'Are you sure you want to delete this?',
                text: "This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send AJAX request to delete the user
                    fetch(`${baseURL}/delete-user/${userId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Deleted!', 'The user has been deleted.', 'success');
                            location.reload();  // Reload the page to reflect changes
                        } else {
                            Swal.fire('Error!', 'Something went wrong while deleting the user.', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Error!', 'There was an issue with the deletion. Please try again later.', 'error');
                    });
                }
            });
        });
    });
    </script>

    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="vendor/datatables/responsive/responsive.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>

	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>   
</body>
</html>