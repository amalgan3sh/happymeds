<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Invest - Choose Your Plan</title>
    <style>
        /* Existing styles... */

        .terms-container {
            max-height: 200px;
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        #acceptTerms {
            margin-right: 5px;
        }

        #proceed-button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        /* Success Animation */
        .success-container {
            text-align: center;
            margin-top: 50px;
        }

        .checkmark-circle {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto;
            border-radius: 50%;
            background-color: #4CAF50;
            animation: circle-grow 1s ease-out forwards;
        }

        .checkmark {
            position: absolute;
            top: 20px;
            left: 40px;
            width: 50px;
            height: 100px;
            border-right: 8px solid white;
            border-bottom: 8px solid white;
            transform: rotate(45deg);
            animation: checkmark-draw 0.5s 1.2s ease-out forwards;
        }

        @keyframes circle-grow {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes checkmark-draw {
            0% {
                width: 0;
                height: 0;
            }
            100% {
                width: 60px;
                height: 100px;
            }
        }

        /* Receipt Options */
        .receipt-options {
            margin-top: 20px;
        }

        .receipt-options .btn {
            margin: 5px;
            padding: 10px 20px;
            font-size: 16px;
        }

    </style>
</head>
<!--**********************************
            Content body start
        ***********************************-->
        <div class="page-titles">
        <div class="sub-dz-head">
              <div class="d-flex align-items-center dz-head-title">
                  <h2 class="text-white m-0">Product Invest</h2>
              </div>
          </div>
      </div>
        <input type="hidden" id="csrf" value="<?= csrf_hash() ?>">
        <input type="hidden" id="product_id" value="<?= esc($product['product_id']) ?>">
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
            <section class="py-5 py-md-8" id="pricing">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6 text-center mb-4 mb-md-5">
                <h2 class="fw-bold fs-2 fs-md-3 fs-lg-4 mb-3">Choose Your Plan</h2>
                <p class="mb-0">Select the plans that suits your needs and get started.</p>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 choose-plan">
        <div class="pricing-card basic" id="planCard1" data-amount="3000" onclick="selectPlan(this)">
        <div class="heading">
          <h5>Co Brand Partner</h5>
          <h4>BASIC</h4>
        </div>
        <p class="price">
          $3000
        </p>
        <ul class="features">
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Category:</strong> Neutraceutical
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Dosage:</strong> Herbal
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Benefit: </strong>3% each B2B order
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Subscription Period:</strong> 5 Years
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Expected Annual Turnover:</strong> Minimum 50K to 1M $
          </li>
        </ul>
        <button class="cta-btn select-plan" data-plan="basic">SELECT</button>
      </div>
      <div class="pricing-card standard" id="planCard2" data-amount="6000" onclick="selectPlan(this)">
        <div class="heading">
          <h5>Co Brand Partner</h5>
          <h4>STANDARD</h4>
        </div>
        <p class="price">
          $6000
        </p>
        <ul class="features">
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Category:</strong> Neutraceutical
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Dosage:</strong> Herbal
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Benefit:</strong> 6% each B2B order
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Subscription Period:</strong> 5 years
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Expected Annual Turnover:</strong> Minimum 50K to 1M $
          </li>
        </ul>
        <button class="cta-btn select-plan" data-plan="standard">SELECT</button>
      </div>
      <div class="pricing-card premium"  id="planCard3" data-amount="9000" onclick="selectPlan(this)">
        <div class="heading">
          <h5>Co Brand Partner</h5>
          <h4>PREMIUM</h4>
        </div>
        <p class="price">
          $9000
        </p>
        <ul class="features">
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Category:</strong> Neutraceutical
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Dosage:</strong> Herbal
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Benefit: </strong>9% each B2B order
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Subscription Period:</strong> 5 years
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <strong>Expected Annual Turnover:</strong> Minimum 50K to 1M $
          </li>
          
        </ul>
        <button class="cta-btn select-plan" data-plan="premium">SELECT</button>
      </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div id="confirmationModal" class="popup-modal">
        <div class="popup-modal-content">
            <span class="popup-close">&times;</span>
            <h2>Confirm Your Selection</h2>
            <p>You have selected the <span id="selected-plan-name"></span> plan.</p>
            
            <div class="terms-container">
                <h3>Terms and Conditions</h3>
                <p>
                    Terms and Conditions
                  General Site Usage
                  Last Revised: December 16, 2013

                  Welcome to www.lorem-ipsum.info. This site is provided as a service to our visitors and may be used for informational purposes only. Because the Terms and Conditions contain legal obligations, please read them carefully.

                  1. YOUR AGREEMENT
                  By using this Site, you agree to be bound by, and to comply with, these Terms and Conditions. If you do not agree to these Terms and Conditions, please do not use this site.

                  PLEASE NOTE: We reserve the right, at our sole discretion, to change, modify or otherwise alter these Terms and Conditions at any time. Unless otherwise indicated, amendments will become effective immediately. Please review these Terms and Conditions periodically. Your continued use of the Site following the posting of changes and/or modifications will constitute your acceptance of the revised Terms and Conditions and the reasonableness of these standards for notice of changes. For your information, this page was last updated as of the date at the top of these terms and conditions.
                  2. PRIVACY
                  Please review our Privacy Policy, which also governs your visit to this Site, to understand our practices.

                  3. LINKED SITES
                  This Site may contain links to other independent third-party Web sites ("Linked Sites”). These Linked Sites are provided solely as a convenience to our visitors. Such Linked Sites are not under our control, and we are not responsible for and does not endorse the content of such Linked Sites, including any information or materials contained on such Linked Sites. You will need to make your own independent judgment regarding your interaction with these Linked Sites.

                  4. FORWARD LOOKING STATEMENTS
                  All materials reproduced on this site speak as of the original date of publication or filing. The fact that a document is available on this site does not mean that the information contained in such document has not been modified or superseded by events or by a subsequent document or filing. We have no duty or policy to update any information or statements contained on this site and, therefore, such information or statements should not be relied upon as being current as of the date you access this site.

                  5. DISCLAIMER OF WARRANTIES AND LIMITATION OF LIABILITY
                  A. THIS SITE MAY CONTAIN INACCURACIES AND TYPOGRAPHICAL ERRORS. WE DOES NOT WARRANT THE ACCURACY OR COMPLETENESS OF THE MATERIALS OR THE RELIABILITY OF ANY ADVICE, OPINION, STATEMENT OR OTHER INFORMATION DISPLAYED OR DISTRIBUTED THROUGH THE SITE. YOU EXPRESSLY UNDERSTAND AND AGREE THAT: (i) YOUR USE OF THE SITE, INCLUDING ANY RELIANCE ON ANY SUCH OPINION, ADVICE, STATEMENT, MEMORANDUM, OR INFORMATION CONTAINED HEREIN, SHALL BE AT YOUR SOLE RISK; (ii) THE SITE IS PROVIDED ON AN "AS IS" AND "AS AVAILABLE" BASIS; (iii) EXCEPT AS EXPRESSLY PROVIDED HEREIN WE DISCLAIM ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, WORKMANLIKE EFFORT, TITLE AND NON-INFRINGEMENT; (iv) WE MAKE NO WARRANTY WITH RESPECT TO THE RESULTS THAT MAY BE OBTAINED FROM THIS SITE, THE PRODUCTS OR SERVICES ADVERTISED OR OFFERED OR MERCHANTS INVOLVED; (v) ANY MATERIAL DOWNLOADED OR OTHERWISE OBTAINED THROUGH THE USE OF THE SITE IS DONE AT YOUR OWN DISCRETION AND RISK; and (vi) YOU WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGE TO YOUR COMPUTER SYSTEM OR FOR ANY LOSS OF DATA THAT RESULTS FROM THE DOWNLOAD OF ANY SUCH MATERIAL.

                  B. YOU UNDERSTAND AND AGREE THAT UNDER NO CIRCUMSTANCES, INCLUDING, BUT NOT LIMITED TO, NEGLIGENCE, SHALL WE BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, PUNITIVE OR CONSEQUENTIAL DAMAGES THAT RESULT FROM THE USE OF, OR THE INABILITY TO USE, ANY OF OUR SITES OR MATERIALS OR FUNCTIONS ON ANY SUCH SITE, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. THE FOREGOING LIMITATIONS SHALL APPLY NOTWITHSTANDING ANY FAILURE OF ESSENTIAL PURPOSE OF ANY LIMITED REMEDY.

                  6. EXCLUSIONS AND LIMITATIONS
                  SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF CERTAIN WARRANTIES OR THE LIMITATION OR EXCLUSION OF LIABILITY FOR INCIDENTAL OR CONSEQUENTIAL DAMAGES. ACCORDINGLY, OUR LIABILITY IN SUCH JURISDICTION SHALL BE LIMITED TO THE MAXIMUM EXTENT PERMITTED BY LAW.

                  7. OUR PROPRIETARY RIGHTS
                  This Site and all its Contents are intended solely for personal, non-commercial use. Except as expressly provided, nothing within the Site shall be construed as conferring any license under our or any third party's intellectual property rights, whether by estoppel, implication, waiver, or otherwise. Without limiting the generality of the foregoing, you acknowledge and agree that all content available through and used to operate the Site and its services is protected by copyright, trademark, patent, or other proprietary rights. You agree not to: (a) modify, alter, or deface any of the trademarks, service marks, trade dress (collectively "Trademarks") or other intellectual property made available by us in connection with the Site; (b) hold yourself out as in any way sponsored by, affiliated with, or endorsed by us, or any of our affiliates or service providers; (c) use any of the Trademarks or other content accessible through the Site for any purpose other than the purpose for which we have made it available to you; (d) defame or disparage us, our Trademarks, or any aspect of the Site; and (e) adapt, translate, modify, decompile, disassemble, or reverse engineer the Site or any software or programs used in connection with it or its products and services.

                  The framing, mirroring, scraping or data mining of the Site or any of its content in any form and by any method is expressly prohibited.

                  8. INDEMNITY
                  By using the Site web sites you agree to indemnify us and affiliated entities (collectively "Indemnities") and hold them harmless from any and all claims and expenses, including (without limitation) attorney's fees, arising from your use of the Site web sites, your use of the Products and Services, or your submission of ideas and/or related materials to us or from any person's use of any ID, membership or password you maintain with any portion of the Site, regardless of whether such use is authorized by you.

                  9. COPYRIGHT AND TRADEMARK NOTICE
                  Except our generated dummy copy, which is free to use for private and commercial use, all other text is copyrighted. generator.lorem-ipsum.info © 2013, all rights reserved

                  10. INTELLECTUAL PROPERTY INFRINGEMENT CLAIMS
                  It is our policy to respond expeditiously to claims of intellectual property infringement. We will promptly process and investigate notices of alleged infringement and will take appropriate actions under the Digital Millennium Copyright Act ("DMCA") and other applicable intellectual property laws. Notices of claimed infringement should be directed to:

                  generator.lorem-ipsum.info

                  126 Electricov St.

                  Kiev, Kiev 04176

                  Ukraine

                  contact@lorem-ipsum.info

                  11. PLACE OF PERFORMANCE
                  This Site is controlled, operated and administered by us from our office in Kiev, Ukraine. We make no representation that materials at this site are appropriate or available for use at other locations outside of the Ukraine and access to them from territories where their contents are illegal is prohibited. If you access this Site from a location outside of the Ukraine, you are responsible for compliance with all local laws.

                  12. GENERAL
                  A. If any provision of these Terms and Conditions is held to be invalid or unenforceable, the provision shall be removed (or interpreted, if possible, in a manner as to be enforceable), and the remaining provisions shall be enforced. Headings are for reference purposes only and in no way define, limit, construe or describe the scope or extent of such section. Our failure to act with respect to a breach by you or others does not waive our right to act with respect to subsequent or similar breaches. These Terms and Conditions set forth the entire understanding and agreement between us with respect to the subject matter contained herein and supersede any other agreement, proposals and communications, written or oral, between our representatives and you with respect to the subject matter hereof, including any terms and conditions on any of customer's documents or purchase orders.

                  B. No Joint Venture, No Derogation of Rights. You agree that no joint venture, partnership, employment, or agency relationship exists between you and us as a result of these Terms and Conditions or your use of the Site. Our performance of these Terms and Conditions is subject to existing laws and legal process, and nothing contained herein is in derogation of our right to comply with governmental, court and law enforcement requests or requirements relating to your use of the Site or information provided to or gathered by us with respect to such use.
                </p>
            </div>
            
            <label>
                <input type="checkbox" id="acceptTerms" disabled>
                I have read and accept the terms and conditions
            </label>
            <div>
            <!-- Proceed Button inside a form or modal -->
                <button type="button" id="proceed-button" class="btn btn-primary" onclick="proceedWithDeposit()">Proceed</button>
            </div>
        </div>
    </div>
		<!-- Success Animation and Receipt Options -->
        <div id="payment-success-container" class="popup-modal" style="display:none;">
        <div class="popup-modal-content">
            <div class="checkmark-circle">
                <div class="background"></div>
                <div class="checkmark"></div>
            </div>
            <h2>Payment Succeeded!</h2>
            <p>Thank you for your payment. You can view or download your receipt below.</p>
            <!-- Buttons to View and Download Receipt -->
            <div class="receipt-options">
                <!-- <button class="btn btn-success" onclick="viewReceipt()">View Receipt</button> -->
                <button class="btn btn-primary" onclick="generatePDFReceipt()">Download Receipt</button>
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
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const planCards = document.querySelectorAll(".plan-card");
            const buttons = document.querySelectorAll(".select-plan");

            buttons.forEach(button => {
                button.addEventListener("click", function(event) {
                    event.preventDefault(); // Prevent default link behavior

                    // Remove highlighted class from all plan cards
                    planCards.forEach(card => {
                        card.classList.remove("highlighted-plan");
                    });

                    // Add highlighted class to the selected plan card
                    const selectedPlanId = `plan-${button.getAttribute("data-plan")}`;
                    document.getElementById(selectedPlanId).classList.add("highlighted-plan");

                    // Optionally, you can handle the actual plan selection logic here,
                    // like redirecting the user or submitting a form.
                });
            });
        });

    </script>

