<?php
/*
	Template Name: Research Template
*/
get_header(); ?>
<div class="container main-container">
    <div class="row">
        <div class="col-12">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
            <hr>
        </div>
    </div>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
            <div class="row">
                <div class="col-12"><?php the_content(); ?></div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php
        $args = array(
            'post_type' => 'programmes',
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1,
        );
        $programmes = new WP_Query( $args );
    ?>
    <?php if($programmes->have_posts()): ?>
        <div class="programmes">
            <h2>Our Programmes</h2>
            <?php while($programmes->have_posts()): $programmes->the_post();?>
                <div class="mb-3 border-top pt-3">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php echo esc_url(get_permalink()); ?>">Read More about it</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

</div>
<?php get_footer(); ?>
