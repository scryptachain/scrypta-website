<?php echo $header; ?>
<main class="position-relative overflow-hidden">
		<!-- ./Page header -->
		<header class="page header color-1 overlay alpha-8 image-background cover gradient gradient-43">
			<div class="divider-shape">
				<!-- waves divider -->
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" class="shape-waves" style="left: 0; transform: rotate3d(0,1,0,180deg);">
					<path class="shape-fill shape-fill-1" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z" />
				</svg>
			</div>
			<div class="container" style="">
				<div class="row">
					<div class="col-md-6">
						<h1 class="regular display-4 color-1 mb-4"><?php echo trans('messages.lablockchaindiscrypta'); ?></h1>
						<p class="lead color-1"><?php echo trans('messages.lablockchaindiscryptatext'); ?></p>
					</div>
				</div>
			</div>
		</header>
		<!-- ./Overview - Floating boxes -->
		<section class="section overview">
			<div class="container">
				<div class="row align-items-center gap-y">
					<div class="col-lg-5 mr-auto text-center text-md-left">
						<div class="section-heading">
							<p class="badge badge-success bold">Blockchain Technology</p>
							<h2>Distributed Ledger and P2P Network</h2>
							<p class="lead color-2"><?php echo trans('messages.blockchaintechnologytext'); ?>
</p>
						</div>
						<p><?php echo trans('messages.blockchaintech2'); ?></p>
					</div>
					<div class="col-lg-6">
						<div class="row gap-y">
							<div class="col-6 col-sm-5 col-md-6 mt-6 ml-lg-auto">
								<div class="card rounded p-2 p-sm-4 shadow text-center text-md-left" data-aos="fade-up">
									<i class="pe pe-3x pe-7s-settings color-3"></i>
									<p class="bold mb-0"><?php echo trans('messages.nodi'); ?></p>
									<p class="op-7 small"><?php echo trans('messages.noditext'); ?>
</p>
								</div>
							</div>
							<div class="col-6 col-sm-5 col-md-6 mr-lg-auto">
								<div class="color-1 bg-4-gradient card rounded p-2 p-sm-4 shadow text-center text-md-left" data-aos="fade-up">
									<i class="pe pe-3x pe-7s-wallet"></i>
									<p class="bold mb-0"><?php echo trans('messages.transazioni'); ?></p>
									<p class="op-7 small"><?php echo trans('messages.transazionitext'); ?>
</p>
								</div>
							</div>
							<div class="col-6 col-sm-5 col-md-6 ml-lg-auto">
								<div class="card rounded p-2 p-sm-4 shadow text-center text-md-left" data-aos="fade-up">
									<i class="pe pe-3x pe-7s-plugin color-3"></i>
									<p class="bold mb-0"><?php echo trans('messages.blocchi'); ?></p>
									<p class="op-7 small"><?php echo trans('messages.blocchitext'); ?></p>
								</div>
							</div>
							<div class="col-6 col-sm-5 col-md-6 mt-6n mr-lg-auto">
								<div class="card rounded p-2 p-sm-4 shadow text-center text-md-left" data-aos="fade-up">
									<i class="pe pe-3x pe-7s-note2 color-3"></i>
									<p class="bold mb-0"><?php echo trans('messages.registro'); ?></p>
									<p class="op-7 small"><?php echo trans('messages.registrotext'); ?></p>
</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ./Dashboard Included -->
		<section class="section bg-6 top-left">
			<div class="container bring-to-front">
				<div class="section-heading text-center">
					<h2><?php echo trans('messages.features'); ?></h2>
					<p class="lead"><?php echo trans('messages.featurestext'); ?></p>
				</div>
				<div class="row align-items-center gap-y">
					<div class="col-md-12 text-center text-md-left">
						<ul class="list-unstyled">
							<li class="media d-block d-lg-flex">
								<i class="pe pe-3x pe-7s-share accent icon-lg mr-3 text-lg-right"></i>
								<div class="media-body mt-3 mt-lg-0 text-center text-md-left">
									<h5 class="bold color-5">Masternode</h5>
									<p class="mt-0 mb-5"><?php echo trans('messages.mntext'); ?>
</p>
								</div>
							</li>
							<li class="media d-block d-lg-flex">
								<i class="pe pe-3x pe-7s-keypad accent icon-lg mr-3 text-lg-right"></i>
								<div class="media-body mt-3 mt-lg-0 text-center text-md-left">
									<h5 class="bold color-5">Staking</h5>
									<p class="mt-0 mb-5"><?php echo trans('messages.stakingtext'); ?></p>
								</div>
							</li>
							<li class="media d-block d-lg-flex">
								<i class="pe pe-3x pe-7s-refresh-2 accent icon-lg mr-3 text-lg-right"></i>
								<div class="media-body mt-3 mt-lg-0 text-center text-md-left">
									<h5 class="bold color-5">See-Saw Mechanism</h5>
									<p class="mt-0"><?php echo trans('messages.seesawtext'); ?></p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- ./Features - Boxed -->
		<section class="bg-1 top-left">
			<div class="container">
				<div class="section-heading text-center">
					<h2><?php echo trans('messages.specifiche'); ?></h2>
				
				</div>
				<div class="row gap-y">
					<div class="col-md-3">
						<div class="shadow-box shadow-hover border-0 card">
							<div class="card-body text-center">
							    <p class="mb-0">TICKER</p>
								<h3 class="bold">LYRA</h3>
								
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="shadow-box shadow-hover border-0 card">
							<div class="card-body text-center">
							     <p class="mb-0">ALGORITHM</p>
								<h3 class="bold">QUARK</h3>
								
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="shadow-box shadow-hover border-0 card">
							<div class="card-body text-center">
							<p class="mb-0">COIN TYPE</p>
								<h3 class="bold">MN/PoS</h3>
								
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="shadow-box shadow-hover border-0 card">
							<div class="card-body text-center">
							    <p class="mb-0">BLOCK TIME</p>
								<h3 class="bold">60 sec.</h2>
								
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="shadow-box shadow-hover border-0 card">
							<div class="card-body text-center">
							    <p class="mb-0">MAX SUPPLY</p>
								<h3 class="bold">50M LYRA</h3>
								
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="shadow-box shadow-hover border-0 card">
							<div class="card-body text-center">
							<p class="mb-0">RPC/P2P PORTS</p>
								<h3 class="bold">42223 / 42222</h3>
								
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="shadow-box shadow-hover border-0 card">
							<div class="card-body text-center">
							<p class="mb-0">MASTERNODE COLLATERAL</p>
								<h3 class="bold">15.000 LYRA</h3>
								
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="shadow-box shadow-hover border-0 card">
							<div class="card-body text-center">
								<p class="mb-0">MINIMUM STAKE AGE</p>
								<h3 class="bold">60 min.</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ./Customers -->

		<section class="section gradient overlay gradient-43 image-background cover color-1 block bg-1" style="background-image: url(https://picsum.photos/350/200/?random&gravity=south)">
			<div class="container py-5 py-4">
				<div class="row align-items-center">
					<div class="col-md-6">
						<h2>Scrypta Block
							<span class="bold">Explorer</span>
						</h2>
						<p class="op-6">
						<?php echo trans('messages.explorertext'); ?>
						</p>
					</div>
					<div class="col-md-4 ml-md-auto">
						<a href="https://chainz.cryptoid.info/lyra/" target="_blank" class="btn btn-1 ml-3"><?php echo trans('messages.entra'); ?></a>
					</div>
				</div>
			</div>
		</section>
		<!-- ./Team -->
	</main>
<?php echo $footer; ?>