<script>
        document.addEventListener("DOMContentLoaded", function() {
      const buttons = document.querySelectorAll(".select-plan");
      const modal = document.getElementById("confirmationModal");
      const closeModal = document.querySelector(".popup-close");
      const proceedButton = document.getElementById("proceed-button");
      const selectedPlanName = document.getElementById("selected-plan-name");
      const termsContainer = document.querySelector(".terms-container");
      const acceptTermsCheckbox = document.getElementById("acceptTerms");

      buttons.forEach(button => {
          button.addEventListener("click", function() {
              const plan = button.getAttribute("data-plan");
              selectedPlanName.textContent = plan.toUpperCase();
              modal.style.display = "block";
              acceptTermsCheckbox.checked = false;
              acceptTermsCheckbox.disabled = true; // Disable checkbox initially
              proceedButton.disabled = true;
              termsContainer.scrollTop = 0; // Reset scroll position
          });
      });

      closeModal.addEventListener("click", function() {
          modal.style.display = "none";
      });

      window.addEventListener("click", function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      });

      termsContainer.addEventListener("scroll", function() {
          // Check if user has scrolled to the bottom
          if (termsContainer.scrollHeight - termsContainer.scrollTop <= termsContainer.clientHeight + 1) {
              acceptTermsCheckbox.disabled = false;
          }
      });

      acceptTermsCheckbox.addEventListener("change", function() {
          proceedButton.disabled = !this.checked;
      });

  });
    </script>
    <script>
      var selectedDepositAmount = null;

