<!-- Header -->
<?php get_header(); //include header page?>


<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
			<?php if ( have_posts() ): ?>

                <!--          --><?php //while (have_posts()) : the_post();//short syntax?>
				<?php while ( have_posts() ) {
					the_post(); ?>

                    <div class="post-preview">

                        <a href="../post.html" title="Permanent Link to <?php the_title_attribute(); ?>">
                            <!--	          --><?php //the_post_thumbnail(); ?>
<!--							--><?php //the_post_thumbnail( 'medium' ); ?>
							<?php if (has_post_thumbnail()){the_post_thumbnail( 'large' );} ?>
<!--                            	          --><?php //the_post_thumbnail('large'); ?>
                            <h2 class="post-title">
								<?php the_title(); ?>
                            </h2>
                            <h3 class="post-subtitle text-justify">
                                <!--	            --><?php //the_content();//full text ?>
								<?php the_excerpt();//some text ?>
                            </h3>
                        </a>


                        <p class="post-meta">Posted by
                            <a href="#"><?php the_author(); ?></a>
<!--                            on --><?php //the_date(); ?>
                            on <?php the_date('d-M-Y h:i:s a'); ?>
                        </p>
                    </div>
                    <hr>
				<?php } ?>
			<?php else:
				_e( '<h2 class="text-center text-info">Sorry there is not post found.</h2>' );
				?>
			<?php endif; ?>


            <!-- Pager -->
            <div class="clearfix post-paginationn">
                <!--          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>-->
<!--                            <a class="btn btn-primary float-left" href="--><?php //previous_posts_link('&larr; Prev');?><!-- "></a>-->
<!--                            <a class="btn btn-primary float-right" href="--><?php //next_posts_link('Next &rarr;', 0);?><!--"></a>-->

<!--                <a class="btn btn-primary float-left" href="">--><?php //previous_posts_link('&larr; Prev');?><!-- </a>-->
<!--                <a class="btn btn-primary float-right" href="">--><?php //next_posts_link('Next &rarr;', 0);?><!--</a>-->



				<?php previous_posts_link( ' &laquo; Prev' ); ?>
				<?php next_posts_link( 'Next  &raquo;', 0 ); ?>
            </div>
            <br>
            <br>
            <br>
            <div class="clearfix">
<!--                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>-->
	            <?php
                //the_posts_pagination();
                the_posts_pagination(array(
                        'screen_reader_text'=>' ',
                        'prev_text'=>'Prev',
                        'next_text'=>'Next'
                ));
                ?>
            </div>
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<?php get_footer(); //include footer page?>