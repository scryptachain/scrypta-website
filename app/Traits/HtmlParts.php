<?php

namespace App\Traits;
/**
 *
 */
trait HtmlParts{
	function footerpublic(){
		return '
			<!-- ./Footer - Simple -->
			<footer class="site-footer section block bg-1">
				<div class="container py-4">
					<div class="row align-items-center">
						<div class="col-md-12 text-center">
							<img src="/logo.png" height="25">
							<p class="mt-2 mb-0 color-2 small">© '.date('Y').' Scrypta Project.</p>
						</div>
					</div>
				</div>
			</footer>

			<!-- themeforest:js -->
			<script src="/js/01.cookie-consent-util.js"></script>
			<script src="/js/02.1.cookie-consent-themes.js"></script>
			<script src="/js/02.2.cookie-consent-custom-css.js"></script>
			<script src="/js/02.3.cookie-consent-informational.js"></script>
			<script src="/js/02.4.cookie-consent-opt-out.js"></script>
			<script src="/js/02.5.cookie-consent-opt-in.js"></script>
			<script src="/js/02.6.cookie-consent-location.js"></script>

			<script src="/js/jquery.js"></script>
			<script src="/js/jquery.animatebar.js"></script>
			<script src="/js/odometer.min.js"></script>
			<script src="/js/simplebar.js"></script>
			<script src="/js/swiper.js"></script>
			<script src="/js/popper.js"></script>
			<script src="/js/jquery.easing.min.js"></script>
			<script src="/js/jquery.validate.js"></script>
			<script src="/js/jquery.smartWizard.js"></script>
			<script src="/js/bootstrap.js"></script>
			<script src="/js/jquery.waypoints.js"></script>
			<script src="/js/jquery.counterup.js"></script>
			<script src="/js/modernizr-2.8.3.min.js"></script>
			<script src="/js/aos.js"></script>
			<script src="/js/particles.js"></script>
			<script src="/js/typed.js"></script>
			<script src="/js/prettify.js"></script>
			<script src="/js/jquery.magnific-popup.js"></script>
			<script src="/js/cookieconsent.min.js"></script>
			<script src="/js/common-script.js"></script>
			<script src="/js/forms.js"></script>
			<script src="/js/site.js"></script>
			<!-- endinject -->
		</body>

		</html>
		';
	}
	function headerpublic(){
		return '
		<!doctype html>
			<html lang="en">

			<head>
				<meta charset="utf-8">
				<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
				<title>Scyrpta Blockchain - Make Blockchain for real</title>
				<meta name="description" content="">
				<meta name="viewport" content="width=device-width,initial-scale=1">
				<!-- Place favicon.ico in the root directory -->
				<link rel="icon" type="image/png" href="/logo.png" />
				<link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,700,900" rel="stylesheet">
				<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet"> -->
				<link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
				<!-- themeforest:css -->
				<link rel="stylesheet" href="/css/aos.css">
				<link rel="stylesheet" href="/css/bootstrap.css">
				<link rel="stylesheet" href="/css/cookieconsent.min.css">
				<link rel="stylesheet" href="/css/fontawesome-all.css">
				<link rel="stylesheet" href="/css/helper.css">
				<link rel="stylesheet" href="/css/magnific-popup.css">
				<link rel="stylesheet" href="/css/odometer-theme-minimal.css">
				<link rel="stylesheet" href="/css/pe-icon-7-stroke.css">
				<link rel="stylesheet" href="/css/prettify.css">
				<link rel="stylesheet" href="/css/simplebar.css">
				<link rel="stylesheet" href="/css/smart_wizard.css">
				<link rel="stylesheet" href="/css/smart_wizard_theme_arrows.css">
				<link rel="stylesheet" href="/css/smart_wizard_theme_circles.css">
				<link rel="stylesheet" href="/css/smart_wizard_theme_dots.css">
				<link rel="stylesheet" href="/css/styles.css">
				<link rel="stylesheet" href="/css/swiper.css">
				<!-- endinject -->
			</head>

			<body>
				<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
			<![endif]-->
				<!-- ./Main Navigation -->
				<nav class="navbar navbar-expand-md main-nav navigation fixed-top sidebar-left">
					<div class="container">
						<button class="navbar-toggler" type="button">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="#main" class="navbar-brand">
							<img src="/logo.png" alt="ScryptaChain" height="35" class="logo logo-sticky d-block d-md-none">
							<img src="/logo.png" alt="ScryptaChain" height="35" class="logo d-none d-md-block">
						</a>
						<div class="collapse navbar-collapse ml-auto" id="main-navbar">
							<div class="sidebar-brand">
								<a href="/">
									<img src="img/logo.png" alt="ScryptaChain Template" class="logo">
								</a>
							</div>
							<ul class="nav navbar-nav">
								<li class="nav-item">
									<a class="nav-link" href="/">Home</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="/blockchain">Blockchain</a>
								</li><!--
								<li class="nav-item">
									<a class="nav-link" href="/documentazione">Sviluppatori</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="/sostieni-il-progetto">Sostieni il progetto</a>
								</li>-->
								<li class="nav-item">
									<a class="nav-link" target="_blank" href="https://chainz.cryptoid.info/lyra/">Explorer</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#wallet">Wallet</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="/contatti">Contatti</a>
								</li>
							</ul>
							<nav class="nav navbar-nav ml-md-auto justify-content-center mt-4 mt-md-0 flex-row">
								<a class="btn btn-rounded btn-outline mr-3 px-3" href="https://github.com/scryptachain" target="_blank">
									<i class="fab fa-github d-none d-md-inline mr-md-0 mr-lg-2"></i>
									<span class="d-md-none d-lg-inline">Github</span>
								</a>
							</nav>
						</div>
					</div>
				</nav>
		';
	}
	function header(){
			return
			'<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>Scrypta - Make Blockchain for real.</title>
			
				<!-- Favicon -->
				<link rel="icon" type="image/png" href="/logo.png" />
			
				<!-- Bootstrap & Plugins CSS -->
				<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
				<link href="/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
			
				<!-- Custom CSS -->
				<link href="/assets/css/dark.css" rel="stylesheet" type="text/css">
			</head>';
	}
	function menu(){
		return
		'
		';
	}
	function footer(){
			return
			'
    
			<!-- ***** Contact & Footer Start ***** -->
			<footer id="contact">
				<div class="footer-bottom">
					<div class="container">
						<div class="row">
							<div class="col-lg-5">
								<p class="copyright">2018 © Scrypta Project</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- ***** Contact & Footer End ***** -->
		
		
			<!-- jQuery -->
			<script src="/assets/js/jquery-2.1.0.min.js"></script>
		
			<!-- Bootstrap -->
			<script src="/assets/js/popper.js"></script>
			<script src="/assets/js/bootstrap.min.js"></script>
		
			<!-- Plugins -->
			<script src="/assets/js/particles.min.js"></script>
			<script src="/assets/js/scrollreveal.min.js"></script>
			<script src="/assets/js/jquery.downCount.js"></script>
			<script src="/assets/js/parallax.min.js"></script>
		
			<!-- Global Init -->
			<script src="/assets/js/particle-dark.js"></script>
			<script src="/assets/js/custom.js"></script>
			<script src="/assets/js/block-js.min.js"></script>
			';
	}
}
