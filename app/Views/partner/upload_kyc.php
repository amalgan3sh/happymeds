<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-xl">
                <h2 class="text-2xl font-bold mb-6 text-center">KYC Verification</h2>
                
                <!-- Form Starts -->
                <form id="kycForm" action="" method="post" enctype="multipart/form-data">
                    <!-- Form fields -->
                    <div id="formFields">
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
                    </div>

                    <!-- Loading Spinner (Hidden initially) -->
                    <div id="loadingSpinner" class="hidden flex justify-center items-center my-4">
                        <svg class="animate-spin h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                        <span class="ml-2 text-gray-700">Submitting your request...</span>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" id="submitBtn" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                        Submit KYC Details
                    </button>
                </form>
                <!-- Form Ends -->
                 <!-- Response Message (Hidden initially) -->
                 <span id="responseMessage" class="mt-4"></span>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('kycForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission
    
    // Hide form fields and show loading spinner
    document.getElementById('formFields').style.display = 'none';
    document.getElementById('loadingSpinner').classList.remove('hidden');

    // Disable the submit button
    const submitButton = document.getElementById('submitBtn');
    submitButton.disabled = true;

    // Get form data
    const formData = new FormData(this);

    // Perform fetch AJAX request
    fetch('<?php echo base_url('/kyc_upload/submit') ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Convert response to JSON
    .then(data => {
        document.getElementById('loadingSpinner').classList.add('hidden'); // Hide loading spinner
        console.log(data.message);
        if (data.status === 'success') {
            document.getElementById('submitBtn').style.display = 'none';
            document.getElementById('responseMessage').innerHTML = '<div class="text-green-500">${data.message}</div>';
            document.getElementById('formFields').style.display = 'none'; // Hide form fields
        } else {
            document.getElementById('submitBtn').style.display = 'none';
            document.getElementById('responseMessage').innerHTML = '<div class="text-red-500">${data.message}</div>';
            submitButton.disabled = false; // Re-enable submit button if there's an error
            document.getElementById('formFields').style.display = 'block'; // Show form fields again on error
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('loadingSpinner').classList.add('hidden'); // Hide loading spinner
        document.getElementById('responseMessage').innerHTML = '<div class="text-red-500">An error occurred while submitting the form. Please try again.</div>';
        submitButton.disabled = false; // Re-enable submit button on error
        document.getElementById('formFields').style.display = 'block'; // Show form fields again on error
    });
});
</script>

    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js?ver=5.2.3'></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js?ver=5.2.3'></script>

	<!-- Dashboard 1 -->
	
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="https://cdn.tailwindcss.com"></script>
   