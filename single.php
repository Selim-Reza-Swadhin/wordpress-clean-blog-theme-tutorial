<!-- Header -->
<?php get_header(); //include header page?>


<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<?php if ( have_posts() ): ?>

				<?php while ( have_posts() ) {
					the_post(); ?>

					<div class="post-preview text-justify">
						<p class="post-subtitle">
							<?php the_content(); ?>
						</p>
					</div>
				<?php } ?>
			<?php else:
				_e( '<h2 class="text-center text-info">Sorry there is not post found.</h2>' );
				?>
			<?php endif; ?>

		</div>
	</div>
</div>

<hr>

<!-- Footer -->
<?php get_footer(); //include footer page?>