function selectPlan(cardElement) {
    // Remove the selected class from all cards
    var cards = document.querySelectorAll('.card');
    cards.forEach(function(card) {
        card.classList.remove('selected');
    });

    // Add the selected class to the clicked card
    cardElement.classList.add('selected');

    // Get the deposit amount from the selected card
    selectedDepositAmount = cardElement.getAttribute('data-amount');
    
    // Optionally, update the UI to reflect the selected plan
    // alert("You have selected the plan with ₹" + selectedDepositAmount);
}

      function proceedWithDeposit() {
    // Get the input values
    var depositAmount = selectedDepositAmount;
    var userName = '<?php echo htmlspecialchars($_SESSION['user_data']['user_name']) ?>';
    var userEmail = '<?php echo htmlspecialchars($_SESSION['user_data']['email']) ?>';
    const selectedPlanName = document.getElementById("selected-plan-name").innerHTML;
    const productId = document.getElementById('product_id').value; // Replace with the actual product ID
    const userId = <?php echo htmlspecialchars($_SESSION['user_data']['user_id']) ?>; // Replace with the actual user ID
    const proceedButton = this; // The button that was clicked
    const messageContainer = document.createElement('div');

    // Send form data to save in select_plan table using AJAX before starting payment
    var formData = {
        amount: depositAmount,
        name: userName,
        email: userEmail
    };

    fetch('<?php echo base_url('select_plan') ?>', {  // Replace with your actual URL to save data
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'plan': selectedPlanName,
            'product_id': productId,
            'user_id': userId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Proceed with Razorpay payment initialization if saving is successful
            initializeRazorpayPayment(depositAmount, userName, userEmail);
        } else {
            alert("Failed to save plan details. Please try again.");
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An error occurred while saving the plan details.");
    });
}

