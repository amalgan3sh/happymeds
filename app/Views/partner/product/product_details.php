<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Row -->
                <div class="row">
                    <?php foreach ($product_data as $product): ?>
                    <!-- column -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="card pull-up">
                            <a href="<?= base_url('product_details_view?product_id='.$product['product_id']) ?>" class="text-decoration-none text-dark">
                                <div class="card-body align-items-center flex-wrap">
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="ico-icon">
                                            <img src="<?= esc($product['icon']) ?>" alt="<?= esc($product['ProductName']) ?>" style="width: 50px; height: 50px; object-fit: contain;">
                                        </div>
                                        <div class="ms-3">
                                            <h4 class="card-title mb-0"><?= esc($product['ProductName']) ?></h4>
                                            <span><?= esc($product['DosageForm']) ?></span>
                                        </div>
                                    </div>    
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <p class="mb-0 fs-14 text-dark font-w600"><?= esc($product['Strength']) ?></p>
                                            <span class="fs-12"><?= esc($product['Content']) ?></span>
                                        </div>
                                        <div>
                                            <p class="mb-0 fs-14 text-success font-w600">Info</p>
                                            <span class="fs-12"><?= esc(substr($product['TherapeuticUse'], 0, 30)) ?>...</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- /column -->
                    <?php endforeach; ?>
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
	

	<!-- Dashboard 1 -->
	
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
   
</body>
</html>