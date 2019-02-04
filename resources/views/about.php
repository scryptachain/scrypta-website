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
						<h1 class="regular display-4 color-1 mb-4"><?php echo trans('messages.assetto'); ?></h1>
						<p class="lead color-1"><?php echo trans('messages.assettotext'); ?></p>
					</div>
				</div>
			</div>
		</header>
		<!-- ./Join - As Developer/Designer -->
		<section class="section mt-6 mb-6 bg-1">
			<div class="container bring-to-front py-0">
				<div class="shadow bg-1 p-5 rounded">
					<div class="row gap-y align-items-center text-left text-lg-left">
						<div class="col-12 px-5 b-md-r">
							<a href="javascript:void(0)" class="mt-4 color-5">
								<h4 class="mr-3">Task Force</h4>
							</a>
							<p class="mt-4"><?php echo trans('messages.taskforcetext1'); ?></p>
							<ul class="text-left">
								<li>
								<?php echo trans('messages.taskforcetext2'); ?>
								</li>
								<li>
								<?php echo trans('messages.taskforcetext3'); ?>
								</li>
								<li>
								<?php echo trans('messages.taskforcetext4'); ?>
								</li>
							</ul>
						</div>
						<div class="col-12 col-md-6 py-4 px-5 b-md-r">
							<a href="javascript:void(0)" class="mt-4 color-4">
								<h4 class="mr-3">Scrypta Foundation</h4>
							</a>
							<p class="mt-4 text-left"><?php echo trans('messages.foundationtext'); ?></p>
						</div>
						<div class="col-12 col-md-6 py-4 px-5">
							<a href="javascript:void(0)" class="mt-4 color-3">
								<h4 class="mr-3">Scrypta Consortium</h4>
							</a>
							<p class="mt-4 text-left"><?php echo trans('messages.consortiumtext'); ?></p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
<?php echo $footer; ?>