function initializeRazorpayPayment(depositAmount, userName, userEmail) {
    // Initialize Razorpay payment
    var options = {
        key: "rzp_test_weHunbcno354Ko", // Replace with your Razorpay Key ID
        amount: depositAmount * 100, // Amount in paise
        currency: "INR",
        name: "Aranea",
        description: "Deposit Payment",
        handler: function (response) {
            // Payment was successful, send data to server
            var paymentData = {
                amount: depositAmount,
                payment_id: response.razorpay_payment_id,
                name: userName,
                email: userEmail
            };

            // Send payment data to server using AJAX
            fetch('<?php echo base_url('transaction/save') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest' // Required for CodeIgniter to detect AJAX request
                },
                body: JSON.stringify(paymentData)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.paymentData);
                window.paymentData = paymentData;
                if (data.success) {
                    showSuccessScreen(data.paymentData);
                } else {
                    alert("Payment Successful but failed to save data.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Payment Successful but an error occurred while saving data.");
            });
        },
        prefill: {
            name: userName,
            email: userEmail
        },
        theme: {
            color: "#3399cc"
        }
    };

    var rzp1 = new Razorpay(options);
    rzp1.open();

    // Close the modal if open
    var modal = document.getElementById("exampleModal1");
    if (modal) {
        var modalInstance = bootstrap.Modal.getInstance(modal);
        modalInstance.hide();
    }
}

