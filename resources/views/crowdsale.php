<?php echo $header; ?>

<main>
	<!-- ./Page header -->
	<header class="page header color-1 overlay alpha-8 image-background cover overlay gradient gradient-43" style="">
		<div class="divider-shape">
			<!-- waves divider -->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" class="shape-waves" style="left: 0; transform: rotate3d(0,1,0,180deg);">
				<path class="shape-fill shape-fill-1" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z" />
			</svg>
		</div>
		<div class="container" style="">
			<div class="row">
				<div class="col-md-6">
					<h1 class="regular display-4 color-1 mb-4">Scrypta Crowdsale</h1>
					<p class="lead color-1"><?php echo trans('messages.crowdsaleintrotext'); ?></p>
				</div>
			</div>
		</div>
	</header>
	<!-- ./Pricing cards -->
	<section>
		<div class="container">
			<div class="section-heading text-center">
				<h2 class="mb-2"><?php echo trans('messages.howcontribute'); ?></h2>
				<p class="lead color-2"><?php echo trans('messages.howcontributetext'); ?></p>
			</div>
			<div class="row">
			<div class="col-md-6 mt-5">
					<div class="card text-center">
						<div class="pricing card-header bg-3-gradient color-1 d-flex align-items-center flex-column">
							<h4>Scrypta Masternodes Platforms</h4>
							<div class="pricing-value">
								<span class="price bold">0,5</span>
							</div>
							<p><?php echo trans('messages.scryptamasternodeplatform'); ?></p>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item ">15000 LYRA</li>
							<li class="list-group-item "><?php echo trans('messages.1yrhosting'); ?></li>
							<li class="list-group-item"><?php echo trans('messages.automaticdeploy'); ?></li>
							<li class="list-group-item">Bonus 7500 Lyra *</li>
							<li class="list-group-item"><?php echo trans('messages.stakingcloud'); ?></li>
						</ul>
						<div class="card-body">
							<a href="https://masternodes.scryptachain.org" target="_blank" class="btn btn-accent">Join Crowdsale</a>
						</div>
					</div>
					<div class="text-center" style="font-size:12px; margin-top:15px">
						<?php echo trans('messages.bonuslock'); ?>
					</div>
				</div>
				<div class="col-md-6 mt-5">
					<div class="card text-center">
						<div class="pricing card-header bg-2-gradient color-1 d-flex align-items-center flex-column">
							<h4><?php echo trans('messages.directlisting'); ?></h4>
							<div style="font-size:35px; margin:25px 0">
								<span class="price bold">Mercatox</span>
							</div>
							<p><?php echo trans('messages.listingmercatox'); ?></p>
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><?php echo trans('messages.noamount'); ?></li>
							<li class="list-group-item strike-through"><?php echo trans('messages.1yrhosting'); ?></li>
							<li class="list-group-item strike-through"><?php echo trans('messages.automaticdeploy'); ?></li>
							<li class="list-group-item strike-through">Bonus 7500 Lyra *</li>
							<li class="list-group-item strike-through"><?php echo trans('messages.stakingcloud'); ?></li>
						</ul>
						<div class="card-body">
							<a href="https://mercatox.com/exchange/LYRA/BTC" target="_blank" class="btn btn-accent bg-2-gradient color-1">Trade now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php echo $footer; ?>
