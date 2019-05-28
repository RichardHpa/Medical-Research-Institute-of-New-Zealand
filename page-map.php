<?php
/*
	Template Name: Map Template
*/
get_header(); ?>
<div class="container main-container">
	<div class="row">
		<div class="col-12">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</div>
    </div>
</div>
<div class="container-fluid margin-none">
	<div id="map"></div>
</div>
<div class="container">
	<?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
            <div class="row">
				<div class="col-12">
					<?php the_content(); ?>
				</div>

            </div>
            <hr>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
