<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="page-title"><?php single_post_title(); ?></h2>
            <p><small><?php echo get_the_date(); ?></small></p>
        </div>
    </div>
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post();?>
            <?php get_template_part('single/content',get_post_format()); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
