<?php echo $header; ?>

<main>
		<!-- ./Page header -->
		<header class="header section parallax image-background overlay gradient gradient-53 alpha-8 color-1">
			<div class="container overflow-hidden">
				<div class="row">
					<div class="col-md-8">
						<p class="lead bold"><?php echo trans('messages.benvenutisv'); ?></p>
						<h1 class="display-4 color-1 light"><?php echo trans('messages.strumdapp'); ?></h1>
						<h1 class="color-1">
							<span class="typed bold display-4 display-md-3"></span>
						</h1>
					</div>
				</div>
			</div>
		</header>
		<!-- ./ New Integration API -->
		<!-- ./Integration API -->
		<section class="section mt-4n">
			<div class="container pt-0">
				<div class="shadow bg-1 p-4 rounded">
					<div class="row gap-y text-center text-md-left">
						<div class="col-md-4 py-4 px-5 d-flex flex-column b-md-r">
							<a href="javascript:void(0)" class="color-5">
								<h4 class="bold mr-3">RESTful API</h4>
							</a>
							<p class="mt-4"><?php echo trans('messages.apitext'); ?></p>
							
						</div>
						<div class="col-md-4 py-4 px-5 d-flex flex-column b-md-r">
							<a href="javascript:void(0)" class="color-5">
								<h4 class="bold mr-3">IdA Nodes</h4>
							</a>
							<p class="mt-4"><?php echo trans('messages.idanodetext'); ?></p>
							
						</div>
						<div class="col-md-4 py-4 px-5 d-flex flex-column">
							<a href="javascript:void(0)" class="color-5">
								<h4 class="bold mr-3">IPFS Storage</h4>
							</a>
							<p class="mt-4"><?php echo trans('messages.ipfstext'); ?></p>
							
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ./Counters -->
		<section class="text-center">
			<h2><?php echo trans('messages.prestodisponibile'); ?></h2>
			<h3><?php echo trans('messages.rimaniincontato'); ?></h3>
		</section>
	</main>

<?php echo $footer; ?>