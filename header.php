<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php bloginfo( 'name' ); ?></title>

    <!-- Bootstrap core CSS -->
    <!--	<link href="-->
	<? ///*= get_template_directory_uri();*/?><!--/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

    <!-- Custom fonts for this template -->
    <!--	<link href="-->
	<? ///*= get_template_directory_uri();*/?><!--/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
    <!--	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>-->
    <!--	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>-->

    <!-- Custom styles for this template -->
    <!--	<link href="--><? ///*= get_template_directory_uri();*/?><!--/css/clean-blog.min.css" rel="stylesheet">-->

	<?php wp_head(); //introduce wordpress ?>
</head>

<body <?php body_class(); //add class for body ?> >

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top mt-4" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>">
        <span>
            <?php if (function_exists( the_custom_logo())){
            the_custom_logo();
            } ?>
        </span>
        <span class="default-title"><?php bloginfo( 'name' ); ?></span>
        </a>

<!--        <a class="navbar-brand" href="--><?php //bloginfo( 'url' ); ?><!--">--><?php //bloginfo( 'name' ); ?><!--</a>-->
        <!--		<a class="navbar-brand" href="--><? //= site_url('/');?><!--">-->
		<?php //bloginfo('name');?><!--</a>-->
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>


        <!--Bootstrap menu-->
        <!--		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php /*bloginfo('url');*/ ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php /*bloginfo('url');*/ ?>">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php /*bloginfo('url');*/ ?>">Sample Post</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php /*bloginfo('url');*/ ?>">Contact</a>
				</li>
			</ul>
		</div>-->


        <!--wp dynamic menu-->
		<?php

		wp_nav_menu( array(
//	'theme_location'  => 'primary',
			'theme_location'  => 'header',
			'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
			'container'       => 'div',
			'container_class' => 'collapse navbar-collapse',
			'container_id'    => 'navbarResponsive',
			'menu_class'      => 'navbar-nav ml-auto',
			'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
			'walker'          => new WP_Bootstrap_Navwalker(),
		) );

		?>


    </div>
</nav>

<!-- Page Header post or single.php -->
<?php if ( is_single() ) { ?>
	<?php
	$thumb_id  = get_post_thumbnail_id( $post->ID );//$post is global variable
	$thumb_src = wp_get_attachment_image_src( $thumb_id, 'large' );
	//print_r( $thumb_src);
	?>
    <header class="masthead" style="background-image: url('<?= $thumb_src[0]; ?>')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1 class="text-center text-capitalize"><?php the_title(); ?></h1>
                        <span class="meta text-center">Posted by
              <?php the_author_meta( 'display_name', $post->post_author );//without while loop ?>
              on <?= get_the_date( 'd-M-Y h:i:s a' );//without while loop  ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php } else { ?>


    <!-- Page Header index.php-->
    <?php //$img = get_field( 'page_header_image');//Image Array for acf plugin ?>
<!--    <header class="masthead" style="background-image: url('--><?//= $img['url']; ?> <!--')">-->
    <header class="masthead" style="background-image: url('<?php the_field( 'page_header_image');//Image URL for acf plugin ?>')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <!--					<h1>--><?php //bloginfo('name');?><!--</h1>-->
                        <!--					<h1>--><?php //bloginfo('version');?><!--</h1>-->
                        <!--					<h1>--><?php //bloginfo('admin_email');?><!--</h1>-->

                        <!--acf plugin-->
                        <!--header title for header page-->
						<?php if ( get_field( 'page_header' ) ): ?>
                            <h1><?php the_field( 'page_header' ); ?></h1>
<!--                            <h1>--><?//= get_field( 'page_header' ); ?><!--</h1>-->
						<?php endif; ?>

                     <!--sub header title for header page-->
						<?php if ( get_field( 'sub_header' ) ): ?>
                            <span class="subheading"><?php the_field( 'sub_header' ); ?></span>
						<?php endif; ?>

                        <!--before acf plugin-->
<!--                        <h1>--><?php //bloginfo( 'language' ); ?><!--</h1>-->
<!--                        <span class="subheading">--><?php //bloginfo( 'description' ); ?><!--</span>-->
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php } ?>

<!--//custom header image alternate system-->
<!--<img src="--><?php //header_image();?><!--" height="--><?//= get_custom_header()-><!--height;?>--><!--" width="--><?//= get_custom_header()-><!--width;?>--><!--" alt="">-->


<?php
//echo $bloginfo = bloginfo('url');
//echo '<br>';
//echo $bloginfo2 =  bloginfo('stylesheet_directory');
//echo '<br>';
//echo $bloginfo3 = bloginfo('name');
//echo '<br>';
//echo $bloginfo4 = wp_title('|','true','right');
//exit();
?>
