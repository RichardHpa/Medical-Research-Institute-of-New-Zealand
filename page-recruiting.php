<?php
/*
	Template Name: Recruiting Template
*/
get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
            <hr>
        </div>
    </div>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
            <div class="row">
                <div class="col-12 contentRow"><?php the_content(); ?></div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php
        $args = array(
            'post_type' => 'recruiting',
        );
        $recruiting = new WP_Query( $args );
    ?>
    <?php if($recruiting->have_posts()): ?>
        <div class="recruiting">
            <?php while($recruiting->have_posts()): $recruiting->the_post();?>
                <div>
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php echo esc_url(get_permalink()); ?>">Read More about it</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
