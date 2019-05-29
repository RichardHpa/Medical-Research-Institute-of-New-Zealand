<?php
/*
	Template Name: Alumni Template
*/
get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
            <hr>
        </div>
        <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post();?>
                <p class="contentRow"><?php the_content(); ?></p>
            <?php endwhile; ?>
        <?php endif; ?>

    </div>
    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $arg = array(
        'post_type' => 'alumni',
        'paged' => $paged,
        'posts_per_page' => 10,
    );
    $alumni = new WP_Query($arg);
    ?>
    <div class="alumnis">
        <?php if($alumni->have_posts()): ?>
            <?php while($alumni->have_posts()): $alumni->the_post();?>
                <div class="row mb-3 border-top pt-3">
                    <div class="col-12 col-sm-3 alumni-image">
                        <?php the_post_thumbnail('medium_large', array('class' => 'img-fluid')); ?>
                    </div>
                    <div class="col-12 col-sm-9 alumni-text">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php echo esc_url(get_permalink()); ?>">Read about their experience</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php if (function_exists("pagination")) {
            pagination($alumni->max_num_pages);
        } ?>
    </div>
</div>
<?php get_footer(); ?>