function showSuccessScreen() {
    // Hide the modal
    document.getElementById('confirmationModal').style.display = 'none';

    // Show the payment success container with animation
    document.getElementById('payment-success-container').style.display = 'block';
}

// Function to view receipt (can open in a new window or modal)
function viewReceipt() {
    window.open('<?php echo base_url("view_receipt") ?>', '_blank');
}



function generatePDFReceipt(paymentData) {
    const paymentDataDownload = window.paymentData;

    if (!paymentDataDownload) {
        console.error("Payment data not available");
        return;
    }
    console.log(paymentDataDownload);
    // Create a new jsPDF instance
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Add content to the PDF
    doc.setFontSize(20);
    doc.text("Payment Receipt", 20, 20);
    
    doc.setFontSize(12);
    doc.text(`Transaction ID: ${paymentDataDownload.payment_id}`, 20, 40);
    doc.text(`Amount: ₹${paymentDataDownload.amount}`, 20, 50);
    doc.text(`Payment Method: Razorpay`, 20, 60);
    doc.text(`Name: ${paymentDataDownload.name}`, 20, 70);
    doc.text(`Email: ${paymentDataDownload.email}`, 20, 80);
    doc.text(`Date: ${new Date().toLocaleDateString()}`, 20, 90);
    
    // Save the PDF and allow the user to download it
    doc.save("receipt.pdf");
}


      </script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	<script src="vendor/chart-js/chart.bundle.min.js"></script>

	<!-- counter -->
	<script src="vendor/counter/counter.min.js"></script>
	<script src="vendor/counter/waypoint.min.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>
	<script src="vendor/swiper/js/swiper-bundle.min.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="js/dashboard/dashboard-1.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</body>
</html>