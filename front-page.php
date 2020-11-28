<?php get_header(); ?>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur eaque, eos?

<div class="container">
    <div class="card col-md-6 mt-5 mb-5 offset-3">

        <!--    CAROUSEL SLIDER -->
        <div class="carousel slide" id="slider1" data-ride="carousel">
            <div class="carousel-inner" role="listbox">

				<?php
				$testimoni = new WP_Query( array(
					'post_type' => 'code4webse'
				) );
				?>

				<?php if ( $testimoni->have_posts() ): ?>
					<?php while ( $testimoni->have_posts() ) {
						$testimoni->the_post();
						?>
                        <div class="carousel-item active">
                            <div class="carousel-caption">
                                <div class="row">
                                    <div class="col-sm-3">
	                                    <?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="col-sm-9">
                                        <h3><?php //the_content(); ?></h3>
                                        <small><?php the_content(); ?></small>
                                        <small class="smallest mute">selim reza</small>
                                    </div>
                                </div>
                            </div>

                        </div>
					<?php } ?>
				<?php endif; ?>
            </div>
            <!--        arrow symbol-->
            <a href="#slider1" data-slide="prev" class="carousel-control-prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#slider1" data-slide="next" class="carousel-control-next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</div>


<!--<div class="card col-md-6 mt-5 mb-5">
    <div id="#carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="100000">
        <div class="w-100 carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="carousel-caption">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="" alt="no image" class="rounded-circle img-fluid">
                        </div>
                        <div class="col-sm-9">
                            <h3>Hello Bangladesh</h3>
                            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet animi assumenda, commodi consequuntur deserunt dolore dolorem exercitationem fugiat incidunt itaque magnam odio odit perferendis perspiciatis qui ratione repellat similique tempore ut, vel!</small>
                            <small class="smallest mute">selim reza</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="float-right navi">
            <a href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon ico" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon ico" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
        </div>
    </div>
</div>-->


<?php get_footer(); ?>
