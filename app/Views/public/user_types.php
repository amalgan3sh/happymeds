<main class="main" id="top">
    <section class="py-5 py-md-8" id="pricing">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 text-center mb-4 mb-md-5">
                    <h2 class="fw-bold fs-2 fs-md-3 fs-lg-4 mb-3">Choose Your Account Type</h2>
                    <p class="mb-0">Select the account type that suits your needs and get started.</p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- B2B Partner Card -->
                <div class="col">
                    <a href="<?php echo base_url('b2b_partner_details') ?>" class="card-link">
                        <div class="card h-100 shadow border-0 hover-up">
                            <div class="card-header border-bottom-0 pt-4 pb-3">
                                <h5 class="fw-bold text-center">B2B Partner</h5>
                                <p class="text-center mb-0">Buy products from our store (ecommerce)</p>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <ul class="list-unstyled mb-4 flex-grow-1">
                                    <li class="py-2 text-secondary">Access to a wide range of products</li>
                                    <li class="py-2 text-secondary">Exclusive B2B pricing</li>
                                    <li class="py-2 text-secondary">Easy bulk ordering</li>
                                    <li class="py-2 text-secondary">Dedicated customer support</li>
                                    <li class="py-2 text-secondary"><a class="" href="<?php echo base_url('b2b_partner_details') ?>">More Details...</a></li>
                                </ul>
                                <div class="mt-auto">
                                    <a class="btn btn-primary w-100 mb-2" style="background-color: #FCAE61; border-color: #FFFFFF;" href="https://user.lakshmipharmaceuticals.com/">Register Now</a>
                                    <a class="btn btn-outline-primary w-100" href="https://user.lakshmipharmaceuticals.com/">Log in</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Supplier/Manufacturer/Agent/Agency/Distributor/Franchise Card -->
                <div class="col">
                    <a href="<?php echo base_url('supplier_details') ?>" class="card-link">
                        <div class="card h-100 shadow border-0 hover-up">
                            <div class="card-header border-bottom-0 pt-4 pb-3">
                                <h5 class="fw-bold text-center">Supplier/ Manufacturer/ Agent/ Agency/ Distributor/ Franchise</h5>
                                <p class="text-center mb-0">Sell or distribute products through our platform</p>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <ul class="list-unstyled mb-4 flex-grow-1">
                                    <li class="py-2 text-secondary">Access to a large network of buyers</li>
                                    <li class="py-2 text-secondary">Competitive pricing strategies</li>
                                    <li class="py-2 text-secondary">Marketing and sales support</li>
                                    <li class="py-2 text-secondary">Reliable logistics and distribution</li>
                                    <li class="py-2 text-secondary"><a class="" href="<?php echo base_url('supplier_details') ?>">More Details...</a></li>
                                </ul>
                                <div class="mt-auto">
                                    <a class="btn btn-primary w-100 mb-2" style="background-color: #FCAE61; border-color: #FFFFFF;" href="<?php echo base_url('public_register') ?>">Register Now</a>
                                    <a class="btn btn-outline-primary w-100" href="<?php echo base_url('public_login') ?>">Log in</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Brand Partner Card -->
                <div class="col">
                    <a href="<?php echo base_url('brand_partner_details') ?>" class="card-link">
                        <div class="card h-100 shadow border-0 hover-up">
                            <div class="card-header border-bottom-0 pt-4 pb-3">
                                <h5 class="fw-bold text-center">Brand Partner</h5>
                                <p class="text-center mb-0">Invest in products and earn benefits from sales</p>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <ul class="list-unstyled mb-4 flex-grow-1">
                                    <li class="py-2 text-secondary">Invest in nutraceutical herbal products</li>
                                    <li class="py-2 text-secondary">Earn benefits on B2B orders</li>
                                    <li class="py-2 text-secondary">5-year subscription plan</li>
                                    <li class="py-2 text-secondary">Turnover benefits</li>
                                    <li><a class="" href="<?php echo base_url('brand_partner_details') ?>">More Details...</a></li>
                                </ul>
                                <div class="mt-auto">
                                    <a class="btn btn-primary w-100 mb-2" style="background-color: #FCAE61; border-color: #FFFFFF;" href="<?php echo base_url('brand_partner_registration') ?>">Register Now</a>
                                    <a class="btn btn-outline-primary w-100" href="<?php echo base_url('customer_login'); ?>">Log in</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
/* Hover and Scale Effect */
.card-link {
    text-decoration: none;
    color: inherit;
    display: block;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-link .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-link:hover .card {
    transform: scale(1.08);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Hover Animation Effect */
.hover-up {
    transition: all 0.3s ease-in-out;
}

.hover-up:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
}

/* Card Animations on Scroll */
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.card {
    animation: fadeInUp 0.5s ease-in-out;
}

/* Button Custom Styles */
.btn-primary {
    background-color: #FCAE61;
    border-color: #FFFFFF;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #F58A24;
    border-color: #FFFFFF;
}

.btn-outline-primary:hover {
    color: #FFFFFF;
    background-color: #192841;
}

/* Responsive Image Centering */
img {
    margin: 0 auto;
}
</style>