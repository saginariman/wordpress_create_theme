<!-- ХИДЕР ПОДКЛЮЧАЕМЫЙ -->
<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
   <meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script src="js/modernizr.js"></script>
	<link rel="shortcut icon" href="favicon.ico" > 
   <?php wp_head() ?>
</head>

<body>
   <header>
      <div class="row">
         <div class="twelve columns">
            <div class="logo">
               <a href="<?php bloginfo( 'url' ); ?>">
                  <div><?php bloginfo( 'name' ); ?></div>
                  <img alt="" src="images/logo.png">
               </a>
            </div>
            <nav id="nav-wrap">
               <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	            <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>
               <?php wp_nav_menu([
                  'theme_location'  => 'top',
                  'container'       => null,
                  'menu_class'      => 'nav',
                  'menu_id'         => 'nav',
               ] );?>
            </nav>
         </div>
      </div>
   </header>