<!DOCTYPE html>
<html lang="en">
<head>
     	<!--Title-->
	<title>Jiade : Crypto Trading UI Admin  Bootstrap 5 Template | Dexignlabs</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Dexignlabs">
	<meta name="robots" content="index, follow">

	<meta name="keywords" content="Admin Dashboard, Bootstrap Template, FrontEnd, Web Application, Responsive Design, User Experience, Customizable, Modern UI, Dashboard Template, Admin Panel, Bootstrap 5, HTML5, CSS3, JavaScript, Admin Template, UI Kit, SASS, SCSS, Analytics, Responsive Dashboard, responsive admin dashboard, ui kit, web app, Admin Dashboard, Template, Admin, Authentication, FrontEnd Integration, Web Application UI, Bootstrap Framework, User Interface Kit, SASS Integration, Customizable Template, HTML5/CSS3, Analytics Dashboard, Admin Dashboard UI, Mobile-Friendly Design, UI Components, Dashboard Widgets, Dashboard Framework, Data Visualization, User Experience (UX), Dashboard Widgets, Real-time Analytics, Cross-Browser Compatibility, Interactive Charts, Performance Optimization, Multi-Purpose Template, Efficient Admin Tools, Modern Web Technologies, Responsive Tables, Dashboard Widgets, Invoice Management, Access Control, Modular Design, Trend Analysis, User-Friendly Interface, Crypto Trading UI, Cryptocurrency Dashboard, Trading Platform Interface, Responsive Crypto Admin, Financial Dashboard, UI Components for Crypto, Cryptocurrency Exchange, Blockchain , Crypto Portfolio Template, Crypto Market Analytics">

	<meta name="description" content="Empower your cryptocurrency trading platform with Jiade, the ultimate Crypto Trading UI Admin Bootstrap 5 Template. Seamlessly combining sleek design with the power of Bootstrap 5, Jiade offers a sophisticated and user-friendly interface for managing your crypto assets. Packed with customizable components, responsive charts, and a modern dashboard, Jiade accelerates your development process. Crafted for efficiency and aesthetics, this template is your key to creating a cutting-edge crypto trading experience. Explore Jiade today and elevate your crypto trading platform to new heights with a UI that blends functionality and style effortlessly.">

	<meta property="og:title" content="Jiade : Crypto Trading UI Admin  Bootstrap 5 Template | Dexignlabs">
	<meta property="og:description" content="Empower your cryptocurrency trading platform with Jiade, the ultimate Crypto Trading UI Admin Bootstrap 5 Template. Seamlessly combining sleek design with the power of Bootstrap 5, Jiade offers a sophisticated and user-friendly interface for managing your crypto assets. Packed with customizable components, responsive charts, and a modern dashboard, Jiade accelerates your development process. Crafted for efficiency and aesthetics, this template is your key to creating a cutting-edge crypto trading experience. Explore Jiade today and elevate your crypto trading platform to new heights with a UI that blends functionality and style effortlessly.">
	
	<meta property="og:image" content="https://jiade.dexignlab.com/xhtml/social-image.png">

	<meta name="format-detection" content="telephone=no">

	<meta name="twitter:title" content="Jiade : Crypto Trading UI Admin  Bootstrap 5 Template | Dexignlabs">
	<meta name="twitter:description" content="Empower your cryptocurrency trading platform with Jiade, the ultimate Crypto Trading UI Admin Bootstrap 5 Template. Seamlessly combining sleek design with the power of Bootstrap 5, Jiade offers a sophisticated and user-friendly interface for managing your crypto assets. Packed with customizable components, responsive charts, and a modern dashboard, Jiade accelerates your development process. Crafted for efficiency and aesthetics, this template is your key to creating a cutting-edge crypto trading experience. Explore Jiade today and elevate your crypto trading platform to new heights with a UI that blends functionality and style effortlessly.">
	
	<meta name="twitter:image" content="https://jiade.dexignlab.com/xhtml/social-image.png">
	<meta name="twitter:card" content="summary_large_image">

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="vendor/star-rating/star-rating-svg.css">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
   <link class="main-css" href="css/style.css" rel="stylesheet">

