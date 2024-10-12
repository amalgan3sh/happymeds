<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYC Verification</title>
    <style>
        /* Basic form styling */
        .form-container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .required::after {
            content: " *";
            color: red;
        }

        input[type="text"],
        input[type="tel"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            padding: 5px;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .hidden {
            display: none;
        }

        /* Button styling */
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Loading spinner styling */
        .loading {
            text-align: center;
            margin: 20px 0;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 2s linear infinite;
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Success and Error messages */
        .success-message {
            color: green;
            text-align: center;
            font-weight: bold;
        }

        .error-message {
            color: red;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="page-titles">
    <div class="sub-dz-head">
        <div class="d-flex align-items-center dz-head-title">
            <h2 class="text-white m-0">KYC</h2>
        </div>
    </div>
</div>

    <div class="form-container">
        <h2>KYC Verification</h2>

        <form id="kycForm" enctype="multipart/form-data">
            <div id="formFields">
                <div class="form-group">
                    <label for="full_name" class="required">Full Name</label>
                    <input type="text" name="full_name" id="full_name" placeholder="Enter your full name">
                    <p class="error-message" id="fullNameError">Full Name is required.</p>
                </div>

                <div class="form-group">
                    <label for="address" class="required">Address</label>
                    <textarea name="address" id="address" rows="3" placeholder="Enter your address"></textarea>
                    <p class="error-message" id="addressError">Address is required.</p>
                </div>

                <div class="form-group">
                    <label for="phone_no" class="required">Phone Number</label>
                    <input type="tel" name="phone_no" id="phone_no" placeholder="Enter your phone number">
                    <p class="error-message" id="phoneError">Valid phone number is required.</p>
                </div>

                <div class="form-group">
                    <label for="kycDocument" class="required">Upload Document</label>
                    <input type="file" name="kycDocument" id="kycDocument" accept=".pdf,.jpg,.jpeg,.png">
                    <p class="error-message" id="documentError">Please upload a document (PDF, JPG, PNG).</p>
                </div>
            </div>

            <div id="loadingSpinner" class="loading hidden">
                <div class="spinner"></div>
                <span>Submitting your request...</span>
            </div>

            <button type="submit" id="submitBtn" class="btn">Submit KYC Details</button>
        </form>

        <p class="responseMessage" id="responseMessage"></p>
    </div>

    <script>
        document.getElementById('kycForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            let isValid = true;
            
            // Full Name Validation
            const fullName = document.getElementById('full_name').value.trim();
            if (!fullName) {
                document.getElementById('fullNameError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('fullNameError').style.display = 'none';
            }

            // Address Validation
            const address = document.getElementById('address').value.trim();
            if (!address) {
                document.getElementById('addressError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('addressError').style.display = 'none';
            }

            // Phone Number Validation
            const phoneNo = document.getElementById('phone_no').value.trim();
            const phoneRegex = /^[0-9]{10}$/;
            if (!phoneRegex.test(phoneNo)) {
                document.getElementById('phoneError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('phoneError').style.display = 'none';
            }

            // Document Upload Validation
            const kycDocument = document.getElementById('kycDocument').files[0];
            if (!kycDocument) {
                document.getElementById('documentError').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('documentError').style.display = 'none';
            }

            if (!isValid) {
                return;
            }

            document.getElementById('formFields').style.display = 'none';
            document.getElementById('loadingSpinner').style.display = 'block';
            document.getElementById('submitBtn').style.display = 'none';
            document.getElementById('responseMessage').innerHTML = '';

            const formData = new FormData(this);

            // Simulated AJAX request (replace with actual endpoint)
            fetch('<?php echo base_url('/kyc_upload/submit') ?>', {
                method: 'POST',
                enctype : 'multipart/form-data',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                alert(data.message);
                document.getElementById('loadingSpinner').style.display = 'none';
                
                if (response.status === 'success') {
                    document.getElementById('responseMessage').innerHTML = `<div class="success-message">${response.message}</div>`;
                } else {
                    document.getElementById('responseMessage').innerHTML = `<div class="error-message">${response.message}</div>`;
                    document.getElementById('formFields').style.display = 'block';
                    document.getElementById('submitBtn').style.display = 'block';
                }
                document.getElementById('kycForm').reset();
            })
            .catch(error => {
                document.getElementById('loadingSpinner').classList.add('hidden'); // Hide loading spinner
                document.getElementById('responseMessage').innerHTML = '<div class="error-message">An error occurred while submitting the form. Please try again.</div>';
                document.getElementById('submitBtn').style.display = 'block'; // Re-enable submit button on error
                document.getElementById('formFields').style.display = 'block'; // Show form fields again on error
                document.getElementById('kycForm').reset();
            });
        });
    </script>
</body>
</html>

<!-- Required vendors -->
<script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js?ver=5.2.3'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js?ver=5.2.3'></script>
<script src="js/custom.min.js"></script>
<script src="js/dlabnav-init.js"></script>
