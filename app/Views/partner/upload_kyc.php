
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-xl">
            <h2 class="text-2xl font-bold mb-6 text-center">KYC Verification</h2>
            
            <form id="kycForm" action="/kyc_upload/submit" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="full_name" class="block text-gray-700 text-sm font-bold mb-2">Full Name</label>
                    <input type="text" name="full_name" id="full_name" class="w-full px-3 py-2 border rounded-lg border-gray-300" placeholder="Enter your full name">
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                    <textarea name="address" id="address" rows="3" class="w-full px-3 py-2 border rounded-lg border-gray-300" placeholder="Enter your address"></textarea>
                </div>

                <div class="mb-4">
                    <label for="phone_no" class="block text-gray-700 text-sm font-bold mb-2">Phone Number</label>
                    <input type="tel" name="phone_no" id="phone_no" class="w-full px-3 py-2 border rounded-lg border-gray-300" placeholder="Enter your phone number">
                </div>

                <div class="mb-6">
                    <label for="document" class="block text-gray-700 text-sm font-bold mb-2">Upload Document</label>
                    <input type="file" name="document" id="document" class="w-full px-3 py-2 border rounded-lg border-gray-300" accept=".pdf,.jpg,.jpeg,.png">
                </div>

                <button type="submit" id="submitBtn" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                    Submit KYC Details
                </button>
                <div id="responseMessage" class="mt-4"></div>
            </form>
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
				<p>Copyright © Designed &amp; Developed by <a href=""
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
    <script>
       document.getElementById('kycForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting the default way

        // Disable the submit button and show uploading text
        const submitButton = document.getElementById('submitBtn');
        submitButton.innerText = 'Uploading...';
        submitButton.disabled = true;

        // Get form data
        const formData = new FormData(this);

        // CSRF Token Handling (if required)
        const csrfName = '<?php echo csrf_token(); ?>';  // Assuming CSRF token is enabled
        const csrfHash = '<?php echo csrf_hash(); ?>';   // Get CSRF hash
        formData.append(csrfName, csrfHash); // Add CSRF token to form data

        // Perform fetch AJAX request
        fetch('<?php echo base_url('kyc_upload/submit'); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            return response.json(); // Convert response to JSON
        })
        .then(data => {
            console.log(data.message);
            console.log(data.status);
            if (data.status === 'success') {
                console.log(data.message);
                document.getElementById('responseMessage').innerHTML = `<div class="text-green-500">${data.message}</div>`;
                submitButton.innerText = 'Submitted';
            } else if (data.status === 'error') {
                if (data.errors) {
                    const errors = Object.values(data.errors).join('<br>');
                    document.getElementById('responseMessage').innerHTML = `<div class="text-red-500">${errors}</div>`;
                } else {
                    document.getElementById('responseMessage').innerHTML = `<div class="text-red-500">${data.message}</div>`;
                }
                submitButton.innerText = 'Submit KYC Details';
                submitButton.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error); // Log error to console
            document.getElementById('responseMessage').innerHTML = '<div class="text-red-500">An error occurred while submitting the form. Please try again.</div>';
            submitButton.innerText = 'Submit KYC Details';
            submitButton.disabled = false;
        });
    });


    </script>
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	

	<!-- Dashboard 1 -->
	
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="https://cdn.tailwindcss.com"></script>
   