</head>



        <!--**********************************
            Content body start
        ***********************************-->
		<div class="page-titles">
        <div class="sub-dz-head">
				<div class="d-flex align-items-center dz-head-title">
					<h2 class="text-white m-0">Product Details</h2>
				</div>
			</div>
		</div>
		<div class="content-body">
			<div class="container-fluid">
				
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
										<!-- Tab panes -->
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
												aria-labelledby="home-tab" tabindex="0">
												<img class="img-fluid rounded  " src="<?php echo base_url('assets/');?><?= esc($product['product_img_main']) ?>" alt="">
											</div>
											<?php
											// Extract image paths from the comma-separated string
											$imagePaths = explode(',', esc($product['product_images']));

											// Loop through each image path and create an img element
												foreach ($imagePaths as $path) {
												$imagePath = trim($path);
											?>
											<div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
												aria-labelledby="profile-tab" tabindex="0">
												<img class="img-fluid rounded " src="<?php echo base_url('assets/');?><?= esc($imagePath) ?>" alt="">
											</div>
											<?php
												}
											?>

										</div>
										<ul class="nav nav-tabs slide-item-list mt-3" id="myTab" role="tablist">
											<li class="nav-item" role="presentation">
												<a href="#first" class="nav-link active" id="home-tab"
													data-bs-toggle="tab" data-bs-target="#home-tab-pane" role="tab"
													aria-controls="home-tab-pane" aria-selected="true"><img
														class="img-fluid me-2 rounded" src="<?php echo base_url('assets/');?><?= esc($product['product_img_main']) ?>" alt=""
														width="80"></a>
											</li>
											<?php
											// Extract image paths from the comma-separated string
											$count=0;
											$imagePaths = explode(',', esc($product['product_images']));
											
											$tabNames = ['second', 'third', 'fourth', 'fifth']; // Extend this array as needed

											// Loop through each image path and create an img element
												foreach ($imagePaths as $path) {
												$imagePath = trim($path);
												$tabName = isset($tabNames[$count]) ? $tabNames[$count] : 'other';
											?>
											<li class="nav-item" role="presentation">
												<a href="#<?= $tabName?>" class="nav-link" id="profile-tab" data-bs-toggle="tab"
													data-bs-target="#profile-tab-pane" role="tab"
													aria-controls="profile-tab-pane" aria-selected="false"><img
														class="img-fluid me-2 rounded" src="<?php echo base_url('assets/');?><?= esc($imagePath) ?>" alt=""
														width="80"></a>
											</li>
											<?php
												$count++;
											}
											?>

										</ul>
									</div>
									<!--Tab slider End-->
									<div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
										<div class="product-detail-content">
											<!--Product details-->
											<div class="new-arrival-content pr mt-md-0 mt-3">
												<h4><?= esc($product['ProductName']) ?></h4>
												<div class="comment-review star-rating">
													<ul>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa-solid fa-star-half-stroke"></i></li>
													</ul>
													<span class="review-text">(34 reviews) / </span><a
														class="product-review" href="" data-bs-toggle="modal"
														data-bs-target="#reviewModal">Write a review?</a>
												</div>
												<!-- <div class="d-table mb-2">
													<p class="price float-left d-block">$325.00</p>
												</div> -->
												<p>Strength: <span class="item"> <?= esc($product['Strength']) ?> <i
															class="fa fa-shopping-basket"></i></span></p>
															<p>Dosage Form: 
																<span class="item">
																	<?= esc($product['DosageForm']) ?>
																	<?php if (strpos(strtolower($product['DosageForm']), 'tablet') !== false): ?>
																		<i class="fas fa-tablets"></i>
																	<?php elseif (strpos(strtolower($product['DosageForm']), 'syrup') !== false): ?>
																		<i class="fas fa-prescription-bottle-alt"></i>
																	<?php elseif (strpos(strtolower($product['DosageForm']), 'injection') !== false): ?>
																		<i class="fas fa-syringe"></i>
																	<?php elseif (strpos(strtolower($product['DosageForm']), 'suspension') !== false): ?>
																		<i class="fas fa-vial"></i>
																	<?php endif; ?>
																</span>
															</p>

												<p>Content: <span class="item"><?= esc($product['Content']) ?></span></p>
												<p>Product tags:&nbsp;&nbsp;
                                                    <span class="badge badge-success light">cough syrup</span>
                                                    <span class="badge badge-success light">expectorant</span>
                                                    <span class="badge badge-success light">bronchitis</span>
                                                    <span class="badge badge-success light">respiratory health</span>
                                                    <span class="badge badge-success light">mucolytic</span>
                                                    <span class="badge badge-success light">cold and flu</span>
												</p>
												<p class="text-content">
                                                <?= esc($product['TherapeuticUse']) ?>
												</p>
												<div class="d-flex align-items-end flex-wrap mt-4">
												<div class="shopping-cart me-3 mt-xl-0 mt-2">
													<?php if (in_array($_SESSION['user_data']['kyc_verify'], ['-', 'pending', 'rejected'])): ?>
														<button id="kyc-upload-button" class="btn btn-warning">
															<i class="fa fa-upload me-2"></i> Please upload your KYC document 
															<a href="<?= site_url('upload_kyc') ?>" class="text-white"><u>Click here</u></a>
														</button>
														<div id="kyc-feedback"></div>
													<?php else: ?>
														<button id="invest-button" class="btn btn-primary" data-product-id="<?= $product['product_id'] ?>">
															<i class="fa fa-shopping-basket me-2"></i> Are you interested in being a brand partner?
														</button>
														<div id="investment-feedback"></div>
													<?php endif; ?>
												</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- review -->
					<div class="modal fade" id="reviewModal">
						<div class="modal-dialog modal-dialog-center" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Review</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal">
									</button>
								</div>
								<div class="modal-body">
									<form>
										<div class="text-center mb-4">
											<img class="img-fluid rounded" width="78" src="./images/avatar/1.jpg"
												alt="DexignZone">
										</div>
										<div class="form-group">
											<div class="rating-widget mb-4 text-center">
												<!-- Rating Stars Box -->
												<div class="rating-stars">
													<ul id="stars">
														<li class="star" title="Poor" data-value="1">
															<i class="fa fa-star fa-fw"></i>
														</li>
														<li class="star" title="Fair" data-value="2">
															<i class="fa fa-star fa-fw"></i>
														</li>
														<li class="star" title="Good" data-value="3">
															<i class="fa fa-star fa-fw"></i>
														</li>
														<li class="star" title="Excellent" data-value="4">
															<i class="fa fa-star fa-fw"></i>
														</li>
														<li class="star" title="WOW!!!" data-value="5">
															<i class="fa fa-star fa-fw"></i>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="form-group">
											<textarea class="form-control" placeholder="Comment" rows="5"></textarea>
										</div>
										<button class="btn btn-success btn-block">RATE</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<h4 class="fs-20 font-w600 my-4">SIMILAR PRODUCTS</h4>
								<div class="owl-carousel card-slider">
									<?php foreach ($similarProducts as $product): ?>
										<div class="items">
											<div class="card">
												<div class="card-body product-grid-card">
													<div class="new-arrival-product">
														<div class="new-arrivals-img-contnent">
															<img class="img-fluid product-image" src="<?php echo base_url('assets/');?><?= esc($product['product_img_main']) ?>" alt="<?php echo esc($product['ProductName']); ?>">
														</div>
														<div class="new-arrival-content text-center mt-3">
															<h4><a href="<?php echo base_url('product_detail/' . esc($product['product_id'])); ?>"><?php echo esc($product['ProductName']); ?></a></h4>
															<ul class="star-rating">
																<?php for ($i = 0; $i < 5; $i++): ?>
																	<li><i class="fa <?php echo $i < $product['rating'] ? 'fa-star' : 'fa-star-o'; ?>"></i></li>
																<?php endfor; ?>
															</ul>
															
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
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
				<p>Copyright © Designed &amp; Developed by <a href="https://spyderhub.com/"
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
	<!-- Rating -->
	<script src="vendor/star-rating/jquery.star-rating-svg.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.js"></script>
	
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	
   

	<script>
		function cardsCenter() {

			/*  testimonial one function by = owl.carousel.js */



			jQuery('.card-slider').owlCarousel({
				loop: true,
				margin: 20,
				nav: false,
				autoplay: true,
				rtl: true,

				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: false,
				navText: ['', ''],
				responsive: {
					0: {
						items: 1
					},
					576: {
						items: 3
					},
					800: {
						items: 3
					},
					991: {
						items: 4
					},
					1200: {
						items: 5
					}
				}
			})
		}

		jQuery(window).on('load', function () {
			setTimeout(function () {
				cardsCenter();
			}, 1000);
		});

	</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#invest-button').click(function() {
        var productId = $(this).data('product-id');
        $.ajax({
            url: '<?= site_url('check_investment') ?>',
            type: 'GET',
            data: { product_id: productId },
            dataType: 'json',
            success: function(response) {
                if (response.invested) {
                    $('#investment-feedback').html('<div class="alert alert-info mt-2">' + response.message + '</div>');
                } else {
                    window.location.href = '<?= site_url('product_invest') ?>?product_id=' + productId;
                }
            },
            error: function() {
                $('#investment-feedback').html('<div class="alert alert-danger mt-2">An error occurred. Please try again.</div>');
            }
        });
    });
});
</script>

</body>
</html>