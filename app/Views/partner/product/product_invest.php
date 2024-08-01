<!--**********************************
            Content body start
        ***********************************-->
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
        <div class="pricing-card basic">
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
      <div class="pricing-card standard">
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
      <div class="pricing-card premium">
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
        <button id="proceed-button" class="proceed-btn">Proceed</button>
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
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

        buttons.forEach(button => {
            button.addEventListener("click", function() {
                const plan = button.getAttribute("data-plan");
                selectedPlanName.textContent = plan.toUpperCase();
                modal.style.display = "block";
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

        proceedButton.addEventListener("click", function() {
        });
    });

    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
      const buttons = document.querySelectorAll('.proceed-btn');
      buttons.forEach(button => {
          button.addEventListener('click', function () {
              const selectedPlanName = document.getElementById("selected-plan-name").innerHTML;
              const productId = document.getElementById('product_id').value; // Replace with the actual product ID
              const userId = <?php echo htmlspecialchars($_SESSION['user_data']['user_id']) ?>; // Replace with the actual user ID
              const proceedButton = this; // The button that was clicked
              const messageContainer = document.createElement('div');

              fetch('<?php echo base_url('select_plan') ?>', {
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
                    // Hide the proceed button
                    proceedButton.style.display = 'none';

                    // Display the success message
                    messageContainer.className = 'success-message';
                    messageContainer.innerText = data.message;
                    proceedButton.parentNode.insertBefore(messageContainer, proceedButton.nextSibling);
                } else {
                    // Display the error message
                    messageContainer.className = 'error-message';
                    messageContainer.innerText = data.message;
                    proceedButton.parentNode.insertBefore(messageContainer, proceedButton.nextSibling);
                }
            })
            .catch(error => {
                console.error('Error:', error);

                // Display a generic error message
                messageContainer.className = 'error-message';
                messageContainer.innerText = 'An error occurred. Please try again later.';
                proceedButton.parentNode.insertBefore(messageContainer, proceedButton.nextSibling);
            });
        });
    });
});

    </script>

</body>
</html>