<?php get_header(); ?>


<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

			<?php while ( have_posts() ):the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>

