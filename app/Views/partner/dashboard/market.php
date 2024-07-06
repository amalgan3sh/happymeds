
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<!-- Row -->
				<div class="row">
					<!-- File: app/Views/partner/dashboard/market.php -->

					<div class="col-xl-3 col-xxl-4 col-sm-6 my-order-ile">
						<div class="card">
							<div class="card-header border-0 pb-3">
								<h4 class="card-title">Market Previews</h4>    
							</div>
							<div class="card-body px-0 pt-0 dlab-scroll height370">
								<?php foreach ($market_previews as $item): ?>
								<div class="d-flex justify-content-between align-items-center market-preview">
									<div class="d-flex align-items-center">
										<span>
											<?= getCategorySVG($item['category']) ?>
										</span>
										<div class="ms-3">
											<a href="javascript:void(0);"><h5 class="fs-14 font-w600 mb-0"><?= esc($item['product_name']) ?></h5></a>
											<span class="fs-12 font-w400"><?= esc($item['month']) ?></span>
										</div>
									</div>    
									<div class="d-flex align-items-center">
										<span class="peity-line" data-width="100%"><?= esc($item['trend_data']) ?></span>
										<div class="ms-3">
											<h5 class="fs-14 font-w600 mb-0"><?= number_format($item['current_price'], 2) ?></h5>
											<span class="<?= $item['percentage_change'] >= 0 ? 'text-success' : 'text-danger' ?>">
												<?= number_format($item['percentage_change'], 2) ?>%
											</span>
										</div>
									</div>    
								</div>
								<?php endforeach; ?>
							</div>
							<div class="card-footer border-0 pt-0">
								<a href="<?= site_url('trading-market') ?>" class="btn btn-primary d-block btn-sm">Show more <i class="fa-solid fa-caret-right ms-2"></i></a>
							</div>
						</div>
					</div>

					<?php
					// Helper function to generate SVG based on category
					function getCategorySVG($category) {
						// You can define different SVGs for different categories here
						// For now, we'll use a placeholder
						return '<svg width="38" height="38" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="21" cy="21" r="21" fill="#374C98"/>
						</svg>';
					}
					?>
					<div class="col-xl-9 col-xxl-8">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body p-0">
										<div class="market-coin flex-wrap">
											<div class="d-flex align-items-center coin-box">
												<span>
													<svg width="46" height="46" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M37.3334 22.167C37.3318 20.2347 35.7654 18.6688 33.8336 18.6667H23.3334V25.6667H33.8336C35.7654 25.6651 37.3318 24.0987 37.3334 22.167Z" fill="#FFAB2D"/>
														<path d="M23.3334 37.3333H33.8336C35.7664 37.3333 37.3334 35.7664 37.3334 33.8336C37.3334 31.9003 35.7664 30.3333 33.8336 30.3333H23.3334V37.3333Z" fill="#FFAB2D"/>
														<path d="M28 0C12.5361 0 0 12.5361 0 28C0 43.4639 12.5361 56 28 56C43.4639 56 56 43.4639 56 28C55.9823 12.5434 43.4566 0.0177002 28 0ZM42.0003 33.9998C41.9948 38.4163 38.4163 41.9948 34.0004 41.9997V43.9998C34.0004 45.1046 33.1044 46 32.0003 46C30.8955 46 30.0001 45.1046 30.0001 43.9998V41.9997H26.0005V43.9998C26.0005 45.1046 25.1045 46 24.0003 46C22.8956 46 22.0002 45.1046 22.0002 43.9998V41.9997H16.0004C14.8957 41.9997 14.0003 41.1043 14.0003 40.0002C14.0003 38.8954 14.8957 38 16.0004 38H18V18H16.0004C14.8957 18 14.0003 17.1046 14.0003 15.9998C14.0003 14.8951 14.8957 13.9997 16.0004 13.9997H22.0002V12.0002C22.0002 10.8954 22.8956 10 24.0003 10C25.1051 10 26.0005 10.8954 26.0005 12.0002V13.9997H30.0001V12.0002C30.0001 10.8954 30.8955 10 32.0003 10C33.105 10 34.0004 10.8954 34.0004 12.0002V13.9997C38.3998 13.9814 41.9814 17.5324 42.0003 21.9319C42.0101 24.2616 40.9999 26.479 39.2354 28C40.9835 29.5039 41.9924 31.6933 42.0003 33.9998Z" fill="#FFAB2D"/>
													</svg>
												</span>
												<div class="ms-3">
													<span class="fs-14 font-w400">Bitcoin</span>	
													<a href="javascript:void(0);"><h4 class="font-w600 mb-0">BTC / USD</h4></a>
												</div>
											</div>
											<div class="coin-box">
												<span class="mb-1 d-block">Mark Price</span>
												<div class="d-flex align-items-center">
													<h5 class="font-w600 m-0 ">148.42</h5>
													<span class="text-danger ms-2">-3.28%</span>
												</div>
											</div>	
											<div class="coin-box">
												<span class="mb-1 d-block">Funding Rate</span>
													<h5 class="font-w600 m-0 ">-0,0252%/hr</h5>
											</div>	
											<div class="coin-box">
												<span class="mb-1 d-block">Volume</span>
													<h5 class="font-w600 m-0 ">104k</h5>
											</div>	
											<div class="input-group coin-search-area coin-box">
												<input type="text" class="form-control" placeholder="Search here">
												<span class="input-group-text">
													<a href="javascript:void(0)">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="var(--primary)" fill-rule="nonzero" opacity="0.3"></path>
															<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="var(--primary)" fill-rule="nonzero"></path>
														</g>
														</svg>
													</a>
												</span>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<div class="col-xl-12">
								<div class="card market-overview">
									<div class="card-header border-0 flex-wrap pb-0">
										<div class="d-flex align-items-center flex-wrap mb-3 mb-sm-0">
											<h4 class="card-title mb-0">Market Overview</h4>
											<h4 class="fs-16 font-w500 m-0">Depth Chart</h4>
											<h4 class="fs-16 font-w500 m-0">Market Details</h4>
											<span>
												<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M7.52549 0V7.71177H0V11.2882H7.52549V19H11.4745V11.2882H19V7.71177H11.4745V0H7.52549Z" fill="var(--primary)"/>
												</svg>

											</span>

										</div>
										<div class="setting">
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M6.625 1.853C7.335 0.738997 8.581 0 10 0C11.419 0 12.665 0.738997 13.375 1.853C14.664 1.567 16.068 1.926 17.071 2.929C18.074 3.933 18.433 5.33599 18.147 6.62599C19.261 7.33599 20 8.582 20 10C20 11.419 19.261 12.665 18.147 13.375C18.433 14.665 18.074 16.068 17.071 17.071C16.068 18.075 14.664 18.433 13.375 18.148C12.665 19.262 11.419 20 10 20C8.581 20 7.335 19.262 6.625 18.148C5.335 18.433 3.932 18.075 2.929 17.071C1.926 16.068 1.56701 14.665 1.85201 13.375C0.739005 12.665 0 11.419 0 10C0 8.582 0.739005 7.33599 1.85201 6.62599C1.56701 5.33599 1.926 3.933 2.929 2.929C3.932 1.926 5.335 1.567 6.625 1.853ZM6.67801 3.98199C6.94001 4.11799 7.249 4.13099 7.522 4.01799C7.795 3.90499 8.004 3.677 8.093 3.396C8.349 2.587 9.106 2 10 2C10.894 2 11.651 2.587 11.907 3.396C11.996 3.677 12.205 3.90499 12.478 4.01799C12.751 4.13099 13.059 4.11799 13.321 3.98199C14.075 3.59099 15.025 3.71099 15.657 4.34399C16.289 4.97599 16.41 5.926 16.019 6.679C15.883 6.941 15.869 7.25 15.982 7.522C16.095 7.795 16.323 8.004 16.604 8.093C17.414 8.349 18 9.106 18 10C18 10.894 17.414 11.652 16.604 11.908C16.323 11.997 16.095 12.206 15.982 12.478C15.869 12.751 15.883 13.06 16.019 13.322C16.41 14.075 16.289 15.025 15.657 15.657C15.025 16.289 14.075 16.41 13.321 16.019C13.059 15.883 12.751 15.87 12.478 15.983C12.205 16.096 11.996 16.324 11.907 16.605C11.651 17.414 10.894 18 10 18C9.106 18 8.349 17.414 8.093 16.605C8.004 16.324 7.795 16.096 7.522 15.983C7.249 15.87 6.94001 15.883 6.67801 16.019C5.92501 16.41 4.975 16.289 4.343 15.657C3.711 15.025 3.59 14.075 3.981 13.322C4.117 13.06 4.13001 12.751 4.01801 12.478C3.90501 12.206 3.677 11.997 3.395 11.908C2.586 11.652 2 10.894 2 10C2 9.106 2.586 8.349 3.395 8.093C3.677 8.004 3.90501 7.795 4.01801 7.522C4.13001 7.25 4.117 6.941 3.981 6.679C3.59 5.926 3.711 4.97599 4.343 4.34399C4.975 3.71099 5.92501 3.59099 6.67801 3.98199ZM10 6C7.792 6 6 7.793 6 10C6 12.208 7.792 14 10 14C12.208 14 14 12.208 14 10C14 7.793 12.208 6 10 6ZM10 8C11.104 8 12 8.897 12 10C12 11.104 11.104 12 10 12C8.896 12 8 11.104 8 10C8 8.897 8.896 8 10 8Z" fill="#717579"/>
											</svg>
										</div>
									</div>
									<div class="card-body">
										<div class="d-flex align-items-center justify-content-between flex-wrap">	
											<div class="d-flex align-items-center">
												<h4 class="me-5 font-w600 mb-0"><span class="text-success me-2">BUY</span> $5,673</h4>
												<h4 class="font-w600 mb-0"><span class="text-danger me-2">SELL</span> $5,982</h4>
											</div>
											<div class="d-flex justify-content-between align-items-center  mt-md-0 mt-2">
												<ul class="nav nav-pills" id="myTab1" role="tablist">
													<li class="nav-item" role="presentation">
														<a class="nav-link active" id="Week-tab" data-bs-toggle="tab" 	data-bs-target="#Week" href="#Week"  role="tab"  aria-selected="true">Week</a>
													</li>
													<li class="nav-item" role="presentation">
														<a class="nav-link" id="Month-tab" data-bs-toggle="tab" data-bs-target="#Month" href="#Month"  role="tab"  aria-selected="false">Month</a>
													</li>
													<li class="nav-item" role="presentation">
														<a class="nav-link" id="Year-tab" data-bs-toggle="tab" data-bs-target="#Year"  href="#Year"  role="tab"  aria-selected="false">Year</a>
													</li>
												</ul>
												<a href="javascript:void(0);" class="btn-link text-primary get-report">
													<svg class="me-2" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M24 22.5C24 23.3284 23.3284 24 22.5 24H1.5C0.671578 24 0 23.3284 0 22.5C0 21.6716 0.671578 21 1.5 21H22.5C23.3284 21 24 21.6716 24 22.5ZM10.9394 17.7482C11.2323 18.0411 11.6161 18.1875 12 18.1875C12.3838 18.1875 12.7678 18.0411 13.0606 17.7482L18.3752 12.4336C18.961 11.8478 18.961 10.8981 18.3752 10.3123C17.7894 9.72652 16.8397 9.72652 16.2539 10.3123L13.5 13.0662V1.5C13.5 0.671578 12.8284 0 12 0C11.1716 0 10.5 0.671578 10.5 1.5V13.0662L7.74609 10.3123C7.1603 9.72652 6.21056 9.72652 5.62477 10.3123C5.03897 10.8981 5.03897 11.8478 5.62477 12.4336L10.9394 17.7482Z" fill="var(--primary)"/>
													</svg>
													Get Report</a>
											</div>	
										</div>	
										
											
												<div id="marketOverview"></div>
											
										
										
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
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="js/dashboard/market.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
   
	
</body>
</html>