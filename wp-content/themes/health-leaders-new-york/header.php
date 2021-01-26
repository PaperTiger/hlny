<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon-152x152.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon-144x144.png">
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon-120v120.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon-114x114.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon-72x72.png">
	<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon-57x57.png">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php bloginfo('stylesheet_directory'); ?>/images/favicon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<script type="text/javascript" src="https://www.youtube.com/iframe_api"></script>

	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "87579f10-55bd-4abe-935f-0cf6a4629cc4", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TH5DPTC');</script>
	<!-- End Google Tag Manager -->
	<?php wp_head(); ?>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73228330-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TH5DPTC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) --> 
	<div class="wrapper">
		<header class="header">
			<div class="shell">
				<a href="<?php echo home_url('/'); ?>" class="logo"></a>

				<div class="header-inner">
					<div class="header-inner-bar">
						<div class="search-outer">
							<a href="#" class="link-search">
								<i class="ico-search"></i>
							</a>
							
							<div class="form form-search">
								<?php get_search_form(); ?>
							</div><!-- /.search -->
						</div><!-- /.search-outer -->

						<ul class="nav-secondary">
							<?php crb_display_social_links(); 

							$top_link 	   = get_option('crb_login_link');
							$top_link_text = get_option('crb_login_text'); 
							if ( !empty($top_link) && !empty($top_link_text) ) : ?>							

								<li>
									<a href="<?php echo $top_link; ?>" target="_blank"><?php echo $top_link_text; ?></a>
								</li>

							<?php endif; ?>
						</ul><!-- /.nav-secondary -->
					</div><!-- /.header-inner-bar -->

					<nav class="nav">
						<?php wp_nav_menu(array(
							'theme_location' => 'navigation-menu',
							'container'		 => false,
							'fallback_cb'	 => ''
						)); 

						$become_member_link = get_option('crb_become_member_link');
						if ( !empty($become_member_link) ) : ?>

							<a href="<?php echo $become_member_link; ?>" class="btn nav-btn"><?php _e('Become a member', 'crb'); ?></a>

						<?php endif; ?>
					</nav><!-- /.nav -->
				</div><!-- /.header-inner -->
				
				<div class="nav-toggle">
					<a href="#" class="btn-menu"><span></span></a>
				</div><!-- /.nav-toggle -->

				<div class="nav nav-dropdown">
					<div class="search">
						<?php get_search_form(); ?>
					</div><!-- /.search -->
				</div><!-- /.nav nav-dropdown -->
			</div><!-- /.shell -->
		</header><!-- /.header -->