<!-- business_message.php -->

<div class="content-body">
    <div class="container-fluid">
        <!-- Display Success Message -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Form to Post a New Message -->
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Send a Message</h4>
            </div>
            <div class="card-body">
            <form action="submit-support-request" method="POST">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
            </div>
        </div>

        <!-- Display Previous Messages -->
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">Previous Messages</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($supportRequests)): ?>
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($supportRequests as $request): ?>
                                <tr>
                                    <td><?= esc($request['message']); ?></td>
                                    <td><?= esc($request['created_at']); ?></td>
                                    <td>
                                        <?php if ($request['status'] == 'completed'): ?>
                                            <span class="badge light badge-success">Completed</span>
                                        <?php elseif ($request['status'] == 'pending'): ?>
                                            <span class="badge light badge-warning">Pending</span>
                                        <?php else: ?>
                                            <span class="badge light badge-danger">Cancelled</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No previous messages found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

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
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
   
</body>
</html>